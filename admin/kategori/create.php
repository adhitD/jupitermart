<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Tambah Kategori</div>
  </div>

  <div class="card">
    <form action="store.php" method="POST">
      <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Kategori</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>