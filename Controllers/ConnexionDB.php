<?php
include "valeurs.php";

try{
  $dbname = "xgv43f0qjlhb5vyc";
    $db = new PDO("mysql:host=$bd_machine;dbname=$dbname;charset=utf8",$bd_login,$bd_password);
}catch(Exception $e){
    die('msg :: '.$e->getMessage());
}

?>
