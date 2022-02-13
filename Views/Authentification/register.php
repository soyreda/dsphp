<?php
include "../includes/header.php"
?>



<div class="container col-md-6 mt-5">


    <?php if (isset($_GET['msg']) && $_GET['msg'] == "failed") : ?>
        <div class="alert alert-danger text-center mx-auto w-75" role="alert">
            Your informations is wrong, Please try again and fill all the gaps!
        </div>

    <?php endif ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == "already") : ?>
        <div class="alert alert-danger text-center mx-auto w-75" role="alert">
            This Email already exist!
        </div>

    <?php endif ?>



    <form method="post" action="../../Controllers/Authentification/RegisterController.php" enctype="multipart/form-data">
    <div class="card bg-dark text-white">
        <h3 class="card-header text-center">Please sign up</h3>
        <div class="card-body text-secondary">
        <div class="form-group">
            <label for="first_name" class="control-label sr-only">First Name</label>
            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name" class="control-label sr-only">Last Name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="signup-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signup-email" placeholder="Your email" name="email" required>
        </div>


        <div class="form-group">
            <label for="signup-password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="signup-password" placeholder="Password" name="password" required>
        </div>

        <div class="form-group">

            <textarea class="form-control" rows="5" placeholder="My Bio" name="about" required></textarea>
        </div>

        <div class="input-group mb-3">
                <div class="custom-file">
                    <input accept="image/*" class="custom-file-input" type='file' id="imgInp" aria-describedby="inputGroupFileAddon01" name="image" required>
                    <label class="custom-file-label" for="imgInp">Choose Image</label>
                </div>
            </div>
        <div id="imgshow" class="container mx-auto" style="width: max-content;"></div>

        <button type="submit" class="btn btn-info btn-lg btn-block" name="submit">REGISTER</button>
        <div class="bottom mt-2">
            <span class="helper-text text-center">Already have an account? <a href="login.php">Login</a></span>
        </div>
        </div>
    </div>
    </form>

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
include "../includes/footer.php"
?>
