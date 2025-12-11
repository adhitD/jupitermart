<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>

<?php include '../../databases/transaksi/proses_transaksi.php'; ?>

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
       <?php foreach ($orders as $row): ?>
    <tr>
        <td><?= $row['order_id'] ?></td>
        <td><?= htmlspecialchars($row['pelanggan']) ?></td>
        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
        <td><?= ucfirst($row['status']) ?></td>
        <td><?= date('d M Y H:i', strtotime($row['created_at'])) ?></td>
    </tr>
    <?php endforeach; ?>
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