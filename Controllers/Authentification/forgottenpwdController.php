<?php

if(!isset($_SESSION)) {
  session_start();
}

require "../User.php";




$user = new Users;

if($_SERVER["REQUEST_METHOD"] === "POST") {

    if($user->updatePw($_SESSION["email"])) {
        redirect("../../Views/Authentification/login.php?pwUpdate=true");
    }
}
if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(isset($_GET["token"])) {
      $_SESSION["pwToken"] = $_GET["token"];
    }
}
