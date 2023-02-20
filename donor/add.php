<?php

include 'logout.php';

include '..\main_page_partials\config.php';
/*
include '..\db\Dbconnect.php';
if(isset($_POST["submit"])){
$lat = $_POST["lat"];
$lng = $_POST["lng"];
}
$query ="INSERT INTO donors VALUES('$lat','$lng')";
mysql_query($conn,$query);
echo
"
<script>
alert('Data Added Succesfully');
document.location.href='..\donation_accepted.php';
</script>
"
;*/
if (isset($_GET['add'])) {
    if ($_GET['add'] == 'success') {
        $addMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Donation added successfully!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
}
$username = $_SESSION['name'];
$sql = "SELECT profile_pic FROM donor WHERE username = '$username'";
$res = mysqli_query($con, $sql);
$res = (mysqli_fetch_assoc($res));
$image = $res['profile_pic'];

//Getting the wasteManagement option from database
// $sql_for_waste = "SELECT username FROM donations";
// $sql_query_for_waste = mysqli_query($con, $sql_for_waste);


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <title>Food Donation Services</title>
    
    <style>
        ul.navbar-nav li a {
            color: black !important;
        }

        ul.navbar-nav li a i {
            color: black !important;
        }

        .navbar-brand {
            color: #1E232C !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            /* font-size: 50px; */
        }

        .navbar-brand span {
            color: #FFBF2C !important;
        }

        .navbar a:hover {
            text-shadow: 2px 2px 5px black !important;
        }

        .navbar-item {
            background-color: #b6991786;
        }

        #navbarNav .navbar-nav li a:hover {
            color: #FFBF2C !important;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo "../profile_pic/" . $image; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name mx-2" ><?php echo ($_SESSION['name']); ?></h5>
                                    <span class="status"></span><span class="ml-2">Donor</span>
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Account</a>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a href="index.php"><img class="logo-img" src="../assets/images/logo.png"
                                        alt="logo"></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard
                                    <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.php"><i class="fa fa-fw fa-hand-holding-heart"></i>My
                                    Donations <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add.php" style="background-color: #b6991786;"><i
                                        class="fa fa-fw fa-hands-helping"></i>Add Donation <span
                                        class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="profile.php"><i class="fa fa-fw fa-user"></i>Profile <span
                                        class="badge badge-success">6</span></a>
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
                            <h2 class="pageheader-title"><i class="fa fa-fw fa-hands-helping"></i> Add Donations </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Donations</li>
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
                    <!-- ============================================================== -->
                    <!-- valifation types -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card">
                            <h5 class="card-header">Donation Information</h5>
                            <div class="card-body">
                                <form id="validationform" data-parsley-validate="" novalidate="" action="submission.php"
                                    method="post" enctype="multipart/form-data">
                                    <?php
                                    if (isset($addMsg)) 
                                    {
                                        echo $addMsg;
                                    }
                                    ?>
                                    <div class="form-group row">

                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input data-parsley-type="alphanum" type="text" required="" placeholder=""
                                                class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Description</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <textarea required="" class="form-control" input
                                                name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Best Before
                                            Date</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <input type="date" required="" class="form-control" input
                                                name="best_before_date">
                                        </div>
                                    </div>
                                    <div class="form-group row"><label
                                            class="col-12 col-sm-3 col-form-label text-sm-right" >Image
                                            file</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <input type="file" style="width:500px; box-shadow:none; border:none;"
                                                name="my_image" class="form-control" required="">

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pick up
                                            Location</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="row justify-content-md-center">
                                                <!--<input id="search" style="width: 350px;" type="text">-->
                                                <input data-parsley-type="alphanum" input id="search" type=" text"
                                                    required="" placeholder="" class="form-control" name="location">
                                                <button type="button" class="mt-2 btn btn-primary"
                                                    id="search-button">Search</button>
                                            </div>
                                            <div>
                                                <select id="result-list" class='mt-2' name="latlong"
                                                    onchange="getValue()" style="display:none;width: 300px">
                                                </select>


                                                <div id="map-container"
                                                    style="height: 70vh; width: 50vw; margin-left: -80px" class="mt-2">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                        crossorigin="anonymous">
                                        </script>
                                    <script
                                        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                                        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                                        crossorigin="anonymous"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                                        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                                        crossorigin="anonymous"></script>
                                    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                                        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                                        crossorigin=""></script>
                                    <script src="../js/indexdonor.js">
                                    </script>

                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end valifation types -->
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
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
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
<!-- <form class="myForm" action="" method="post" autocomplete="off">
    <input type="text" name="lat" value="">
    <input type="text" name="lng" value="">
</form> -->
<script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        document.querySelector('.myForm input[name="lat")'.value = position.coords.latitude);
        document.querySelector('.myForm input[name="lng")'.value = position.coords.latitude);
    }
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                location.reload();
                break;
        }
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2qa7fez3bItj4wIPEUoo07Tx_gX2jctw&callback=loadMap">
</script>

</html>