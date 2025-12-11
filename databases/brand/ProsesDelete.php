<?php
include '../koneksi.php';

// Cek apakah ada parameter id
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // --- Ambil nama file logo dari database ---
  $stmt = $conn->prepare("SELECT logo FROM brands WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $brand = $result->fetch_assoc();
  $logo = $brand['logo'];
  $stmt->close();

  // --- Hapus data brand dari database ---
  $stmt = $conn->prepare("DELETE FROM brands WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    // Hapus file logo jika ada
    if ($logo) {
      $filePath = '../../admin/assets/image/brand/' . $logo;
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    echo "<script>
                alert('Brand berhasil dihapus!');
                window.location.href='../../admin/brand/index.php';
              </script>";
  } else {
    echo "<script>
                alert('Gagal menghapus brand!');
                window.location.href='../../admin/brand/index.php';
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  // jika id tidak diberikan
  header("Location: index.php");
  exit;
}
