<?php
$con = mysqli_connect("localhost","root","","foodfully");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  
use PHPMailer\PHPMailer\PHPMailer;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

session_start();

$id = $_GET['id'];
$sql = "SELECT * FROM donations WHERE id=$id";
$sql_query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($sql_query);
$username = $row['acceptor_name'];
$title=$row['title'];
$sql1 = "SELECT email FROM acceptor WHERE username='$username'";
$sql_query1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($sql_query1);
$email = $row1['email'];

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
    $mail->setFrom('foodfullynepal@gmail.com', $username);
    $mail->addAddress($email);



    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Email warning from Foodfully.';
    $email_template = "
        
         <h2>Sorry ".$username.", Your request for donation titled '".$title."'  has been removed since it was not picked up for 2 days.</h2>
       
        
    ";
    $mail->Body = $email_template;


    $mail->send();
    //echo 'Message has been sent';
    $sql1 = "UPDATE donations SET acceptor_name=NULL WHERE id='$id'";
    $sql_query1 = mysqli_query($con, $sql1);
    header("location:".$_SERVER['HTTP_REFERER']);

?>