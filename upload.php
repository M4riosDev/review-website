<?php

$db = new PDO("sqlite:../database.db");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("
CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT,
    photo TEXT,
    comment TEXT,
    stars INTEGER,
    order_no TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
");

$photoPath = null;
$success = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $dir = "uploads/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $filename = time() . "_" . basename($_FILES["photo"]["name"]);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $filename);
            $photoPath = $dir . $filename;
        }

        $stmt = $db->prepare("
            INSERT INTO reviews (name, email, photo, comment, stars, order_no) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $_POST["name"] ?? '',
            $_POST["email"] ?? '',
            $photoPath,
            $_POST["comment"] ?? '',
            $_POST["stars"] ?? 0,
            $_POST["order_no"] ?? ''
        ]);

        $success = true;

    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Review Saved</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <?php if ($success): ?>
        <h1>✓ Review Saved!</h1>
        <p>Thank you for your feedback.</p>
    <?php else: ?>
        <h1>Oops!</h1>
        <p>Something went wrong while saving your review.</p>
        <?php if ($errorMessage): ?>
            <div class="error"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="index.php" class="btn">Back to form</a>
</div>
</body>
</html>
