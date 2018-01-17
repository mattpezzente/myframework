<?php

include_once('navigation.php');

class login extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
    $this->user = [];
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
      header('location:/home');
    }
    else {
      $txtFile = fopen($_SERVER['DOCUMENT_ROOT'].'/assets/login.txt', 'r');
      while(!feof($txtFile)) {
        array_push($this->user, explode('|', (fgets($txtFile))));
      }
      fclose($txtFile);
    }
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('login');
    $this->getView('components/login', array('cap' => $this->randomCaptcha()));
    $this->getView('sections/footer');
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
    for ($i=0; $i < count($this->user); $i++) {
      if (strtolower($_REQUEST['username']) == strtolower($this->user[$i][0])) {
        return '';
      }
    }
    return 'Error, username does not exist.';
  }

  public function validatePassword() {
    for ($i=0; $i < count($this->user); $i++) {
      echo $_REQUEST['username'];
      echo $_REQUEST['password'];
      if (strtolower($_REQUEST['username']) == strtolower($this->user[$i][0]) && $_REQUEST['password'] == $this->user[$i][1]) {
        $_SESSION['userMessage'] = $this->user[$i][2];
        return '';
      }
    }
    return 'Error, invalid password.';
  }
  public function randomCaptcha() {
    return substr(md5(rand()), 0, 7);
  }
}

?>