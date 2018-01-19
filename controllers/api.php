<?php

include_once('navigation.php');

class api extends AppController {
  public function __construct($parent) {
    $this->parent = $parent;      
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('api');
    $this->getView('pages/api');
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $data = $this->parent->getModel("apiModel")->googleBooks("Henry David Thoreau");      
      $this->getView("components/api", $data);
    }
    $this->getView('sections/footer');
  }
}

?>