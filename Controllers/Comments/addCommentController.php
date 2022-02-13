<?php
session_start();
include "../ConnexionDB.php";

if(isset($_POST['submit'])){

$user_id= $_SESSION['user_id'];
$comment= $_POST['comment'];
$imageid=$_POST['imageid'];


$req = $db->prepare("insert into comments(id_user,id_picture,text) values(?,?,?)");
$req->execute([$user_id,$imageid,$comment]);




header("location: ../../Views/Photo/viewPhoto.php?id=$imageid");

}