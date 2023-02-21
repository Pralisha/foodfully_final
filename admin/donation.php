<?php
include 'logout.php';

include '..\main_page_partials\config.php';


$username = $_SESSION['name'];
$sql = "SELECT profile_pic FROM acceptor WHERE username = '$username'";
$res = mysqli_query($con, $sql);
$res = (mysqli_fetch_assoc($res));
//$image = $res['profile_pic'];


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
    <title>Food Donation Services</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link href="/fontawesome-free-6.2.1-web/css/brands.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.1-web/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.1-web/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4b244575e7.js" crossorigin="anonymous"></script>

    <style>
        ul.navbar-nav li a{
            color: black !important;
        }
        ul.navbar-nav li a i{
            color:black !important;
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name">Shushrusha Maharjan </h5>
                                    <span class="status"></span><span class="ml-2">Administrator</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
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
                                <a class="nav-link" href="donor.php"><i class="fa fa-fw fa-user"></i>Donor <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="recipient.php"><i class="fa fa-fw fa-users"></i>Recipient  <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.php" style="background-color: #b6991786;"><i class="fa fa-fw fa-hand-holding-heart"></i>Donation <span class="badge badge-success">6</span></a>
                            </li>
                            <!--
                            <li class="nav-item ">
                                <a class="nav-link" href="request.php"><i class="fa fa-fw fa-hands-helping"></i>Request Assistance <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reports.php"><i class="fa fa-fw fa-chart-pie"></i>Reports <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="animal.php"><i class="fa-solid fa-paw"></i>Animal Welfare<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="waste.php"><i class="fa-solid fa-recycle"></i>Waste Management<span class="badge badge-success">6</span></a>
                            </li>
    -->
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
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-hand-holding-heart"></i> Donations </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Donations</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== --><!--
               
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donation Information</h5>
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Donor Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Pickup Location</th>
                                                    <th scope="col">Upload Documentation</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mark Otto</td>
                                                    <td>Oct 23, 2021</td>
                                                    <td>Donation for Typhoon</td>
                                                    <td>Maecenas mattis tempor libero pretium.</td>
                                                    <td>Pasig</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-success text-white">received</span></td>
                                                    <td>remarks</td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td>Johnny Lee</td>
                                                    <td>Oct 23, 2021</td>
                                                    <td>Donation for Covid</td>
                                                    <td>Vestibulum porttitor laoreet faucibus.</td>
                                                    <td>Makati</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-success text-white">received</span></td>
                                                    <td>remarks</td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td>Mark Lim</td>
                                                    <td>Oct 23, 2021</td>
                                                    <td>Donation for Earthquake</td>
                                                    <td>Maecenas mattis tempor libero pretium.</td>
                                                    <td>Manila</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-info text-white">pending</span></td>
                                                    <td>remarks</td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- ============================================================== -->
                        <!-- end responsive table -->
                        <!-- ============================================================== -->
                    <!--</div>
               
            </div>-->
            <!-------------------------------------------------------------->
            <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donations</h5>
                                <?php
                                                    if(isset($addMsg))
                                                    {
                                                    echo $addMsg;
                                                    }
                                                ?>
                               
                                <div class="card-body" style="display:inline-grid; grid-template-columns: auto auto auto auto;" >
                                   
                                   
                           
                            <?php     
                            
                                            $sql = "SELECT * FROM donations";
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
                                                    
                                                </div>
                                               
                                                <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><p class="card-text">
                                                <span class="badge '.$value.' text-white">'.$text.'</span>
                                                ');     
                                                
                                                   
                                            echo('
                                                <li class="list-group-item"><p class="card-text">'.$description. '</p></li>
                                                    <li class="list-group-item"><span style="font-weight: bold;"> Best-before Date: </span>'.$best_before. '</li>
                                                    <li class="list-group-item"><span style="font-weight: bold;">Pickup-point:</span> '.$pickup. '</li>
                                                    
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
</body>
 
</html>