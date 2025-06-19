<?php
session_start();
include("config/db.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Şifre yanlış!";
        }
    } else {
        $error = "Kullanıcı bulunamadı!";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    <?php include("config/header.php"); ?>
</header>

<main class="container">
    <section class="login-section">
        <h2>Giriş Yap</h2>
        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post" class="login-form">
            <label for="email">E-posta:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Giriş Yap" class="btn-submit">
        </form>
        
<div style="text-align: center; margin-top: 20px; color: black;">
  Hesabınız yok mu? <a href="register.php" class="register-link">Kayıt Ol</a>
</div>

        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 FENZIA.COM HER HAKKI SAKLIDIR.</p>
    <p>fenzia@destek.com</p>
</footer>
</body>
</html>
