<?php
/**
 * Komponen Header HTML
 * File: includes/header.php
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title><?= htmlspecialchars($product['name']) ?> — <?= htmlspecialchars(APP_NAME) ?></title>
  <meta name="description" content="<?= htmlspecialchars($product['short_desc']) ?>">
  <meta name="keywords" content="sepatu sneaker, sneaker minimalis, aerostep zero, kinetic labs, sepatu lari ringan">
  
  <!-- Open Graph / Meta Sosial -->
  <meta property="og:type" content="product">
  <meta property="og:title" content="<?= htmlspecialchars($product['name']) ?> | <?= htmlspecialchars(APP_NAME) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($product['short_desc']) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($product['variants'][0]['image']) ?>">
  
  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- CSS Utama -->
  <link rel="stylesheet" href="assets/css/style.css">
  
  <!-- 3D Model Viewer Engine -->
  <script type="module" src="assets/js/model-viewer.min.js"></script>
  
  <!-- Data Global untuk JS -->
  <script>
    window.APP_NAME = "<?= APP_NAME ?>";
    window.PRODUCT_DATA = {
      name: "<?= addslashes($product['name']) ?>",
      price: <?= (int)$product['price'] ?>,
      waNumber: "<?= WHATSAPP_NUMBER ?>"
    };
  </script>
</head>
<body>

<!-- Top Announcement Banner -->
<div class="top-banner">
  <div class="container">
    <span>
      <span class="badge-pill">PROMO BULAN INI</span> 
      Gratis Ongkir ke Seluruh Indonesia + Bebas Tukar Ukuran 14 Hari
    </span>
  </div>
</div>
