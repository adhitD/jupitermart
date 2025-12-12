<section id="flash-sale" class="product-section">
  <div class="section-header">
    <h2>Flash Sale</h2>
    <div class="section-extra">
      <span class="badge">Berakhir dalam</span>
      <span id="flash-timer">00:59:59</span>
    </div>
  </div>
  <div class="product-grid">
    <?php
 $query = $conn->query("
    SELECT 
        p.id AS product_id,
        p.name AS product_name,
        p.image,
        p.price AS original_price,

        c.id AS category_id,
        c.name AS category_name,

        fs.discount_percent,

       
        (p.price - (p.price * fs.discount_percent / 100)) AS final_price

    FROM flash_sales fs
    JOIN products p ON fs.product_id = p.id
    JOIN categories c ON p.category_id = c.id
    ORDER BY fs.id DESC
");

$flash = $query->fetch_all(MYSQLI_ASSOC);

if (count($flash) > 0):
foreach($flash as $p):
      ?>
    <article class="product-card" data-category="<?= $p['category_id']?>">
      <?php 
       if ($p['discount_percent'] > 0): ?>
    <div class="product-badge">
        <?= round($p['discount_percent']) ?>%
    </div>
<?php endif; ?>

      <div class="product-image"><img class="img" src="/skinmart/admin/assets/image/produk/<?= $p['image'] ?>" style=" width: 100%;
    height: 100%;
    object-fit: cover;     /* KUNCI: isi kotak tanpa distorsi */
    object-position: center;">
</div>
      <h3><?=$p['product_name']?></h3>
      <p class="product-price">Rp<?=number_format( $p['final_price'],'0',',','.') ?> <span class="price-strike">Rp<?=number_format($p['original_price'],'0',',','.')?></span></p>
<button class="secondary-btn" onclick="addFlashSale(<?= $p['product_id'] ?>)">Tambah ke Keranjang</button>
    </article>
<?php  endforeach; 
else:?>
   <article class="product-card" data-category="">
 
      
      <div class="product-badge"><?php number_format($p['diskon'],'0') ?></div>
      
      <div class="product-image">Produk kosong yaa..</div>
      <h3>kosong</h3>
      <p class="product-price"></span></p>
      <button class="secondary-btn">Tambah ke Keranjang</button>
    </article>
    <?php 
endif;?>
   
  </div>
</section>
<script>
  function addFlashSale(productId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/skinmart/databases/cart/create_flash.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        alert(xhr.responseText);
    };

    xhr.send("product_id=" + productId);
}

</script>