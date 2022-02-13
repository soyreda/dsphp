<?php
session_start();
include "ConnexionDB.php";
include "../Models/boite_doutils.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $user=findUserById($db,$id);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $image = random_int(0,999999).basename($_FILES['image']['name']);
    $file = $_FILES['image']['tmp_name'];
    $path = '../../uploads/'.$user['image'];
    move_uploaded_file($file,$path);
    if($password==$cpassword){
        //update user
    $req = $db->prepare("update users set first_name=?,last_name=?,email=?,about=?,password=? where id=?");
    $req->execute([$first_name,$last_name,$email,$about,$password,$id]);
    header('location: ../../Views/User/index.php?msg=updated');
    }else{
        header('location: ../../Views/editProfile.php?msg=failed');

    }
    
}

