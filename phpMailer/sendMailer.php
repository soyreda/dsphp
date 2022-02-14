<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendMail($toEmail, $userToken) {


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pronetreda@gmail.com';                     //SMTP username
    $mail->Password   = 'mzyvdikxuoenqpll';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ikp43.ginfo4@inbox.testmail.app', 'ENSAS');
    $mail->addAddress($toEmail);     //Add a recipient              //Name is optional
    $mail->addReplyTo('ikp43.ginfo4@inbox.testmail.app', 'ENSAS');


    //Attachments
      //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activate Email';
    $mail->Body    = "Activate your email here : <a target='_blank' href= '" . $_SERVER["HTTP_HOST"] . "/Controllers/Authentification/emailValidationController.php?token=" . $userToken . "'>click here</a>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

function sendForgottenpwdMail($toEmail, $userToken) {
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'pronetreda@gmail.com';                     //SMTP username
      $mail->Password   = 'mzyvdikxuoenqpll';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('ikp43.ginfo4@inbox.testmail.app', 'ENSAS');
      $mail->addAddress($toEmail);     //Add a recipient              //Name is optional
      $mail->addReplyTo('ikp43.ginfo4@inbox.testmail.app', 'ENSAS');


      //Attachments
        //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Reset Password';
      $mail->Body    = "Reset your password here : <a target='_blank' href= '" . $_SERVER["HTTP_HOST"] . "/Views/User/forgottenPwd.php?token=" . $userToken . "'>click here</a>";

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}
