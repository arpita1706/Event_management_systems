<?php
error_reporting(0);
session_start();
require_once '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_SESSION['userId'];
        $service = $_POST["service"];
        $no_of_people = $_POST["no_of_people"];
        $message = $_POST["message"];
         
            $sql = "INSERT INTO `booking` (`user_id`, `service`, `number_of_people`, `message`) VALUES ('$userId', '$service', '$no_of_people', '$message')";
            $result = mysqli_query($conn, $sql);
            $bookingId = $conn->insert_id;
            if ($result){
                echo '<script>alert("Thanks for booking with us. Your booking id is ' .$bookingId. '.");
                    window.location.href="http://localhost/'.SITE.'/index.php";  
                    </script>';
                    exit();
            }
        
        else{
            echo '<script>alert("Something went wrong.");
                    window.history.back(1);
                    </script>';
                    exit();
        }    
    }
?>
