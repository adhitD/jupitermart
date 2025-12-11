<?php include 'layouts/header.php'; ?>
<?php include 'layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-title">Kelola User</div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Admin Utama</td>
          <td>admin@abdimart.com</td>
          <td>Admin</td>
          <td><span class="badge badge-success">Aktif</span></td>
        </tr>

        <tr>
          <td>Muhammad F.</td>
          <td>user@gmail.com</td>
          <td>Pelanggan</td>
          <td><span class="badge badge-success">Aktif</span></td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<?php include 'layouts/footer.php'; ?>