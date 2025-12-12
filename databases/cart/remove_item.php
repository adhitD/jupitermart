<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user_id'])) {
    echo "Anda tidak memiliki akses.";
    exit;
}

$user_id = $_SESSION['user_id'];
$item_id = $_POST['item_id'];

// Cek apakah item ini benar punya user terkait cart-nya
$check = $conn->query("
    SELECT ci.id
    FROM cart_items ci
    JOIN carts c ON c.id = ci.cart_id
    WHERE ci.id = $item_id AND c.user_id = $user_id
    LIMIT 1
");

if ($check->num_rows == 0) {
    echo "Item tidak ditemukan atau tidak sesuai user.";
    exit;
}

// Hapus item
$conn->query("DELETE FROM cart_items WHERE id = $item_id");

// Jika cart kosong setelah dihapus → optional: hapus cart
$checkCart = $conn->query("
    SELECT ci.id 
    FROM cart_items ci
    JOIN carts c ON ci.cart_id = c.id
    WHERE c.user_id = $user_id
");

if ($checkCart->num_rows == 0) {
    $conn->query("DELETE FROM carts WHERE user_id = $user_id");
}

header("Location: ../user/cart.php");
exit;
