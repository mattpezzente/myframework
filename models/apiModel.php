<?php  

require_once "vendor/autoload.php";

define('APPLICATION_NAME', 'SSL_Web_App');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/gmail-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Gmail::MAIL_GOOGLE_COM)
));

class apiModel {
  public function __construct($parent) {
    $this->db = $parent->db;
  }

  public function getEmails() {
    // Get the API client and construct the service object.
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('online');
    $client->setAccessToken($_SESSION["access_token"]);    
    $service = new Google_Service_Gmail($client);
              
    $messages = $this->listMessages($service);
    
    // var_dump($service->users_messages->get('me', $messageIds[0]["id"]));

    // $messages = $this->getMessage($service, 'me', $messageIds);

    // var_dump($messages);

    return '';
  }

  public function getClient() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('online');
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL)); 
  }

  public function setAuth() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('online');         
    $client->authenticate($_REQUEST["code"]);
    $_SESSION["access_token"] = $client->getAccessToken();
    header('location:/api');
  }

  function listMessages($service, $userId="me") {
    // $messages = array();
    $data = {
      header: '',
      body: '',
      date: '',
    }
    // do {
      $msgResponse = $service->users_messages->listUsersMessages($userId);
      $data["body"] = base64_decode($service->users_messages->get('me', $msgResponse[0]["id"], array("format" => "full"))["payload"]["parts"][0]["body"]["data"]));
      $data["body"];

      var_dump($data);
    // } while ($messages < 100);
    
    return '';
  }

  // function getMessage($service, $userId, $messageIds) {
  //   $messages = array();
  //   foreach ($messageIds as $messageId) {            
  //     do {
        
  //       $messagesResponse = $service->users_messages->get($userId, $messageId["id"]);              
        
  //       $messages = array_merge($messages, $messagesResponse);  

  //     } while ($messages < 100);
  //   }
  //   return $messages;
  // }
}

?>