<?php
session_start();


include 'main_page_partials\config.php';
if (isset($_POST['submit'])) {
    if (!empty($_POST['username'])) {
        if (!empty($_POST['password'])) {
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            //encryption start
            $ciphering = "AES-256-CTR";
            $option = 0;
            $encryption_iv = '1234567890123456';
            $encryption_key = "foodfullynepal";
            $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $option, $encryption_iv);

            if ($username == "admin" && $password == "admin") {
                $_SESSION['login'] = 'admin';
                header("location: admin/index.php");
            } else {
                $radioButton = $_POST['radio-inline'];
                if ($radioButton == "donor") {
                    $login_query = "SELECT * FROM donor WHERE username='$username' AND password='$encryption' LIMIT 1";
                } else {
                    $login_query = "SELECT * FROM acceptor WHERE username='$username' AND password='$encryption' LIMIT 1";
                }
                $login_query_run = mysqli_query($con, $login_query);
                if (mysqli_num_rows($login_query_run) > 0) {
                    $row = mysqli_fetch_array($login_query_run);
                    $_SESSION['fullname'] = $row['name'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['contact'] = $row['contact'];
                    $_SESSION['email'] = $row['email'];
                    if ($row['verify_status'] == "1") {
                        if ($radioButton == "donor") {
                            $_SESSION['login'] = 'donor';
                            $_SESSION['name'] = $username;
                            header("location: donor/index.php");
                        } else {
                            $_SESSION['login'] = 'acceptor';
                            $_SESSION['name'] = $username;
                            header("location: recipients/index.php");
                        }

                    } else {
                        header("location: index.php?loginError=verify");
                    }
                } else {
                    header("location: index.php?loginError=yes");
                }
            }
        } else {
            header("location: index.php?loginError=password");
        }
    } else {
        header("location: index.php?loginError=username");
    }

}
?>