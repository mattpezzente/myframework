<?php

include_once('navigation.php');

class auth extends AppController {
  public function __construct($parent) {  
    $this->parent = $parent;
    $this->navigation = new navigation();
  }

  public function login() {
    if ($_REQUEST["username"] && $_REQUEST["password"]) {
      $data = $this->parent->getModel("users")->select("select * from users where email = :email and password = :password", array(":email"=>$_REQUEST["username"], ":password"=>sha1($_REQUEST["password"])));

      if ($data) {
        $_SESSION["loggedin"]=1;
        header("location:/profile");
      }
      else {
        header("location:/login?msg= bad login");
      }
    }
  }
}

?>