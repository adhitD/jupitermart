<aside class="side-nav">
  <div class="side-block">
    <h3>Kategori Utama</h3>
    <ul>
      <?php 
      $query = "SELECT * FROM categories";
      $result = mysqli_query($conn,$query);?>
     
     
    <li><a href="#" data-category="all" class="category-link ">semua</a></li>
<?php 
      while($row = mysqli_fetch_assoc($result)) :
      ?>
      <li><a href="#" data-category="<?=$row['id']?>" class="category-link "><?=$row['name']?></a></li>
      <?php endwhile ?>
     
    </ul>
  </div>

  <div class="side-block">
    <h3>Promo Cepat</h3>
    <ul>
      <li><a href="#flash-sale">Flash Sale Hari Ini</a></li>
      <li><a href="#voucher">Voucher Pengguna Baru</a></li>
      <li><a href="#brand-favorit">Brand Pilihan</a></li>
    </ul>
  </div>

  <div class="side-block">
    <h3>Layanan</h3>
    <ul>
      <li><a href="#bantuan">Pusat Bantuan</a></li>
      <li><a href="#bantuan">Lacak Pesanan</a></li>
      <li><a href="#bantuan">Metode Pembayaran</a></li>
    </ul>
  </div>
</aside>