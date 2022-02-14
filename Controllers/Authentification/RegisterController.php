<?php
include '../ConnexionDB.php';
include "../../mail/sendMail.php";
include "../../Models/User.php";
session_start();
?>


<?php

if(isset($_POST['submit'])){

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pw = md5($password);
    $about=$_POST['about'];
    $dir="$first_name-$last_name".random_int(0,9999999);
    $token = md5($email);
    $pwToken = md5($password);
    mkdir("../../uploads/$dir");


    $req = $db->query("SELECT COUNT(*) FROM users WHERE email='$email'");
    $res = $req-> fetchColumn();
    if($res == 1){

        header('location: ../../Views/Authentification/register.php?msg=already');
    }else{
        //add informations here
        $image =  $dir.'/'.random_int(0,999999).basename($_FILES['image']['name']);


        $file = $_FILES['image']['tmp_name'];
        $path = '../../uploads/' . $image;
        move_uploaded_file($file,$path);
        $req = $db->prepare("insert into users(email,password,first_name,last_name,about,dir,image,status,token,pwToken) values(?,?,?,?,?,?,?,?,?,?)");
        $status = "unverified";
    $req->execute([$email,$pw,$first_name,$last_name,$about,$dir,$image, $status, $token, $pwToken]);
    //sendMail($email, $token);
    header('location: ../../Views/Authentification/login.php?emailActivation=false');
    }



}




?>
