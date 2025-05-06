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


if(!isset($_SESSION["sepetId"])) {
    $query = "INSERT INTO `sepet` (`toplamtutar`) VALUES ('0')";
    $result = mysqli_query($conn, $query);
    $last_id = mysqli_insert_id($conn);
    $_SESSION["sepetId"]=$last_id;
}
?>
