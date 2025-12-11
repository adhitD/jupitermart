<?php include '../layouts/header.php'; ?>
<?php include '../layouts/sidebar.php'; ?>
<?php include '../../databases/koneksi.php'; ?>


<div class="main">
  <div class="page-header">
    <div class="page-title">Data Kategori</div>
    <a href="create.php" class="btn btn-primary">+ Tambah Kategori</a>
  </div>

  <div class="card table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Kategori</th>
          <th>Created At</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        // Query ambil semua kategori
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $result = $conn->query($sql);
        $no = 1;

        if ($result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
        ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['created_at']; ?></td>
              <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="../../databases/kategori/ProsesDelete.php?id=<?= $row['id']; ?>"
                  class="btn btn-danger"
                  onclick="return confirm('Yakin ingin hapus kategori ini?')">
                  Hapus
                </a>

              </td>
            </tr>
          <?php
          endwhile;
        else:
          ?>
          <tr>
            <td colspan="5" style="text-align:center;">Belum ada data kategori</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../layouts/footer.php'; ?>