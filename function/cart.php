<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$id = $data['id'];
$name = $data['name'];
$price = $data['price'];

$item = [
    'id' => $id,
    'name' => $name,
    'price' => $price,
    'quantity' => 1
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += 1;
} else {
    $_SESSION['cart'][$id] = $item;
}

echo json_encode(['success' => true, 'message' => 'Item added']);
