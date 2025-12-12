<style>
.order-container {
    max-width: 900px;
    margin: 30px auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    font-family: Poppins, sans-serif;
}

.order-header {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #0d2464;
}

.order-item {
    display: grid;
    grid-template-columns: 120px 1fr 120px;
    gap: 20px;
    padding: 16px 0;
    border-bottom: 1px solid #eee;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item img {
    width: 120px;
    height: 120px;
    border-radius: 12px;
    object-fit: cover;
}

.item-info h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.item-info p {
    color: #666;
    font-size: 14px;
}

.subtotal {
    text-align: right;
    font-weight: 700;
    color: #0d2464;
}

.total-box {
    margin-top: 25px;
    text-align: right;
    font-size: 20px;
    font-weight: 700;
    color: #0d2464;
}

.checkout-btn {
    margin-top: 20px;
    padding: 14px 20px;
    border: none;
    background: linear-gradient(135deg, #0d2464, #3b82f6);
    color: white;
    font-size: 16px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
    float: right;
}
</style>
<?php
include '../../databases/koneksi.php';
include 'create.php';
?>
<div class="order-container">
    <div class="order-header">Ringkasan Pesanan</div>

    <?php foreach ($items as $item): ?>
    <div class="order-item">
        
        <img src="uploads/<?= $item['image'] ?>" alt="produk">

        <div class="item-info">
            <h3><?= $item['product_name'] ?></h3>
            <p>Kategori: <?= $item['category_name'] ?></p>
            <p>Harga: Rp<?= number_format($item['price'], 0, ',', '.') ?></p>
            <p>Jumlah: <?= $item['qty'] ?></p>
        </div>

        <div class="subtotal">
            Rp<?= number_format($item['subtotal'], 0, ',', '.') ?>
        </div>

    </div>
    <?php endforeach; ?>

    <div class="total-box">
        Total: Rp<?= number_format($total, 0, ',', '.') ?>
    </div>

    <form action="proses_checkout.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="order_id" value="<?= $items[0]['order_id'] ?>">
        <button type="submit" class="checkout-btn">Proses Pembayaran</button>
    </form>
</div>
