<?php

include_once('navigation.php');

class proc extends AppController {
  public function __construct($parent) {
    $this->parent = $parent;
    $this->navigation = new navigation();
  }

  public function addAction() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $sql = "insert into fruit_table (name) values (:fruit)";
      $data = $this->parent->getModel('fruits')->select($sql, array(":fruit"=>$_REQUEST["name"]));
      header("location:/crud");
    }
    else {
      header("location:/login");
    }
  }

  public function addForm() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $this->getView('/components/addForm');
    }
    else {
      header("location:/login");
    }
  }

  public function updateForm() {  
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $id = $path_parts = pathinfo($_SERVER["REQUEST_URI"])["basename"];
      $data = $this->parent->getModel("fruits")->select("select name from fruit_table where id = :id", array(":id"=>$id));
      $this->getView('/components/updateForm', $data);
    }
    else {
      header("location:/login");
    }
  }

  public function updateAction() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $id = $path_parts = pathinfo($_SERVER["REQUEST_URI"])["basename"];
      $sql = "update fruit_table set name = :fruit where id = :id";
      $data = $this->parent->getModel('fruits')->select($sql, array(":fruit"=>$_REQUEST["name"], ":id"=>$id));
      header('location:/crud');
    }
    else {
      header("location:/login");
    }
  }

  public function deleteAction() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      $id = $path_parts = pathinfo($_SERVER["REQUEST_URI"])["basename"];
      $sql = "delete from fruit_table where id = :id";
      $data = $this->parent->getModel('fruits')->select($sql, array(":id"=>$id));
      header('location:/crud');
    }
    else {
      header("location:/login");
    }
  }


  // public function listFruits() {
  //   $sql = "select * from fruit_table";
  //   $data = $this->parent->getModel('fruitModel')->dbSelect($sql);
  //   $this->getView('components/list', $data);
  // }
}

?>