<?php
session_start();
$abs_path="../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";
?>


<div class="card border-secondary mx-auto mt-3" style="width: max-content;">
<div class="card bg-dark text-white">
    <h3 class="card-header text-center">Add a new Photo</h3>
    <div class="card-body text-secondary ">

        <form method="post" action="../../Controllers\Photo\AddPhotoController.php" enctype="multipart/form-data">

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input accept="image/*" class="custom-file-input" type='file' id="imgInp" aria-describedby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="imgInp">Choose Image</label>
                </div>
            </div>
            <!-- to show img befor uplode it -->
            <div id="imgshow" class="container mx-auto" style="width: max-content;"></div>

            <div class="form-group">
                <label class="text-white" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label class="text-white" for="description">Write a description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
                <label class="text-white" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" >
            </div>

            <button type="submit" class="btn btn-outline-warning">Add Picture</button>



        </form>

       
    </div>
</div>
</div>




<script>
    let n=0;
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            
            if(n!=0){
                document.getElementById("myimg").src = URL.createObjectURL(file)
            }else{
            let img = document.createElement("img")
            img.setAttribute("class", "img-thumbnail")
            img.setAttribute("id", "myimg")
            img.setAttribute("alt", "image")
            img.src = URL.createObjectURL(file)
            document.getElementById("imgshow").appendChild(img)
            n=1
            
            }
            

        }
    }

</script>



<?php
include "../includes/footer.php";

?>