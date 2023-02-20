<?php
include '../main_page_partials/config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendemail_notification($username,$location) {
    include '../main_page_partials/config.php';
// $mail = new PHPMailer(true);
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'foodfullynepal@gmail.com';
$mail->Password = 'vnnoddeqyljpjwes';
$mail->SMTPSecure = "tls";
$mail->Port = 587;
   // $name = $_SESSION['fullname'];
   // $email = $_SESSION['email'];
//Recipients





$mail->setFrom('foodfullynepal@gmail.com', $username);
$mail->addAddress('foodfullynepal@gmail.com');



//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = 'Email notification from Foodfully!';
$email_template = "
    <h2>Request for assistance has been made by user ".$username." to pick up food from location ".$location.". Please check the admin account.</h2>"
    
;
$mail->Body = $email_template;


$mail->send();
//$mail ->clearAllRecipients( );
//echo 'Message has been sent';
}


?>
<?php

session_start();
include '../main_page_partials\config.php';


$username = $_SESSION['name'];

$location =  $_SESSION['address'];


          

            sendemail_notification($username,$location);
            header("Location: add.php?add=success");
       
?>



