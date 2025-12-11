<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php';

// Ambil ID kategori dari query string
if (!isset($_GET['id'])) {
  echo "<script>
            alert('ID kategori tidak ditemukan!');
            window.location.href='index.php';
          </script>";
  exit;
}

$id = $_GET['id'];

// Ambil data kategori dari database
$sql = "SELECT * FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
  echo "<script>
            alert('Kategori tidak ditemukan!');
            window.location.href='index.php';
          </script>";
  exit;
}

$kategori = $result->fetch_assoc();
$stmt->close();
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Edit Kategori</div>
  </div>

  <div class="card">
    <form action="../../databases/kategori/prosesUpdate.php" method="POST">
      <input type="hidden" name="id" value="<?= $kategori['id']; ?>">

      <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" value="<?= htmlspecialchars($kategori['name']); ?>" required>
      </div>

      <button type="submit" class="btn btn-warning">Update Kategori</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>