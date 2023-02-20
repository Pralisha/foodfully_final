<?php
include 'logout.php';
include '../main_page_partials/config.php';


$sql = "SELECT donor.name, donations.best_before,donations.title, donations.pickup,donations.description FROM donor JOIN donations ON donor.username= donations.username WHERE best_before< CURRENT_DATE AND status = 0 AND Category_of_Waste='animal food product'";
$result_expired_food = mysqli_query($con, $sql);



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
                <a class="navbar-brand" href="../home.php" style="font-weight: 900; font-size: 35px;">Food<span>Fully</span></a>
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
                                <a class="nav-link" href="donor.php"><i class="fa fa-fw fa-user"></i>Donor <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="recipient.php"><i class="fa fa-fw fa-users"></i>Recipient  <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.php" ><i class="fa fa-fw fa-hand-holding-heart"></i>Donation <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="request.php" ><i class="fa fa-fw fa-hands-helping"></i>Request Assistance <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reports.php"><i class="fa fa-fw fa-chart-pie"></i>Reports <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="animal.php" style="background-color: #b6991786;"><i class="fa-solid fa-paw"></i>Animal Welfare<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="waste.php"><i class="fa-solid fa-recycle"></i>Waste Management<span class="badge badge-success">6</span></a>
                            </li>
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
                             <h2 class="pageheader-title"><i class="fa-solid fa-paw"></i> Animal Welfare</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Animal Welfare</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Foods for Animal products</h5>
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
                                                   
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if ($result_expired_food->num_rows > 0) {
                                                while($row = $result_expired_food->fetch_assoc()) {
                                                    print_r('<tr>');
                                                    print_r('    <td>'.$row['name'].'</td>');
                                                    print_r('    <td>'.$row['best_before'].'</td>');
                                                    print_r('    <td>'.$row['title'].'</td>');
                                                    print_r('    <td>'.$row['description'].'</td>');
                                                    print_r('    <td>'.$row['pickup'].'</td>');
                                                    print_r('    <td>');
                                                    print_r('        <img src="../assets/images/1.png" width="50">');
                                                    print_r('        <img src="../assets/images/1.png" width="50">');
                                                    print_r('    </td>');
                                                    
                                                    print_r('    <td>remarks</td>');
                                                    print_r('    <td class="align-right">');
                                                    print_r('        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">');
                                                    print_r('          <i class="fa fa-edit"></i>');
                                                    print_r('        </a> |');
                                                    print_r('        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">');
                                                    print_r('          <i class="fa fa-trash-alt"></i>');
                                                    print_r('        </a>');
                                                    print_r('      </td>');
                                                    print_r('</tr>');
                                                  
                                                }
                                            } 
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
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
</body>
 
</html>