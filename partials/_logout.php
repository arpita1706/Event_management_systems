<?php
session_start();
require_once '_dbconnect.php';
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);
header("Location: /" . SITE . "/index.php");
?>