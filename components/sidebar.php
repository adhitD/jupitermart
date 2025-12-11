<aside class="side-nav">
        <div class="side-block">
    <h3>Kategori Utama</h3>
    <ul>
        <li>
            <a href="#" data-category="all" class="category-link active">
                Semua Produk
            </a>
        </li>
        <?php foreach ($categories as $cat): ?>
            <li>
                <a href="#" 
                   data-category="<?= strtolower($cat['id']) ?>" 
                   class="category-link">
                    <?= htmlspecialchars($cat['nama_kategori']) ?>
                </a>
            </li>
        <?php endforeach; ?>
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