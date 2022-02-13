<?php

class DatabaseModel {
  private $host = "localhost";
  private $db = "photos";
  private $user = "root";
  private $pw = "";
  private $pdo;


  private $stmt;
  private $error;

  public function __construct() {
    $this->host = "localhost";
    $this->db = "php";
    $this->user = "root";
    $this->pw = "";
    $this->pdo = null;

    $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
    try {
      $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pw, $options);

    } catch(PDOEXCEPTION $e) {
      echo $e->getMessage();

    }
  }


  public function query($sql) {
    $this->stmt = $this->pdo->prepare($sql);
  }

  public function execute($arrayList = null) {
    if($arrayList != null) {
        return $this->stmt->execute($arrayList);
    } else {
        return $this->stmt->execute();
    }

  }

  public function resultSet($arrayList = null) {
    if($arrayList != null) {
      $this->execute($arrayList);
    } else {
      $this->execute();
    }
    return $this->stmt->fetchAll();
  }

  public function fetchSingle($arrayList = null) {
    if($arrayList != null) {
      $this->execute($arrayList);
    } else {
      $this->execute();
    }
    return $this->stmt->fetch();
}

public function rowCount(){
        return $this->stmt->rowCount();
    }
}
