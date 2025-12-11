<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $brand_id = $_POST['brand_id'] ?: NULL;
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  // --- Handle Upload Gambar Produk ---
  $image_name = NULL;
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

    $uploadDir = '../../admin/assets/image/produk/';
    // buat folder jika belum ada
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    $fileTmp = $_FILES['image']['tmp_name'];
    $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $image_name = uniqid('produk_') . '.' . $fileExt;
    $fileDest = $uploadDir . $image_name;

    if (!move_uploaded_file($fileTmp, $fileDest)) {
      echo "<script>
                    alert('Gagal mengupload gambar produk!');
                    window.location.href='../../admin/produk/create.php';
                  </script>";
      exit;
    }
  }

  // --- Insert ke database ---
  $sql = "INSERT INTO products (brand_id, category_id, name, description, price, stock, image, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iissdis", $brand_id, $category_id, $name, $description, $price, $stock, $image_name);

  if ($stmt->execute()) {
    echo "<script>
                alert('Produk berhasil ditambahkan!');
                window.location.href='../../admin/produk/index.php';
              </script>";
  } else {
    echo "<script>
                alert('Gagal menambahkan produk!');
                window.location.href='../../admin/produk/create.php';
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  header("Location: ../../admin/produk/create.php");
  exit;
}
