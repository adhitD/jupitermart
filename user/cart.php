<?php 
include '../databases/cart/tampil_cart.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Keranjang – SkinMart</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body {
    font-family: Poppins, sans-serif;
    background: #f6f7fa;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 1100px;
    margin: auto;
}

.page-title {
    font-size: 32px;
    font-weight: 700;
    color: #0d2464;
    margin-bottom: 25px;
}

.cart-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 25px;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    border: 1px solid #eee;
}

.cart-item {
    display: grid;
    grid-template-columns: 120px 1fr 100px;
    gap: 20px;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.cart-item img {
    width: 110px;
    height: 110px;
    object-fit: cover;
    border-radius: 12px;
}

.qty-box {
    display: flex;
    align-items: center;
    gap: 8px;
}

.qty-box button {
    width: 30px;
    height: 30px;
    border: none;
    background: #0d2464;
    color: #fff;
    font-size: 18px;
    border-radius: 8px;
    cursor: pointer;
}

.summary-title {
    font-size: 22px;
    font-weight: 600;
    color: #0d2464;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
    font-size: 16px;
}

.summary-total {
    border-top: 1px solid #ddd;
    padding-top: 15px;
    margin-top: 15px;
    font-size: 20px;
    font-weight: 700;
}

.checkout-btn {
    width: 100%;
    padding: 12px;
    background: #3b82f6;
    color: #fff;
    border: none;
    border-radius: 8px;
    margin-top: 12px;
    cursor: pointer;
    font-size: 16px;
}

.remove-btn {
    margin-top: 5px;
    color: red;
    background: none;
    border: none;
    cursor: pointer;
}
</style>
</head>

<body>
    
<?php 
include '../layouts/header.php';
?>
<div class="container">

    <h1 class="page-title">Keranjang Belanja</h1>

    <div class="cart-grid">

        <!-- LEFT: ITEM -->
        <div class="card">

            <?php if (count($items) == 0): ?>
                
                <p>Keranjang kamu masih kosong.</p>

            <?php else: ?>

                <?php foreach ($items as $i): ?>

                <div class="cart-item">
                    <img src="/skinmart/admin/assets/image/produk/<?= $i['image'] ?>">

                    <div>
                        <h3><?= $i['product_name'] ?></h3>
                        <p>Rp<?= number_format($i['price_at_time'], 0, ',', '.') ?></p>

                        <form method="POST" action="../databases/cart/remove_item.php">
                            <input type="hidden" name="item_id" value="<?= $i['cart_item_id'] ?>">
                            <button class="remove-btn">Hapus</button>
                        </form>
                    </div>

                    <div class="qty-box">
                        <button onclick="updateQty(<?= $i['cart_item_id'] ?>, 'minus')">-</button>
                        <span><?= $i['qty'] ?></span>
                        <button onclick="updateQty(<?= $i['cart_item_id'] ?>, 'plus')">+</button>
                    </div>
                </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <!-- RIGHT: SUMMARY -->
        <div class="card">
            <div class="summary-title">Ringkasan Belanja</div>

            <div class="summary-row">
                <span>Subtotal</span>
                <span>Rp<?= number_format($total, 0, ',', '.') ?></span>
            </div>

            <div class="summary-row">
                <span>Ongkir (1%)</span>
                <span>Rp<?= number_format($ongkir, 0, ',', '.') ?></span>
            </div>

            <div class="summary-total">
                Total: Rp<?= number_format($grand_total, 0, ',', '.') ?>
            </div>

            <button class="checkout-btn">Checkout</button>
        </div>

    </div>
</div>

<script>
function updateQty(id, action) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../databases/cart/update_qty.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        location.reload();
    };

    xhr.send("id=" + id + "&action=" + action);
}
</script>

</body>
</html>
