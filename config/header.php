<?php


$total_items_in_cart = isset($_SESSION['card']) ? count($_SESSION['card']) : 0;
?>

<?php

if (!isset($total_items_in_cart)) {
    $total_items_in_cart = 0; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenzia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Playball&display=swap" rel="stylesheet">

</head>
<body>
        <header>
        <div class="hamburger" onclick="toggleMenu()">☰</div>

    
    <a href="index.php" class="logo-link">
        <h1 class="logo">Fenzia</h1>
    </a>

    <nav>
    <ul>
                <li><a href="cilt_bakim.php">Cilt Bakım</a></li>
                <li><a href="sac_bakim.php">Saç Bakım</a></li>
                <li><a href="makyaj.php">Makyaj</a></li>
                <li><a href="kisisel_bakim.php">Kişisel Bakım</a></li>
                <li><a href="parfum.php">Parfüm</a></li>
            </ul>
    </nav>

    <div id="sideMenu" class="side-menu">
        <a href="connection.php">📞 İletişim</a>
        <a href="login.php">👤 Kullanıcı Girişi</a>
        <a href="card.php">🛒 Sepetim</a>
    </div>
</header>
<script>
    function toggleMenu() {
        const menu = document.getElementById("sideMenu");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
</script>
<body>
    
</body>
</html>
