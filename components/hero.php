<?php 
// include 'databases/koneksi.php';


$query = $conn->query("
    SELECT p.image
    FROM flash_sales fs
    JOIN products p ON fs.product_id = p.id
    ORDER BY fs.id DESC
    LIMIT 1
");

$flash = $query->fetch_assoc();
?>

<section class="hero">
  <div class="hero-slider">
    <div class="hero-slide active" data-index="0">
      <div class="hero-text">
        <h1>Belanja Nyaman di SkinMart</h1>
        <p>Semua kebutuhan harian, kecantikan, dan elektronik dalam satu marketplace dengan pengiriman cepat.</p>
        <a href="#official-store" class="primary-btn">Belanja Sekarang</a href="#flash-sale">
      </div>
      <div class="hero-image">
        <div class="hero-illustration"><img src="/skinmart/assets/images/banner.jpg" alt=""></div>
      </div>
    </div>

    <div class="hero-slide" data-index="1">
      <div class="hero-text">
        <h1>Flash Sale Setiap Hari</h1>
        <p>Dapatkan diskon s/d 70% untuk produk pilihan dari berbagai brand favorit.</p>
        <a href="#flash-sale" class="primary-btn">Lihat Flash Sale</a>
      </div>
      <div class="hero-image">
        <div class="hero-illustration"><img src="/jupitermart/admin/assets/image/produk/<?=$flash['image']?>" alt="ts"></div>
      </div>
    </div>

    <div class="hero-slide" data-index="2">
      <div class="hero-text">
        <h1>SkinMart Store Terpercaya</h1>
        <p>Belanja Lebih Cepat, Harga Lebih Hemat. </p>
        <a href="#official-store" class="primary-btn">Jelajahi Store</a>
      </div>
      <div class="hero-image" style=" overflow: hidden;  ">
        <div class="hero-illustration"><img src="/skinmart/assets/images/cosmetic.jpg" class="object-fit:cover" alt=""></div>
      </div>
    </div>
  </div>

  <button class="hero-nav hero-prev">&#10094;</button>
  <button class="hero-nav hero-next">&#10095;</button>

  <div class="hero-dots">
    <button class="dot active" data-slide="0"></button>
    <button class="dot" data-slide="1"></button>
    <button class="dot" data-slide="2"></button>
  </div>
</section>