<?php
session_start();
$abs_path = "../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";

//boite doutiles et connexion db dans "../includes/navbar.php"
?>

<section class="jumbotron bg-dark text-center">
    <div class="container">
        <h1 class="text-white">Library Stock Pictures</h1>
        <p class="lead text-secondary">Thank you for visiting our website.</p>
        <p>
            <a href="../Photo/addPhoto.php" class="btn btn-outline-warning my-2">Add a picture</a>
            <a href="../User/showProfile.php?id=<?=$_SESSION['user_id'] ?>" class="btn btn-outline-warning my-2">View your profile</a>
        </p>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">

            <?php 
            $req=list_pictures($db);
            while ($data = $req->fetch()) : 
            ?>


                <div class="col-md-4 ">
                    <div class="card mb-4 shadow-sm bg-dark">

                        <img preserveAspectRatio="xMidYMid slice" focusable="false" class="bd-placeholder-img card-img-top" src="../../uploads/<?= $data['image'] ?>" alt="" width="100%" height="225">

                        <div class="card-body text-white">


                
                                <b>
                                    <?php
                                    $user = findUserById($db, $data['id_user']);
                                    echo $user['first_name'] . ' ' . $user['last_name'];
                                    ?>
                                </b>
                            </a>
                            <h6><?= $data['title'] ?>"</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group ">
                                    <a href="../Photo/viewPhoto.php?id=<?= $data['id'] ?>" type="button" class="btn btn-sm btn-outline-warning">View</a>
                                        <?php if($user['id']==$_SESSION['user_id']): ?>
                                    <a href="../Photo/updatePhoto.php?id=<?= $data['id'] ?>" type="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    <a href="../../Controllers/Photo/DeletePhotoController.php?id=<?= $data['id'] ?>" type="button" class="btn btn-sm btn-outline-danger">Delete</a>
                                        <?php endif ?>
                                </div>
                                <small class="text-muted"><?= $data['date'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>


            <?php endwhile ?>


        </div>
    </div>

</div>




<?php
include "../includes/footer.php";

?>