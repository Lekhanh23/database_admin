<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "User ID is missing.";
    exit();
}

$id = intval($_GET['id']);

// Thực hiện xoá
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manage_users.php");
exit();
