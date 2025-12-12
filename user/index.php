<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SkinMart - Marketplace</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
</head>

<style>
  .account-dropdown {
    position: relative;
    display: inline-block;
}

.account-btn {
    cursor: pointer;
}

.dropdown-menu {
    position: absolute;
    right: 0;
    top: 50px;
    background: #fff;
    border-radius: 10px;
    width: 180px;
    padding: 12px 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    display: none;
    z-index: 999;
}

.dropdown-menu a,
.dropdown-menu .user-info {
    display: block;
    padding: 10px 16px;
    font-size: 14px;
    text-decoration: none;
    color: #333;
}

.dropdown-menu a:hover {
    background: #f4f4f4;
}

.dropdown-menu .logout {
    color: #e63946;
    font-weight: 600;
}

.user-info {
    font-weight: 600;
    color: #0d2464;
    padding-bottom: 8px;
    border-bottom: 1px solid #eee;
}

</style>
<body>

  <?php include '../databases/koneksi.php'; ?>
  <?php include '../layouts/header.php'; ?>

  <main id="beranda" class="main-wrapper">
    <div class="container main-layout">
      <?php include '../layouts/sidebar.php'; ?>

      <section class="content-area">

        <?php include '../components/hero.php'; ?>
        <?php include '../components/flashsale.php'; ?>
        <?php include '../components/brandfavorit.php'; ?>
        <?php include '../components/voucherpromo.php'; ?>
        <?php include '../components/ofcstore.php'; ?>
        <?php include '../components/bantuan.php'; ?>
      </section>
    </div>
  </main>

  <?php include '../layouts/footer.php'; ?>
  <button id="backToTop" class="back-to-top">↑</button>
  <script src="../assets/js/script.js"></script>
  <!-- <script src="assets/main.js"></script> -->
   <script>
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelector(".account-btn");
    const menu = document.querySelector(".dropdown-menu");

    btn.addEventListener("click", () => {
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    // tutup jika klik di luar
    document.addEventListener("click", (e) => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.style.display = "none";
        }
    });
});


</script>
</body>

</html>