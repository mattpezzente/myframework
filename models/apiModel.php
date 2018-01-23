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
              
    $messageData = $this->listMessages($service);
    
    return $messageData;
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
    $messageData = array();
    $msgResponse = $service->users_messages->listUsersMessages($userId);

    for ($i=0; $i < 10; $i++) {  
      $data = array(
        'subject' => '',
        'body' => '',
        'date' => '',
      );   
      $email = $service->users_messages->get($userId, $msgResponse[$i]["id"], array("format" => "full"));            
      $header = $email["payload"]["headers"];
      $subjectIndex = 0;
      for ($j=0; $j < count($header); $j++) { 
        foreach ($header[$j] as $key => $value) {
          if ($value === "Subject") {
            $subjectIndex = $j;
          }
        }
      }
      $data["subject"] = $header[$subjectIndex]["value"];
      $date = $email["payload"]["headers"];
      $subjectIndex = 0;
      for ($j=0; $j < count($header); $j++) { 
        foreach ($header[$j] as $key => $value) {
          if ($value === "Date") {
            $subjectIndex = $j;
          }
        }
      }
      $data["date"] = $header[$subjectIndex]["value"];      
      $data["body"] = $email["snippet"];
          
      array_push($messageData, $data);
    }        

    return $messageData;
  }
}

?>