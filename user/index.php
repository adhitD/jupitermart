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
</body>

</html>