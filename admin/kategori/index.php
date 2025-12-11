<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Data Kategori</div>
    <a href="create.php" class="btn btn-primary">+ Tambah Kategori</a>
  </div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>Nama Kategori</th>
          <th>Created At</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Sembako</td>
          <td>2025-10-6</td>
          <td>
            <button class="btn btn-warning">Edit</button>
            <button class="btn btn-danger">Hapus</button>
          </td>
        </tr>

        <tr>
          <td>Elektronik</td>
          <td>85</td>
          <td>
            <button class="btn btn-warning">Edit</button>
            <button class="btn btn-danger">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>