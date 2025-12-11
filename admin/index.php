
<?php include 'layouts/header.php'; ?>
<?php include 'layouts/sidebar.php'; ?>
<?php include '../databases/koneksi.php'; ?>
<?php include '../databases/proses_index.php'; ?>


<div class="main">
  <div class="page-title">Dashboard</div>

  <div class="cards">

    <div class="card">
      <h4>Total Produk</h4>
      <div class="value">
       <?=$total_produk?>
      </div>
    </div>

    <div class="card">
      <h4>Total Order</h4>
      <div class="value"><?= $total_order ?></div>
    </div>

    <div class="card">
      <h4>Pengguna Terdaftar</h4>
      <div class="value"><?= $total_users ?></div>
    </div>

    <div class="card">
      <h4>Pendapatan Bulan Ini</h4>
      <div class="value">Rp <?= number_format($pendapatan_bulan_ini, 0, ',', '.') ?></div>
    </div>

  </div>
</div>

<?php include 'layouts/footer.php'; ?>