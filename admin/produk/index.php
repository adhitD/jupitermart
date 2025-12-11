<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php'; // koneksi database
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Data Produk</div>
    <a href="create.php" class="btn btn-primary">+ Tambah Produk</a>
  </div>

  <div class="card ">
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          // Query ambil produk beserta nama kategori
          $sql = "SELECT p.*, c.name AS category_name 
                  FROM products p
                  JOIN categories c ON p.category_id = c.id
                  ORDER BY p.id DESC";
          $result = $conn->query($sql);
          $no = 1;

          if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
          ?>
              <tr>
                <td><?= $no++; ?></td>
                <td data-label="Nama Produk"><?= $row['name']; ?></td>
                <td data-label="Kategori"><?= $row['category_name']; ?></td>
                <td data-label="Harga">Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                <td data-label="Stok"><?= $row['stock']; ?></td>
                <td data-label="Status">
                  <?php if ($row['stock'] > 0): ?>
                    <span class="badge badge-success">Aktif</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Habis</span>
                  <?php endif; ?>
                </td>
                <td data-label="Aksi">
                  <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                  <a href="../../databases/produk/prosesDelete.php?id=<?= $row['id']; ?>"
                    class="btn btn-danger"
                    onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</a>
                </td>
              </tr>
            <?php
            endwhile;
          else:
            ?>
            <tr>
              <td colspan="7" style="text-align:center;">Belum ada data produk</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>