<?php


function list_users($db)
{
    $req= $db->query("select * from users");
    
    return $req;
}


function list_pictures($db)
{
    $req= $db->query("select * from pictures");
    
    return $req;
}

function list_comment_picture($db,$id)
{
    $req = $db->prepare("select * from comments where id_picture = ?");
    $req->execute([$id]);
    
    return $req;
}

function findUserById($db,$id){
    $req = $db->prepare("select * from users where id = ?");
    $req->execute([$id]);
    $data = $req->fetch();
    return $data;
}

function findPictureById($db,$id){
    $req = $db->prepare("select * from pictures where id = ?");
    $req->execute([$id]);
    $data = $req->fetch();
    return $data;
}


function findCommentById($db,$id){
    $req = $db->prepare("select * from comments where id = ?");
    $req->execute([$id]);
    $data = $req->fetch();
    return $data;
}