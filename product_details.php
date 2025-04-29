<?php
session_start();
include("config/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['isim']); ?> - Ürün Detayları</title>
    <link rel="stylesheet" href="css/product_details.css">
</head>
<body>
<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>

</body>
</html>


