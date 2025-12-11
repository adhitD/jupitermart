<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php';
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Tambah Produk</div>
  </div>

  <div class="card">
    <form action="../../databases/produk/prosesCreate.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="brand_id">Brand</label>
        <select id="brand_id" name="brand_id">
          <option value="">-- Pilih Brand --</option>
          <?php
          $brands = $conn->query("SELECT id, name FROM brands ORDER BY name ASC");
          while ($brand = $brands->fetch_assoc()):
          ?>
            <option value="<?= $brand['id']; ?>"><?= $brand['name']; ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" required>
          <option value="">-- Pilih Kategori --</option>
          <?php
          $categories = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
          while ($cat = $categories->fetch_assoc()):
          ?>
            <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama produk" required>
      </div>

      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" placeholder="Masukkan deskripsi produk"></textarea>
      </div>

      <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" id="price" name="price" placeholder="Masukkan harga" required step="0.01">
      </div>

      <div class="form-group">
        <label for="stock">Stok</label>
        <input type="number" id="stock" name="stock" placeholder="Masukkan stok" required>
      </div>

      <div class="form-group">
        <label for="image">Gambar Produk</label>
        <input type="file" id="image" name="image" accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary">Simpan Produk</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>