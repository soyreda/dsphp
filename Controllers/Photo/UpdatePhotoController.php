<?php
session_start();
include "../ConnexionDB.php";
include "../../Models/boite_doutils.php";


    $id=$_POST['id_pic'];
    $post_img=findPictureById($db,$id);

    $titre = $_POST['title'];
    $description = $_POST['description'];
    $date=$_POST['date'];
    
    
    
    
    $file = $_FILES['image']['tmp_name'];
    $path = '../../uploads/' . $post_img['image'];
    move_uploaded_file($file,$path);
    
    $req = $db->prepare("update pictures set title=?,description=?,date=? where id=?");
    $req->execute([$titre,$description,$date,$id]);





header('location: ../../Views/User/index.php?msg=updated');

