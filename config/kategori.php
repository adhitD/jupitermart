<?php
require_once '../koneksi.php';

// Ambil semua kategori
$query = $conn->query("SELECT id, nama_kategori FROM categories ORDER BY nama_kategori ASC");
$categories = $query->fetch_all(MYSQLI_ASSOC);
?>
