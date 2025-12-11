<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-title">Pengaturan</div>

  <div class="card">
    <form>
      <div class="form-group">
        <label>Nama Marketplace</label>
        <input type="text" value="AbdiMart">
      </div>

      <div class="form-group">
        <label>Email Admin</label>
        <input type="email" value="admin@abdimart.com">
      </div>

      <div class="form-group">
        <label>Zona Waktu</label>
        <select>
          <option>WIB</option>
          <option>WITA</option>
          <option>WIT</option>
        </select>
      </div>

      <button class="btn btn-primary">Simpan Pengaturan</button>
    </form>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>