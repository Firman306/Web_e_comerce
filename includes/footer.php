<?php
/**
 * Komponen Footer & Skrip JS
 * File: includes/footer.php
 */
?>
<!-- Mobile Bottom Sticky Action Bar -->
<div class="mobile-sticky-bar">
  <div class="mobile-sticky-inner">
    <div class="mobile-price-group">
      <div class="price"><?= format_rupiah($product['price']) ?></div>
      <div class="meta">Gratis Ongkir se-Indonesia</div>
    </div>
    <button type="button" id="btn-mobile-buy" class="mobile-sticky-btn">
      Beli Sekarang
    </button>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Kolom Brand -->
      <div class="footer-brand">
        <h3><?= htmlspecialchars(APP_NAME) ?></h3>
        <p><?= htmlspecialchars(APP_TAGLINE) ?></p>
        <p style="margin-top: 1rem; font-size: 0.85rem;">
          <?= htmlspecialchars(STORE_ADDRESS) ?><br>
          WhatsApp: <?= htmlspecialchars(STORE_PHONE) ?><br>
          Email: <?= htmlspecialchars(STORE_EMAIL) ?>
        </p>
      </div>

      <!-- Kolom Navigasi -->
      <div class="footer-col">
        <h4>Navigasi</h4>
        <ul class="footer-links">
          <li><a href="#overview" class="footer-link">Overview Produk</a></li>
          <li><a href="#fitur" class="footer-link">Fitur & Teknologi</a></li>
          <li><a href="#spesifikasi" class="footer-link">Spesifikasi</a></li>
          <li><a href="#ulasan" class="footer-link">Ulasan Pembeli</a></li>
          <li><a href="#faq" class="footer-link">FAQ & Bantuan</a></li>
        </ul>
      </div>

      <!-- Kolom Kebijakan & Jaminan -->
      <div class="footer-col">
        <h4>Jaminan Pelanggan</h4>
        <ul class="footer-links">
          <li><a href="#" class="footer-link">Garansi 30 Hari</a></li>
          <li><a href="#" class="footer-link">Bebas Tukar Ukuran</a></li>
          <li><a href="#" class="footer-link">100% Produk Original</a></li>
          <li><a href="#" class="footer-link">Kebijakan Privasi</a></li>
          <li><a href="#" class="footer-link">Syarat & Ketentuan</a></li>
        </ul>
      </div>

      <!-- Kolom Pembayaran & Pengiriman -->
      <div class="footer-col">
        <h4>Metode Transaksi</h4>
        <p style="font-size: 0.85rem; line-height: 1.7; margin-bottom: 1rem;">
          Mendukung Transfer Bank (BCA, Mandiri, BNI, BRI), QRIS, E-Wallet, dan COD Bayar di Tempat.
        </p>
        <h4>Ekspedisi Rekanan</h4>
        <p style="font-size: 0.85rem; line-height: 1.7;">
          J&T Express, SiCepat, JNE Reguler & Kargo.
        </p>
      </div>

    </div>

    <!-- Baris Hak Cipta -->
    <div class="footer-bottom">
      <div>
        &copy; <?= date('Y') ?> <?= htmlspecialchars(APP_NAME) ?>. Hak Cipta Dilindungi Undang-Undang.
      </div>
      <div>
        Dibuat secara profesional, simpel & elegan dengan PHP murni.
      </div>
    </div>
  </div>
</footer>

<!-- Skrip Interaktif -->
<script src="assets/js/main.js"></script>
</body>
</html>
