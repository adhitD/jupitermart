<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

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
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td data-label="Nama Produk">Beras Premium 5kg</td>
            <td data-label="Kategori">Sembako</td>
            <td data-label="Harga">Rp 68.000</td>
            <td data-label="Stok">120</td>
            <td data-label="Status"><span class="badge badge-success">Aktif</span></td>
            <td data-label="Aksi">
              <button class="btn btn-warning">Edit</button>
              <button class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        </tbody>

      </table>
    </div>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>