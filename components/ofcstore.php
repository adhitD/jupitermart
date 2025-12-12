<?php
?>
<section id="official-store" class="product-section">
  <div class="section-header">
    <h2>Store</h2>
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

      <div class="product-image"><img class="img" src="/skinmart/admin/assets/image/produk/<?= $p['image'] ?>" style=" width: 100%;
    height: 100%;
    object-fit: cover;     /* KUNCI: isi kotak tanpa distorsi */
    object-position: center;">
</div>
      <h3><?=$p['name']?></h3>
      <p class="product-price">Rp<?= number_format($p['price'],0,',','.') ?> <span class="price-strike"></span></p>
<button class="secondary-btn" onclick="addToCart(<?= $p['id'] ?>)">tambahkan ke keranjang</button>
    </article>
<?php  endforeach;  
endif;?>
    
  </div>
</section>
<script>
  function addToCart(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/skinmart/databases/cart/create_store.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        switch (xhr.responseText) {
            case "LOGIN_REQUIRED":
                alert("Silakan login terlebih dahulu."); 
                break;
            case "ADDED":
                alert("Produk ditambahkan ke keranjang.");
                break;
            case "UPDATED":
                alert("Jumlah produk ditambah.");
                break;
            default:
                alert(xhr.responseText);
        }
    };

    xhr.send("product_id=" + id);
}

</script>