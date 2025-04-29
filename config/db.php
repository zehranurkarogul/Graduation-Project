<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fenzia";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>
