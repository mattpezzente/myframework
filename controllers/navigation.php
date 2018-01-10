<?php

class navigation extends AppController {
  public function __construct() {      
    $this->menu = array(
      'Home' => '/home',
      'Crud' => '/crud',
      'API' => '/api',
      'Contact' => '/contact',
      'currentpage' => 'home'
    );
  }

  public function buildNav($page) {
    foreach ($this->menu as $lbl => $link) {
      if (strtolower($page) == strtolower($lbl)) {
        $this->menu['currentpage'] = strtolower($lbl);
        $this->getView('sections/navigation', $this->menu);
      }
    }
  }
}

?>