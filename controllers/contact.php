<?php

include_once('navigation.php');

class contact extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
    $this->user = array(
      'username' => 'Johnathan',
      'password' => 'John4321'
    ); 
  }

  public function index() {
    $this->getView('sections/header');
    $this->navigation->buildNav('contact');
    $this->getView('sections/masthead');
    $this->getView('pages/contact');
    $this->getView('sections/footer');
  }

  public function userAuth() {
    $authResults = @$this->validateAuth($_REQUEST);
    $this->getView('sections/header');
    $this->navigation->buildNav('contact');
    $this->getView('sections/masthead');
    if (@$_REQUEST && @$authResults) {
      $this->getView('pages/contact', $authResults);
    }
    else {
      $this->getView('pages/contact', $authResults);
    }
    $this->getView('sections/footer');
  }

  public function ajaxValidation() {
    $authResults = @$this->validateAuth($_REQUEST);
    if (@$authResults['success']) {
      echo 'yes';
    }
    else {
      echo 'no';
    }
  }

  public function validateAuth($request) {
    $errors = array(
      'username' => 'error, invalid username.',
      'password' => 'error, invalid password.',
      'message' => 'error, message can only contain numbers, letters and spaces.',
    );
    
    $errors['username'] = $this->validateUser();
    $errors['password'] = $this->validatePassword();
    $errors['message'] = $this->validateMessage();

    if ($errors['username'] == '' && $errors['password'] == '' && $errors['message'] == '') {
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

  public function validateMessage() {
    if ($_REQUEST['message'] == '') {
      return '';
    }
    else if (!preg_match('/[A-Za-z0-9_ -]*[A-Za-z0-9_ -]/', $_REQUEST['message'])) {
      return 'Error, message can only contain letters, numbers, and spaces';
    }
    else {
      return '';
    }
  }
}

?>