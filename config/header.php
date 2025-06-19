<?php
$total_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fenzia</title>
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Playball&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="top-bar">
    ★ Yaza Özel İndirimler Başladı! ★
</div>
    <header class="main-header">
        <div class="header-content">
            <a href="index.php" class="logo-link">
                <h1 class="logo">Fenzia</h1>
            </a>

            <nav class="main-nav">
                <ul>
                    <li><a href="cilt_bakim.php">Cilt Bakım</a></li>
                    <li><a href="sac_bakim.php">Saç Bakım</a></li>
                    <li><a href="makyaj.php">Makyaj</a></li>
                    <li><a href="kisisel_bakim.php">Kişisel Bakım</a></li>
                    <li><a href="parfum.php">Parfüm</a></li>
                </ul>
            </nav>

            <div class="header-icons">
    <a href="login.php" class="icon"><i class="fa-regular fa-user"></i></a>
    <a href="cart.php" class="icon">
        <i class="fa-solid fa-shopping-bag"></i>
        <span class="cart-count">(<?php echo $total_items_in_cart; ?>)</span>
    </a>
</div>
    </header>
</body>
</html>
