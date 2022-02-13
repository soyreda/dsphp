<?php
require "../../helpers/helper.php";

if(empty($_SESSION)){
  redirect("../../Views/Authentification/login.php");
    
}
