<?php
session_start();
include("config/db.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        $error = "Şifreler eşleşmiyor!";
    } else {
        $check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $check_result = mysqli_query($conn, $check_query);
        if ($check_result && mysqli_num_rows($check_result) > 0) {
            $error = "Bu e-posta ile zaten kayıt yapılmış!";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password_hash')";
            if (mysqli_query($conn, $insert_query)) {
                $success = "Kayıt başarılı! Giriş yapabilirsiniz.";
            } else {
                $error = "Kayıt sırasında bir hata oluştu.";
            }
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>

<main class="container">
    <section class="login-section">
        <h2>Kayıt Ol</h2>

        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php elseif (!empty($success)) : ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php endif; ?>

        <form action="register.php" method="post" class="login-form">
            <label for="name">İsim:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-posta:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirm">Şifre (Tekrar):</label>
            <input type="password" name="password_confirm" id="password_confirm" required>

            <input type="submit" value="Kayıt Ol" class="btn-submit">
        </form>

        <div style="text-align: center; margin-top: 20px; color: black;">
    <p>Zaten hesabınız var mı? <a href="login.php" class="login-link">Giriş Yap</a></p>
</div>
    </section>
</main>

<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>
</body>
</html>
