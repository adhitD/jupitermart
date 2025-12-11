<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Jupiter Mart</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    :root {
      --blue-dark: #0d2464;
      --blue-light: #3b82f6;
      --green: #10b981;
      --soft: #f6f7fa;
      --white: #ffffff;
    }

    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: #f6f7fa;
      padding: 40px 20px;
    }

    .container {
      max-width: 1200px;
      margin: auto;
    }

    /* TITLE — Hybrid */
    .page-title {
      font-size: 36px;
      font-weight: 700;
      color: var(--blue-dark);
      margin-bottom: 35px;
      background: linear-gradient(135deg, var(--blue-dark), var(--blue-light));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* GRID */
    .cart-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 25px;
    }

    /* CARD STYLE — Hybrid */
    .card {
      background: var(--white);
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
      border: 1px solid #eaeaea;
    }

    /* CART ITEM */
    .cart-item {
      display: grid;
      grid-template-columns: 120px 1fr 110px;
      gap: 20px;
      padding: 20px 0;
      border-bottom: 1px solid #eee;
    }

    .cart-item:last-child {
      border-bottom: none;
    }

    .cart-item img {
      width: 110px;
      height: 110px;
      border-radius: 14px;
      object-fit: cover;
      box-shadow: 0 3px 14px rgba(0, 0, 0, 0.1);
    }

    /* ITEM INFO */
    .item-info h3 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }

    .item-info p {
      margin-top: 6px;
      font-size: 14px;
      color: #666;
    }

    /* QTY BOX */
    .qty-box {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .qty-box button {
      width: 34px;
      height: 34px;
      border-radius: 10px;
      border: none;
      background: var(--blue-dark);
      color: white;
      cursor: pointer;
      font-size: 18px;
    }

    .qty-box span {
      font-size: 17px;
      font-weight: 600;
      color: var(--blue-dark);
    }

    /* SUMMARY */
    .summary-title {
      font-size: 24px;
      font-weight: 700;
      color: var(--blue-dark);
      margin-bottom: 20px;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      font-size: 16px;
      margin: 10px 0;
      color: #444;
    }

    .summary-total {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #ddd;
      font-size: 20px;
      font-weight: 700;
      color: var(--blue-dark);
    }

    /* BUTTON — Hybrid */
    .checkout-btn {
      width: 100%;
      padding: 15px;
      border: none;
      font-size: 17px;
      font-weight: 600;
      color: white;
      border-radius: 12px;
      margin-top: 25px;
      cursor: pointer;
      background: linear-gradient(135deg, var(--blue-dark), var(--blue-light));
      box-shadow: 0 6px 18px rgba(13, 36, 100, 0.3);
      transition: 0.2s ease-in-out;
    }

    .checkout-btn:hover {
      transform: scale(1.03);
    }
  </style>
</head>

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