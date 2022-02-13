<?php
if(!isset($_SESSION)) {
  session_start();
}

function flash($name = "", $message = "") {
  if(!empty($name)) {
    if(!empty($message)) {
      $_SESSION[$name] = $message;
    } else if(empty($message) && !empty($_SESSION[$name])) {
      echo "<div>"  . $_SESSION[$name] . "</div>";
      unset($_SESSION[$name]);
    }
  }
}

function redirect($location) {
  header("location: " . $location);
  exit();
}
