<?php 
include '../databases/cart/tampil_cart.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Keranjang – SkinMart</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/cart.css">

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
