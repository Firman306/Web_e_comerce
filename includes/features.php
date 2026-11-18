<?php
/**
 * Komponen Fitur Unggulan (Features Section)
 * File: includes/features.php
 */
?>
<section class="section section-alt" id="fitur">
  <div class="container">
    
    <div class="section-header">
      <span class="section-badge">Rekayasa & Inovasi</span>
      <h2 class="section-title">Diciptakan dengan Presisi Tertinggi</h2>
      <p class="section-subtitle">
        Setiap jengkal material AEROSTEP ZERO 1 dipilih secara teliti untuk memberikan paduan sempurna antara estetika minimalis, durabilitas tinggi, dan kenyamanan melangkah tanpa lelah.
      </p>
    </div>

    <div class="features-grid">
      <?php foreach ($product['features'] as $feature): ?>
        <div class="feature-card">
          <div class="feature-icon-wrapper">
            <?php if ($feature['icon'] === 'feather'): ?>
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                <line x1="16" y1="8" x2="2" y2="22"></line>
                <line x1="17.5" y1="15" x2="9" y2="15"></line>
              </svg>
            <?php elseif ($feature['icon'] === 'wind'): ?>
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path>
              </svg>
            <?php elseif ($feature['icon'] === 'zap'): ?>
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
              </svg>
            <?php else: ?>
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            <?php endif; ?>
          </div>

          <h3 class="feature-title"><?= htmlspecialchars($feature['title']) ?></h3>
          <p class="feature-desc"><?= htmlspecialchars($feature['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
