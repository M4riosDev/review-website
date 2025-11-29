<?php
$db = new PDO("sqlite:../database.db");
$result = $db->query("SELECT * FROM reviews ORDER BY created DESC");
?>

<link rel="stylesheet" href="style.css">

<h2>Reviews</h2>

<?php foreach($result as $row): ?>
<div class="review">
    <b><?= $row['name'] ?></b>
    Stars: <?= $row['stars'] ?><br>
    <p><?= $row['comment'] ?></p>
    <?php if ($row['photo']): ?>
        <img src="<?= $row['photo'] ?>">
    <?php endif; ?>
    <br>
</div>
<?php endforeach; ?>

<a href="index.php">Back</a>
