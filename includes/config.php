<?php
$host = "localhost";
$user = "root";
$pass = "harshit@sql12";
$db = "medianest";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
