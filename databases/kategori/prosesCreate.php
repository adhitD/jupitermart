<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nama_kategori = $_POST['nama_kategori'];

  function slugify($text)
  {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
    $text = trim($text, '-');
    return $text;
  }

  $slug = slugify($nama_kategori);

  // ==== CEK DUPLIKAT ====
  $check = $conn->prepare("SELECT id FROM categories WHERE name = ?");
  $check->bind_param("s", $nama_kategori);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    // kategori sudah ada
    echo "<script>
            alert('Kategori sudah ada! Silakan gunakan nama lain.');
            window.location.href='../../admin/kategori/create.php';
          </script>";
    exit;
  }

  // ==== INSERT DATA ====
  $sql = "INSERT INTO categories (name, slug, created_at) VALUES (?, ?, NOW())";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $nama_kategori, $slug);

  if ($stmt->execute()) {
    echo "<script>
            alert('Kategori berhasil ditambahkan!');
            window.location.href='../../admin/kategori/index.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal menambahkan kategori!');
            window.location.href='../../admin/kategori/create.php';
          </script>";
  }

  $stmt->close();
  $conn->close();
}
