<?php

class users {
  public function __construct($parent) {
    $this->db = $parent->db;
  }

  public function select($sql, $array=array()) {    
    $this->sql = $this->db->prepare($sql);
    $results = $this->sql->execute($array);
    $data = $this->sql->fetchAll();
    return $data;
  }

  public function add($sql, $value=array()) {
    $this->sql = $this->db->prepare($sql);
    $results = $this->sql->execute($array);
  }
}

?>