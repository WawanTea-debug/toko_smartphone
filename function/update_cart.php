<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$action = $data['action'];

if (isset($_SESSION['cart'][$id])) {
    if ($action === 'increase') {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } elseif ($action === 'decrease') {
        $_SESSION['cart'][$id]['quantity'] -= 1;
        if ($_SESSION['cart'][$id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
}

echo json_encode(['success' => true]);
