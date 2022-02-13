<?php
include "../includes/header.php"
?>

<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Email ou password incorrect
</div>

<?php endif ?>
<form method="post" action="../../Controllers/Authentification/forgottenpwdController.php">
<div class="card bg-dark text-white">
    <h3 class="card-header text-center">Please Enter a new password</h3>
    <div class="card-body text-secondary">
    <div class="form-group">
        <label for="reset-password" class="control-label sr-only">Email</label>
        <input type="password" class="form-control" id="reset-password" placeholder="********" name="password">
    </div>
    <div class="form-group">
        <label for="repeat-reset-password" class="control-label sr-only">Password</label>
        <input type="password" class="form-control" id="repeat-reset-password" placeholder="**********" name="repeat-password">
    </div>

    <button type="submit" class="btn btn-outline-warning btn-lg btn-block mb-1" name="updatePwBtn">Update</button>
    <br>
    </div>
</div>
</form>

</div>


<?php
include "../includes/footer.php"
?>
