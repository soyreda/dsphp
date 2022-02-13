<?php
require "../../helpers/helper.php";
if(!isset($_SESSION)) {
  session_start();
}

?>
<?php
include "../includes/header.php"
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
  </head>
  <body>
    <?php

    flash("link");
    ?>

    <div class="container col-md-6 mt-5">


    <?php if(isset($_GET["emailSent"]) && $_GET["emailSent"] == "true"): ?>
      <div class="alert alert-info text-center mx-auto w-75" role="alert" >
        If this email is associated with an account, you'll receive a link to reset your password
      </div>
    <?php endif ?>

    <form method="post" action="../../Controllers/Authentification/resetEmailLink.php">
    <div class="card bg-dark text-white">
        <h3 class="card-header text-center">Please Enter your email</h3>
        <div class="card-body text-secondary">
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signin-email" placeholder="Email" name="email">
        </div>


        <button type="submit" class="btn btn-outline-warning btn-lg btn-block mb-1" name="sendLinkResetPwBtn">send</button>
        <br>

        </div>
    </div>
    </form>
    </div>

  </body>
  <?php
  include "../includes/footer.php"
  ?>
</html>
