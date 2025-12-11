<?php 
include '../layouts/header.php'; 
    include '../layouts/sidebar.php';
    include '../../databases/koneksi.php';


$query = $conn->query("
    SELECT 
        o.id AS order_id,
        u.name AS pelanggan,
        SUM(oi.qty * oi.price) AS total,
        o.status,
        o.created_at
    FROM orders o
    JOIN users u ON o.user_id = u.id
    JOIN order_items oi ON oi.order_id = o.id
    GROUP BY o.id
    ORDER BY o.id DESC
");

$orders = $query->fetch_all(MYSQLI_ASSOC);
?>



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
       <?php 
       if($orders < 0):
       while ($orders ): ?>
    <tr>
        <td><?= $orders['order_id'] ?></td>
        <td><?= htmlspecialchars($orders['pelanggan']) ?></td>
        <td>Rp <?= number_format($orders['total'], 0, ',', '.') ?></td>
        <td><?= ucfirst($orders['status']) ?></td>
        <td><?= date('d M Y H:i', strtotime($orders['created_at'])) ?></td>
    </tr>
    <?php endwhile;
    
    else :?>
     <tr>
        <td colspan="7" style="text-align:center;">Belum ada data Transaksi</td>
      </tr>
      <?php endif ?>  
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>