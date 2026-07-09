<?php 
error_reporting(0);
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- main style -->
  <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
  <!-- responsive -->
  <!-- <link rel="stylesheet" href="assets/css/responsive.css"> -->

  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- font CSS -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
<link rel="stylesheet" href="font/stylesheet.css" >
<!-- Icons CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/style.css" >
<link rel="stylesheet" href="css/responsive.css" >
    <title>Harmony Events</title>
    <link rel = "icon" href ="img/fav-icon.png" type = "image/x-icon">
  </head>
<body>
  <?php include 'partials/_dbconnect.php';
        include 'partials/_loginModal.php';
        include 'partials/_signupModal.php';
  ?>
  <nav class="navbar">
    <div class="container">
        <div class="top_head">
            <a href="#0"><i class="fa fa-envelope" aria-hidden="true"></i> harmonyevents@gmail.com</a> </div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand logo_text" href="index.php"><br><h1>Harmony Events</h1></a>
<a class="navbar-brand" href="index.php">
    <img src="img/new logo.png" alt="Harmony Events" style="height:60px;">
</a>			</div>
        <br><br><br><br><br>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="about.php">About Us</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="wedding-events.php">Wedding Event</a></li>
                        <li><a href="birthday-events.php">Birthday Event</a></li>
                        <li><a href="corporate-events.php">Corporate Event</a></li>
                        <li><a href="launch-events.php">Launch Event</a></li>
                    </ul>
                </li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                  <li><a href="book-event.php">Book Event</a></li>
                   <li><a href="contact-us.php">Contact</a></li>
                  <li>
                     <div class="header-icons">
                      <?php
                    if($loggedin){
          echo '<a href="view-profile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px"></a>
          <li class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="view-profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="view-booking.php">Your Booking</a></li>
                <li><a class="dropdown-item" href="partials/_logout.php">Logout</a></li>
              </ul></li>';
        } else {?>

                    <a class="cart-btn2" data-toggle="modal" data-target="#loginModal">Login</a>
                    <a class="cart-btn2"  data-toggle="modal" data-target="#signupModal">SignUp</a>
                  <?php } ?>
                
                  </div>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
</nav>
