<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id'];
  $brand_id = $_POST['brand_id'] ?: NULL;
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  // Ambil data produk lama
  $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();
  $old_image = $product['image'];
  $stmt->close();

  // --- Proses Upload Gambar Baru ---
  $new_image = $old_image; // default pakai gambar lama
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

    $uploadDir = "../../admin/assets/image/produk/";
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $new_image = "produk_" . uniqid() . "." . $ext;
    $upload_path = $uploadDir . $new_image;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
      // Hapus gambar lama jika ada
      if (!empty($old_image) && file_exists($uploadDir . $old_image)) {
        unlink($uploadDir . $old_image);
      }
    } else {
      echo "<script>alert('Gagal upload gambar!'); window.history.back();</script>";
      exit;
    }
  }

  // --- Update Produk ---
  $sql = "UPDATE products 
            SET brand_id = ?, category_id = ?, name = ?, description = ?, price = ?, stock = ?, image = ?, updated_at = NOW() 
            WHERE id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iissdssi", $brand_id, $category_id, $name, $description, $price, $stock, $new_image, $id);

  if ($stmt->execute()) {
    echo "<script>
                alert('Produk berhasil diupdate!');
                window.location.href='../../admin/produk/index.php';
              </script>";
  } else {
    echo "<script>
                alert('Gagal mengupdate produk!');
                window.history.back();
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  header("Location: index.php");
  exit;
}
