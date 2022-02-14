<?php

require "../../Models/User.php";
require "../../helpers/helper.php";
//require "../../mail/sendMail.php";
require "../../phpMailer/sendMailer.php";

if(!isset($_SESSION)) {
  session_start();
}
class Users {
  private $userModel;

  public function __construct() {
    $this->userModel = new User;
  }

  public function register() {
    if(isset($_POST["inscrire"])) {
      $email = $_POST["emailUser"];
      $pw = $_POST["pwUser"];
      $userLogin = $_POST["loginUser"];

      if($this->userModel->findUserByEmail($email)) {
        flash("register", "User Already exist...");
        redirect("../views/inscription.php");
      } else {
        $data = [
          'userEmail' => trim($email),
          'userPw' => trim($pw),
          'userLogin' => trim($userLogin)
        ];

        if(!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid Email");
            redirect("../views/inscription.php");
        }

        $data["userPw"] = md5($data["userPw"]);
        if($this->userModel->registerUser($data)) {

          if($this->userModel->getUserToken($data["userEmail"])) {
            $row = $this->userModel->getUserToken($data["userEmail"]);
            sendMail($data["userEmail"], $row["token"]);
            flash("register", "Check your inbox to verify your email address");
            redirect("../views/inscription.php");
          }
      }

    }

  }
}

  public function login() {
    if(isset($_POST["submit"])){
      $email = $_POST["email"];
      $pw = $_POST["password"];
      $pwhash = md5($pw);

      if($this->userModel->verifyLoginUser($email,$pwhash)) {
        $row = $this->userModel->findUserByEmail($email);
        if($row["status"] === "verified") {
          $_SESSION['user_id']=$row['id'];
          $_SESSION['dir']=$row['dir'];
          redirect("../../Views/User/index.php");
        } else {
          redirect("../../Views/Authentification/login.php?statusEmail=false");
        }

      } else {
        //flash("loginErr", "Email ou password incorrect");
        redirect("../../Views/Authentification/login.php?msg=failed");
      }
    }
   }

  public function updatePw($email) {
    $row = $this->userModel->getUserPwToken($email);
    $token = $row["pwToken"];
    if(is_null($token)) {
        if($this->userModel->createPwToken($email)){
          $row2 = $this->userModel->getUserPwToken($email);
          $newToken = $row2["pwToken"];

          if(isset($_POST["updatePwBtn"])) {
            $pw = $_POST["password"];
            $npw = $_POST["repeat-password"];

            if($pw === $npw) {
              $this->userModel->updatePassword(md5($pw), $newToken);
              if($this->userModel->getUserWithPwToken($newToken)) {
                $row = $this->userModel->getUserWithPwToken($newToken);
                $email = $row["email"];

                if($this->userModel->updatepwToken($email, $newToken)) {
                  return true;
                } else {
                  return false;

                }
              }


            } else {
              flash("reset", "password doesnt match");
              redirect("../views/forgottenpwd.php?token=" . $token);
            }

          }
        }
    } else {
      if(isset($_POST["updatePwBtn"])) {
        $pw = $_POST["password"];
        $npw = $_POST["repeat-password"];

        if($pw === $npw) {
          $this->userModel->updatePassword(md5($pw), $token);
          if($this->userModel->getUserWithPwToken($token)) {
            $row = $this->userModel->getUserWithPwToken($token);
            $email = $row["email"];

            if($this->userModel->updatepwToken($email, $token)) {
              return true;
            } else {
              return false;

            }
          }


        } else {
          flash("reset", "password doesnt match");
          redirect("../views/forgottenpwd.php?token=" . $token);
        }

      }
    }

  }//

  public function resetPwLink($email) {
    if($this->userModel->getUserPwToken($email)){
      $row = $this->userModel->getUserPwToken($email);
      $token = $row["pwToken"];
      sendForgottenpwdMail($email, $token);
    }

  }
  public function activateEmail($token) {
    if($this->userModel->getUserWithToken($token)) {
      $row = $this->userModel->getUserWithToken($token);
      $email = $row["email"];

      if($this->userModel->updateEmailStatusAndToken($email, $token)) {
        return true;
      } else {
        return false;
      }

    }
  }



}
