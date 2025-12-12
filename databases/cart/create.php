<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login untuk menambah produk ke keranjang!";
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// 1. Cek apakah user sudah punya cart
$query = $conn->query("SELECT id FROM carts WHERE user_id = '$user_id' LIMIT 1");

if ($query->num_rows > 0) {
    $cart = $query->fetch_assoc();
    $cart_id = $cart['id'];
} else {
    // jika belum ada cart → buat baru
    $conn->query("INSERT INTO carts (user_id, created_at) VALUES ('$user_id', NOW())");
    $cart_id = $conn->insert_id;
}

// 2. Ambil harga produk (price_at_time disimpan supaya harga tidak berubah)
$prod = $conn->query("SELECT price FROM products WHERE id = '$product_id'");
$product = $prod->fetch_assoc();
$price = $product['price'];

// 3. Cek apakah produk sudah ada di cart_items
$item = $conn->query("
    SELECT id, qty 
    FROM cart_items 
    WHERE cart_id = '$cart_id' AND product_id = '$product_id' 
    LIMIT 1
");

if ($item->num_rows > 0) {
    // Jika sudah ada → qty + 1
    $row = $item->fetch_assoc();
    $newQty = $row['qty'] + 1;

    $conn->query("
        UPDATE cart_items 
        SET qty = '$newQty', updated_at = NOW()
        WHERE id = '{$row['id']}'
    ");

    echo "Jumlah produk diperbarui!";
} else {
    // Jika belum ada → tambah item baru
    $conn->query("
        INSERT INTO cart_items (cart_id, product_id, qty, price_at_time, created_at)
        VALUES ('$cart_id', '$product_id', 1, '$price', NOW())
    ");

    echo "Produk ditambahkan ke keranjang!";
}
