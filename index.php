<?php
/**
 * Halaman Utama (Landing Page) AEROSTEP ZERO 1
 * Index File: index.php
 */

// Muat Konfigurasi & Data Produk
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/data/product.php';

// Muat Komponen Halaman (Modular Includes)
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Bagian Konten
require_once __DIR__ . '/includes/hero.php';
require_once __DIR__ . '/includes/features.php';
require_once __DIR__ . '/includes/specs.php';
require_once __DIR__ . '/includes/reviews.php';
require_once __DIR__ . '/includes/faq.php';

// Modals
require_once __DIR__ . '/includes/modal-sizeguide.php';
require_once __DIR__ . '/includes/modal-checkout.php';

// Footer & Scripts
require_once __DIR__ . '/includes/footer.php';
