<?php

include_once('navigation.php');

class crud extends AppController {
  public function __construct($parent) {   
    $this->parent = $parent;   
    $this->navigation = new navigation();
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('crud');
    $this->getView('pages/crud');
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $dbData = $this->parent->getModel("fruits")->select("select * from fruit_table");
      $this->getView('components/crud', $dbData);
    }
    $this->getView('sections/footer');
  }
}

?>