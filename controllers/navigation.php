<?php

class navigation extends AppController {
  public function __construct() {      

  }

  public function index() {
    $menuItems = array(
      'Home' => '/navigation/index',
      'HelloWorld' => '/navigation/helloworld',
      'pageId' => 0
    );
    $this->getView('header');
    $this->getView('navigation', $menuItems);
    $this->getView('footer');
  }

  public function helloworld() {
    $menuItems = array(
      'Home' => '/navigation/index',
      'HelloWorld' => '/navigation/helloworld',
      'pageId' => 1
    );
    $this->getView('header');
    $this->getView('navigation', $menuItems);
    $this->getView('footer');
  }
}

?>