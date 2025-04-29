<?php


$total_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>


<nav>
    <ul>
        
        <li><a href="index.php">Ana Sayfa</a></li>
        <li><a href="cart.php">Sepetim (<?php echo $total_items_in_cart; ?>)</a></li> 
        
    </ul>
</nav>




<?php

if (!isset($total_items_in_cart)) {
    $total_items_in_cart = 0; 
}
?>

