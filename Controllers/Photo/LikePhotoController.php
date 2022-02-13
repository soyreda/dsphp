<?php
session_start();
include "../ConnexionDB.php";

$user_id=$_SESSION['user_id'];
$picture_id=$_GET['id'];

$req = $db->prepare("insert into likes(id_user,id_picture) values(?,?)");
$req->execute([$user_id,$picture_id]);
header("location: ../../Views/Photo/viewPhoto.php?id=$picture_id");



