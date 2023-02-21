<?php
include 'logout.php';

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
    <link href="/fontawesome-free-6.2.1-web/css/brands.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.1-web/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.1-web/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4b244575e7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>Food Donation Services</title>
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: rgb(255, 55, 0);">
                                    <h5 class="mb-0 text-white nav-user-name">Shushrusha</h5>
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
                                <a class="nav-link" href="index.php" style="background-color: #b6991786;"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donor.php"><i class="fa fa-fw fa-user"></i>Donor <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="recipient.php"><i class="fa fa-fw fa-users"></i>Recipient  <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.php"><i class="fa fa-fw fa-hand-holding-heart"></i>Donation <span class="badge badge-success">6</span></a>
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
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard </h2><div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- metric -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Number of Donors</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">
                                    <?php
                                        
                                        $con = mysqli_connect("localhost","root","","foodfully");
                                        
                                        // Check connection
                                        if (mysqli_connect_errno()) {
                                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          exit();
                                        }
                                        $query = "SELECT COUNT(id) AS tfood FROM donor";
                                        $query_result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($query_result)) {
                                            $output = $row['tfood'];
                                        }
                                        echo $output;
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Number of Recipients</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">
                                    <?php
                                        $query = "SELECT COUNT(id) AS tacceptor FROM acceptor";
                                        $query_result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($query_result)) {
                                            $output = $row['tacceptor'];
                                        }
                                        echo $output;
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- graph -->
                    
                    

                </div>
              <!--  <div id="my-chart" style="width: 100%; height: 400px;"></div>-->
                <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart'],
                'AIzaSyD2qa7fez3bItj4wIPEUoo07Tx_gX2jctw': ''   // her eyou can put you google map key
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Best before', 'Status'],
                     <?php
                     $chartQuery = "SELECT * FROM donations";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['best_before']."',".$row['status'].",";
                        }
                     ?>
                ]);

                var options = {
                   
                };

                var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                chart.draw(data, options);
            }
        </script>
                <!-- ============================================================== -->
                <!-- revenue  -->
                <!-- ==============================================================--> 
                <!--
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Donation</h5>
                            <div class="card-body">
                            <div id="my-chart" style="width: 100%; height: 400px;"></div>
                <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart'],
                'AIzaSyD2qa7fez3bItj4wIPEUoo07Tx_gX2jctw': ''   // her eyou can put you google map key
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Best before', 'Status'],
                     <?php
                     $chartQuery = "SELECT * FROM donations";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['best_before']."',".$row['status'].",";
                        }
                     ?>
                ]);

                var options = {
                   
                };

                var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                chart.draw(data, options);
            }
        </script>-->
                                <!--<canvas id="revenue" width="400" height="150"></canvas>-->
                                <!--
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-3">
                                        <h4> Today's Doanation: Php 2,800.30</h4>
                                        <p>Suspendisse potenti. Done csit amet rutrum.
                                        </p>
                                    </div>
                                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                        <h2 class="font-weight-normal mb-3"><span>Php 48,325</span>                                                    </h2>
                                        <div class="mb-0 mt-3 legend-item">
                                            <span class="fa-xs text-primary mr-1 legend-title "><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">Current Week</span></div>
                                    </div>
                                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                        <h2 class="font-weight-normal mb-3">

                                                        <span>Php 59,567</span>
                                                    </h2>
                                        <div class="text-muted mb-0 mt-3 legend-item"> <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Previous Week</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!-- ============================================================== -->
                    <!-- end reveune  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>                 
            </div>
        </div>

<?php
    $sql_donation_fetch = "SELECT MONTH(best_before) AS month, COUNT(id) AS total_donations FROM donations GROUP BY MONTH(best_before)";
    $result = mysqli_query($con, $sql_donation_fetch);

    $xValues = array();
    $yValues = array();
    $barColors = array("red", "green", "blue", "orange", "brown", "pink", "skyblue", "purple", "black", "maroon", "lightgreen", "violet");

    while ($row = mysqli_fetch_assoc($result)) {
        $xValues[] = date("F", mktime(0, 0, 0, $row["month"], 1));
        $yValues[] = $row["total_donations"];
    }
?>

<script>
    var xValues = <?php echo json_encode($xValues); ?>;
    var yValues = <?php echo json_encode($yValues); ?>;
    var barColors = <?php echo json_encode($barColors); ?>;

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Total Donations"
            },
            
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Number of Donations'
                    }
                }]
            
            }
        }
    
    });
</script>

        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 js-->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstrap bundle js-->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- chartjs js-->
    <script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>
   
    <!-- main js-->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- sparkline js-->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="../assets/vendor/charts/sparkline/spark-js.js"></script>
     <!-- dashboard sales js-->
    <script src="../assets/libs/js/dashboard-sales.js"></script>
    
</body>
 
</html>