<?php
include 'main_page_partials\config.php';
$emailError = "";

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'tokenempty') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Token field is empty.</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    } else if ($_GET['error'] == 'fieldempty') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Please fill all the fields.</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    } else if ($_GET['error'] == 'tokeninvalid') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Token is invalid.</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    } else if ($_GET['error'] == 'pwdiff') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>The two passwords do not match.</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';
    } else if ($_GET['error'] == 'sthwentwrong') {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Something went wrong.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    } else if ($_GET['error'] == 'success') {
        $emailError = '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Password has been changed successfully. Login <a href="index.php">here.</strong>
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
                        alt="logo"></a><span class="splash-description">Change Password:</span></div>

            <div class="card-body">
                <form class="form-group" action="pw-reset-code.php" method="post">
                    <?php

                    if (isset($emailError))
                        echo $emailError;
                    ?>
                    <input type="hidden" value="<?php if (isset($_GET['token'])) {
                        echo $_GET['token'];
                    } ?>" name="password_token">

                    <div class="form-group">
                        <!--<input class="form-control form-control-lg" type="text" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> -->
                        <input type="hidden" name="email" placeholder="Email" class="form-control form-control-lg"
                            value="<?php if (isset($_GET['email'])) {
                                echo $_GET['email'];
                            } ?>" autocomplete="on">

                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" name="new_password" placeholder="Enter new Password"
                            type="password" id="myInput1">



                    </div>

                    <div class="form-group">

                        <input type="password" name="c_password" value="" placeholder="Confirm new Password"
                            id="myInput2" class="form-control form-control-lg">


                        <input type="checkbox" onclick="myFunction()" style="cursor: pointer; margin-top: 10px;"> Show
                        Password
                    </div>
                    <br>



                    <div class="form-group">
                        <button name="update_pw" type="submit" class="btn btn-lg btn-danger center-aligned"
                            style="margin-top: 20px; border-radius: 2px; width: 75%; align-content: center; margin-left: 12.5%; text-align: center;">Update
                            password</button>


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
    <script src="./js/pwchange.js"></script>

</body>

</html>