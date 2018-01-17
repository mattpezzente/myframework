<?php

class navigation extends AppController {
  public function __construct() {
    if(@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $this->menu = array(
        'Home' => '/home',
        'Crud' => '/crud',
        'API' => '/api',
        'Profile' => '/profile',
        'Log Out' => '/logout',        
        'currentpage' => ''
      );
    }
    else { 
      $this->menu = array(
        'Home' => '/home',
        'Crud' => '/crud',
        'API' => '/api',        
        'Log In' => '/login',
        'currentpage' => ''
      );
    }
  }

  public function buildNav($page) {
    foreach ($this->menu as $lbl => $link) {
      if (strtolower($page) == strtolower(str_replace('/', '', $link))) {
        $this->menu['currentpage'] = strtolower(str_replace('/', '', $link));
      }
    }
    $this->getView('sections/navigation', $this->menu);
  }
}

?>