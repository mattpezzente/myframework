<?php

class welcome extends AppController {
  public function __construct() {
    $this->getView('header', array('pagename'=>'home'));

    $this->getView('welcome');

  }
}


?>