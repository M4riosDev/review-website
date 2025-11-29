<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['user'] == "admin" && $_POST['pass'] == "1234") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    }
    $error = "Invalid username or password";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>Admin Login</h2>

        <?php if ($error): ?>
            <div class="login-error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <input name="user" placeholder="Enter username" required>
            <input name="pass" placeholder="Enter password" type="password" required>
            <button type="submit">Login</button>
        </form>

        <a href="index.php" class="back-link">← Back to website</a>
    </div>
</div>

</body>
</html>
