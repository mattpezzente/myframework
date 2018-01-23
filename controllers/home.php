<?php

include_once('navigation.php');

class home extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('home');
    $this->getView('pages/home');
    $this->getView('sections/footer');
  }
}

?>