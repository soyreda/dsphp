<?php
session_start();
include "../ConnexionDB.php";
$id=$_GET['id'];
$db->query("delete from pictures where id=$id");
header('location: ../../Views/User/index.php?msg=deleted');