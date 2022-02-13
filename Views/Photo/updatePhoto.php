<?php
session_start();
$abs_path="../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";
if(isset($_GET['id'])){
    $post_img=findPictureById($db,$_GET['id']);


?>


<div class="card border-secondary mx-auto mt-3" style="width: max-content;">
<div class="card bg-dark text-white">
    <h3 class="card-header text-center">Update Photo</h3>
    <div class="card-body white ">

        <form method="post" action="../../Controllers\Photo\UpdatePhotoController.php" enctype="multipart/form-data">

        
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input accept="image/*" class="custom-file-input" type='file' id="imgInp" aria-describedby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="imgInp">Choose Image</label>
                </div>
            </div>
            <!-- to show img befor uplode it -->
            <div id="imgshow" class="container mx-auto" style="max-width: 600px;"></div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="<?=$post_img['title'] ?>" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Write a description</label>
                <textarea class="form-control" id="description" rows="3" name="description"><?=$post_img['description'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?=$post_img['date'] ?>">
            </div>
            <input type="text" name="id_pic" value="<?=$post_img['id'] ?>" hidden>
            <button type="submit" class="btn btn-outline-warning" name="submit">Update Picture</button>

        </div>

        </form>
</div>
</div>

       
   
</div>




<script>
    let img = document.createElement("img")
            img.setAttribute("class", "img-thumbnail")
            img.setAttribute("id", "myimg")
            img.setAttribute("alt", "image")
            img.src ="../../uploads/<?=$post_img['image'] ?>"
            document.getElementById("imgshow").appendChild(img)
    
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            
            if( document.getElementById("myimg")){
                document.getElementById("myimg").src = URL.createObjectURL(file)
            }else{
            let img = document.createElement("img")
            img.setAttribute("class", "img-thumbnail")
            img.setAttribute("id", "myimg")
            img.setAttribute("alt", "image")
            img.src = URL.createObjectURL(file)
            document.getElementById("imgshow").appendChild(img)
            
            
            }
            

        }
    }

</script>



<?php

}
include "../includes/footer.php";

?>