<?php
include '../koneksi.php';

// Cek apakah request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $is_official = isset($_POST['is_official']) ? 1 : 0;

  // --- Ambil logo lama dari database ---
  $stmt = $conn->prepare("SELECT logo FROM brands WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $brand = $result->fetch_assoc();
  $oldLogo = $brand['logo'];
  $stmt->close();

  // --- Handle Upload Logo Baru ---
  $logo_name = $oldLogo; // default tetap logo lama
  if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
    $uploadDir = '../../admin/assets/image/brand/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    $fileTmp = $_FILES['logo']['tmp_name'];
    $fileExt = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $logo_name = uniqid('brand_') . '.' . $fileExt;
    $fileDest = $uploadDir . $logo_name;

    if (!move_uploaded_file($fileTmp, $fileDest)) {
      echo "<script>
                    alert('Gagal mengupload logo baru!');
                    window.location.href='../../admin/brand/edit.php?id=$id';
                  </script>";
      exit;
    }

    // Hapus file logo lama jika ada
    if ($oldLogo && file_exists($uploadDir . $oldLogo)) {
      unlink($uploadDir . $oldLogo);
    }
  }

  // --- Update data ke database ---
  $sql = "UPDATE brands SET name = ?, description = ?, logo = ?, is_official = ?, updated_at = NOW() WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssii", $name, $description, $logo_name, $is_official, $id);

  if ($stmt->execute()) {
    echo "<script>
                alert('Brand berhasil diupdate!');
                window.location.href='../../admin/brand/index.php';
              </script>";
  } else {
    echo "<script>
                alert('Gagal mengupdate brand!');
                window.location.href='../../admin/brand/edit.php?id=$id';
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  // jika akses langsung
  header("Location: index.php");
  exit;
}
