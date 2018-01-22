<?php  

require_once "vendor/autoload.php";

define('APPLICATION_NAME', 'SSL_Web_App');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/gmail-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Gmail::GMAIL_READONLY)
));

class apiModel {
  public function __construct($parent) {
    $this->db = $parent->db;
  }

  public function googleEmails() {
    // Get the API client and construct the service object.
    $client = $this->getClient() 
    $service = new Google_Service_Gmail($client);



    // if (!isset($_REQUEST["code"])) {
    //   $this->getClient($client);  
    // }
    // // else if (isset($_SESSION["accessToken"])) {
    // //   # code.
    // // }
    // else {
    //   $client = $this->authClient($client);          
    //   // Return the messages in the user's account.
    //   $userId = 'me';
      
      
    //   return $this->listMessages($service, $userId);      
    // }
  }

  public function getClient($client) {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('online');

    if (!isset($_SESSION["accessToken"])) {
      $authUrl = $client->createAuthUrl();
      header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL)); 
      return $client;
    }
    else {
      return $client;
    } 
  }

  public function setAuth($client) {
    if (isset($_REQUEST["code"])) {
      $authCode = $_REQUEST["code"];
      // Exchange authorization code for an access token.
      $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    }
    else {
      $authCode = $_SESSION["accessToken"];

      // Exchange authorization code for an access token.
      $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    }

    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    
    
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
      $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    }
    return $client;
  }

  function listMessages($service, $userId) {    
    $pageToken = NULL;
    $messages = array();
    $opt_param = array();
    do {
      if ($pageToken) {
        $opt_param['pageToken'] = $pageToken;
        $opt_param['maxResults'] = 100;
      }
      $messagesResponse = $service->users_messages->listUsersMessages($userId, $opt_param);      
      if ($messagesResponse->getMessages()) {
        $messages = array_merge($messages, $messagesResponse->getMessages());
        var_dump($messagesResponse->getMessages());
        $pageToken = $messagesResponse->getNextPageToken();
      }
    } while ($pageToken && $messages < 100);
    
    return $messages;
  }
}

?>