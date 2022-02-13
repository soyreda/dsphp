<?php
session_start();
$abs_path="../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";
if(isset($_GET['id']) || $_GET['id_user']){
$comments=findCommentById($db,$_GET['id']);
if($comments['id_user']==$_SESSION['user_id'] || $_GET['id_user']==$_SESSION['user_id']){
?>

        <div class="container m-2 ml-5">
        <div class="card bg-dark text-white">
        <h3 class="card-header text-center">Comment</h3>
        <div class="card-body text-white ">
                <form method="post" action="../../Controllers/Comments/editCommentController.php">
                   
                    <div class="form-group">
                        <label for="comment">Write a Comment:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"><?=$comments['text'] ?>
                        </textarea>
                    </div>
                    <input type="text" value="<?=$comments['id'] ?>" name="idc" hidden>
                    <input type="text" value="<?=$comments['id_picture'] ?>" name="idimg" hidden>
                    <button type="submit" class="btn btn-outline-warning" name="submit">Update Comment</button>

                </form>
                <hr>
        </div>
        </div>
            </div>


<?php
}
}
include "../includes/footer.php";

?>