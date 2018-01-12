<?php

include_once('navigation.php');

class api extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('api');
    $this->getView('pages/api');
    $this->getView('sections/footer');
  }
}

?>