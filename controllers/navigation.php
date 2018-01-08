<?php

class navigation extends AppController {
  public function __construct() {      

  }

  public function buildNav($id) {
    $menuItems = array(
      'Home' => '/',
      'HelloWorld' => '/helloworld',
      'currentpage' => $id
    );
    $this->getView('header');
    $this->getView('navigation', $menuItems);
    switch ($id) {
      case 1:
        $this->getView('helloworld');
        break;
      
      default:
        $this->getView('welcome');
        break;
    }
    $this->getView('footer');
  }
}


?>