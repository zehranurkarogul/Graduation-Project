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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>
<main>
    <section>
    <div class="product-grid">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product">';
            echo '<img src="' . $row['resim'] . '" alt="' . $row['isim'] . '">';
            echo '<p>' . $row['isim'] . '</p>';
            echo '<p>' . $row['fiyat'] . ' TL</p>';
            echo '<p><a href="product_details.php?id=' . $row['id'] . '">İncele</a></p>';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
            echo '<input type="submit" name="add_to_cart" value="Sepete Ekle">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'Henüz ürün bulunmamaktadır.';
    }
    ?>
</div>
<main>
    <section>
        <div class="product-grid">
            <?php
            
            ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>
</body>
</html>