<?php 
require_once 'header.php';
?>
<section class="inner inner_2">
        <h3>Your Booking</h3>
</section>
<?php
if($loggedin){
?>
<section class="contact">
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="table-wrapper" id="empty">
            
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Booking <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">					
                        <a href="" class="btn btn-primary"><i class="fa fa-refresh"></i> <span>Refresh List</span></a>
                        <a href="#" onclick="window.print()" class="btn btn-info"><i class="fa fa-print"></i> <span>Print</span></a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>No. of people</th>						
                        <th>Message</th>
                        <th>Booking Date</th>
                        <th>Status</th>						
                        <th>Service</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `booking` WHERE `user_id`= $userId";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $bookingId = $row['id'];
                            $service = $row['service'];
                            $number_of_people = $row['number_of_people'];
                            $message = $row['message'];
                            $bookingStatus = $row['status'];
                            $bookingDate = $row['created_at'];
                            
                            $counter++;
                            // Condition for status
                            if ($bookingStatus == 0) {
                                $statusText = "Booking Placed";
                            } else if ($bookingStatus == 1){
                                $statusText = "Booking Confirmed";
                            } else if ($bookingStatus == 2){
                                $statusText = "Booking Denied";
                            } else if ($bookingStatus == 3){
                                $statusText = "Booking Cancelled";
                            }
                            echo '<tr>
                                    <td>' . $bookingId . '</td>
                                    <td>' . $number_of_people . '</td>
                                    <td>' . $message . '</td>
                                    <td>' . $bookingDate . '</td>
                                    <td>' . $statusText . '</td>
                                    <td>' . $service . '</td>
                                    
                                </tr>';
                        }
                        
                        if($counter==0) {
                            ?><script>
                        window.onload = function() {
                            document.getElementById("empty").style.display = "none";
                            const emptyBox = document.getElementById("emptyMessage");
                            emptyBox.style.display = "block";
                            emptyBox.innerHTML = `
                                <div class="col-md-12 my-5">
                                    <div class="card">
                                        <div class="card-body cart">
                                            <div class="col-sm-12 empty-cart-cls text-center">
                                                <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130">
                                                <h3><strong>You have not booked any event.</strong></h3>
                                                <a href="book-event.php" class="cart-btn cart-btn-transform m-3">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        };
                        </script>
                         <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="emptyMessage" style="display:none;"></div> 
    </div> 
</div>
<br>
</section>
    <?php 
    }
    else {
        echo '<section class="contact"><div class="mt-150 mb-150"><div class="container">
        <div class="alert alert-info my-3" style="margin-bottom: 62px;">
            <font style="font-size:22px"><center>Check your Booking Status. You need to <strong><a style="color:#f28123; cursor:pointer;" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div></div></section>';
    }
    ?>

    <?php 
    
    require_once 'footer.php';?> 

    
  <style>
  
    .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px auto;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {     
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #ffc107;        
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    

</style>
