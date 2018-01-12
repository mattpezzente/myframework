<?php

include_once('navigation.php');

class login extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
    $this->user = array(
      'username' => 'Johnathan',
      'password' => 'John4321'
    );
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('login');
    $this->getView('components/login');
    $this->getView('sections/footer');
  }

  public function userAuth() {
    $authResults = @$this->validateAuth($_REQUEST);
    $this->getView('sections/header');
    $this->navigation->buildNav('login');
    if (@$_REQUEST && @$authResults) {
      $this->getView('components/login', $authResults);
    }
    else {
      $this->getView('components/login', $authResults);
    }
    $this->getView('sections/footer');
  }

  // public function ajaxValidation() {
  //   $authResults = @$this->validateAuth($_REQUEST);
  //   if (@$authResults['success']) {
  //     echo 'yes';
  //   }
  //   else {
  //     echo 'no';
  //   }
  // }

  public function validateAuth($request) {
    $errors = array(
      'username' => 'error, invalid username.',
      'password' => 'error, invalid password.',
    );
    
    $errors['username'] = $this->validateUser();
    $errors['password'] = $this->validatePassword();

    if ($errors['username'] == '' && $errors['password'] == '') {
      return array(
        'success' => 'Login Successful!'
      );
    }
    else {
      return $errors;
    }
  }

  public function validateUser() {
    if (!preg_match('/^[A-Za-z]*[A-Za-z0-9]{0,32}$/', $_REQUEST['username'])) {
      return 'Error, invalid username.';
    }
    else if ($_REQUEST['username'] != $this->user['username']) {
      return 'Error, username does not exist.';
    }
    else {
      return '';
    }
  }

  public function validatePassword() {
    if (!preg_match('/^S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $_REQUEST['password'])) {
      return 'Error, invalid password.';
    }
    else if ($_REQUEST['password'] != $this->user['password'] && $_REQUEST['username'] != $this->user['username']) {
      return 'Error, incorrect password.';
    }
    else {
      return '';
    }
  }
}

?>