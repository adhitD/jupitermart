<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
include '../databases/koneksi.php'; // pastikan koneksi ke database
?>

<div class="main">
  <div class="page-title">Dashboard</div>

  <div class="cards">
    <div class="card">
      <h4>Total Produk</h4>
      <div class="value">
        <?php
        $result = $conn->query("SELECT COUNT(*) AS total FROM products");
        $row = $result->fetch_assoc();
        echo $row['total'];
        ?>
      </div>
    </div>

    <div class="card">
      <h4>Total Order</h4>
      <div class="value">857</div>
    </div>

    <div class="card">
      <h4>Pengguna Terdaftar</h4>
      <div class="value">4.932</div>
    </div>

    <div class="card">
      <h4>Pendapatan Bulan Ini</h4>
      <div class="value">Rp 78.2Jt</div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php'; ?>