<?php
include '../main_page_partials/config.php';

session_start();
$title = $_POST['title'];
$description = $_POST['description'];
$best_before = $_POST['best_before_date'];
$location = $_POST['location'];
$default_image=$_POST['default_img'];

$id=$_GET['id'];
$username = $_SESSION['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$best_before = $_POST['best_before_date'];
$latlong = json_decode($_POST['latlong'], true);
print_r($latlong);

$lat = $latlong['lat'];
$lng = $latlong['lon'];
    

if (($_FILES['my_image']['size']!=0) && !(empty($_FILES['my_image']))) {


    echo 'helo';

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if ($error === 0) {


        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'donation_img/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $sql = "UPDATE  donations SET title='$title',description='$description',best_before='$best_before',image='$new_img_name',pickup='$location',lat=$lat,lng=$lng WHERE id='$id' ";
            $sql_query=mysqli_query($con, $sql);

           
            header("Location: donation.php?update=success");
        }

    }

}  
else
{
   
    $sql = "UPDATE  donations SET title='$title',description='$description',best_before='$best_before',image='$default_image',pickup='$location',lat=$lat,lng=$lng WHERE id='$id' ";
    $sql_query=mysqli_query($con, $sql);
    //echo $sql_query;
    header("Location: donation.php?update=success");
}

?>



