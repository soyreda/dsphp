<?php
if(!isset($_SESSION)) {
session_start();
}

require "../User.php";

$user = new Users;

if($_SERVER["REQUEST_METHOD"] == "GET") {

}
if($_SERVER["REQUEST_METHOD"] === "POST") {
if(isset($_POST["sendLinkResetPwBtn"])) {
  $_SESSION["email"] = $_POST["email"];
  $user->resetPwLink($_SESSION["email"]);
  redirect("../../Views/User/emailResetPw.php?emailSent=true");

}
}

?>
