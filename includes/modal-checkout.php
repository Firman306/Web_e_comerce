<?php
/**
 * Modal Checkout / Formulir Pemesanan
 * File: includes/modal-checkout.php
 */
?>
<div class="modal-overlay" id="modal-checkout" aria-hidden="true">
  <div class="modal-card">
    <div class="modal-header">
      <h3 class="modal-title">Formulir Pemesanan Cepat</h3>
      <button type="button" class="btn-close-modal" aria-label="Tutup Modal">&times;</button>
    </div>
    
    <div class="modal-body">
      <!-- Ringkasan Produk yang Dipilih -->
      <div class="order-summary-box">
        <img id="modal-summary-thumb" src="<?= htmlspecialchars($product['variants'][0]['image']) ?>" alt="Thumbnail Produk" class="order-summary-thumb">
        <div class="order-summary-info">
          <div class="summary-title"><?= htmlspecialchars($product['name']) ?></div>
          <div class="summary-details">
            Warna: <strong id="modal-summary-color"><?= htmlspecialchars($product['variants'][0]['name']) ?></strong> | 
            Ukuran: <strong id="modal-summary-size">EU 42</strong>
          </div>
          <div class="summary-details">
            Jumlah: <strong id="modal-summary-qty">1 pasang</strong>
          </div>
          <div class="summary-total" id="modal-summary-total"><?= format_rupiah($product['price']) ?></div>
        </div>
      </div>

      <!-- Form Pengiriman -->
      <form action="order-process.php" method="POST" id="checkout-form">
        <!-- Input Tersembunyi (Sinkronisasi dari JavaScript) -->
        <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
        <input type="hidden" name="color_variant" id="form-input-color" value="<?= htmlspecialchars($product['variants'][0]['name']) ?>">
        <input type="hidden" name="size_variant" id="form-input-size" value="42">
        <input type="hidden" name="quantity" id="form-input-qty" value="1">
        <input type="hidden" name="total_amount" id="form-input-total" value="<?= $product['price'] ?>">

        <div class="form-group">
          <label class="form-label" for="customer_name">Nama Lengkap Penerima *</label>
          <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Contoh: Budi Santoso" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="customer_phone">Nomor WhatsApp Aktif *</label>
          <input type="tel" id="customer_phone" name="customer_phone" class="form-control" placeholder="Contoh: 081234567890" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="shipping_address">Alamat Lengkap Pengiriman *</label>
          <textarea id="shipping_address" name="shipping_address" class="form-control" rows="3" placeholder="Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, Kode Pos" required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label" for="payment_method">Metode Pembayaran *</label>
          <select id="payment_method" name="payment_method" class="form-control" required>
            <option value="Transfer Bank (BCA / Mandiri / BNI / BRI)">Transfer Bank Otomatis (BCA / Mandiri / BNI / BRI)</option>
            <option value="QRIS / E-Wallet (GoPay, OVO, ShopeePay)">QRIS / E-Wallet (GoPay, OVO, ShopeePay, DANA)</option>
            <option value="COD (Bayar di Tempat)">COD (Bayar Tunai di Tempat saat Barang Tiba)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="order_notes">Catatan Tambahan (Opsional)</label>
          <input type="text" id="order_notes" name="order_notes" class="form-control" placeholder="Contoh: Titipkan ke satpam jika rumah kosong">
        </div>

        <div style="margin-top: 1.5rem;">
          <button type="submit" class="btn-primary-buy" style="width: 100%;">
            Konfirmasi & Proses Pesanan Sekarang
          </button>
        </div>

        <p style="text-align: center; font-size: 0.78rem; color: var(--color-text-muted); margin-top: 0.85rem;">
          🔒 Data Anda terlindungi enkripsi 256-bit SSL. Kami tidak pernah membagikan data Anda.
        </p>
      </form>

    </div>
  </div>
</div>
