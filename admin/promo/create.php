<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Tambah Banner & Promo</div>
  </div>

  <div class="card">
    <form action="store.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nama_banner">Nama Banner</label>
        <input type="text" id="nama_banner" name="nama_banner" placeholder="Masukkan nama banner" required>
      </div>

      <div class="form-group">
        <label for="tipe">Tipe</label>
        <select id="tipe" name="tipe" required>
          <option value="">-- Pilih Tipe Banner --</option>
          <option value="home_banner">Home Banner</option>
          <option value="promo">Promo</option>
        </select>
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" required>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="gambar">Gambar Banner</label>
        <input type="file" id="gambar" name="gambar" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Banner</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>