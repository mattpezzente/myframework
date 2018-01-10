<?php

include_once('navigation.php');

class crud extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('crud');
    $this->getView('sections/masthead');
    $this->getView('pages/crud');
    $this->getView('sections/footer');
  }
}

?>