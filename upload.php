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
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
");

$photoPath = null;
$success = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle photo upload if provided
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $dir = "uploads/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $filename = time() . "_" . basename($_FILES["photo"]["name"]);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $filename);
            $photoPath = $dir . $filename;
        }

        // Insert into DB
        $stmt = $db->prepare("
            INSERT INTO reviews (name, email, photo, comment, stars) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $_POST["name"] ?? '',
            $_POST["email"] ?? '',
            $photoPath,
            $_POST["comment"] ?? '',
            $_POST["stars"] ?? 0
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

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: #e5e7eb;
        }
        .box {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.4);
            padding: 24px 28px;
            text-align: center;
            border-radius: 14px;
            width: 90%;
            max-width: 380px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.55);
        }
        .box h1 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #4ade80;
        }
        .box p {
            font-size: 15px;
            margin-bottom: 22px;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 11px 14px;
            background: linear-gradient(135deg, #4f46e5, #06b6d4);
            color: #f9fafb;
            font-weight: 600;
            border-radius: 999px;
            text-decoration: none;
            width: 100%;
            transition: transform 0.15s ease, box-shadow 0.15s ease, filter 0.15s ease;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.8);
            filter: brightness(1.06);
        }
        .error {
            color: #fecaca;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
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
