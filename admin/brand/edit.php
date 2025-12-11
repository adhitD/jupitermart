<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  echo "<script>alert('ID brand tidak ditemukan');window.location='index.php';</script>";
  exit;
}

$id = $_GET['id'];

// Ambil data brand dari database
$sql = "SELECT * FROM brands WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  echo "<script>alert('Data brand tidak ditemukan');window.location='index.php';</script>";
  exit;
}

$brand = $result->fetch_assoc();
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Edit Brand</div>
  </div>

  <div class="card">
    <form action="../../databases/brand/prosesUpdate.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $brand['id']; ?>">

      <div class="form-group">
        <label for="name">Nama Brand</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($brand['name']); ?>" required>
      </div>

      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" placeholder="Masukkan deskripsi brand"><?= htmlspecialchars($brand['description']); ?></textarea>
      </div>

      <div class="form-group">
        <label for="logo">Logo Brand</label>
        <?php if ($brand['logo']): ?>
          <div style="margin-bottom:8px;">
            <img src="../../admin/assets/image/brand/<?= $brand['logo']; ?>" alt="<?= htmlspecialchars($brand['name']); ?>" width="100">
          </div>
        <?php endif; ?>
        <input type="file" id="logo" name="logo" accept="image/*">
        <small>Kosongkan jika tidak ingin mengganti logo</small>
      </div>

      <div class="form-group">
        <label for="is_official">Brand Resmi?</label>
        <select id="is_official" name="is_official">
          <option value="0" <?= $brand['is_official'] == 0 ? 'selected' : ''; ?>>Tidak</option>
          <option value="1" <?= $brand['is_official'] == 1 ? 'selected' : ''; ?>>Ya</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>