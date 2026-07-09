<?php
require_once 'header.php';
?>
<div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                        <h4 class="page-title">Booking Details</h4>
                    </div>
                <div class="col-sm-8 col-9 text-right m-b-20">						
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
        <div class="table-responsive">        
        <table class="datatable table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Id</th>
                    <th>Service</th>
                    <th>No. of people</th>
                    <th>Message</th>						
                    <th>Datetime</th>
                    <th>Status</th>						
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `booking`";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $user_id = $row['user_id'];
                        $bookingId = $row['id'];
                        $service = $row['service'];
                        $number_of_people = $row['number_of_people'];
                        $message = $row['message'];
                        $created_at = $row['created_at'];
                        $bookingStatus = $row['status'];
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
                                <td>' . $user_id . '</td>
                                <td>' . $service. '</td>
                                <td>' . $number_of_people . '</td>
                                <td>' . $message . '</td>
                                <td>' . $created_at . '</td>
                                <td>' . $statusText . '</td>
                                <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $bookingId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Booking!	</div>';</script> <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php 
    
    include 'partials/_bookingStatusModal.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .tooltip.show {
        top: -62px !important;
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
        background: #4b5366;		
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
        /* background-color: #fcfcfc; */
    }
    table.table-striped.table-hover tbody tr:hover {
        /* background: #f5f5f5; */
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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<?php
require_once 'footer.php'; 
?>