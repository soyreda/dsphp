<?php
include "valeurs.php";

try{
    $db = new PDO("mysql:host=$bd_machine;dbname=php;charset=utf8",$bd_login,$bd_password);
}catch(Exception $e){
    die('msg :: '.$e->getMessage());
}

?>