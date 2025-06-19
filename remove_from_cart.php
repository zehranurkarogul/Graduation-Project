<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];


    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item == $product_id) {
            unset($_SESSION['cart'][$key]);
        }
    }

    
    header("Location: cart.php");
    exit();
}
?>
