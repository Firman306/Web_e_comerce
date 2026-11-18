<?php
/**
 * Komponen Hero & Product Configurator
 * File: includes/hero.php
 */
$defaultVariant = $product['variants'][0];
?>
<section class="hero-section" id="overview">
  <div class="container">
    <div class="product-grid">

      <!-- Kolom Kiri: Showcase Gambar & 3D Interaktif -->
      <div class="gallery-sticky">
        <div class="image-showcase" id="main-showcase-box">
          <span class="badge-featured"><?= htmlspecialchars($product['badge']) ?></span>
          <span class="badge-discount-tag">Hemat <?= $product['discount_percent'] ?>%</span>

          <!-- Switcher Mode 3D vs 2D Foto -->
          <div class="view-mode-switcher">
            <button type="button" class="btn-mode active" id="btn-mode-3d">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
              </svg>
              Mode 3D (360°)
            </button>
            <button type="button" class="btn-mode" id="btn-mode-2d">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <path d="M20.4 14.5L16 10 4 20"></path>
              </svg>
              Foto HD
            </button>
          </div>
          
          <!-- Mode 1: 3D WebGL Model Viewer dengan Animasi Putar 360° -->
          <div id="container-3d-view" class="showcase-view active">
            <model-viewer
              id="shoe-3d-viewer"
              src="assets/models/shoe.glb"
              alt="<?= htmlspecialchars($product['name']) ?> 3D Model"
              auto-rotate
              rotation-per-second="25deg"
              camera-controls
              touch-action="pan-y"
              shadow-intensity="1.6"
              shadow-softness="0.7"
              exposure="1.05"
              camera-orbit="45deg 75deg 105%"
              interaction-prompt="none"
              style="width: 100%; height: 420px; background-color: transparent;"
            >
            </model-viewer>

            <!-- 3D Controls Bar -->
            <div class="viewer-3d-controls">
              <button type="button" id="btn-toggle-rotate" class="btn-3d-action" title="Jeda / Putar Animasi">
                <span id="label-toggle-rotate">⏸ Jeda Putar</span>
              </button>
              <button type="button" id="btn-reset-camera" class="btn-3d-action" title="Reset Sudut Pandang">
                ↺ Reset Sudut
              </button>
              <span class="hint-3d">🖱️ Drag kursor untuk melihat 360°</span>
            </div>
          </div>

          <!-- Mode 2: Foto 2D dengan Efek 3D Parallax Tilt & Floating Animation -->
          <div id="container-2d-view" class="showcase-view">
            <div class="shoe-levitate-wrapper" id="shoe-tilt-target">
              <img 
                id="product-main-image" 
                src="<?= htmlspecialchars($defaultVariant['image']) ?>" 
                alt="<?= htmlspecialchars($product['name']) ?> - <?= htmlspecialchars($defaultVariant['name']) ?>"
                class="product-main-img"
              >
            </div>
            <div class="shoe-floating-shadow"></div>
            <span class="hint-tilt">✨ Arahkan kursor untuk efek 3D Parallax Tilt</span>
          </div>

        </div>

        <!-- Thumbnail Selector -->
        <div class="thumbnail-row">
          <?php foreach ($product['variants'] as $index => $variant): ?>
            <div 
              class="thumb-card <?= $index === 0 ? 'active' : '' ?>"
              data-color="<?= htmlspecialchars($variant['name']) ?>"
              data-image="<?= htmlspecialchars($variant['image']) ?>"
              data-model-variant="<?= htmlspecialchars($variant['model_variant']) ?>"
            >
              <img src="<?= htmlspecialchars($variant['image']) ?>" alt="<?= htmlspecialchars($variant['name']) ?>">
              <span><?= htmlspecialchars($variant['name']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Kolom Kanan: Detail Produk & Pilihan Varian -->
      <div class="product-details">
        
        <div class="product-meta-header">
          <div class="rating-badge">
            <span class="stars">★★★★★</span>
            <strong><?= $product['rating'] ?></strong>
            <span>•</span>
            <a href="#ulasan" class="count"><?= $product['review_count'] ?> Ulasan Terverifikasi</a>
            <span>•</span>
            <span><?= number_format($product['sold_count']) ?>+ Terjual</span>
          </div>

          <h1 class="product-title"><?= htmlspecialchars($product['name']) ?></h1>
          <p class="product-tagline"><?= htmlspecialchars($product['tagline']) ?></p>
          <p class="product-short-desc"><?= htmlspecialchars($product['short_desc']) ?></p>

          <div class="price-box">
            <span class="current-price"><?= format_rupiah($product['price']) ?></span>
            <span class="original-price"><?= format_rupiah($product['original_price']) ?></span>
            <span class="save-pill">Hemat <?= $product['discount_percent'] ?>%</span>
          </div>
        </div>

        <!-- Pemilih Warna (Color Picker) -->
        <div class="config-group">
          <div class="config-header">
            <div class="config-label">
              Pilihan Warna: <span id="selected-color-label"><?= htmlspecialchars($defaultVariant['name']) ?></span>
            </div>
          </div>

          <div class="color-swatches">
            <?php foreach ($product['variants'] as $index => $variant): ?>
              <label class="color-option">
                <input 
                  type="radio" 
                  name="color_variant" 
                  value="<?= htmlspecialchars($variant['name']) ?>"
                  data-name="<?= htmlspecialchars($variant['name']) ?>"
                  data-image="<?= htmlspecialchars($variant['image']) ?>"
                  data-model-variant="<?= htmlspecialchars($variant['model_variant']) ?>"
                  <?= $index === 0 ? 'checked' : '' ?>
                >
                <span class="swatch-circle" style="background-color: <?= $variant['hex'] ?>; <?= isset($variant['border']) ? 'border-color: '.$variant['border'].';' : '' ?>"></span>
                <span class="swatch-tooltip"><?= htmlspecialchars($variant['name']) ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Pemilih Ukuran (Size Picker) -->
        <div class="config-group">
          <div class="config-header">
            <div class="config-label">Pilih Ukuran (EU)</div>
            <a href="#" id="btn-open-sizeguide" class="link-guide">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
              </svg>
              Panduan Ukuran
            </a>
          </div>

          <div class="size-chips">
            <?php foreach ($product['sizes'] as $size): ?>
              <label class="size-chip">
                <input 
                  type="radio" 
                  name="size_variant" 
                  value="<?= $size['eu'] ?>"
                  data-cm="<?= $size['cm'] ?>"
                  data-stock="<?= $size['stock'] ?>"
                  <?= $size['eu'] === 42 ? 'checked' : '' ?>
                >
                <div class="size-box">
                  <span class="eu-num"><?= $size['eu'] ?></span>
                  <span class="cm-sub"><?= $size['cm'] ?> cm</span>
                </div>
              </label>
            <?php endforeach; ?>
          </div>

          <div class="size-info-bar">
            <span id="selected-size-cm">(Panjang telapak kaki: 26.5 cm)</span>
            <span class="stock-status">Stok Siap Kirim Hari Ini</span>
          </div>
        </div>

        <!-- Jumlah & Tombol Transaksi -->
        <div class="action-cluster">
          <div class="qty-row">
            <span style="font-size: 0.88rem; font-weight: 700;">Jumlah:</span>
            <div class="qty-selector">
              <button type="button" id="btn-qty-minus" class="btn-qty" aria-label="Kurangi Jumlah">−</button>
              <input type="number" id="input-qty" class="qty-input" value="1" min="1" max="10" readonly>
              <button type="button" id="btn-qty-plus" class="btn-qty" aria-label="Tambah Jumlah">+</button>
            </div>
            <span style="font-size: 0.8rem; color: var(--color-text-muted);">Maks. 10 pasang per transaksi</span>
          </div>

          <div class="buttons-group">
            <button type="button" id="btn-buy-now" class="btn-primary-buy">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                <line x1="8" y1="21" x2="16" y2="21"></line>
                <line x1="12" y1="17" x2="12" y2="21"></line>
              </svg>
              Beli Sekarang
            </button>

            <a href="#" id="btn-wa-order" target="_blank" rel="noopener noreferrer" class="btn-whatsapp-order">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12.031 2c-5.508 0-9.984 4.477-9.984 9.984 0 1.761.458 3.479 1.332 5.004L2 22l5.163-1.341c1.47.798 3.125 1.218 4.868 1.218 5.508 0 9.984-4.477 9.984-9.984s-4.476-9.993-9.984-9.993zm5.782 14.269c-.244.686-1.42 1.309-1.97 1.365-.508.051-1.168.077-3.766-.997-3.21-1.328-5.267-4.577-5.429-4.793-.162-.216-1.31-1.745-1.31-3.328 0-1.583.829-2.361 1.121-2.684.293-.323.639-.404.852-.404.214 0 .428.002.614.011.198.01.464-.075.727.556.273.654.928 2.261 1.01 2.427.082.166.137.362.028.58-.11.218-.165.353-.329.544-.165.192-.347.428-.496.575-.165.164-.337.343-.146.671.191.328.852 1.405 1.826 2.274 1.254 1.118 2.311 1.465 2.639 1.629.328.164.519.137.71-.082.192-.219.821-.956 1.039-1.284.218-.328.437-.273.737-.164.3.11 1.909.9 2.236 1.064.328.164.546.246.628.382.082.137.082.793-.162 1.479z"/>
              </svg>
              Pesan via WhatsApp
            </a>
          </div>

          <!-- Trust Badges -->
          <div class="trust-bar">
            <div class="trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
              </svg>
              <span>Gratis Ongkir se-Indonesia</span>
            </div>

            <div class="trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="23 4 23 10 17 10"></polyline>
                <polyline points="1 20 1 14 7 14"></polyline>
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
              </svg>
              <span>Garansi Tukar Ukuran 14 Hari</span>
            </div>

            <div class="trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
              <span>100% Produk Original</span>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</section>
