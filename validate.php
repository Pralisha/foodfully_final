<?php
include 'main_page_partials\config.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



function sendemail_Verify($name, $email, $verify_token, $account_type) {

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
    $mail->Subject = 'Email verification from Foodfully.';
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['term'])) {
        if (isset($_POST['namee']) && !empty($_POST['namee'])) {
            if (preg_match('/^[A-Za-z\s]+$/', $_POST['namee'])) {
                $name = $_POST['namee'];


                if (isset($_POST['address']) && !empty($_POST['address'])) {
                    $address = $_POST['address'];


                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                        $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                        if (preg_match($pattern, $_POST['email'])) {
                            $email = $_POST['email'];
                            if (isset($_POST['contact']) && !empty($_POST['contact'])) {
                                if (preg_match('/^\d{10}$/', $_POST['contact'])) {
                                    $contact = $_POST['contact'];

                                    if (isset($_POST['id']) && !empty($_POST['id'])) {
                                        $id = $_POST['id'];


                                        if (isset($_POST['username']) && !empty($_POST['username'])) {
                                            $username = $_POST['username'];

                                            if (isset($_POST['password']) && !empty($_POST['password'])) {
                                                $pattern2 = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
                                                if (preg_match($pattern2, $_POST['password'])) {

                                                    if (isset($_POST['c_password']) && !empty($_POST['c_password'])) {
                                                        if (($_POST['password']) === ($_POST['c_password'])) {
                                                            $password = $_POST['password'];
                                                            //encryption start
                                                            $ciphering = "AES-256-CTR";
                                                            $option = 0;
                                                            $encryption_iv = '1234567890123456';
                                                            $encryption_key = "foodfullynepal";
                                                            $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $option, $encryption_iv);


                                                            //image upload code start

                                                            if (isset($_FILES['my_image'])) {


                                                                echo "<pre>";
                                                                print_r($_FILES['my_image']);
                                                                echo "</pre>";

                                                                $img_name = $_FILES['my_image']['name'];
                                                                $img_size = $_FILES['my_image']['size'];
                                                                $tmp_name = $_FILES['my_image']['tmp_name'];
                                                                $error = $_FILES['my_image']['error'];

                                                                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                                                $img_ex_lc = strtolower($img_ex);

                                                                $allowed_exs = array("jpg", "jpeg", "png");

                                                                // $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                                                // $img_upload_path = 'uploads/' . $new_img_name;
                                                                // move_uploaded_file($tmp_name, $img_upload_path);


                                                                if ($error === 0) {
                                                                    if ($img_size > 12500000) {
                                                                        //  $em = "Sorry, your file is too large.";
                                                                        header("Location: register.php?my_image=large");
                                                                    } else {
                                                                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                                                        $img_ex_lc = strtolower($img_ex);

                                                                        $allowed_exs = array("jpg", "jpeg", "png");

                                                                        if (in_array($img_ex_lc, $allowed_exs)) {
                                                                            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                                                            $img_upload_path = 'uploads/' . $new_img_name;
                                                                            move_uploaded_file($tmp_name, $img_upload_path);



                                                                        } else {
                                                                            //  $em = "You can't upload files of this type";
                                                                            header("Location: register.php?my_image=type");
                                                                        }
                                                                    }
                                                                } else {
                                                                    //$em = "unknown error occurred!";
                                                                    header("Location: register.php?my_image=unknown");
                                                                }
                                                                //image upload code end

                                                                $radioButton = $_POST['radio-inline'];


                                                                if ($radioButton === "donor") {
                                                                    $checkEmail = "SELECT * FROM donor WHERE email='$email'";
                                                                    $checkUser = "SELECT * FROM donor WHERE username='$username'";

                                                                } else {
                                                                    $checkEmail = "SELECT * FROM acceptor WHERE email='$email'";
                                                                    $checkUser = "SELECT * FROM acceptor WHERE username='$username'";

                                                                }
                                                                $donorcheckId = "SELECT * FROM donor WHERE id='$id'";
                                                                $acceptorcheckId = "SELECT * FROM acceptor WHERE id='$id'";

                                                                $resultEmail = mysqli_query($con, $checkEmail);
                                                                $resultUser = mysqli_query($con, $checkUser);
                                                                $donorresultId = mysqli_query($con, $donorcheckId);
                                                                $acceptorresultId = mysqli_query($con, $acceptorcheckId);
                                                                $countEmail = mysqli_num_rows($resultEmail);
                                                                $countUser = mysqli_num_rows($resultUser);
                                                                $donorcountId = mysqli_num_rows($donorresultId);
                                                                $acceptorcountId = mysqli_num_rows($acceptorresultId);
                                                                $finalcountId = $donorcountId + $acceptorcountId;
                                                                if (!($countEmail > 0)) {
                                                                    if (!($countUser > 0)) {
                                                                        if (!($finalcountId > 0)) {



                                                                            $verify_token = md5(rand());

                                                                            if (isset($name) && isset($address) && isset($email) && isset($contact) && isset($id) && isset($radioButton) && isset($username) && isset($password)) {

                                                                                if ($radioButton === "donor") {
                                                                                    $account_type = "donor";

                                                                                    $sql = "INSERT INTO donor (
                                                                        name,address,email,contact,id,username,password,upload_url,verify_token) VALUES ('$name','$address','$email','$contact','$id','$username','$encryption','$new_img_name','$verify_token')";
                                                                                } else {
                                                                                    $account_type = "acceptor";
                                                                                    $sql = "INSERT INTO acceptor (
                                                                        name,address,email,contact,id,username,password,upload_url,verify_token) VALUES ('$name','$address','$email','$contact','$id','$username','$encryption','$new_img_name','$verify_token')";
                                                                                }

                                                                                if (mysqli_query($con, $sql)) {
                                                                                    sendemail_Verify("$name", "$email", "$verify_token", "$account_type");
                                                                                    header("location: register.php?submit=success");

                                                                                } else {
                                                                                    header("location: register.php?submit=fail");

                                                                                }

                                                                            }

                                                                        } else {
                                                                            header("location: register.php?id=repeat");
                                                                        }
                                                                    } else {
                                                                        header("location: register.php?username=repeat");
                                                                    }
                                                                } else {
                                                                    header("location: register.php?email=repeat");
                                                                }

                                                            } else {
                                                                header("location: register.php?my_image=empty");

                                                            }
                                                        } else {
                                                            header("location: register.php?c_password=invalid");
                                                        }

                                                    } else {
                                                        header("location: register.php?c_password=empty");
                                                    }
                                                } else {
                                                    header("location: register.php?password=invalid");
                                                }

                                            } else {
                                                header("location: register.php?password=empty");
                                            }
                                        } else {
                                            header("location: register.php?username=empty");
                                        }




                                    } else {
                                        header("location: register.php?id=empty");
                                    }
                                } else {
                                    header("location: register.php?contact=invalid");

                                }
                            } else {
                                header("location: register.php?contact=empty");

                            }

                        } else {
                            header("location: register.php?email=invalid");
                        }
                    } else {
                        header("location: register.php?email=empty");


                    }
                } else {
                    header("location: register.php?address=empty");
                }
            } else {
                header("location: register.php?name=invalid");
            }
        } else {
            header("location: register.php?name=empty");

        }
    } else {
        header("location: register.php?terms=invalid");

    }

}
?>