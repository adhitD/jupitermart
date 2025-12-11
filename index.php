<?php
// index.php (Layout Utama untuk PHP Native)
require_once  'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jupiter Mart - Marketplace</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body>
<?php include 'components/header.php'; ?>

<main id="beranda" class="main-wrapper">
            <div class="container main-layout">
        <?php include 'components/sidebar.php'; ?>

        <section class="content-area">

            <?php include 'components/hero.php'; ?>
            <?php include 'pages/flashsale.php'; ?>
            <?php include 'pages/brandfavorit.php'; ?>
            <?php include 'pages/voucherpromo.php'; ?>
            <?php include 'pages/ofcstore.php'; ?>
            <?php include 'pages/bantuan.php'; ?>

             <!-- BRAND FAVORIT -->
        

        <!-- VOUCHER & PROMO -->
       

        <!-- OFFICIAL STORE -->
     

        <!-- BANTUAN -->
        </section>
    </div>
</main>

<?php include 'components/footer.php'; ?>
  <button id="backToTop" class="back-to-top">↑</button>
<script src="assets/main.js"></script>
</body>
</html>