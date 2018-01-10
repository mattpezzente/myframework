<?php

include_once('navigation.php');

class api extends AppController {
  public function __construct() {      
    $this->getView('header');
    $this->navigation = new navigation();
    $this->navigation->buildNav('api');
    $this->getView('masthead');
    $this->getView('api');
    $this->getView('footer');
  }
}

?>