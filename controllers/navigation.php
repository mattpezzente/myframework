<?php

class navigation extends AppController {
  public function __construct() {      
    $this->menu = array(
      'Home' => '/home',
      'Crud' => '/crud',
      'API' => '/api',
      'currentpage' => 'home'
    );
  }

  public function buildNav($page) {
    foreach ($this->menu as $lbl => $link) {
      if (strtolower($page) == strtolower($lbl)) {
        $this->menu['currentpage'] = strtolower($lbl);
        $this->getView('navigation', $this->menu);
      }
    }
  }
}

?>