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

function sendemail_notification($title, $location) {
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
    $mail->Username = 'foodfullynepal12@gmail.com';
    $mail->Password = 'rfvpzytytlvknbwz';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    // $name = $_SESSION['fullname'];
    // $email = $_SESSION['email'];
//Recipients

    $sql = "SELECT * FROM acceptor";
    $sql_query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($sql_query)) {
        $name = $row['name'];
        $email = $row['email'];

        $mail->setFrom('foodfullynepal12@gmail.com', $name);
        $mail->addAddress($email);



        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Email notification from Foodfully!';
        $email_template = "
    <h2>New donation has been added titled  " . $title . "  available to pick up from location " . $location . ".</h2>
    

";
        $mail->Body = $email_template;


        $mail->send();
        $mail->clearAllRecipients();
        //echo 'Message has been sent';
    }

}
?>
<?php

session_start();
include '../main_page_partials\config.php';


$username = $_SESSION['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$best_before = $_POST['best_before_date'];
$location = $_POST['location'];
//$Category_of_Waste = "None";
$latlong = json_decode($_POST['latlong'], true);
print_r($latlong);

$lat = $latlong['lat'];
$lng = $latlong['lon'];
if (isset($_FILES['my_image'])) {




    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if ($error === 0) {
        echo "no error1";

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            echo "no errror2";
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'donation_img/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $sql = "INSERT INTO donations (
                username,title,description,best_before,image,pickup,lat,lng) VALUES ('$username','$title','$description','$best_before','$new_img_name','$location', $lat, $lng)";
            $sql_query = mysqli_query($con, $sql);

            sendemail_notification($title, $location);
            header("Location: add.php?add=success");
        }

    }

}
?>