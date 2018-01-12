<?php

include_once('navigation.php');

class login extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
    $this->user = [
      'username' => 'Johnathan',
      'password' => 'John4321'
    ];
  }

  public function index() {
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      header('location:/home');
    }
    else {    
      $this->getView('sections/header');
      $this->navigation->buildNav('login');
      $this->getView('components/login', array('cap' => $this->randomCaptcha()));
      $this->getView('sections/footer');
    }
  }

  public function userAuth() {
    $authResults = @$this->validateAuth();
    $authResults['cap'] = $this->randomCaptcha();
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

  public function validateAuth() {
    $errors = array(
      'captcha' => '',
      'username' => '',
      'password' => '',
    );

    if (strtolower($_REQUEST['cap']) == strtolower($_SESSION['cap'])) {
      $errors['username'] = $this->validateUser();
      if ($errors['username'] == '') {
        $errors['password'] = $this->validatePassword();
      }

      if ($errors['username'] == '' && $errors['password'] == '') {
        $_SESSION['loggedin']=1;
        header("location:/profile");
      }
      else {
        return $errors;
      }
    }
    else {
      $errors['captcha'] = 'Error, captcha incorrect.';
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

  public function randomCaptcha() {
    return substr(md5(rand()), 0, 7);
  }
}

?>