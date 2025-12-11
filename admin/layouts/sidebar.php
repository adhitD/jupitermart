<?php
if (!defined('BASE_URL')) {
  define('BASE_URL', '/jupitermart/admin/');
}

$current_folder = basename(dirname($_SERVER['PHP_SELF']));
$current_file = basename($_SERVER['PHP_SELF']);

// Path relatif dari root
$current_path = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['PHP_SELF']), '/');
$admin_root = trim(BASE_URL, '/');

$menu_items = [
  'Dashboard' => ['link' => BASE_URL . 'index.php', 'type' => 'file', 'name' => 'index.php'],
  'Data Brand' => ['link' => BASE_URL . 'brand/', 'type' => 'folder', 'name' => 'brand'],
  'Data Kategori' => ['link' => BASE_URL . 'kategori/', 'type' => 'folder', 'name' => 'kategori'],
  'Data Produk' => ['link' => BASE_URL . 'produk/', 'type' => 'folder', 'name' => 'produk'],
  'Transaksi' => ['link' => BASE_URL . 'transaksi/', 'type' => 'folder', 'name' => 'transaksi'],
  'Banner & Promo' => ['link' => BASE_URL . 'promo/', 'type' => 'folder', 'name' => 'promo'],
  'Pengaturan' => ['link' => BASE_URL . 'pengaturan/', 'type' => 'folder', 'name' => 'pengaturan'],
];
?>

<div class="sidebar">
  <ul>
    <?php foreach ($menu_items as $label => $item): ?>
      <?php
      $is_active = false;
      if ($item['type'] == 'file') {
        // hanya aktif jika file ada di root admin
        if ($current_file == $item['name'] && dirname($current_path) == $admin_root) {
          $is_active = true;
        }
      } elseif ($item['type'] == 'folder') {
        if ($current_folder == $item['name']) {
          $is_active = true;
        }
      }
      ?>
      <li class="<?= $is_active ? 'active' : '' ?>">
        <a href="<?= $item['link'] ?>"><?= $label ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>