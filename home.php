
<!DOCTYPE html>

<head>
    <title>Donate Food</title>
    <?php include('./main_page_partials/header.php') ?>
<style>
    ul.navbar-nav li a{
        color: #1E232C !important;
    }
    ul.navbar-nav li a i{
        color: #1E232C !important;
    }
    .navbar-brand{
        color: #1E232C !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
        font-size: 40px; 
        font-weight: 800;
    }
    .navbar-brand span{
        color: #FFBF2C !important;
    }
    .navbar a:hover{
        text-shadow: 2px 2px 5px black !important;
    }
    .card{
        box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    
   
</style>
</head>



<nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="./home.php">Food<span>Fully</span></a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
  
</ul>

<ul class="navbar-nav form-inline my-2 my-lg-0">

  <li class="nav-item">
    <a class="nav-link" href="home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="about.php">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin\donation.php">Donations</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="index.php">Log in</a>
  </li>
  <!--
  <li class="nav-item">
    <a class="nav-link" href="about.php">About Us</a>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Donor Name
    -->
    <!-- Donor Name -->
    <!--
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      
      <a class="dropdown-item" href="user/index.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>

      <a class="dropdown-item" href="user/update.php"><i class="fa fa-edit" aria-hidden="true"></i>
Update Profile</a>

      <a class="dropdown-item" href="#">
      <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>

Logout</a>
      </div>
  </li>
-->

</ul>
</div>
</nav>

<div class="container-fluid header-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a href="#" ><img src="assets/images/logo2.png" style="margin-top: 100px; margin-left: 300px;"></a>
        </div>
    </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <div class="header">
                        <h1 class="text-center" style="color: rgb(70, 58, 6); font-weight: 700; margin-top: 20px;">Donating food now is just a click away!</h1>
                    <p class="text-center" style="font-weight: 700; color:black;">It's not how much we give, but how much love we put into giving.</p>
                    </div>


                    
                        <div class="form-group center-aligned">
                        <a href="register.php" style="color:rgb(255, 66, 66)">
                            <button type="submit" class="btn btn-lg btn-danger">Sign Up Now!</button>
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- header ends -->

        <!-- donate section -->
        <div class="container-fluid " >
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"  style="color: white; font-weight: 700;padding: 10px 0 0 0;">Donate Food for a cause!</h1>
                    <hr class="white-bar">
                    <p class="text-center pera-text">
                        We are a group of students with the aim to provide the food to needy. We connect the donors and the organizations.

                    </p>
                    <a href="#" class="btn btn-default btn-lg text-center center-aligned">Feed the Needy!</a>
                </div>
            </div>
        </div>
        <!-- end donate section -->
        

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                         <h3 class="text-center red">Our Vision</h3>
                            <img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                            </p>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card">
                              <h3 class="text-center red">Our Goal</h3>
                            <img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                            </p>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card">
                          <h3 class="text-center red">Our Mission</h3>
                            <img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                            </p>
                        </div>
                    </div>
         </div>
     </div>

        <!-- end aboutus section -->


<!-- contact us section -->
<div class="container-fluid">					
    <div class="row contactus">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Contact Us</h1>
            <hr class="white-bar">

                <h1 class="text-center" style="font-size: 25px;">
                    <a  target="_blank" href="#"><i style="color: #fff;" class="fa-brands fa-facebook"></i></a>
                 
                    <a target="_blank" href="#"><i style="color: #fff;" class="fa-brands fa-youtube"></i></a>
                    <a target="_blank" href="#"><i style="color: #fff;" class="fa-brands fa-instagram"></i></a> 
                    <a target="_blank" href="#"><i style="color: #fff;" class="fa-brands fa-twitter"></i></a>  
                </h1>

                <div class="details" style="font-size: 15px; text-align:center;">
                     <p></p><i class="fa fa-phone"></i>   +977-9841123456      
                     <br><i class="fa fa-envelope"></i>       foodfullynepal@gmail.com  </p>
                </div>

        </div>
    </div>
</div>
<!-- end contact us section -->
        
    <!-- JQuery File -->
<script type="text/javascript" src="jquery/jquery.js"></script>

<!-- BootStrap JS File-->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Fontawesome Icon JS-->
<script defer src="fontawesome/js/all.js"></script>
<script src="../js/fontawesome.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'main_page_partials\config.php';
?>