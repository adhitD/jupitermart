<?php session_start();
require '../../databases/koneksi.php';

// Ambil user yang sedang login
$user_id = $_SESSION['user_id'];

// Ambil order aktif milik user
$query = $conn->query("
    SELECT 
        oi.qty,
        (oi.qty * p.price) AS subtotal,
        p.name AS product_name,
        p.price,
        p.image,
        c.name AS category_name,
        o.id AS order_id
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.id
    JOIN products p ON oi.product_id = p.id
    JOIN categories c ON p.category_id = c.id
    WHERE o.user_id = '$user_id'
    ORDER BY oi.id DESC
");

$items = $query->fetch_all(MYSQLI_ASSOC);

// Hitung total
$total = 0;
foreach ($items as $item) {
    $total += $item['subtotal'];
}
?>