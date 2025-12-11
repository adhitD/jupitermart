<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php';

// Ambil id dari URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

// Ambil data produk berdasarkan id
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  echo "<script>alert('Produk tidak ditemukan!'); window.location.href='index.php';</script>";
  exit;
}

$product = $result->fetch_assoc();
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Edit Produk</div>
  </div>

  <div class="card">
    <form action="../../databases/produk/prosesUpdate.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $product['id']; ?>">

      <div class="form-group">
        <label for="brand_id">Brand</label>
        <select id="brand_id" name="brand_id">
          <option value="">-- Pilih Brand --</option>
          <?php
          $brands = $conn->query("SELECT id, name FROM brands ORDER BY name ASC");
          while ($brand = $brands->fetch_assoc()):
          ?>
            <option value="<?= $brand['id']; ?>" <?= $brand['id'] == $product['brand_id'] ? 'selected' : ''; ?>>
              <?= $brand['name']; ?>
            </option>
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
            <option value="<?= $cat['id']; ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : ''; ?>>
              <?= $cat['name']; ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama produk" value="<?= htmlspecialchars($product['name']); ?>" required>
      </div>

      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" placeholder="Masukkan deskripsi produk"><?= htmlspecialchars($product['description']); ?></textarea>
      </div>

      <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" id="price" name="price" placeholder="Masukkan harga" value="<?= $product['price']; ?>" required step="0.01">
      </div>

      <div class="form-group">
        <label for="stock">Stok</label>
        <input type="number" id="stock" name="stock" placeholder="Masukkan stok" value="<?= $product['stock']; ?>" required>
      </div>

      <div class="form-group">
        <label for="image">Gambar Produk</label>
        <?php if (!empty($product['image'])): ?>
          <div style="margin-bottom:8px;">
            <img src="../../admin/assets/image/produk/<?= $product['image']; ?>" alt="Gambar Produk" width="100">
          </div>
        <?php endif; ?>
        <input type="file" id="image" name="image" accept="image/*">
        <small>Kosongkan jika tidak ingin mengganti gambar</small>
      </div>

      <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>