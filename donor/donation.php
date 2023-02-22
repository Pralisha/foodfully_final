<?php
include 'logout.php';

include '..\main_page_partials\config.php';

$sort_value = NULL;
$sort_value= filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING);

$username = $_SESSION['name'];
$sql = "SELECT profile_pic FROM donor WHERE username = '$username'";
$res = mysqli_query($con, $sql);
$res = (mysqli_fetch_assoc($res));
$image = $res['profile_pic'];


if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'success') {
        $addMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Donation deleted successfully!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
}
if (isset($_GET['update'])) {
    if ($_GET['update'] == 'success') {
        $addMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Donation updated successfully!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
}
if (isset($_GET['delivery'])) {
    if ($_GET['delivery'] == 'success') {
        $addMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
            <strong>Delivery Status updated successfully!</strong>
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
                                <a class="dropdown-item" href="../donor/profile.php"><i class="fas fa-user mr-2"></i>Account</a>
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
                                <a class="nav-link" href="index.php"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="donation.php" style="background-color: #b6991786;"><i class="fa fa-fw fa-hand-holding-heart"></i>My Donations <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add.php"><i class="fa fa-fw fa-hands-helping"></i>Add Donation <span class="badge badge-success">6</span></a>
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
                <!-- ============================================================== -->
               
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donation Information</h5>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="post">
                                    <label for="sorted">Sort by: </label>
                                    <select  name="sorted" id="sorted">
                                        <option  <?php if (filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING) == 'upload') { ?>selected="true" <?php }; ?>value="upload">Status</option>
                                        <option <?php if (filter_input(INPUT_POST, 'sorted', FILTER_SANITIZE_STRING) == 'expiry') { ?>selected="true" <?php }; ?>value="expiry">Expiry Date</option>
                                        
                                       
                                    </select>
                                    <input type="submit" value="Go">
                                    </form> 
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <?php
                                            if (isset($addMsg))
                                                echo $addMsg;
                                            ?>
                                            <thead>
                                                <tr>
                                                    
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Best Before date</th>
                                                    <th scope="col">Uploaded Image</th>
                                                    <th scope="col">Pickup Location</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">Delivery Status</th>
                                                    <!--<th scope="col">Category for Waste Management</th>-->
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <?php
                                            
                                            if($sort_value=="expiry")
                                            {
                                                $sql = "SELECT * FROM donations WHERE username = '$username' ORDER BY best_before";
                                            }
                                           
                                            else if($sort_value=="upload")
                                            {
                                                $sql = "SELECT * FROM donations WHERE username = '$username' ORDER BY status DESC";
                                            }
                                           else
                                           {
                                            $sql = "SELECT * FROM donations WHERE username='$username' order by id";
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
                                               // $Category_of_Waste = $row['Category_of_Waste'];
                                                $current_date = date("Y-m-d");
                                                $accept_date = $row['accept_date'];
                                                $start_date = strtotime($accept_date);
                                                $end_date = strtotime($current_date);
                                               
                                                $date_difference=($end_date - $start_date)/60/60/24;
                                               // print_r($current_date);
                                                echo '<tr>';
                                               
                                                echo'<td>'.$title. '</td> ';
                                                echo'<td style="width:400px;">'.$description. '</td> ';
                                                echo'<td>'.$best_before. '</td> ';
                                                echo'<td><a href="donation_img/'.$img_path.'">View Image</a></td> ';
                                                echo'<td>'.$pickup. '</td> ';
                                               
                                                if ($best_before<$current_date)
                                                {
                                                    $status = 3;
                                                }
                                               
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
                                                else if($status==3)
                                                {
                                                    $value = "bg-danger";
                                                    $text = "Expired";
                                                }
                                              
                                                
                                                echo '<td><span class="badge '.$value.' text-white">'.$text.'</span></td>
                                                    <td class="align-right">
                                                        <a href="update_donation.php?id='.$id.'" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="delete_donation.php?id='.$id.'" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>';
                                                      $delivery_status=$row['delivery_status'];
                                                    if (!$delivery_status)
                                                    {
                                                        echo '<td style="text-align:center;"><a href="delivery_status.php?id='.$id.'" style="cursor:pointer; border:0px; background:none;"><i class="fa-regular fa-circle-xmark text-danger" style=" font-size:24px;"></i></a></td>';

                                                    } 
                                                    else
                                                    {
                                                        echo '<td style="text-align:center;"><i class="fa-solid fa-circle-check text-success" style=" font-size:24px;"></i></td>';
                                                    }
                                                   // echo'<td>'.$Category_of_Waste. '</td> ';
                                                 echo '</tr> ';
                                                 

                                            }
                                            ?>
                                                <!-- <tr>
                                                    <td>Oct 12, 2022</td>
                                                    <td>Oct 14,2022</td>
                                                    <td>-</td>
                                                    <td>Kalimati</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-info text-white">pending</span></td>
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
                                                    <td>Oct 23, 2022</td>
                                                    <td>Oct 26,2022</td>
                                                    <td>-</td>
                                                    <td>Maitidevi</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-success text-white">received</span></td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr> -->
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
    <script src="../js/fontawesome.js" crossorigin="anonymous"></script>
</body>
 
</html>