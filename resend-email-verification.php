<?php
include 'main_page_partials\config.php';
$emailError = "";


if (isset($_GET['email'])) {
    if ($_GET['email'] == 'empty') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fill the email field.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['email'] == 'invalid') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please enter a valid email ID.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['email'] == 'notreg') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Your email has not been registered. Please register <a href="register.php">here</a> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['email'] == 'alreadyverify') {
        $emailError = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Your account has already been verified. Please login <a href="index.php">here</a> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['email'] == 'resent') {
        $emailError = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Email has been resent, login <a href="register.php">here</a> </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="foodfully\fontawesome-free-6.2.1-web">
    <link rel="stylesheet" href="./css/imgupload.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" src="assets/images/logo.png"
                        alt="logo"></a><span class="splash-description" style="margin-top:10px;">Please re-enter your
                    email.</span></div>

            <div class="card-body">
                <form class="form-group" action="resend-code.php" method="post">

                    <div class="form-group">
                        <!--<input class="form-control form-control-lg" type="text" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> -->
                        <input type="text" name="email" placeholder="Email" class="form-control form-control-lg"
                            value="" autocomplete="on">
                        <?php

                        if (isset($emailError))
                            echo $emailError;
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radio-inline" value="donor" checked=""
                                class="custom-control-input"><span class="custom-control-label"> Donor</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radio-inline" value="recipient" checked=""
                                class="custom-control-input"><span class="custom-control-label"> Recipient</span>
                        </label>

                    </div>
                    <div class="form-group">
                        <button name="resend_email_verify_btn" type="submit"
                            class="btn btn-lg btn-danger center-aligned"
                            style="margin-top: 20px; border-radius: 2px; width: 75%; align-content: center; margin-left: 12.5%; text-align: center;">Submit</button>


                    </div>
                </form>
            </div>



        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./js/reverify.js"></script>

</body>

</html>