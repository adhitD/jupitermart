<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Tambah Produk</div>
  </div>

  <div class="card">
    <form action="store.php" method="POST">
      <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk" required>
      </div>

      <div class="form-group">
        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="sembako">Sembako</option>
          <option value="minuman">Minuman</option>
          <option value="snack">Snack</option>
          <!-- Bisa ambil dari database juga -->
        </select>
      </div>

      <div class="form-group">
        <label for="harga">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" placeholder="Masukkan harga produk" required>
      </div>

      <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" placeholder="Masukkan jumlah stok" required>
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" required>
          <option value="aktif">Aktif</option>
          <option value="tidak_aktif">Tidak Aktif</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Produk</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>