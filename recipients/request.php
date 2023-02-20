<?php
include 'logout.php';

include '..\main_page_partials\config.php';
$sort_value = NULL;
$sort_value= filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING);

$username = $_SESSION['name'];
$sql = "SELECT profile_pic FROM acceptor WHERE username = '$username'";
$res = mysqli_query($con, $sql);
$res = (mysqli_fetch_assoc($res));
$image = $res['profile_pic'];


if (isset($_GET['donation'])) {
    if ($_GET['donation'] == 'success') {
        $addMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Donation has been accepted.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
    if ($_GET['donation'] == 'cancel') {
        $addMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Donation has been cancelled.</strong>
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
    <title>FOOD FULLY</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="../RatingSystem/bootstrap.css"
        integrity="sha384-GpZ+McEis3rxQ2mOiwBzW8NQ7NvjXIsQsIRqV/8QJ2qDR4vdZSe0GrxMctJv74R7" crossorigin="anonymous">
    <script src="../RatingSystem/jquery.js" integrity="sha256-7hHpAkFqHYlvU4EDEQM3s5oOLiYGvB+vXNBlKRSJESc="
        crossorigin="anonymous"></script>
    <script src="../RatingSystem/cloud.js"
        integrity="sha384-pNovaElo1D1KMSDhyjlgzWzyKBFUAiE7uKtjl/kj/7ECT1PPe5YnLD5vnWbU9nvV"
        crossorigin="anonymous"></script>
    <script src="../RatingSystem/bootstrap.js"
        integrity="sha384-/VDWkH4VukNJ5zgo0o3hx2681xuIAUYQq4hQprhdx0GnptNk7gk9kqH8yv6tEcwM"
        crossorigin="anonymous"></script> -->
    <style>
        ul.navbar-nav li a{
            color: black !important;
        }
        ul.navbar-nav li a i{
            color: black !important;
        }
        .navbar-brand{
            color: #1E232C !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
           /* font-size: 50px; */
        }
        .navbar-brand span{
            color: #FFBF2C !important;
        }
        .navbar a:hover{
            text-shadow: 2px 2px 5px black !important;
        }
        .navbar-item{
            background-color: #b6991786;
        }
        #navbarNav .navbar-nav li a:hover{
            color: #FFBF2C !important;
        }
        .zoom:hover{
            scale: 1.1;
            transition: 0.8s ;
            z-index: 2;
            box-shadow: 0px 0px 10px grey ;
        }
        form{
            margin-left:70vw;
            MARGIN-TOP:5px;
        }

    </style>
  
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
      <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php">Food<span>Fully</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo "../profile_pic/" . $image; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name mx-2" ><?php echo ($_SESSION['name']); ?></h5>
                                    <span class="status"></span><span class="ml-2">Recipient</span>
                                </div>
                                <a class="dropdown-item" href="../recipients/profile.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="../password-reset.php"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <div class="nav-left-sidebar sidebar-dark" style="background-color:#facc4dda;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="index.php"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="request.php" style="background-color: #b6991786;"><i class="fa fa-fw fa-hand-holding-heart"></i>My Request <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add.php"><i class="fa fa-fw fa-hands-helping"></i>Request Assistance <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="profile.php"><i class="fa fa-fw fa-user"></i>Profile <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-hands-helping"></i> List of Request </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Request</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ==============================================================-->
               
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Request Information </h5>
                                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="post">
                                    <label for="sorted">Sort by: </label>
                                    <select  name="sorted" id="sorted">
                                        <option  <?php if (filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING) == 'upload') { ?>selected="true" <?php }; ?>value="upload">Uploaded Date</option>
                                        <option <?php if (filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING) == 'expiry') { ?>selected="true" <?php }; ?>value="expiry">Expiry Date</option>
                                        
                                        <option <?php if (filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING) == 'rate') { ?>selected="true" <?php }; ?> value="rate">Ratings of Donor</option>
                                        
                                    </select>
                                    <input type="submit" value="Go">
                                    </form> 
                                    

                                <!-- <div class="dropdown">
                                <span style=" padding:5px; background: #080; font-size:10px; text-align:right;">Sort by</span>
                                <div class="dropdown-content">
                                    <p>Expiry Date</p>
                                    <p>Date of upload</p>
                                    <p>Ratings of donor</p>
                                </div>
                                </div> -->
                                
                                <?php
                                                    if(isset($addMsg))
                                                    {
                                                    echo $addMsg;
                                                    }
                                                ?>
                               
                                <div class="card-body" style="display:inline-grid; grid-template-columns: auto auto auto auto;" >
                                   
                                   
                           
                            <?php
                            //echo $sort_value;
                                            

                                            if($sort_value=="expiry")
                                            {
                                                $sql = "SELECT * FROM donations WHERE delivery_status=0 AND (status=0 OR acceptor_name='$username') ORDER BY best_before";
                                            }
                                            else if($sort_value=="rate")
                                            {
                                                $sql = " SELECT DISTINCT d.*,r.rating FROM donations d INNER JOIN (SELECT *,avg(user_rating) rating FROM review_table GROUP BY donor_name)r ON d.username=r.donor_name WHERE d.delivery_status=0 AND (d.status=0 OR d.acceptor_name='$username') ORDER BY r.rating DESC";
                                            }
                                            else if($sort_value=="upload")
                                            {
                                                $sql = "SELECT * FROM donations WHERE delivery_status=0 AND (status=0 OR acceptor_name='$username') ORDER BY id";
                                            }
                                           else
                                           {
                                            $sql = "SELECT * FROM donations WHERE delivery_status=0 AND (status=0 OR acceptor_name='$username') order by id";
                                           }
                                         
                                            $sql_query = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($sql_query)) {
                                                
                                                
                                                $username = $row['username'];
                                                $title = $row['title'];
                                                $description = $row['description'];
                                                $best_before = $row['best_before'];
                                                $img_path = $row['image'];
                                                $pickup = $row['pickup'];
                                                $status = $row['status'];
                                                $id = $row['id'];
                                                $value = "bg-danger";
                                                $text = "Expired";
                                                $accept_date = $row['accept_date'];
                                                //rating
                                                $sql1="SELECT avg(user_rating) FROM review_table WHERE donor_name='$username' GROUP BY donor_name  ";
                                                $sql1_query=mysqli_query($con,$sql1);
                                                $row1= mysqli_fetch_assoc($sql1_query);
                                                $avg=$row1['avg(user_rating)'];
                                                $avg_round=round($avg,1);
                                                if($status==0)
                                                {
                                                    $value = "bg-info";
                                                    $text="Pending";
                                                }
                                                else if($status==1)
                                                {
                                                    $value = "bg-warning";
                                                    $text = "Accepted";

                                                }
                                                else if($status==2)
                                                {
                                                    $value = "bg-success";
                                                    $text="Received";
                                                }
                                                
                                              
                                     
                                   echo ('
                                   <div class="card zoom " style="width: 18rem; margin-top:20px; border-radius:15px; ">
                                  
                                    
                                  
                                   <div style="height:175px; overflow:hidden;"> <a href="../donor/donation_img/'.$img_path.'" class="bg-image hover-zoom"><img class=" card-img-top hover-zoom" src="../donor/donation_img/'.$img_path.'" alt="Card image cap" style="border-top-left-radius:15px; border-top-right-radius:15px;  ">
                                   
                                   </a></div>
                                    
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$title. '</h5> 
                                                    <a href="viewprofile.php?username='.$username.'" class="card-link" style="pointer:cursor;">'.$username.'</a>
                                                    
                                                    
                                                        <b style="color: #FFD219; margin-left: 20px;"><span id="average_rating" >'.$avg_round.'</span> / 5</b>
                                                 
                                                   
                                                
                                                    
                                                </div>
                                               
                                                <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><p class="card-text">
                                                <span class="badge '.$value.' text-white">'.$text.'</span>
                                                ');     
                                                
                                                   
                                            echo('
                                                <li class="list-group-item"><p class="card-text">'.$description. '</p></li>
                                                    <li class="list-group-item"><span style="font-weight: bold;"> Best-before Date: </span>'.$best_before. '</li>
                                                    <li class="list-group-item"><span style="font-weight: bold;">Pickup-point:</span> '.$pickup. '  <a href="map.php?id='.$id.'" ><i class="fa-solid fa-map-location-dot" style="margin-left: 15px; font-size:20px;" ></i></a></li>
                                                    
                                                </ul>
                                                <div class="card-body">
                                                '); 
                                                if ($status==0)
                                                {   
                                                echo'<a href="donation_accepted.php?id='.$id.'" style="cursor:pointer; border:0px; background:none;" >Accept Donation</a>';
                                                
                                                }
                                                else
                                                {
                                                    echo'<a href="donation_cancel.php?id='.$id.'" style="cursor:pointer; border:0px; background:none;" >Cancel</a>';
                                                }
                                                 echo'</div>    
                                            </div>
                                '; } ?> 
                               
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end responsive table -->
                        <!-- ============================================================== -->
                    </div>
               
            </div>
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/custom-js/jquery.multi-select.php"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../js/fontawesome.js" crossorigin="anonymous"></script>
</body>
 
</html>