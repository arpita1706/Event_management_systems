<?php
require_once '../../partials/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateStatus'])) {
        $orderId = $_POST['orderId'];
        $status = $_POST['status'];

        $sql = "UPDATE `booking` SET `status`='$status' WHERE `id`='$orderId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Status updated successfully.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Something went wrong.');
                window.location=document.referrer;
                </script>";
        }
    }
   
}

?>