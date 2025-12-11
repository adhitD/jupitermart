<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Tambah Brand</div>
  </div>

  <div class="card">
    <form action="../../databases/brand/prosesCreate.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="name">Nama Brand</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama brand" required>
      </div>

      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" placeholder="Masukkan deskripsi brand"></textarea>
      </div>

      <div class="form-group">
        <label for="logo">Logo Brand</label>
        <input type="file" id="logo" name="logo" accept="image/*">
      </div>

      <div class="form-group">
        <label for="is_official">Brand Resmi?</label>
        <select id="is_official" name="is_official">
          <option value="0">Tidak</option>
          <option value="1">Ya</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Brand</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>