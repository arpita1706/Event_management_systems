<?php
require_once '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from users where username='$username' and userType='0'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
           
           
           echo "<script>window.location = document.referrer;</script>";
        } 
        else{
            echo "<script>alert('You have entered wrong password!');
                    </script>";
            echo "<script>window.location = document.referrer;</script>";
        }
    } 
    else{
        echo "<script>alert('User name does not exists!');
                    </script>";
        echo "<script>window.location = document.referrer;</script>";
    }
}    
?>