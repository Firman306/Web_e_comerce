<?php
/**
 * Komponen Navigasi Utama (Sticky Navbar)
 * File: includes/navbar.php
 */
?>
<header class="navbar">
  <div class="container nav-container">
    <a href="index.php" class="brand-logo">
      <span class="dot"></span>
      <?= htmlspecialchars(APP_NAME) ?>
    </a>

    <nav>
      <ul class="nav-menu">
        <li><a href="#overview" class="nav-link">Overview</a></li>
        <li><a href="#fitur" class="nav-link">Fitur Unggulan</a></li>
        <li><a href="#spesifikasi" class="nav-link">Spesifikasi</a></li>
        <li><a href="#ulasan" class="nav-link">Ulasan (<?= $product['review_count'] ?>)</a></li>
        <li><a href="#faq" class="nav-link">FAQ</a></li>
      </ul>
    </nav>

    <div class="nav-actions">
      <a href="#overview" class="btn-nav-cta">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <path d="M16 10a4 4 0 0 1-8 0"></path>
        </svg>
        Pesan Sekarang
      </a>

      <!-- Tombol Hamburger Mobile -->
      <button class="mobile-menu-btn" aria-label="Toggle Menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</header>
