<?php

include_once('navigation.php');

class contact extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('contact');
    $this->getView('sections/masthead');
    $this->getView('pages/contact');
    $this->getView('sections/footer');
  }
}

?>