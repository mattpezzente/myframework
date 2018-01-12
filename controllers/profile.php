<?php

include_once('navigation.php');

class profile extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
  }

  public function index() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1){
        $this->getView('sections/header');
      $this->navigation->buildNav('profile');
      $this->getView('pages/profile');
      $this->getView('sections/footer');
    }
    else {
      header("location:/login");
    }
  }
}

?>