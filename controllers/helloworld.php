<?php

class helloworld extends AppController {
  public function __construct() {
    $this->getView('header', array('pagename'=>'helloworld'));

    $this->getView('helloworld', $this->getColors());

    $this->getView('footer');
  }

  public function getColors() {
    return array(
      'red' => '#da244f',
      'blue' => '#204edd',
      'green' => '#34e42d'
    );
  }
}


?>