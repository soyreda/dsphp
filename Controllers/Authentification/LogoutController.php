<?php
require "../../helpers/helper.php";
session_start();
session_destroy();
redirect("../../Views/Authentification/login.php");
