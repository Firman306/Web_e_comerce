<?php
/**
 * Komponen Tanya Jawab (FAQ Section)
 * File: includes/faq.php
 */
?>
<section class="section" id="faq">
  <div class="container">

    <div class="section-header">
      <span class="section-badge">Bantuan & Informasi</span>
      <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
      <p class="section-subtitle">
        Semua hal penting yang perlu Anda ketahui sebelum melakukan pemesanan.
      </p>
    </div>

    <div class="faq-container">
      <?php foreach ($product['faqs'] as $index => $faq): ?>
        <div class="faq-item <?= $index === 0 ? 'open' : '' ?>">
          <button type="button" class="faq-trigger">
            <span><?= htmlspecialchars($faq['question']) ?></span>
            <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <div class="faq-content">
            <p><?= htmlspecialchars($faq['answer']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
