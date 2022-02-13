<?php

include "$abs_path/Controllers/ConnexionDB.php";
include "$abs_path/Models/boite_doutils.php";


$user=findUserById($db,$_SESSION['user_id']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
<a class="navbar-brand" href="">Welcome <?= $user['first_name'] ?>
 
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?= $abs_path ?>/Views/User"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-cogs" aria-hidden="true"></i> Action
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= $abs_path ?>/Views/Photo/addPhoto.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Picture</a>
          <a class="dropdown-item" href="<?= $abs_path ?>/Views/User/showProfile.php?id=<?=$_SESSION['user_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a>
          <a class="dropdown-item" href="<?= $abs_path ?>/Views/User/editProfile.php?id=<?=$_SESSION['user_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> Edit Profile</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= $abs_path ?>/Controllers/Authentification/LogoutController.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-picture-o" aria-hidden="true"></i> View pictures of:
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php
        $req=list_users($db);
        while($us=$req->fetch()):
        ?>
          <a class="dropdown-item" href="<?=$abs_path ?>/Views/User/showProfile.php?id=<?=$us['id'] ?>">
            <img src="../../uploads/<?=$us['image'] ?>" class="rounded-circle" alt="" width="30px" height="30px">
            <b><?=$us['first_name'] ?> <?=$us['last_name'] ?></b>
          </a>

        <?php endwhile ?>
         
          
        </div>


        
      </li>

      <li class="nav-item">
        <a href="<?=$abs_path ?>/Views/LiveSearch.php" class="nav-link" ><i class="fa fa-search" aria-hidden="true"></i> Search</a>
      </li>

    </ul>

    <div class="my-2 my-lg-0">
    <a class="nav-link text-light"href="<?= $abs_path ?>/Controllers/Authentification/LogoutController.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

    </div>


    <!-- search -->

    <!-- <div class="nav-item dropdown mr-2" style="list-style: none;">
      <input data-toggle="dropdown" class="form-control mr-sm-2" type="text" placeholder="Search Pictures" aria-label="Search" id="livesearch">

      <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="resultsplace">


             <a class="dropdown-item" href="<?= $abs_path ?>/Views/Photo/viewPhoto.php">
            <img src="../../uploads/IMG_TITI0.JPG" class="rounded-circle" alt="Cinque Terre" width="30px" height="30px">
            <b>Yassine MIDI</b>
          </a> 


      </div>
    </div> -->

   
    <!--  -->

  </div>
</nav>


