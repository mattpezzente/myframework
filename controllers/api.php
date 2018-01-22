<?php

include_once('navigation.php');

class api extends AppController {
  public function __construct($parent) {
    $this->parent = $parent;      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('api');
    $this->getView('pages/api');
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $data = array();

      if (isset($_REQUEST["code"] || isset($_SESSION["accessToken"])) {
        $data = $this->parent->getModel("apiModel")->googleEmails();
      }

      $this->getView("components/api", $data);
    }
    $this->getView('sections/footer');
  }

  public function getGoogleEmails() {
    $data = $this->parent->getModel("apiModel")->getClient();
  }
}

?>