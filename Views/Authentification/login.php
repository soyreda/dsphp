<?php
include "../includes/header.php";
include "../../helpers/helper.php";
if(!isset($_SESSION)) {
  session_start();
}

?>

<?php if(!isset($_SESSION["currentUser"])): ?>


<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Email ou password incorrect
</div>
<?php elseif(isset($_GET["emailActivation"]) && $_GET["emailActivation"] == "false"): ?>
  <div class="alert alert-info text-center mx-auto w-75" role="alert" >
    Check your inbox to verify your email address
  </div>

<?php elseif(isset($_GET["statusEmail"]) && $_GET["statusEmail"] == "false"): ?>
  <div class="alert alert-info text-center mx-auto w-75" role="alert" >
    To login, check you inbox to activate your email!
  </div>
<?php elseif(isset($_GET["pwUpdate"]) && $_GET["pwUpdate"] == "true"): ?>
  <div class="alert alert-success text-center mx-auto w-75" role="alert" >
    Your password has been updated successfully
  </div>
<?php endif ?>

    <form method="post" action="../../Controllers/Authentification/LoginController.php">
    <div class="card bg-dark text-white">
        <h3 class="card-header text-center">Please sign in</h3>
        <div class="card-body text-secondary">
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signin-email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="signin-password" placeholder="Password" name="password">
        </div>

        <button type="submit" class="btn btn-outline-warning btn-lg btn-block mb-1" name="submit">LOGIN</button>
        <br>
        <div class="bottom">
            <span class="helper-text d-block mb-5 text-center "><a  href="../User/emailResetPw.php">Forgot password?</a></span>
            <span class="helper-text d-block mb-5 text-center">Don't have an account? <a href="register.php">Register</a></span>
        </div>
        </div>
    </div>
    </form>
</div>
<?php else: ?>
  <?php redirect("../User/index.php"); ?>

<?php endif ?>




<?php
include "../includes/footer.php"
?>
