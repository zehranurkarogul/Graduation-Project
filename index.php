<?php
session_start();
include("config/db.php");

$kategori = 'anasayfa';

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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>
<main>
    <div class="slider-wrapper">
  <div class="slider-track">
    <div class="promo-image-container">
      <a href="makyaj.php" class="promo-link">
        <img src="file/makyaj.jpg" alt="Makyaj Ürünleri" class="promo-image" />
        <div class="promo-text">
          <h2>Makyaj Ürünleri</h2>
          <p>Daha Fazla Keşfet!</p>
        </div>
      </a>
    </div>
    <div class="promo-image-container">
      <a href="cilt_bakim.php" class="promo-link">
        <img src="file/ciltbakim.jpg" alt="Cilt Bakım Ürünleri" class="promo-image" />
        <div class="promo-text">
          <h2>Cilt Bakım Ürünleri</h2>
          <p>Daha Fazla Keşfet!</p>
        </div>
      </a>
    </div>
    <div class="promo-image-container">
      <a href="sac_bakim.php" class="promo-link">
        <img src="file/sacbakim.jpg" alt="Saç Bakım Ürünleri" class="promo-image" />
        <div class="promo-text">
          <h2>Saç Bakım Ürünleri</h2>
          <p>Daha Fazla Keşfet!</p>
        </div>
      </a>
    </div>
    <div class="promo-image-container">
      <a href="kisisel_bakim.php" class="promo-link">
        <img src="file/kisiselbakim.jpg" alt="Kişisel Bakım Ürünleri" class="promo-image" />
        <div class="promo-text">
          <h2>Kişisel Bakım Ürünleri</h2>
          <p>Daha Fazla Keşfet!</p>
        </div>
      </a>
    </div>
    <div class="promo-image-container">
      <a href="parfum.php" class="promo-link">
        <img src="file/parfum.jpg" alt="Parfüm Ürünleri" class="promo-image" />
        <div class="promo-text">
          <h2>Parfüm Ürünleri</h2>
          <p>Daha Fazla Keşfet!</p>
        </div>
      </a>
    </div>
  </div>

<div class="promo-indicators">
  <div class="indicator active"></div>
  <div class="indicator"></div>
  <div class="indicator"></div>
  <div class="indicator"></div>
  <div class="indicator"></div>
</div>


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