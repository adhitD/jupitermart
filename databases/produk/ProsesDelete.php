<?php
include '../koneksi.php';

// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Ambil data produk untuk mengetahui nama gambar
  $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $image = $product['image'];

    // Hapus file gambar jika ada
    if (!empty($image) && file_exists("../../admin/assets/image/produk/" . $image)) {
      unlink("../../admin/assets/image/produk/" . $image);
    }

    // Hapus data produk dari database
    $delete = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete->bind_param("i", $id);
    if ($delete->execute()) {
      echo "<script>
                    alert('Produk berhasil dihapus!');
                    window.location.href='../../admin/produk/index.php';
                  </script>";
    } else {
      echo "<script>
                    alert('Gagal menghapus produk!');
                    window.history.back();
                  </script>";
    }
    $delete->close();
  } else {
    echo "<script>
                alert('Produk tidak ditemukan!');
                window.location.href='../../admin/produk/index.php';
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  header("Location: ../../admin/produk/index.php");
  exit;
}
