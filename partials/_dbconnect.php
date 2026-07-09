<?php
define('SITE', 'harmony-events');
$server = "localhost";
$usernames = "root";
$password = "";
$database = "harmony_events_db";

$conn = mysqli_connect($server, $usernames, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}
?>
