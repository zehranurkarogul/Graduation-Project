<?php
session_start();
include("config/db.php");

$kategori = 'kisiselbakim';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    array_push($_SESSION['cart'], $product_id);
}

$query = "SELECT * FROM urunler WHERE kategori = '$kategori'";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişisel Bakım- Fenzia</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>

<section class="hero-section">
  <div class="hero-text">
    <h1>Kişisel Bakım</h1>
    <p>
      Fenzia ile sağlıklı ve bakımlı kalın. 
    </p>
  </div>
</section>

<main>
    <div class="product-grid">
    <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product" id="product-' . $row['id'] . '">';
        echo '<img src="' . $row['resim'] . '" alt="' . $row['isim'] . '">';
        echo '<a class="view-btn" href="product_details.php?id=' . $row['id'] . '">İncele</a>';
        echo '<div class="product-info">';
            echo '<h3>' . $row['isim'] . '</h3>';
            echo '<p class="price">' . $row['fiyat'] . ' TL</p>';
            echo '<form action="#product-' . $row['id'] . '" method="post">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<input type="submit" name="add_to_cart" value="Sepete Ekle" style="
                    background-color: #d89fe3;
                    color: white;
                    border: none;
                    padding: 10px 15px;
                    border-radius: 8px;
                    font-weight: bold;
                    font-size: 25px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    " onmouseover="this.style.backgroundColor=\'#bf7ed1\'" onmouseout="this.style.backgroundColor=\'#d89fe3\'">';
            echo '</form>';
        echo '</div>';  
        echo '</div>';  
    }
} else {
    echo 'Bu kategoride ürün bulunmamaktadır.';
}
?>
    </div>
</main> 
<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>
</body>
</html>