<?php
session_start();
include "../databases/koneksi.php";

if (!isset($_SESSION['user_id'])) {
    echo "Silakan login untuk membuka keranjang.";
    exit;
}

$user_id = $_SESSION['user_id'];

// 1. Ambil cart user
$cart = $conn->query("SELECT id FROM carts WHERE user_id = $user_id LIMIT 1");
if ($cart->num_rows == 0) {
    $cart_id = null;
} else {
    $cart_id = $cart->fetch_assoc()['id'];
}

// Jika keranjang kosong
if (!$cart_id) {
    $items = [];
} else {

    // 2. Ambil item berdasarkan cart_id
    $query = $conn->query("
        SELECT 
            ci.id AS cart_item_id,
            ci.qty,
            ci.price_at_time,

            p.id AS product_id,
            p.name AS product_name,
            p.image,

            (ci.qty * ci.price_at_time) AS subtotal

        FROM cart_items ci
        JOIN products p ON p.id = ci.product_id
        WHERE ci.cart_id = $cart_id
        ORDER BY ci.id DESC
    ");

    $items = $query->fetch_all(MYSQLI_ASSOC);
}

// Hitung total
$total = 0;
foreach ($items as $i) {
    $total += $i['subtotal'];
}

// Ongkir 1%
$ongkir = $total * 0.01;

// Total bayar
$grand_total = $total + $ongkir;
?>
