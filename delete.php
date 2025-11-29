<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("No access");
}

$db = new PDO("sqlite:../database.db");
$stmt = $db->prepare("DELETE FROM reviews WHERE id=?");
$stmt->execute([$_GET['id']]);
header("Location: dashboard.php");
