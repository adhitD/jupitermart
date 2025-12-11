<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Banner & Promo</div>
    <a href="create.php" class="btn btn-primary">+ Tambah Banner</a>
  </div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>Nama Banner</th>
          <th>Tipe</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Flash Sale 12.12</td>
          <td>Promo</td>
          <td><span class="badge badge-success">Aktif</span></td>
        </tr>

        <tr>
          <td>Diskon Elektronik</td>
          <td>Home Banner</td>
          <td><span class="badge badge-danger">Nonaktif</span></td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>