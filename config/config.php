<?php
/**
 * Konfigurasi Aplikasi & Toko
 * File: config/config.php
 */

// Pengaturan Dasar Toko
define('APP_NAME', 'KINETIC LABS');
define('APP_TAGLINE', 'Precision Footwear & Minimalist Performance');
define('WHATSAPP_NUMBER', '6281234567890'); // Ganti dengan nomor WhatsApp aktif
define('STORE_EMAIL', 'support@kineticlabs.id');
define('STORE_PHONE', '+62 812-3456-7890');
define('STORE_ADDRESS', 'Kuningan, Jakarta Selatan, DKI Jakarta 12940');

/**
 * Format angka ke mata uang Rupiah
 *
 * @param int|float $amount
 * @return string
 */
function format_rupiah($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

/**
 * Sanitasi string input pengguna
 *
 * @param string $data
 * @return string
 */
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
