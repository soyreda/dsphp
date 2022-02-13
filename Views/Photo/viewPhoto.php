<?php
session_start();
$abs_path="../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";
if(isset($_GET['id'])){
$image=findPictureById($db,$_GET['id']);
$user=findUserById($db,$image['id_user']);
$comments=list_comment_picture($db,$image['id']);
?>

<div class="container mt-5">
    <div class="card">
    <div class="card bg-dark text-white">
    <h3 class="card-header text-center">Edit photo</h3>
    <div class="card-body text-white ">
        <div class="row">
            <div class="col-md-7">
                <img src="../../uploads/<?=$image['image'] ?>" alt="" width="100%">


            </div>
            <div class="col-md-5 mb-5">
                <div class="p-2" style="height: 100%;">

                <a href="../User/showProfile.php?id=<?= $image['id_user'] ?>"><img src="../../uploads/<?= $user['image'] ?>" class="rounded-circle" alt="Cinque Terre" width="30px" height="30px">
                                <b>
                                    
                                    <?= $user['first_name'] . ' ' . $user['last_name'] ?>
                                    
                                </b>
                            </a>
                    <h6><?=$image['title'] ?></h6>

                    <div class="d-inline">
                        <?php
                            $req = $db->prepare("select * from likes where id_user = ? and id_picture= ?");
                            $req->execute([$_SESSION['user_id'],$image['id']]);
                            $imageid=$image['id'];
                        ?>

                        <a class="mr-2" <?=( !$req->fetch())?"style='color: black;' href='../../Controllers/Photo/LikePhotoController.php?id=$imageid'":"" ?>><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a>
                        <div>
                        <?php
                            $req = $db->prepare("select count(*) from likes where id_picture= ?");
                            $req->execute([$image['id']]);
                            echo $req->fetchColumn();
                        ?>
                         <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        </div>
                    </div>

                    <hr>
                    <div class="container">
                        <?=$image['description'] ?>
                    </div>
                </div>

            </div>

            <div class="container m-2 ml-5">
                <h3 style="margin-left: -5px;">Comment:</h3>
                <form method="post" action="../../Controllers/Comments/addCommentController.php">
                   
                    <div class="form-group">
                        <label for="comment">Write a Comment:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                    <input type="text" value="<?=$imageid ?>" name="imageid" hidden>
                    <button type="submit" class="btn btn-outline-warning" name="submit">Add Comment</button>

                </form>
                <hr>
            </div>

            <?php
                while($data=$comments->fetch()):
            ?>

            <div class="container m-2 ml-5">
                <?php
                    $userc=findUserById($db,$data['id_user']);
                ?>
                <h5 class="d-inline">
                    <img src="../../uploads/<?= $userc['image']?>" class="rounded-circle" alt="Cinque Terre" width="30px" height="30px">
                    <?= $userc['first_name'] . ' ' . $userc['last_name']?>
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                   <?=$data['text'] ?>

                   <?php
                    if($_SESSION['user_id']==$userc['id'] || $_SESSION['user_id']==$image['id_user']):
                   ?>
                    <div class="btn-group">
                        <a href="../../Views/Comment/editComment.php?id=<?= $data['id'] ?>&&id_user=<?= $image['id_user'] ?>" type="button" class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="../../Controllers/Comments/deleteCommentController.php" type="button" class="btn btn-sm btn-outline-danger">Delete</a>
                    </div>

                    <?php endif ?>

                </div>
                <hr>
            </div>

                    <?php endwhile ?>
        </div>
    </div>
    </div>
    </div>
</div>

<?php
}
include "../includes/footer.php";

?>