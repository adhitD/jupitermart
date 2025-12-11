<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Jupiter Mart</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/cart.css">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  
</head>
<?php 

include 'layouts/header.php'
?>
<body>
  <div class="container">
    <h1 class="page-title">Keranjang Belanja</h1>

    <div class="cart-grid">

      <!-- LEFT — CART ITEMS -->
      <div class="card">
        <div class="cart-item">
          <img src="assets/images/sample.jpg" />
          <div class="item-info">
            <h3>Beras Premium 5kg</h3>
            <p>Rp 85.000</p>
          </div>
          <div class="qty-box">
            <button>-</button>
            <span>1</span>
            <button>+</button>
          </div>
        </div>

        <div class="cart-item">
          <img src="assets/images/sample2.jpg" />
          <div class="item-info">
            <h3>Serum Brightening</h3>
            <p>Rp 75.000</p>
          </div>
          <div class="qty-box">
            <button>-</button>
            <span>2</span>
            <button>+</button>
          </div>
        </div>
      </div>

      <!-- RIGHT — SUMMARY -->
      <div class="card">
        <h2 class="summary-title">Ringkasan Belanja</h2>
    
        <div class="summary-row">
          <span>Subtotal</span>
          <span>Rp 235.000</span>
        </div>

        <div class="summary-row">
          <span>Ongkir</span>
          <span>Rp 15.000</span>
        </div>

        <div class="summary-total">Total: Rp 250.000</div>

        <button class="checkout-btn">Lanjut ke Pembayaran</button>
      </div>

    </div>
  </div>
</body>

</html>