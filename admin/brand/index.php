<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../../databases/koneksi.php';
?>

<div class="main">
  <div class="page-header">
    <div class="page-title">Data Brand</div>
    <a href="create.php" class="btn btn-primary">+ Tambah Brand</a>
  </div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Brand</th>
          <th>Deskripsi</th>
          <th>Logo</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        // Ambil semua brand dari database
        $sql = "SELECT * FROM brands ORDER BY id DESC";
        $result = $conn->query($sql);
        $no = 1;

        if ($result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
        ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['description']; ?></td>
              <td>
                <?php if ($row['logo']): ?>
                  <img src="../../admin/assets/image/brand/<?= $row['logo']; ?>" alt="<?= $row['name']; ?>" width="60">
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
              <td>
                <?= $row['is_official'] ? '<span class="badge badge-success">Official</span>' : '<span class="badge badge-warning">Non-Official</span>'; ?>
              </td>
              <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="../../databases/brand/prosesDelete.php?id=<?= $row['id']; ?>"
                  class="btn btn-danger"
                  onclick="return confirm('Yakin ingin hapus brand ini?')">
                  Hapus
                </a>
              </td>
            </tr>
          <?php
          endwhile;
        else:
          ?>
          <tr>
            <td colspan="6" style="text-align:center;">Belum ada data brand</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>