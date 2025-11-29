<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("No access");
}

$db = new PDO("sqlite:../database.db");
$rows = $db->query("SELECT * FROM reviews ORDER BY id DESC");
?>

<link rel="stylesheet" href="style.css">

<h2>Admin Panel</h2>

<?php foreach($rows as $r): ?>
<div class="review">
    <b><?= htmlspecialchars($r['name']) ?></b> (<?= htmlspecialchars($r['email']) ?>)<br>
    Order NO: <?= htmlspecialchars($r['order_no']) ?><br>
    Stars: <?= htmlspecialchars($r['stars']) ?><br>
    <p><?= htmlspecialchars($r['comment']) ?></p>

    <?php if ($r['photo']): ?>
        <img src="<?= htmlspecialchars($r['photo']) ?>">
    <?php endif; ?>
    <br>
    <a href="delete.php?id=<?= $r['id'] ?>">Delete</a>
</div>
<?php endforeach; ?>

<a href="logout.php">Logout</a>
