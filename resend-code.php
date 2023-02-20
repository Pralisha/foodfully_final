<?php
include 'main_page_partials\config.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
function resend_email_verify($name, $email, $verify_token, $account_type)
{
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

    //Recipients
    $mail->setFrom('foodfullynepal@gmail.com', $name);
    $mail->addAddress($email);



    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Resend Email verification from Foodfully.';
    $email_template = "
        <h2>You have registered your account to Foodfully.</h2>
        <h5>Please verify your email address to login with below given link:</h5>
        <br></br>
        <a href='http://localhost/foodfully/verifyemail.php?token=" . $verify_token . "&account_type=" . $account_type . "'>Click me.</a>
    ";
    $mail->Body = $email_template;


    $mail->send();
    //echo 'Message has been sent';
}
    if(isset($_POST['resend_email_verify_btn']))
    {
        if(!empty(trim($_POST['email'])))
        {
            $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($pattern, $_POST['email'])) {
            $email= mysqli_real_escape_string($con, $_POST['email']);
            $radioButton = $_POST['radio-inline'];
                if ($radioButton == "donor") {
                    $checkmail_query = "SELECT * FROM donor WHERE email='$email' LIMIT 1";
                } else {
                    $checkmail_query = "SELECT * FROM acceptor WHERE email='$email' LIMIT 1";
                }
            $checkmail_query_run = mysqli_query($con, $checkmail_query);
            if(mysqli_num_rows($checkmail_query_run)>0)
            {
                $row = mysqli_fetch_array($checkmail_query_run);
                if($row['verify_status']=="0")
                {
                    $name = $row['name'];
                    $email = $row['email'];
                    $verify_token = $row['verify_token'];
                    resend_email_verify($name, $email, $verify_token, $radioButton);
                    header("Location: resend-email-verification.php?email=resent");

                    
                }
                else
                {
                    header("Location: resend-email-verification.php?email=alreadyverify");
                }
            }
            else
            {
                header("Location: resend-email-verification.php?email=notreg");
            }
            
        }
        else{
            header("Location: resend-email-verification.php?email=invalid");
        }
        }
        else{
        header("Location: resend-email-verification.php?email=empty");
        }
    }

?>