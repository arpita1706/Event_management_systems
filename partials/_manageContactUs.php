<?php
session_start();
require_once '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $message = $_POST["message"];
   

        $sql = "INSERT INTO `contact` (`user_id`, `name`, `email`, `phone`, `service`, `message`) VALUES ('$userId', '$name', '$email', '$phone', '$service', '$message')";
        $result = mysqli_query($conn, $sql);
        $contactId = $conn->insert_id;
        echo '<script>alert("Thanks for Contact us. Your contact id is ' .$contactId. '. We will contact you very soon.");
                    window.location.href="http://localhost/'.SITE.'/index.php";  
                    </script>';
                    exit();
    }
?>