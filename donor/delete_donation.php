<?php
include '..\main_page_partials\config.php';
$id = $_GET['id'];
$sql="DELETE FROM donations WHERE id='$id'";
mysqli_query($con, $sql);
header("location: donation.php?delete=success");

?>