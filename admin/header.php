<?php
session_start();
require_once '../partials/_dbconnect.php';
    if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
        $adminloggedin= true;
        $userId = $_SESSION['adminuserId'];
    }
    else{
        $adminloggedin = false;
        $userId = 0;
        header("location: /".SITE."/admin/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Harmony Events</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel = "icon" href ="../img/fav-icon.png" type = "image/x-icon">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
                <a href="index.php" class="logo">
                    
                           <span>Harmony Events</span>
                </a>
            </div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                   <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
                        <span>Admin</span>
                    </a>
					<div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#updatepassword" style="cursor:pointer;">Change Password</a>
						<a class="dropdown-item" href="partials/_logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#updatepassword" >Change Password</a>
                    <a class="dropdown-item" href="partials/_logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    
                    <ul>
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                        <a href="user.php"><i class="fa fa-user"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="bookings.php"><i class="fa fa-bar-chart"></i> <span>Bookings</span></a>
                        </li>
                                    
                        <li>
                            <a href="contact.php"><i class="fa fa-commenting"></i> <span>Messages</span></a>
                        </li>
                    				                       
                    </ul>
                
                </div>
            </div>
      </div>
</div>
<!-- Update Password Modal -->
    <div class="modal fade" id="updatepassword" tabindex="-1" role="dialog" aria-labelledby="updatepassword" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(111 202 203);">
            <h5 class="modal-title" id="updatepassword">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_updatePassword.php" method="post">
                <div class="text-left my-2">
                    <b><label for="curr_pwd">Current Password: </label></b>
                    <input type="password" class="form-control" id="curr_pwd" name="curr_pwd" required>
                    <b><label for="new_pwd">New Password: </label></b>
                    <input type="password" class="form-control" id="new_pwd" name="new_pwd" required>
                </div>
                
                <input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
                <button type="submit" class="btn btn-success" name="updatePassword">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>