<?php
include 'logout.php';

include '..\main_page_partials\config.php';


$username = $_SESSION['name'];
$sql = "SELECT profile_pic FROM acceptor WHERE username = '$username'";
$res = mysqli_query($con, $sql);
$res = (mysqli_fetch_assoc($res));
$image = $res['profile_pic'];


?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="../assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="../css\imgupload.css">
    
    <title>FOOD FULLY</title>
    <style>
        body{
            background-color:#efeff6!important;
           
        }
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
                <a class="navbar-brand" href="index.php">Food<span>Fully</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo "../profile_pic/" . $image; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name mx-2" ><?php echo ($_SESSION['name']); ?> </h5>
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
        <div class="nav-left-sidebar sidebar-dark" style="background-color: #facc4dda;">
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
                                <a class="nav-link" href="index.php" style="font-weight:500;"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="request.php" style="font-weight:500;"><i class="fa fa-fw fa-hand-holding-heart"></i>My Request <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add.php" style="font-weight:500;"><i class="fa fa-fw fa-hands-helping"></i>Request Assistance <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="profile.php" style="font-weight:500;"><i class="fa fa-fw fa-user"></i>Profile <span class="badge badge-success">6</span></a>
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
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-user"></i> Profiles </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profiles</li>
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
                                    <div class="card influencer-profile-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <?php
                                                    $donor_name = $_GET['username'];
                                                    $sql = "SELECT * FROM donor WHERE username='$donor_name'";
                                                    $sql_q=mysqli_query($con, $sql);
                                                    $row = mysqli_fetch_assoc($sql_q);
                                                    $d_name = $row['name'];
                                                    $d_contact = $row['contact'];
                                                    $d_email = $row['email'];
                                                    $d_address = $row['address'];
                                                    $d_image = $row['profile_pic'];

                                                    ?>
                                                    <div class="text-center">
                                                        
                                                    <img src="<?php echo "../profile_pic/" . $d_image; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                                    
                                                       
                                                    </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                                        <div class="user-avatar-info">
                                                            <div class="m-b-20">
                                                                <div class="user-avatar-name">
                                                                    <h2 class="mb-1"><?php echo($d_name); ?></h2>
                                                                </div><br>
                                                            </div>
                                                            <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                            <div class="user-avatar-address">
                                                                <p class="border-bottom pb-3">
                                                                    <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i><?php echo($d_address); ?></span>
                                                                    <!--<span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: 23 June, 2018  </span>
                                                                    <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Male 
                                                                            </span>
                                                                    <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">29 Year Old </span> -->
                                                                </p>
                                                                <div class="mt-3">
                                                                    <a href="#" class="badge badge-light mr-1"><i class="fa fa-fw fa-envelope"></i> <?php echo($d_email); ?></a> <a href="#" class="badge badge-light mr-1"><i class="fa fa-fw fa-phone"></i><?php echo($d_contact); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            <!-- <div class="border-top user-social-box">
                                                <form id="validationform" data-parsley-validate="" novalidate="">
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"><i class="fa fa-user"></i> Account Info</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input data-parsley-type="alphanum" type="text" required="" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                                        <div class="col-12 col-sm-8 col-lg-6">
                                                            <input data-parsley-type="alphanum" type="password" required="" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                            <button type="submit" class="btn btn-space btn-primary">Save Changes</button>
                                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> -->
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <?php
                                include '../RatingSystem/index.php';
                                ?>
                            </div>
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
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
     <script src="../js\imgupload.js"></script>
</body>
 
</html>