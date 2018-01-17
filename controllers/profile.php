<?php

include_once('navigation.php');

class profile extends AppController {
  public function __construct() {      
    $this->navigation = new navigation();
    if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1){
    }
    else {
      header("location:/login");
    }
  }

  public function index() {
      $this->getView('sections/header');
      $this->navigation->buildNav('profile');
      $this->getView('pages/profile');
      $this->getView('sections/footer');
  }

  public function updateProfile() {
    if ($_FILES["img"]["name"]!="") {
      $imgFileType = pathinfo("assets/".$_FILES["img"]["name"], PATHINFO_EXTENSION);
      if (file_exists("assets/".$_FILES["img"]["name"])) {
        echo "Sorry, file exists";
      }
      else {
        if ($imgFileType != "jpg" && $imgFileType != "png") {
          echo "Sorry, file type not allowed";
        }
        else {
          if (move_uploaded_file($_FILES["img"]["tmp_name"], "assets/".$_FILES["img"]["name"])) {
            echo "Fille Uploaded";
          }
          else {
            echo "Error uploading file";
          }
        }
      }
    }
    header('location:/profile?msg=File Uploaded');
  }
}

?>