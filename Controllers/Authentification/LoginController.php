<?php
include '../ConnexionDB.php';
session_start();
include "../User.php";

$user = new Users;
?>


<?php

    if(isset($_POST['submit'])){
      $user->login();
    

}
?>
