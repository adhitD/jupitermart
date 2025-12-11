<?php
include '../koneksi.php'; // sesuaikan path kamu

// Pastikan ada parameter id
if (!isset($_GET['id'])) {
  echo "<script>
            alert('ID kategori tidak ditemukan!');
            window.location.href='../../admin/kategori/index.php';
          </script>";
  exit;
}

$id = $_GET['id'];

// Prepared statement untuk keamanan
$sql = "DELETE FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location.href='../../admin/kategori/index.php';
          </script>";
} else {
  echo "<script>
            alert('Gagal menghapus kategori!');
            window.location.href='../../admin/kategori/index.php';
          </script>";
}

$stmt->close();
$conn->close();
