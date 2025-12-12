<header class="site-header">
  <div class="top-bar container">
    <div class="logo">Skin<span>Mart</span></div>

    <form class="search-bar">
      <input type="text" placeholder="Cari produk, brand, atau kategori..." />
      <button type="submit">Cari</button>
    </form>

    <div class="header-actions">
      <a href="../fixpembayaran.php" class="icon-btn"><span class="icon">🛒</span><span class="label">Keranjang</span></button>
<div class="account-dropdown">
    <button class="icon-btn account-btn">
        <span class="icon">👤</span><span class="label">Akun</span>
    </button>

    <div class="dropdown-menu">

        <?php if (!isset($_SESSION['user_id'])): ?>

            <a href="/skinmart/login.php">Login</a>
            <a href="/skinmart/register.php">Daftar</a>

        <?php else: ?>

            <p class="user-info">Halo, <?= $_SESSION['name'] ?></p>
            <a href="user/profile.php">Profil Saya</a>
            <a href="user/orders.php">Pesanan Saya</a>

            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="admin/index.php">Dashboard Admin</a>
            <?php endif; ?>

            <a href="logout.php" class="logout">Logout</a>

        <?php endif; ?>

    </div>
</div>
    </div>
  </div>

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