<?php
$con = mysqli_connect("localhost","root","","foodfully");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$sql = "SELECT * FROM donations WHERE accept_date IS NOT NULL";
$sql_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($sql_query)) {
  $id = $row['id'];
  $current_date = date("Y-m-d");
  $accept_date = $row['accept_date'];
 
  if($accept_date)
  { 
    
  $start_date = strtotime($accept_date);
  $end_date = strtotime($current_date);
  $date_difference = ($end_date - $start_date) / 60 / 60 / 24;
    //echo $date_difference;

    //echo " ";
     if($date_difference>=2)
  {
      echo $id;
      $sql1 = "UPDATE donations SET status=0,accept_date=NULL WHERE id='$id'";
      $sql_query1 = mysqli_query($con, $sql1);
      header('location:../main_page_partials/send_mail.php?id='.$id);
     
  }
  
  }
 
  
}
?>