<?php
include 'main_page_partials\config.php';
$nameError = $emailError = $addressError = $c_passwordError = "";

if (isset($_GET['terms'])) {
    if ($_GET['terms'] == 'invalid') {
        $termError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please agree to our terms and conditions.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>';
    }
} else if (isset($_GET['name'])) {
    if ($_GET['name'] == 'invalid') {
        $nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Please use only lower and upper case characters in name field.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    } else if ($_GET['name'] == 'empty') {
        $nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please fill the name field.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
} else if (isset($_GET['address'])) {
    if ($_GET['address'] == 'empty') {
        $addressError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fill the address field.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
} else if (isset($_GET['email'])) {
    if ($_GET['email'] == "invalid") {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please enter a valid email format.</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    } else if ($_GET['email'] == "empty") {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fill the email field.</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
    }
} else if (isset($_GET['contact'])) {
    if ($_GET['contact'] == "invalid") {
        $contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please enter a contact number of 10 digits (numbers only) .</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    } else if ($_GET['contact'] == "empty") {
        $contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fill the contact number field.</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
    }
} else if (isset($_GET['id'])) {
    if ($_GET['id'] == 'empty') {
        $idError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fill the ID field.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }

} else if (isset($_GET['username'])) {
    if ($_GET['username'] == 'empty') {
        $usernameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fill the username field.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
} else if (isset($_GET['password'])) {
    if ($_GET['password'] == "invalid") {
        $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please enter a valid password. (Password must be min. 8 characters with atleast one uppercase, one lowercase, one digit and one special character.)</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    } else if ($_GET['password'] == "empty") {
        $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fill the password field.</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
    }
} else if (isset($_GET['c_password'])) {
    if ($_GET['c_password'] == "invalid") {
        $c_passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>The two passwords do not match!</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
    } else if ($_GET['c_password'] == "empty") {
        $c_passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fill the confirmed password field.</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
    }
}
if (isset($_GET['submit'])) {
    if ($_GET['submit'] == "success") {


        $submitSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Form submitted successfully. Please wait for email verification.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    } else if ($_GET['submit'] == "fail") {
        $submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed to sign up. Please try again.</strong>
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
                        alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <?php
            if (isset($termError))
                echo $termError;
            if (isset($submitError))
                echo $submitError;
            if (isset($submitSuccess))
                echo $submitSuccess;
            ?>
            <div class="card-body">
                <form class="form-group" action="validate.php" method="post">

                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Full Name"
                            autocomplete="on" name="namee">

                        <?php

                        if (isset($nameError))
                            echo $nameError;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="address"
                            placeholder="Complete Address" autocomplete="on">
                        <?php

                        if (isset($addressError))
                            echo $addressError;
                        ?>
                    </div>
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
                        <!-- <input type="text" name="contact_no" value="" class="form-control" required pattern="^\d{11}$" title="11 numeric characters only" maxlength="11"> -->
                        <input class="form-control form-control-lg" type="text" placeholder="Contact" autocomplete="on"
                            name="contact" value="" title="10 numeric characters only" maxlength="10">
                        <?php

                        if (isset($contactError))
                            echo $contactError;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder="ID" autocomplete="on"
                            name="id">
                        <?php

                        if (isset($idError))
                            echo $idError;
                        ?>
                    </div>
                    <button class="btn-upload" type="button" onclick="showPop()" name="upload">Upload ID file</button>
                    <div class="overlay" onclick="removePop()"></div>
                    <div class="uploadform">
                        <span onclick="removePop()">&times;</span>
                        <!-- <form action=""> -->
                        <div>
                            <label for=""
                                style="padding: 10px 15px; text-align: center; font-size: larger; font-family: Roboto, sans-serif;">Upload
                                an image file:</label>
                            <input type="file" style="text-align: center; font-size: larger;">
                        </div>
                        <button type="button" style=" margin-left: auto;
                                margin-right: auto;" onclick="removePop()">OK</button>
                        <!-- </form> -->
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
                        <input class="form-control form-control-lg" type="text" placeholder="Username" name="username"
                            autocomplete="on">
                        <?php

                        if (isset($usernameError))
                            echo $usernameError;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" placeholder="Password"
                            name="password" id="myInput1">


                        <?php

                        if (isset($passwordError))
                            echo $passwordError;
                        ?>
                    </div>

                    <div class="form-group">

                        <input type="password" name="c_password" value="" placeholder="Confirm Password" id="myInput2"
                            class="form-control form-control-lg">

                        <?php

                        if (isset($c_passwordError))
                            echo $c_passwordError;
                        ?>
                        <input type="checkbox" onclick="myFunction()" style="cursor: pointer; margin-top: 10px;"> Show
                        Password
                    </div>
                    <br>
                    <div class="form-inline" style="display: inline;">
                        <input type="checkbox" name="term" value="true">
                        <span style="margin-left:10px;"><b>I have read and agree to the terms and conditions written <a
                                    href="#" style="color: red;">here</a>.</b></span>
                    </div>
                    <br>
                    <br>
                    <!-- <a href="admin" class="btn btn-lg btn-block" style="background-color:rgb(255, 55, 0) !important;
                    color: #441312 !important; ">Sign Up</a> -->
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-lg btn-danger center-aligned"
                            style="margin-top: 20px; border-radius: 2px; width: 75%; align-content: center; margin-left: 12.5%; text-align: center;">Sign
                            Up</button>


                    </div>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="index.php" class="footer-link">Sign In</a>
                </div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
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
    <script src="./js/register.js"></script>
    <script src="./js/imgupload.js"></script>
</body>

</html>