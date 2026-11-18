<?php
/**
 * Komponen Ulasan Pelanggan (Customer Reviews)
 * File: includes/reviews.php
 */
?>
<section class="section section-alt" id="ulasan">
  <div class="container">

    <div class="section-header">
      <span class="section-badge">Kepuasan Pengguna</span>
      <h2 class="section-title">Apa Kata Mereka?</h2>
      <p class="section-subtitle">
        Nilai rata-rata <strong><?= $product['rating'] ?> dari 5.0</strong> berdasarkan <?= $product['review_count'] ?> ulasan pelanggan terverifikasi di seluruh Indonesia.
      </p>
    </div>

    <div class="reviews-grid">
      <?php foreach ($product['reviews'] as $review): ?>
        <div class="review-card">
          <div>
            <div class="review-stars">
              <?php for ($i = 0; $i < $review['rating']; $i++): ?>★<?php endfor; ?>
            </div>
            <p class="review-text">"<?= htmlspecialchars($review['content']) ?>"</p>
          </div>

          <div class="review-author">
            <div class="author-avatar"><?= htmlspecialchars($review['avatar']) ?></div>
            <div>
              <div class="author-name"><?= htmlspecialchars($review['name']) ?></div>
              <div class="author-meta">
                <span><?= htmlspecialchars($review['location']) ?></span> • 
                <span class="verified-tag">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                  Terverifikasi
                </span>
              </div>
              <div class="author-meta" style="margin-top: 2px; color: var(--color-primary); font-weight: 500;">
                Varian: <?= htmlspecialchars($review['variant']) ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
