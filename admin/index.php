<?php 
require_once 'header.php';    
if($adminloggedin) {
?>
<body> 
    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from users where userType='0'"); 
                            $user = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $user[0]; ?></h3>
                                <span class="widget-title1">Users <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-bar-chart"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from booking"); 
                            $order = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $order[0]; ?></h3>
                                <span class="widget-title2">Total Booking <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-bar-chart"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from booking where status='0'"); 
                            $order = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $order[0]; ?></h3>
                                <span class="widget-title3">New Booking <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from booking where status='1' and DATE(created_at)=CURDATE()"); 
                            $confirmed = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $confirmed[0]; ?></h3>
                                <span class="widget-title4">Booking Confirmed <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg5"><i class="fa fa-times" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from booking where status='3'"); 
                            $confirmed = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $confirmed[0]; ?></h3>
                                <span class="widget-title5">Booking Cancelled <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                             
            </div>
            
        </div>

<?php
    }
    else{
        header("location: /".SITE."/admin/login.php");
    }
?>
<?php 
 require_once 'footer.php';
?>