<?php
session_start();
include "../ConnexionDB.php";

if(isset($_POST['submit'])){


$comment= $_POST['comment'];
$idc=$_POST['idc'];
$idimg=$_POST['idimg'];



$req = $db->prepare("update comments set text= ? where id= ?");
$req->execute([$comment,$idc]);




header("location: ../../Views/Photo/viewPhoto.php?id=$idimg");

}