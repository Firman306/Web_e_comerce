<?php
/**
 * Komponen Spesifikasi Teknis (Specs Section)
 * File: includes/specs.php
 */
?>
<section class="section" id="spesifikasi">
  <div class="container">

    <div class="section-header">
      <span class="section-badge">Data & Material</span>
      <h2 class="section-title">Spesifikasi Lengkap</h2>
      <p class="section-subtitle">
        Transparansi penuh mengenai material, konstruksi, dan anatomi sepatu yang kami buat.
      </p>
    </div>

    <div class="specs-wrapper">
      
      <!-- Tabel Spesifikasi -->
      <div class="specs-card">
        <table class="specs-table">
          <tbody>
            <?php foreach ($product['specifications'] as $key => $val): ?>
              <tr>
                <th><?= htmlspecialchars($key) ?></th>
                <td><?= htmlspecialchars($val) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Informasi Tambahan & Garansi -->
      <div class="specs-callout">
        <div class="callout-box">
          <div class="icon-badge">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
          </div>
          <div>
            <h4>Garansi Kualitas Resmi 30 Hari</h4>
            <p>Setiap pasang sepatu dilindungi jaminan cacat produksi pabrik selama 30 hari kalender. Kami ganti unit baru tanpa proses berbelit-belit.</p>
          </div>
        </div>

        <div class="callout-box">
          <div class="icon-badge">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </div>
          <div>
            <h4>Kemasan Eco-Friendly Premium</h4>
            <p>Dikirim menggunakan hard box eksklusif dengan kantong serut (dust bag) ramah lingkungan dan pelindung double bubble wrap gratis.</p>
          </div>
        </div>

        <div class="callout-box">
          <div class="icon-badge">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M12 6v6l4 2"></path>
            </svg>
          </div>
          <div>
            <h4>Layanan Konsultasi Ukuran 24/7</h4>
            <p>Ragu dengan ukuran kaki Anda? Tim spesialis kami siap membantu mengukur dan merekomendasikan size terbaik via WhatsApp setiap saat.</p>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>
