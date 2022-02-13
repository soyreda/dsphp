<?php
session_start();
$abs_path = "../..";
include "../../Controllers/Authentification/CheckAuthentification.php";
include "../includes/header.php";
include "../includes/navbar.php";
if (isset($_GET['id'])) {
    $user = findUserById($db, $_GET['id']);

?>
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-header {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background-image: url('https://img.search.brave.com/ozvE2oi_RF0t7FDpfXQSjt7rTtzIuPtO87sD7TSIS70/rs:fit:1024:681:1/g:ce/aHR0cHM6Ly9pbWFn/ZXMuZnJlZWNyZWF0/aXZlcy5jb20vd3At/Y29udGVudC91cGxv/YWRzLzIwMTYvMDIv/R3JheS1Xb29kLUJh/Y2tncm91bmQuanBn');
            background-size: cover;
            background-position: center center;
            padding: 30px 15px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .card-header-menu {
            position: absolute;
            top: 0;
            right: 0;
            height: 4em;
            width: 4em;
        }

        .card-header-menu:after {
            position: absolute;
            top: 0;
            right: 0;
            content: "";
            border-left: 2em solid transparent;
            border-bottom: 2em solid transparent;
            border-right: 2em solid #37a000;
            border-top: 2em solid #37a000;
            border-top-right-radius: 4px;
        }

        .card-header-menu i {
            position: absolute;
            top: 9px;
            right: 9px;
            color: #fff;
            z-index: 1;
        }

        .card-header-headshot {
            height: 6em;
            width: 6em;
            border-radius: 50%;
            border: 2px solid #37a000;
            background-image: url('../../uploads/<?=$user['image'] ?>');
            background-size: cover;
            background-position: center center;
            box-shadow: 1px 3px 3px #3E4142;
        }

        .card-content-member {
            position: relative;
            background-color: #fff;
            padding: 1em;
            box-shadow: 0 2px 2px rgba(62, 65, 66, 0.15);
        }

        .card-content-member {
            text-align: center;
        }

        .card-content-member p i {
            font-size: 16px;
            margin-right: 10px;
        }

        .card-content-languages {
            background-color: #fff;
            padding: 15px;
        }

        .card-content-languages .card-content-languages-group {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding-bottom: 0.5em;
        }

        .card-content-languages .card-content-languages-group:last-of-type {
            padding-bottom: 0;
        }

        .card-content-languages .card-content-languages-group>div:first-of-type {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 5em;
            flex: 0 0 5em;
        }

        .card-content-languages h4 {
            line-height: 1.5em;
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .card-content-languages li {
            display: inline-block;
            padding-right: 0.5em;
            font-size: 0.9em;
            line-height: 1.5em;
        }

        .card-content-summary {
            background-color: #fff;
            padding: 15px;
        }

        .card-content-summary p {
            text-align: center;
            font-size: 12px;
            font-weight: 600;
        }

        .card-footer-stats {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            background-color: #2c3136;
        }

        .card-footer-stats div {
            -webkit-box-flex: 1;
            -ms-flex: 1 0 33%;
            flex: 1 0 33%;
            padding: 0.75em;
        }

        .card-footer-stats div:nth-of-type(2) {
            border-left: 1px solid #3E4142;
            border-right: 1px solid #3E4142;
        }

        .card-footer-stats p {
            font-size: 0.8em;
            color: #A6A6A6;
            margin-bottom: 0.4em;
            font-weight: 600;
            text-transform: uppercase;
        }

        .card-footer-stats i {
            color: #ddd;
        }

        .card-footer-stats span {
            color: #ddd;
        }

        .card-footer-stats span.stats-small {
            font-size: 0.9em;
        }

        .card-footer-message {
            background-color: #37a000;
            padding: 15px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .card-footer-message h4 {
            margin: 0;
            text-align: center;
            color: #fff;
            font-weight: 400;
        }

        .review-number {
            float: left;
            width: 35px;
            line-height: 1;
        }

        .review-number div {
            height: 9px;
            margin: 5px 0
        }

        .review-progress {
            float: left;
            width: 230px;
        }

        .review-progress .progress {
            margin: 8px 0;
        }

        .progress-number {
            margin-left: 10px;
            float: left;
        }

        .rating-block,
        .review-block {
            background-color: #fff;
            border: 1px solid #e1e6ef;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .review-block {
            margin-bottom: 20px;
        }

        .review-block-img img {
            height: 60px;
            width: 60px;
        }

        .review-block-name {
            font-size: 12px;
            margin: 10px 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .review-block-name a {
            color: #374767;
        }

        .review-block-date {
            font-size: 12px;
        }

        .review-block-rate {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .review-block-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .review-block-description {
            font-size: 13px;
        }



        /* Widgets page



    /*-- Monthly calender --*/

        .monthly_calender {
            width: 100%;
            max-width: 600px;
            display: inline-block;
        }


        /*-- Profile widget --*/

        .profile-widget .panel-heading {
            min-height: 200px;
            background: #fff url(../img/profile-1024x640.jpg) no-repeat top center;
            background-size: cover;
        }

        .profile-widget .media-heading {
            color: #5B5147;
        }

        .profile-widget .panel-body {
            padding: 25px 15px;
        }

        .profile-widget .panel-body .img-circle {
            height: 90px;
            width: 90px;
            padding: 8px;
            border: 1px solid #e2dfdc;
        }

        .profile-widget .panel-footer {
            padding: 0px;
            border: none;
        }

        .profile-widget .panel-footer .btn-group .btn {
            border: none;
            font-size: 1.2em;
            background-color: #F6F1ED;
            color: #BAACA3;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            padding: 15px 0;
        }

        .profile-widget .panel-footer .btn-group .btn:hover {
            color: #F6F1ED;
            background-color: #8F7F70;
        }

        .profile-widget .panel-footer .btn-group>.btn:not(:first-child) {
            border-left: 1px solid #fff;
        }

        .profile-widget .panel-footer .btn-group .highlight {
            color: #E56E4C;
        }
    </style>

    <div class="container bootdey">
        <section class="col-md-12">
            <div class="row ">
                <div class="col-sm-12 col-md-4 ">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-header-menu">
                                <i class="fa fa-bars"></i>
                            </div>
                            <div class="card-header-headshot"></div>
                        </div>
                        <div class="card-content ">
                            <div class="card-content-member bg-dark text-white">

                                <?php
                                $idu=$_GET['id'];
                                echo "<h4 class='m-t-0'>" . $user['first_name'] . " " . $user['last_name'] . "</h4>";
                                if ($user['id'] == $_SESSION['user_id']) {
                                    echo "<a class='btn btn-outline-warning' href='editProfile.php?id=$idu'>Edit Profile</a>";
                                }
                                ?>

                            </div>
                            <div class="card-content-languages text-white bg-dark">
                                <div class="card-content-languages-group">
                                    <h6>First Name:</h6>
                                    <p class="text-center mx-auto" style="width: max-content;"><?= $user['first_name'] ?></p>

                                </div>
                                <div class="card-content-languages-group">

                                    <h6>Last Name:</h6>
                                    <p class="text-center mx-auto" style="width: max-content;"><?= $user['last_name'] ?></p>

                                </div>
                                <div class="card-content-languages-group">

                                    <h6>Email:</h6>
                                    <p class="text-center mx-auto" style="width: max-content;"><?= $user['email'] ?></p>
                                </div>

                            </div>
                            <div class="card-content-summary bg-dark text-white">
                                <h6>About:</h6>
                                <p><?= $user['about'] ?></p>
                            </div>
                        </div>
                        <div class="card-footer bg-dark">
                            <div class="card-footer-stats">
                                <div>
                                    <p>Number of pictures:</p><i class="fa fa-users"></i><span><?php
                                                                                                $req = $db->query("select count(*) from pictures where id_user=" . $user["id"]);
                                                                                                echo "<br/>" . $req->fetchColumn();
                                                                                                ?></span>
                                </div>

                            </div>
                            <div class="card-footer-message bg-warning">
                                <h4><i class="fa fa-comments"></i> Message me</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 ">
                    <div class="review-block bg-light">
                        <div class="row">

                            <?php
                            $req = list_pictures($db);
                            while ($data = $req->fetch()) :
                            ?>


                                <div class="col-md-6">
                                    <div class="card mb-4 shadow-sm bg-dark">

                                        <img preserveAspectRatio="xMidYMid slice" focusable="false" class="bd-placeholder-img card-img-top" src="../../uploads/<?= $data['image'] ?>" alt="" width="100%" height="225">

                                        <div class="card-body text-white">

                                            <?php
                                            $user = findUserById($db, $data['id_user']);

                                            ?>
                                            
                                                <b>
                                                    <?php
                                                    $user = findUserById($db, $data['id_user']);
                                                    echo $user['first_name'] . ' ' . $user['last_name'];
                                                    ?>
                                                </b>
                                            </a>
                                            <h6><?= $data['title'] ?>"</h6>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="../Photo/viewPhoto.php?id=<?= $data['id'] ?>" type="button" class="btn btn-sm btn-outline-warning">View</a>
                                                    <?php if ($user['id'] == $_SESSION['user_id']) : ?>
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
            </div>
        </section>
    </div>
<?php
}
include "../includes/footer.php";

?>