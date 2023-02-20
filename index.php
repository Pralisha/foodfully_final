<?php


include 'main_page_partials\config.php';
if (isset($_GET['emailError'])) {
    if ($_GET['emailError'] == 'notallowed') {
        $emailEr = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Not allowed!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>';
    } else if ($_GET['emailError'] == 'invalid') {
        $emailEr = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>This token does not exist.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    } else if ($_GET['emailError'] == 'alreadyverify') {
        $emailEr = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Email already verified, please login.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if ($_GET['emailError'] == 'verifyfail') {
        $emailEr = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Verification failed.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['emailError'] == "success") {
        $emailEr = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Your account has been verified successfully!</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    }
}
if (isset($_GET['loginError'])) {
    if ($_GET['loginError'] == 'username') {
        $loginErUs = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please fill the username field.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>';
    } else if ($_GET['loginError'] == 'password') {
        $loginErPw = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please fill the password field.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>';
    } else if ($_GET['loginError'] == 'yes') {
        $loginErInvalid = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please enter the correct username or password.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>';
    } else if ($_GET['loginError'] == 'verify') {
        $loginErVerify = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Account has not been verified. Please check your email and verify. </strong>
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
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
    <style>
        ul.navbar-nav li a {
            color: rgb(137, 175, 17) !important;
        }

        ul.navbar-nav li a i {
            color: rgb(137, 175, 17) !important;
        }

        .navbar-brand {
            color: #1E232C !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            font-size: 40px;
        }

        .navbar-brand span {
            color: #FFBF2C !important;
        }

        .navbar a:hover {
            text-shadow: 2px 2px 5px black !important;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" src="assets/images/logo.png"
                        alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <?php
            if (isset($emailEr)) {
                echo $emailEr;
            }
            if (isset($loginErVerify)) {
                echo $loginErVerify;
            }
            if (isset($loginErInvalid)) {
                echo $loginErInvalid;
            }

            ?>
            <div class="card-body">
                <form action="logincode.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text"
                            placeholder="Username" autocomplete="on">
                        <?php
                        if (isset($loginErUs)) {
                            echo $loginErUs;
                        }
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
                        <input class="form-control form-control-lg" id="myInput" name="password" type="password"
                            placeholder="Password">
                        <?php
                        if (isset($loginErPw)) {
                            echo $loginErPw;
                        }
                        ?>

                        <input type="checkbox" onclick="myFunction()"
                            style="cursor: pointer; margin-top: 10px; margin-bottom: 20px;"> Show
                        Password
                        <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> -->
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-lg btn-danger center-aligned"
                            style="margin-top: 10px; border-radius: 2px; width: 75%; align-content: center; margin-left: 12.5%; text-align: center;">Log
                            In</button>


                    </div>
            </div>

            <h6 style="margin-left: 12.5%; margin-bottom: 20px;">
                Did not receive your verification email? <a href="resend-email-verification.php" style="">Resend</a>
            </h6>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link">Create An Account</a>
                </div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="password-reset.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
<script src="./js/index.js"></script>

</html>

<?php
include 'main_page_partials\config.php';

?>