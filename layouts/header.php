<?php
// Pastikan session aktif
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<header class="site-header">
  <div class="top-bar container">

    <!-- LOGO -->
    <div class="logo">Skin<span>Mart</span></div>

    <!-- SEARCH BAR -->
    <form class="search-bar" method="GET" action="/skinmart/user/index.php#official-store">
      <input type="text" name="q"
        placeholder="Cari produk, brand, atau kategori..."
        value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" />
      <button type="submit">Cari</button>
    </form>

    <!-- HEADER ACTIONS -->
    <div class="header-actions">

      <!-- CART -->
      <a href="/skinmart/user/cart.php" class="icon-btn">
        <span class="icon">🛒</span>
        <span class="label">Keranjang</span>
      </a>

      <!-- ACCOUNT DROPDOWN -->
      <div class="account-dropdown">

        <button class="icon-btn account-btn">
          <span class="icon">👤</span>
          <span class="label">Akun</span>
        </button>

        <div class="dropdown-menu">

          <?php if (!isset($_SESSION['user_id'])): ?>

            <!-- USER BELUM LOGIN -->
            <a href="/skinmart/login.php">Login</a>
            <a href="/skinmart/register.php">Daftar</a>

          <?php else: ?>

            <!-- USER SUDAH LOGIN -->
            <p class="user-info">Halo, <?= htmlspecialchars($_SESSION['name']) ?></p>

            <a href="/skinmart/user/profile.php">Profil Saya</a>
            <a href="/skinmart/user/orders.php">Pesanan Saya</a>

            <?php if ($_SESSION['role'] === 'admin'): ?>
              <a href="/skinmart/admin/index.php">Dashboard Admin</a>
            <?php endif; ?>

            <a href="/skinmart/logout.php" class="logout">Logout</a>

          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>

  <!-- NAVIGATION -->
  <nav class="header-nav container">
    <ul>
      <li><a href="#beranda" class="active">Beranda</a></li>
      <li><a href="#flash-sale">Flash Sale</a></li>
      <li><a href="#brand-favorit">Brand Favorit</a></li>
      <li><a href="#voucher">Voucher & Promo</a></li>
      <li><a href="#official-store">Official Store</a></li>
      <li><a href="#bantuan">Bantuan</a></li>
    </ul>
  </nav>
</header>