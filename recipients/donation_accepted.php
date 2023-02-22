<?php
use PHPMailer\PHPMailer\PHPMailer;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

session_start();
include '..\main_page_partials\config.php';
$id = $_GET['id'];
$username = $_SESSION['name'];

$sql = "SELECT * FROM donor WHERE username=(SELECT username FROM donations WHERE id='$id')"; 
$sql_q=mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($sql_q);
$d_name = $row['name'];
$d_email = $row['email'];
$d_address = $row['address'];
$d_contact = $row['contact'];

$a_name = $_SESSION['fullname'];
$a_contact = $_SESSION['contact'];
$a_email = $_SESSION['email'];
sendemail($a_name,$d_name,'0', $a_contact, $a_email,$d_email,"donor");

sendemail($a_name,$d_name, $d_address, $d_contact, $a_email, $d_email,"acceptor");

$sql="UPDATE donations SET status=1,accept_date=now(),acceptor_name='$username' WHERE id='$id'";
mysqli_query($con, $sql);
header("location: request.php?donation=success");



function sendemail($a_name,$d_name, $address, $contact, $a_email,$d_email,$type)
{
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
    // $name = $_SESSION['fullname'];
    // $email = $_SESSION['email'];
//Recipients

    if ($type === "donor") { 

    $mail->setFrom('foodfullynepal12@gmail.com', $d_name);
    $mail->addAddress($d_email);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Donation notification from Foodfully!';
        $email_template = " <h2>
        Acceptor $a_name has accepted your donation. Please refer to donor details given below for transaction:<br>
        Full Name : $a_name <br>
        Contact : $contact <br>
        Email : $a_email <br>
        
        
        </h2>
        <h3>Thank you for using Foodfully service!</h3>
        "; 
       
        $mail->Body = $email_template;
        $mail->send();
     }
    else
    {
        $mail->setFrom('foodfullynepal12@gmail.com', $a_name);
        $mail->addAddress($a_email);
    
            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Donation notification from Foodfully!';
            $email_template = "   <h2>
            You have accepted donation from donor $d_name .Please refer to donor details given below for transaction:<br>
            Full Name : $d_name <br>
            Contact : $contact <br>
            Email : $d_email <br>
            Address : $address <br>
            </h2>
            <h3>Please receive the donation within 2 days. Thank you for using Foodfully service!</h3>
            "; 
           
            $mail->Body = $email_template;
            $mail->send();
        
    }
}
?>