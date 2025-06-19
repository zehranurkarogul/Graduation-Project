<?php
session_start();

include("config/db.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    array_push($_SESSION['cart'], $product_id);
    $total_items_in_cart = count($_SESSION['cart']);
}

if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
    header("Location: cart.php");
    exit();
}

$cart_content = [];
$item_counts = [];
foreach ($_SESSION['cart'] as $product_id) {
    if (isset($item_counts[$product_id])) {
        $item_counts[$product_id]++;
    } else {
        $item_counts[$product_id] = 1;
    }
}

foreach ($item_counts as $product_id => $quantity) {
    $query = "SELECT * FROM urunler WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $row['quantity'] = $quantity;
        $cart_content[] = $row;
    }
}

$total_items_in_cart = count($_SESSION['cart']);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepetim</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>
    <main class="container">
    <section class="cart">
        <h2>Sepet İçeriği</h2>
        <div class="cart-items">
            <?php if (!empty($cart_content)) : ?>
                <?php foreach ($cart_content as $item) : ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['resim']; ?>" alt="<?php echo $item['isim']; ?>">
                        <p><a href="product_details.php?id=<?php echo $item['id']; ?>" style="color:#000; text-decoration:none; font-weight:bold;">
                        <?php echo $item['isim']; ?>
                        </a> (x<?php echo $item['quantity']; ?>)</p>
                        <p><?php echo $item['fiyat'] * $item['quantity']; ?> TL</p>
                        <form action="remove_one_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <input type="submit" value="-" style="background-color:#d89fe3; color:white; border:none; border-radius:50%; width:35px; height:35px; font-size:18px; font-weight:bold; cursor:pointer; margin:0 5px;">
                </form>
                <form action="add_from_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <input type="submit" value="+" style="background-color:#d89fe3; color:white; border:none; border-radius:50%; width:35px; height:35px; font-size:18px; font-weight:bold; cursor:pointer; margin:0 5px;">
                </form>
                <form action="remove_from_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <input type="submit" value="x" style="background-color:#d89fe3; color:white; border:none; border-radius:50%; width:35px; height:35px; font-size:18px; font-weight:bold; cursor:pointer; margin:0 5px;">
                </form>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Sepetiniz boş.</p>
            <?php endif; ?>
        </div>
    </section>
    <section class="summary">
        <h2>Toplam Tutar</h2>
        <div class="total">
            <?php
            $total_price = 0;
            foreach ($cart_content as $item) {
                $total_price += $item['fiyat'] * $item['quantity'];
            }
            echo "<p>Toplam Tutar: $total_price TL</p>";
            ?>
        </div>
        <button 
    class="complete-order" 
    style="
        background-color: #d89fe3; 
        color: white; 
        border: none; 
        padding: 15px 30px; 
        font-size: 18px; 
        font-weight: bold; 
        border-radius: 30px; 
        cursor: pointer; 
        box-shadow: 0 6px 12px #d89fe3; 
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    "
    onmouseover="this.style.backgroundColor='#b46ec7'; this.style.boxShadow='0 8px 16px #d89fe3'; this.style.transform='scale(1.05)';"
    onmouseout="this.style.backgroundColor='#d89fe3'; this.style.boxShadow='0 6px 12px #d89fe3'; this.style.transform='scale(1)';"
    onmousedown="this.style.transform='scale(0.95)'; this.style.boxShadow='0 4px 8px #d89fe3';"
    onmouseup="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 16px #d89fe3';"
>
    Siparişi Tamamla
</button>

    </section>
</main>
<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer> 
</body>
</html>