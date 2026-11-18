<?php
/**
 * Proses Transaksi & Halaman Bukti Pemesanan (Order Receipt)
 * File: order-process.php
 */

require_once __DIR__ . '/config/config.php';

// Validasi Request Method
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['customer_name'])) {
    header('Location: index.php');
    exit;
}

// Sanitasi Input
$productName   = sanitize($_POST['product_name'] ?? 'AEROSTEP ZERO 1');
$colorVariant  = sanitize($_POST['color_variant'] ?? 'Onyx Black');
$sizeVariant   = sanitize($_POST['size_variant'] ?? '42');
$quantity      = max(1, (int)($_POST['quantity'] ?? 1));
$totalAmount   = (int)($_POST['total_amount'] ?? 849000);
$customerName  = sanitize($_POST['customer_name'] ?? '');
$customerPhone = sanitize($_POST['customer_phone'] ?? '');
$address       = sanitize($_POST['shipping_address'] ?? '');
$paymentMethod = sanitize($_POST['payment_method'] ?? 'Transfer Bank');
$notes         = sanitize($_POST['order_notes'] ?? '-');

// Generate No. Invoice Unik
$invoiceId = 'INV-AERO-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));
$orderDate = date('d F Y, H:i') . ' WIB';

// Teks WhatsApp untuk Konfirmasi
$waText = "Halo Admin " . APP_NAME . ", saya telah membuat pesanan dengan nomor invoice: *" . $invoiceId . "*.\n\n"
        . "👤 Penerima: " . $customerName . " (" . $customerPhone . ")\n"
        . "👟 Produk: " . $productName . " - " . $colorVariant . " (Size EU " . $sizeVariant . ")\n"
        . "📦 Jumlah: " . $quantity . " pasang\n"
        . "💰 Total: " . format_rupiah($totalAmount) . "\n"
        . "💳 Metode: " . $paymentMethod . "\n\n"
        . "Mohon dikonfirmasi untuk kelanjutannya. Terima kasih!";

$waConfirmUrl = "https://wa.me/" . WHATSAPP_NUMBER . "?text=" . urlencode($waText);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pesanan — <?= htmlspecialchars($invoiceId) ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/style.css">
  
  <style>
    .receipt-page {
      min-height: 85vh;
      padding: 3.5rem 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .receipt-card {
      background: #ffffff;
      border: 1px solid var(--color-border);
      border-radius: var(--radius-lg);
      max-width: 620px;
      width: 100%;
      padding: 2.5rem;
      box-shadow: var(--shadow-lg);
    }
    .status-icon {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background-color: #dcfce7;
      color: #16a34a;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.25rem;
    }
    .receipt-header {
      text-align: center;
      margin-bottom: 2rem;
    }
    .receipt-title {
      font-size: 1.6rem;
      font-weight: 800;
      color: var(--color-primary);
      margin-bottom: 0.25rem;
    }
    .invoice-pill {
      display: inline-block;
      background: var(--color-surface-hover);
      border: 1px solid var(--color-border);
      font-size: 0.85rem;
      font-weight: 700;
      padding: 0.35rem 0.85rem;
      border-radius: var(--radius-full);
      color: var(--color-text-main);
      margin-top: 0.5rem;
    }
    .receipt-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1.75rem;
      font-size: 0.9rem;
    }
    .receipt-table tr {
      border-bottom: 1px solid var(--color-border);
    }
    .receipt-table th {
      text-align: left;
      padding: 0.75rem 0;
      color: var(--color-text-muted);
      font-weight: 500;
      width: 38%;
    }
    .receipt-table td {
      text-align: right;
      padding: 0.75rem 0;
      font-weight: 700;
      color: var(--color-primary);
    }
    .receipt-table td.text-left {
      text-align: left;
    }
    .payment-notice {
      background-color: #f8fafc;
      border-left: 4px solid var(--color-primary);
      padding: 1rem 1.25rem;
      border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
      margin-bottom: 2rem;
      font-size: 0.88rem;
    }
    .receipt-actions {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }
    @media print {
      body { background: #fff; }
      .navbar, .top-banner, .footer, .receipt-actions, .mobile-sticky-bar { display: none !important; }
      .receipt-card { box-shadow: none; border: 1px solid #000; padding: 0; }
    }
  </style>
</head>
<body>

<header class="navbar">
  <div class="container nav-container">
    <a href="index.php" class="brand-logo">
      <span class="dot"></span>
      <?= htmlspecialchars(APP_NAME) ?>
    </a>
    <a href="index.php" class="nav-link" style="font-weight: 600;">← Kembali ke Beranda</a>
  </div>
</header>

<main class="receipt-page">
  <div class="receipt-card">

    <div class="status-icon">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </div>

    <div class="receipt-header">
      <h1 class="receipt-title">Pesanan Berhasil Diterima!</h1>
      <p style="font-size: 0.9rem; color: var(--color-text-muted);">
        Terima kasih, <strong><?= htmlspecialchars($customerName) ?></strong>. Pesanan Anda sedang kami siapkan.
      </p>
      <div class="invoice-pill"><?= htmlspecialchars($invoiceId) ?></div>
    </div>

    <table class="receipt-table">
      <tr>
        <th>Waktu Pemesanan</th>
        <td><?= htmlspecialchars($orderDate) ?></td>
      </tr>
      <tr>
        <th>Produk</th>
        <td><?= htmlspecialchars($productName) ?></td>
      </tr>
      <tr>
        <th>Varian & Ukuran</th>
        <td><?= htmlspecialchars($colorVariant) ?> — EU <?= htmlspecialchars($sizeVariant) ?></td>
      </tr>
      <tr>
        <th>Kuantitas</th>
        <td><?= $quantity ?> pasang</td>
      </tr>
      <tr>
        <th>Total Pembayaran</th>
        <td style="font-size: 1.15rem; color: var(--color-accent);"><?= format_rupiah($totalAmount) ?></td>
      </tr>
      <tr>
        <th>Metode Pembayaran</th>
        <td><?= htmlspecialchars($paymentMethod) ?></td>
      </tr>
      <tr>
        <th>Nomor WhatsApp</th>
        <td><?= htmlspecialchars($customerPhone) ?></td>
      </tr>
      <tr>
        <th>Alamat Pengiriman</th>
        <td class="text-left" style="font-weight: 500; font-size: 0.85rem; line-height: 1.5;">
          <?= nl2br(htmlspecialchars($address)) ?>
        </td>
      </tr>
      <?php if (!empty($notes) && $notes !== '-'): ?>
      <tr>
        <th>Catatan Khusus</th>
        <td class="text-left" style="font-weight: 500; font-size: 0.85rem;">
          <?= htmlspecialchars($notes) ?>
        </td>
      </tr>
      <?php endif; ?>
    </table>

    <div class="payment-notice">
      <strong>📦 Status: Menunggu Konfirmasi WhatsApp</strong>
      <p style="margin-top: 0.35rem; color: var(--color-text-muted);">
        Untuk mempercepat proses pengiriman dan mendapatkan nomor resi, silakan klik tombol konfirmasi WhatsApp di bawah ini.
      </p>
    </div>

    <div class="receipt-actions">
      <a href="<?= $waConfirmUrl ?>" target="_blank" class="btn-whatsapp-order" style="text-align: center; justify-content: center;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12.031 2c-5.508 0-9.984 4.477-9.984 9.984 0 1.761.458 3.479 1.332 5.004L2 22l5.163-1.341c1.47.798 3.125 1.218 4.868 1.218 5.508 0 9.984-4.477 9.984-9.984s-4.476-9.993-9.984-9.993zm5.782 14.269c-.244.686-1.42 1.309-1.97 1.365-.508.051-1.168.077-3.766-.997-3.21-1.328-5.267-4.577-5.429-4.793-.162-.216-1.31-1.745-1.31-3.328 0-1.583.829-2.361 1.121-2.684.293-.323.639-.404.852-.404.214 0 .428.002.614.011.198.01.464-.075.727.556.273.654.928 2.261 1.01 2.427.082.166.137.362.028.58-.11.218-.165.353-.329.544-.165.192-.347.428-.496.575-.165.164-.337.343-.146.671.191.328.852 1.405 1.826 2.274 1.254 1.118 2.311 1.465 2.639 1.629.328.164.519.137.71-.082.192-.219.821-.956 1.039-1.284.218-.328.437-.273.737-.164.3.11 1.909.9 2.236 1.064.328.164.546.246.628.382.082.137.082.793-.162 1.479z"/>
        </svg>
        Konfirmasi Pesanan ke WhatsApp Admin
      </a>

      <button type="button" onclick="window.print()" class="btn-qty" style="width: 100%; border-radius: var(--radius-md); font-size: 0.88rem; height: 42px;">
        🖨️ Cetak / Simpan Bukti Pemesanan (PDF)
      </button>

      <a href="index.php" style="text-align: center; font-size: 0.88rem; color: var(--color-text-muted); margin-top: 0.5rem;">
        Kembali ke Halaman Utama
      </a>
    </div>

  </div>
</main>

<footer class="footer" style="padding: 2rem 0; border-top: 1px solid var(--color-border); background: #ffffff;">
  <div class="container" style="text-align: center; font-size: 0.82rem; color: var(--color-text-muted);">
    &copy; <?= date('Y') ?> <?= htmlspecialchars(APP_NAME) ?>. Hak Cipta Dilindungi.
  </div>
</footer>

</body>
</html>
