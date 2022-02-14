<?php
session_start();
$abs_path="../..";
include "../../Controllers/Authentification/CheckAuthentification.php";

include "../includes/header.php";
include "../includes/navbar.php";

if(isset($_GET['id'])){
    $myuser=findUserById($db,$_GET['id']);

?>


<div class="container mt-5" style="background-color: #f8f8f8;">
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                        <!-- here img -->
                                            <div id="imgshow" class="d-flex justify-content-center align-items-center rounded" style="height: 140px; width: 140px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">

                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?=$myuser['first_name'] ?> <?=$myuser['last_name'] ?></h4>
                                            <p class="mb-0"><?=$myuser['email'] ?></p>
                                            <div class="mt-2">
                                            <form class="form" >
                                                <button class="btn btn-outline-warning" type="button" >
                                                    <label for="imgInp"><i class="fa fa-fw fa-camera"></i> Choose your picture</label>
                                                    <input required style="height: 50%; width: 50%;" accept="image/*" class="custom-file-input required" type='file' id="imgInp" aria-describedby="input requiredGroupFileAddon01" name="image">
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">Edit your profile</li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input required class="form-control" type="text" name="first_name" placeholder="First Name" value="<?=$myuser['first_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input required class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?=$myuser['last_name'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input required class="form-control" type="text" placeholder="user@example.com" name="email" value="<?=$myuser['email'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-group">
                                                                <label>About</label>
                                                                <textarea class="form-control" rows="5" placeholder="My Bio" name="about"><?=$myuser['about'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Change Password</b></div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>New Password</label>
                                                                <input required class="form-control" type="password" placeholder="••••••" name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                                <input required class="form-control" type="password" placeholder="••••••" name="cpassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-outline-warning" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>

    </div>
</div>
<script>
    let img = document.createElement("img")
            img.setAttribute("class", "img-thumbnail")
            img.setAttribute("id", "myimg")
            img.setAttribute("alt", "image")
            img.src = "../../uploads/<?=$myuser['image']?>"
            document.getElementById("imgshow").appendChild(img)

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {

            if(document.getElementById("myimg")){
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
