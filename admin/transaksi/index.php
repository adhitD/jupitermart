<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<div class="main">
  <div class="page-title">Transaksi</div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>ID Order</th>
          <th>Pelanggan</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>#TRX11230</td>
          <td>Ahmad F.</td>
          <td>Rp 240.000</td>
          <td><span class="badge badge-success">Selesai</span></td>
          <td>10 Des 2025</td>
        </tr>

        <tr>
          <td>#TRX11231</td>
          <td>Siti A.</td>
          <td>Rp 89.000</td>
          <td><span class="badge badge-warning">Diproses</span></td>
          <td>11 Des 2025</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>