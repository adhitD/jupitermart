<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user_id'])) {
    echo "Silakan login untuk menambah ke keranjang.";
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// 1. Cek apakah product ada di Flash Sale
$fs = $conn->query("
    SELECT fs.discount_percent, p.price 
    FROM flash_sales fs
    JOIN products p ON p.id = fs.product_id
    WHERE fs.product_id = $product_id
    LIMIT 1
");

if ($fs->num_rows === 0) {
    echo "Produk tidak terdaftar dalam Flash Sale.";
    exit;
}

$data = $fs->fetch_assoc();
$price = $data['price'];
$diskon = $data['discount_percent'];

// Harga setelah diskon
$finalPrice = $price - ($price * ($diskon / 100));


// 2. Cek cart user
$checkCart = $conn->query("SELECT id FROM carts WHERE user_id = $user_id LIMIT 1");

if ($checkCart->num_rows > 0) {
    $cart_id = $checkCart->fetch_assoc()['id'];
} else {
    // Buat cart baru
    $conn->query("INSERT INTO cart (user_id, created_at) VALUES ($user_id, NOW())");
    $cart_id = $conn->insert_id;
}


// 3. Cek apakah produk sudah ada dalam cart_items
$itemCheck = $conn->query("
    SELECT id, qty 
    FROM cart_items 
    WHERE cart_id = $cart_id AND product_id = $product_id
    LIMIT 1
");

if ($itemCheck->num_rows > 0) {
    // Jika ada → qty + 1
    $item = $itemCheck->fetch_assoc();
    $newQty = $item['qty'] + 1;

    $conn->query("
        UPDATE cart_items
        SET qty = $newQty, updated_at = NOW()
        WHERE id = {$item['id']}
    ");

    echo "Jumlah produk flash sale ditambah!";
} else {
    // Jika belum ada → insert harga diskon sebagai price_at_time
    $conn->query("
        INSERT INTO cart_items (cart_id, product_id, qty, price_at_time, created_at)
        VALUES ($cart_id, $product_id, 1, $finalPrice, NOW())
    ");

    echo "Produk flash sale ditambahkan ke keranjang!";
}
