<?php
session_start();
require_once '../../partials/_dbconnect.php';
unset($_SESSION["adminloggedin"]);
unset($_SESSION["adminusername"]);
unset($_SESSION["adminuserId"]);
header("location: /".SITE."/admin/login.php");
?>
