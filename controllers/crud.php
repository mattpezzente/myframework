<?php

include_once('navigation.php');

class crud extends AppController {
  public function __construct() {      
    $this->getView('header');
    $this->navigation = new navigation();
    $this->navigation->buildNav('crud');
    $this->getView('masthead');
    $this->getView('crud');
    $this->getView('footer');
  }
}

?>