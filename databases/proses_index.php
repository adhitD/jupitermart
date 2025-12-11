<?php 
// TOTAL PRODUK
$query1 = $conn->query("SELECT COUNT(*) AS total FROM products");
$result1 = $query1->fetch_assoc();
$total_produk = $result1['total'];

// TOTAL ORDER
$query2 = $conn->query("SELECT COUNT(*) AS total FROM orders");
$result2 = $query2->fetch_assoc();
$total_order = $result2['total'];

// TOTAL USER TERDAFTAR
$query3 = $conn->query("SELECT COUNT(*) AS total FROM users");
$result3 = $query3->fetch_assoc();
$total_users = $result3['total'];

// TOTAL PENDAPATAN BULAN INI
$bulan_ini = date('Y-m');

$query4 = $conn->query("
    SELECT SUM(total_amount) AS pendapatan 
    FROM orders 
    WHERE DATE_FORMAT(created_at, '%Y-%m') = '$bulan_ini'
");

$result4 = $query4->fetch_assoc();
$pendapatan_bulan_ini = $result4['pendapatan'] ?? 0;
?>