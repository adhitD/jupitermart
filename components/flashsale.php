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
    SELECT p.*, 
           c.name AS category_name,
           c.id AS category_id
    FROM products p
    JOIN categories c ON p.category_id = c.id
    ORDER BY p.id DESC
");



$products = $query->fetch_all(MYSQLI_ASSOC);

if (count($products) > 0):
foreach($products as $p):
      ?>
    <article class="product-card" data-category="<?= $p['category_id']?>">
      <?php 
       if ($p['diskon'] > 0): ?>
    <div class="product-badge">
        <?= round($p['diskon']) ?>%
    </div>
<?php endif; ?>

      <div class="product-image"><img src="uploads/<?= $p['image'] ?>">
</div>
      <h3><?=$p['name']?></h3>
      <p class="product-price">Rp<?php number_format($p['price'],0,',','.') ?> <span class="price-strike">Rp120.000</span></p>
      <button class="secondary-btn">Tambah ke Keranjang</button>
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
    <!-- <article class="product-card" data-category="kecantikan">
      <div class="product-badge">-45%</div>
      <div class="product-image">Gambar</div>
      <h3>Serum Wajah Brightening</h3>
      <p class="product-price">Rp75.000 <span class="price-strike">Rp135.000</span></p>
      <button class="secondary-btn">Tambah ke Keranjang</button>
    </article>

    <article class="product-card" data-category="elektronik">
      <div class="product-badge">-25%</div>
      <div class="product-image">Gambar</div>
      <h3>Earphone Wireless</h3>
      <p class="product-price">Rp220.000 <span class="price-strike">Rp299.000</span></p>
      <button class="secondary-btn">Tambah ke Keranjang</button>
    </article>

    <article class="product-card" data-category="minimarket">
      <div class="product-badge">-15%</div>
      <div class="product-image">Gambar</div>
      <h3>Snack Bundle Alfamart</h3>
      <p class="product-price">Rp35.000 <span class="price-strike">Rp45.000</span></p>
      <button class="secondary-btn">Tambah ke Keranjang</button>
    </article> -->
  </div>
</section>