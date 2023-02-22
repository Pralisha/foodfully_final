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
function send_pw_reset($name, $email, $token, $account_type) {
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
    $mail->Username = 'foodfullynepal12@gmail.com';
    $mail->Password = 'rfvpzytytlvknbwz';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('foodfullynepal12@gmail.com', $name);
    $mail->addAddress($email);


    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Password Reset Mail from Foodfully.';
    $email_template = "
        <h2>Hello!</h2>
        <h3>You are receiving this email because we received a password reset request for your account.</h3>
        <br></br>
        <a href='http://localhost/foodfully/pw-change.php?token=" . $token . "&email=" . $email . "&account_type=" . $account_type . "'>Click me.</a>
    ";
    $mail->Body = $email_template;


    $mail->send();
    //echo 'Message has been sent';
}
if (isset($_POST['pw_reset_btn'])) {

    if (!empty(trim($_POST['email']))) {
        $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($pattern, $_POST['email'])) {
            $token = md5(rand());
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $radioButton = $_POST['radio-inline'];
            if ($radioButton == "donor") {
                $checkmail_query = "SELECT * FROM donor WHERE email='$email' LIMIT 1";
            } else {
                $checkmail_query = "SELECT * FROM acceptor WHERE email='$email' LIMIT 1";
            }
            $checkmail_query_run = mysqli_query($con, $checkmail_query);
            if (mysqli_num_rows($checkmail_query_run) > 0) {
                $row = mysqli_fetch_array($checkmail_query_run);
                $get_name = $row['name'];
                $get_email = $row['email'];
                if ($radioButton == "donor") {
                    $update_token = "UPDATE donor SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
                } else {
                    $update_token = "UPDATE acceptor SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
                }
                $update_token_run = mysqli_query($con, $update_token);
                if ($update_token_run) {
                    send_pw_reset($get_name, $get_email, $token, $radioButton);
                    header("Location: password-reset.php?email=sent");
                } else {
                    header("Location: password-reset.php?email=wentwrong");
                }
            } else {
                header("Location: password-reset.php?email=noexist");
            }
        } else {
            header("Location: password-reset.php?email=invalid");
        }
    } else {
        header("Location: password-reset.php?email=empty");
    }
}


if (isset($_POST['update_pw'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $c_password = mysqli_real_escape_string($con, $_POST['c_password']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);
      //encryption start
      $ciphering = "AES-256-CTR";
      $option = 0;
      $encryption_iv = '1234567890123456';
      $encryption_key = "foodfullynepal";
      $encryption = openssl_encrypt($new_password, $ciphering, $encryption_key, $option, $encryption_iv);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($c_password)) {
            if ($radioButton == "donor") {
                $check_token = "SELECT verify_token FROM donor WHERE verify_token='$token' LIMIT 1";
            } else {
                $check_token = "SELECT verify_token FROM acceptor WHERE verify_token='$token' LIMIT 1";
            }
            $check_token_run = mysqli_query($con, $check_token);
            if (mysqli_num_rows($check_token_run) > 0) {
                if ($new_password == $c_password) {
                    if ($radioButton == "donor") {
                        $update_password = "UPDATE donor SET password='$encryption' WHERE verify_token='$token' LIMIT 1 ";
                    } else {
                        $update_password = "UPDATE acceptor SET password='$encryption' WHERE verify_token='$token' LIMIT 1 ";
                    }
                    $update_password_run = mysqli_query($con, $update_password);
                    if ($update_password_run) {
                        $new_token = md5(rand());
                        if ($radioButton == "donor") {
                            $update_to_new_token = "UPDATE donor SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1 ";
                        } else {
                            $update_to_new_token = "UPDATE acceptor SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1 ";
                        }
                        $update_to_new_token_run = mysqli_query($con, $update_to_new_token);
                        header("Location: pw-change.php?error=success&token=" . $token . "&email=" . $email . "");
                    } else {
                        header("Location: pw-change.php?error=sthwentwrong&token=" . $token . "&email=" . $email . "");
                    }
                } else {
                    header("Location: pw-change.php?error=pwdiff&token=" . $token . "&email=" . $email . "");
                }
            } else {
                header("Location: pw-change.php?error=tokeninvalid&token=" . $token . "&email=" . $email . "");
            }
        } else {
            header("Location: pw-change.php?error=fieldempty&token=" . $token . "&email=" . $email . "");
        }
    } else {
        header("Location: pw-change.php?error=tokenempty");
    }
}

?>