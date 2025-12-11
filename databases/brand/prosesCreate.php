<?php
include '../koneksi.php';

// Cek apakah request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $description = $_POST['description'];
  $is_official = isset($_POST['is_official']) ? 1 : 0;

  // --- Handle Upload Logo ---
  $logo_name = NULL; // default jika tidak ada file
  if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
    $uploadDir = '../../admin/assets/image/brand/';
    // Buat folder jika belum ada
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    $fileTmp = $_FILES['logo']['tmp_name'];
    $fileExt = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $logo_name = uniqid('brand_') . '.' . $fileExt;
    $fileDest = $uploadDir . $logo_name;

    // Pindahkan file ke folder uploads
    if (!move_uploaded_file($fileTmp, $fileDest)) {
      echo "<script>
                alert('Gagal mengupload logo!');
                window.location.href='../../admin/brand/create.php';
            </script>";
      exit;
    }
  }

  // --- Insert ke database ---
  $sql = "INSERT INTO brands (name, description, logo, is_official, created_at) VALUES (?, ?, ?, ?, NOW())";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssi", $name, $description, $logo_name, $is_official);

  if ($stmt->execute()) {
    echo "<script>
            alert('Brand berhasil ditambahkan!');
            window.location.href='../../admin/brand/index.php';
        </script>";
  } else {
    echo "<script>
            alert('Gagal menambahkan brand!');
            window.location.href='../../admin/brand/create.php';
        </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  // jika akses langsung
  header("Location: create.php");
  exit;
}
