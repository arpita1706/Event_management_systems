<?php
require_once '../../partials/_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['updatePassword'])) {

        $userId   = $_POST["userId"];
        $curr_pwd = $_POST["curr_pwd"]; 
        $new_pwd  = $_POST["new_pwd"];

        // Fetch user details
        $sql = "SELECT password FROM users WHERE id = '$userId'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $db_password = $row['password'];

            // Verify old password
            if (password_verify($curr_pwd, $db_password)) {

                // Hash new password
                $hash = password_hash($new_pwd, PASSWORD_DEFAULT);

                // Update password
                $updateQuery = "UPDATE users SET password = '$hash' WHERE id = '$userId'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "<script>alert('Password updated successfully');
                            window.location=document.referrer;
                          </script>";
                } else {
                    echo "<script>alert('Error updating password');
                            window.location=document.referrer;
                          </script>";
                }

            } else {
                echo "<script>alert('Old password is incorrect');
                        window.location=document.referrer;
                      </script>";
            }

        } else {
            echo "<script>alert('User not found');
                    window.location=document.referrer;
                  </script>";
        }
    }
}
?>
