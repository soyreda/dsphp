<?php
session_start();
include "../ConnexionDB.php";

$titre = $_POST['title'];
$description = $_POST['description'];
$date=$_POST['date'];
$image = $_SESSION['dir'].'/'.random_int(0,999999).basename($_FILES['image']['name']);


$file = $_FILES['image']['tmp_name'];
$path = '../../uploads/' . $image;
move_uploaded_file($file,$path);

$req = $db->prepare("insert into pictures(id_user,title,description,image,date) values(?,?,?,?,?)");
$req->execute([$_SESSION['user_id'],$titre,$description,$image,$date]);
header('location: ../../Views/User/index.php?msg=added');

