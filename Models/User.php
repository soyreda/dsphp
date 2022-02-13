<?php
require "DatabaseModel.php";
class User  {
  private $db;

  public function __construct() {
    $this->db = new DatabaseModel;
  }

  public function getAllUsers() {
    $this->db->query("select * from users");
    $this->db->execute();
    $users = $this->db->resultSet();

    return $users;


  }
  public function findUserByEmail($email) {
    $this->db->query("select * from users where email = ?");
    $this->db->execute([$email]);
    $row = $this->db->fetchSingle([$email]);

    if($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function registerUser($data) {
    $this->db->query("insert into users (email, pw, status, token, pwToken, login ) values (?,?,?,?,?,?)");
    if($this->db->execute([$data["userEmail"], $data["userPw"], "unverified", md5($data["userEmail"]), md5($data["userPw"]), $data["userLogin"]])){
      return true;
    } else {
      return false;
    }

  }

  public function updateEmailStatusAndToken($email, $token) {
    $verified = "verified";
    $new_token = "null";
    $this->db->query("update users set status = 'verified', token = 'null' where email = ?");
    if($this->db->execute([$email])) {
      return true;
    } else {
      return false;
    }

  }

  public function createPwToken($email) {

    $this->db->query("select * from users where email = ?");
    $this->db->execute([$email]);
    $row = $this->db->fetchSingle([$email]);
    if($this->db->rowCount() > 0){
      $token = md5($row["password"]);
      $this->db->query("update users set pwToken = ? where email = ?");
      if($this->db->execute([$token, $email])) {
        return true;
      } else {
        return false;
      }

    }
  }
  public function updatepwToken($email, $token) {
    $this->db->query("update users set pwToken = 'null' where email = ?");
    if($this->db->execute([$email])) {
      return true;
    } else {
      return false;
    }
  }

  public function getUserToken($email) {
    $this->db->query("select * from users where email = ?");
    $this->db->execute([$email]);
    $row = $this->db->fetchSingle([$email]);
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }

  }

  public function getUserPwToken($email) {
    $this->db->query("select * from users where email = ?");
    $this->db->execute([$email]);
    $row = $this->db->fetchSingle([$email]);
    if($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function getUserWithToken($token) {
    $this->db->query("select * from users where token = ?");
    $this->db->execute([$token]);
    $row = $this->db->fetchSingle([$token]);
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function getUserWithPwToken($token) {
    $this->db->query("select * from users where pwToken = ?");
    $this->db->execute([$token]);
    $row = $this->db->fetchSingle([$token]);
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function checkStatusEmail($email) {
    $this->db->query("select * from users where email = ?");
    $this->db->execute([$email]);
    $row = $this->db->fetchSingle([$email]);
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function verifyLoginUser($email, $pw) {
    $this->db->query("select * from users where email = ? and password = ?");
    $this->db->execute([$email, $pw]);
    $row = $this->db->fetchSingle([$email, $pw]);
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }


  public function updatePassword($pw, $token) {
    $new_pw = md5($pw);
    $this->db->query("update users set password = ? where pwToken = ?");
    if($this->db->execute([$pw, $token])){
      return true;
    } else {
      return false;
    }
  }
}
