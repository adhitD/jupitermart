<?php
include '../koneksi.php';

// Pastikan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['id'];
  $nama_kategori = $_POST['nama_kategori'];

  // --- Generate slug ---
  function slugify($text)
  {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
    $text = trim($text, '-');
    return $text;
  }

  $slug = slugify($nama_kategori);

  // --- Cek apakah nama kategori sudah ada (kecuali kategori ini sendiri) ---
  $check = $conn->prepare("SELECT id FROM categories WHERE name = ? AND id != ?");
  $check->bind_param("si", $nama_kategori, $id);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    echo "<script>
                alert('Nama kategori sudah digunakan!');
                window.location.href='../../admin/kategori/edit.php?id={$id}';
              </script>";
    exit;
  }

  // --- Update kategori ---
  $sql = "UPDATE categories SET name = ?, slug = ?, updated_at = NOW() WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $nama_kategori, $slug, $id);

  if ($stmt->execute()) {
    echo "<script>
                alert('Kategori berhasil diupdate!');
                window.location.href='../../admin/kategori/index.php';
              </script>";
  } else {
    echo "<script>
                alert('Gagal mengupdate kategori!');
                window.location.href='../../admin/kategori/edit.php?id={$id}';
              </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  header("Location: ../../admin/kategori/index.php");
  exit;
}
