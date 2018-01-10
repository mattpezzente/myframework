<?php

include_once('navigation.php');

class home extends AppController {
  public function __construct() {      
    $this->getView('header');
    $this->navigation = new navigation();
    $this->navigation->buildNav('home');
    $this->getView('masthead');
    $this->getView('home');
    $this->getView('footer');
  }
}

?>