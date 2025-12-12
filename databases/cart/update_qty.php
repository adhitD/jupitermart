<?php
include "../koneksi.php";

$id = $_POST['id'];
$action = $_POST['action'];

$item = $conn->query("SELECT qty FROM cart_items WHERE id = $id")->fetch_assoc();
$qty = $item['qty'];

if ($action == 'plus') {
    $qty++;
} else if ($action == 'minus' && $qty > 1) {
    $qty--;
}

$conn->query("UPDATE cart_items SET qty = $qty WHERE id = $id");

echo "OK";
