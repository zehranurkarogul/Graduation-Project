<?php
session_start();
include("config/db.php");

$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM urunler WHERE id = $product_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo 'Ürün bulunamadı.';
    exit;
}

if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    array_push($_SESSION['cart'], $product_id);
}
?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['isim']); ?> - Ürün Detayları</title>
    <link rel="stylesheet" href="css/product_details.css">
</head>

<body>

<header>
    <?php include("config/header.php"); ?>
</header>

<main>
    <section class="product-details">
        <div class="product-image">
            <img src="<?php echo htmlspecialchars($row['resim']); ?>" alt="<?php echo htmlspecialchars($row['isim']); ?>">
        </div>
        <div class="product-info">
            <h1><?php echo htmlspecialchars($row['isim']); ?></h1>
            <p class="price"><?php echo htmlspecialchars($row['fiyat']); ?> TL</p>
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                <input type="submit" name="add_to_cart" value="Sepete Ekle">
            </form>
        </div>
    </section>
</main> 

<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>

</body>
</html>
