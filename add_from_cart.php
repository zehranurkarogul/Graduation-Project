<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    array_push($_SESSION['cart'], $product_id);
    
    header("Location: cart.php");
    exit();
}
?>
