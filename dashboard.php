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
    <b><?= $r['name'] ?></b> (<?= $r['email'] ?>)<br>
    Stars: <?= $r['stars'] ?><br>
    <p><?= $r['comment'] ?></p>
    <?php if ($r['photo']): ?>
        <img src="<?= $r['photo'] ?>">
    <?php endif; ?>
    <br>
    <a href="delete.php?id=<?= $r['id'] ?>">Delete</a>
</div>
<?php endforeach; ?>

<a href="logout.php">Logout</a>
