<?php
include("config/db.php");

if (!isset($_SESSION['card'])) {
    $_SESSION['card'] = [];
}

if (isset($_POST['add_to_card']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    array_push($_SESSION['card'], $product_id);
    header("Location: card.php");
    exit();
}

$query = "SELECT * FROM urunler";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saç Bakım - Fenzia</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>

    <section class="products">
        <h2 style="text-align:center;">Saç Bakım Ürünleri</h2>
    
    </section>
</header>
    
<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>
</body>
</html>