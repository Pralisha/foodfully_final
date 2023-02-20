<?php
include '..\main_page_partials\config.php';
$id = $_GET['id'];
$sql="UPDATE donations SET delivery_status=1,status=2 WHERE id='$id'";
mysqli_query($con, $sql);
header("location: donation.php?delivery=success");

?>