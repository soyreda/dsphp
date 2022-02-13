<?php
session_start();
include "../ConnexionDB.php";
$id=$_GET['id'];
$db->query("delete from comments where id=$id");
header("location: ../../Views/Photo/viewPhoto.php?id=$idimg");