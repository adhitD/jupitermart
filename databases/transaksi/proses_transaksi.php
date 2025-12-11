<?php
require_once __DIR__.'/../koneksi.php';


$query = $conn->query("
    SELECT 
        o.id AS order_id,
        u.name AS pelanggan,
        SUM(oi.qty * oi.harga) AS total,
        o.status,
        o.created_at
    FROM orders o
    JOIN users u ON o.user_id = u.id
    JOIN order_items oi ON oi.order_id = o.id
    GROUP BY o.id
    ORDER BY o.id DESC
");

$orders = $query->fetch_all(MYSQLI_ASSOC);
?>



