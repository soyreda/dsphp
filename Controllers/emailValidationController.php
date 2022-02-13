<?php

require "User.php";

$user = new Users;
if(isset($_GET["token"])) {
  $token = $_GET["token"];
  if($user->activateEmail($token)) {
      echo "Email activated";
      redirect("../Views/Authentification/login.php");
  } else {
    redirect("../Views/User/index.php");
  }

}
