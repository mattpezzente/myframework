<?php

class logout extends AppController {
  public function __construct() {      

  }

  public function index() {
    session_destroy();
    header('location:/login');
  }
}

?>