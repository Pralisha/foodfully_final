<?php
include 'main_page_partials\config.php';
session_start();
$username = $_SESSION['name'];
if (isset($_FILES['profile-pic'])) {
    $account_type = $_SESSION['login'];
    $folder = $account_type;
    if ($account_type == "acceptor") {
        $folder = "recipients";
    }
    echo "
    <pre>";
    print_r($_FILES['profile-pic']);
    echo "</pre>";

    $img_name = $_FILES['profile-pic']['name'];
    $img_size = $_FILES['profile-pic']['size'];
    $tmp_name = $_FILES['profile-pic']['tmp_name'];
    $error = $_FILES['profile-pic']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    // $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    // $img_upload_path = 'profile_pic/' . $new_img_name;
    // move_uploaded_file($tmp_name, $img_upload_path);

    if ($error === 0) {
        if ($img_size > 12500000) {
            // $em = "Sorry, your file is too large.";
            header("Location: register.php?my_image=large");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'profile_pic/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "UPDATE $account_type SET profile_pic = '$new_img_name' WHERE username = '$username'";
                $res = mysqli_query($con, $sql);

                header("Location: ./" . $folder . "/profile.php");
            } else {
                // $em = "You can't upload files of this type";
                header("Location: ./" . $folder . "/profile.php");
            }
        }
    } else {
        //$em = "unknown error occurred!";
        header("Location: ./" . $folder . "/profile.php");
    }
} else {
    echo "lol";
}