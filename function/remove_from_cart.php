<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

echo json_encode(['success' => true]);
