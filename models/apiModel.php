<?php  

class apiModel {
  public function __construct($parent) {
    $this->db = $parent->db;
  }

  public function googleBooks($term="") {        
    require_once "google-api-php-client/src/Google/autoload.php";    
    $client = new Google_Client;
    $client->setApplicationName("SSLbooks");
    $client->setDeveloperKey("AIzaSyAov7MvV2KED9JAhpibv7VF70o5jWeenxw");
    
    $service = new Google_Service_Books($client);
    $optParams = array("filter" => "free-ebooks");
    $result = $service->volumes->listVolumes($term, $optParams);

    return $result;
  }
}

?>