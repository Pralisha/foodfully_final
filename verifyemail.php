<?php
include 'main_page_partials\config.php';
//session_start();
if (isset($_GET['token'])) {
    $acc_type = $_GET['account_type'];
    $token = $_GET['token'];
    // echo $token;
    // echo $acc_type;
    if ($acc_type === "donor") {
        $verify_query = "SELECT verify_token,verify_status FROM donor WHERE verify_token='$token' LIMIT 1";
    } else if ($acc_type === "acceptor") {
        $verify_query = "SELECT verify_token,verify_status FROM acceptor WHERE verify_token='$token' LIMIT 1";
    }
    $verify_query_run = mysqli_query($con, $verify_query);
    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        //echo $row['verify_token'];
        // echo $row['account_type'];
        if ($row['verify_status'] == "0") {
            $clicked_token = $row['verify_token'];
            if ($acc_type === "donor") {
                $update_query = "UPDATE donor SET verify_status='1'  WHERE verify_token='$clicked_token' LIMIT 1";
            } else {
                $update_query = "UPDATE acceptor SET verify_status='1'  WHERE verify_token='$clicked_token' LIMIT 1";
            }
            $update_query_run = mysqli_query($con, $update_query);
            if ($update_query_run) {
                // $_SESSION['status'] = "Your account has been verified successfully!";
                header("Location: index.php?emailError=success");
            } else {
                // $_SESSION['status']="Verification failed.";
                header("Location:index.php?emailError=verifyfail");
                exit(0);
            }
        } else {
            //  $_SESSION['status']="Email already verified, please login.";
            header("Location:index.php?emailError=alreadyverify");
            exit(0);
        }
    } else {
        // $_SESSION['status']="This token does not exist.";
        header("Location: index.php?emailError=notexist");
        exit(0);

    }
} else {
    // $_SESSION['status']="Not Allowed";

    header("Location: index.php?emailError=notallowed");
    exit(0);
}

?>