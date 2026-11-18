# 👟 KINETIC LABS — AEROSTEP ZERO 1 Single Product Landing Page

Website promosi 1 produk (sepatu sneaker) dengan berbagai varian warna dan ukuran. Dibuat dengan arsitektur **PHP modular**, gaya desain **minimalis, bersih, tidak terlalu ramai, dan berkelas profesional**, dilengkapi dengan **animasi 3D interaktif**.

---

## 📁 Struktur Folder Proyek

```text
Tugas BP2/
├── assets/
│   ├── css/
│   │   └── style.css              # Styling modern (CSS variables, 3D perspective, responsive)
│   ├── js/
│   │   ├── main.js                # Logika 3D viewer, 3D parallax tilt, varian warna & modal
│   │   └── model-viewer.min.js    # Engine WebGL 3D Model Viewer lokal
│   ├── models/
│   │   └── shoe.glb               # File model 3D glTF resmi Khronos (MaterialsVariantsShoe)
│   └── images/
│       └── products/              # Gambar varian sepatu (Onyx Black, White, Red, Blue)
│           ├── shoe-black.jpg
│           ├── shoe-white.jpg
│           ├── shoe-red.jpg
│           └── shoe-blue.jpg
├── config/
│   └── config.php                 # Konfigurasi nama toko, nomor WhatsApp, currency helper
├── data/
│   └── product.php                # Single Source of Truth data produk (varian, ukuran, spesifikasi)
├── includes/                      # Komponen modular halaman
│   ├── header.php                 # HTML <head>, Google Fonts (Plus Jakarta Sans), 3D viewer script
│   ├── navbar.php                 # Sticky modern navbar dengan logo & menu
│   ├── hero.php                   # Showcase 3D model, mode switcher 3D/2D, switcher warna, buy CTA
│   ├── features.php               # 4 keunggulan teknologi & rekayasa produk
│   ├── specs.php                  # Tabel spesifikasi teknis material & jaminan
│   ├── reviews.php                # Ulasan bintang 5 pembeli terverifikasi
│   ├── faq.php                    # Accordion tanya jawab seputar produk & pengiriman
│   ├── modal-sizeguide.php        # Modal popup panduan pengukuran kaki (EU, US, UK, CM)
│   ├── modal-checkout.php         # Modal popup form checkout & ringkasan pesanan
│   └── footer.php                 # Footer elegan & script loader
├── index.php                      # Entry point utama penggabung seluruh komponen
├── order-process.php              # Halaman invoice & bukti transaksi setelah checkout
└── README.md                      # Dokumentasi proyek
```

---

## 🪐 Fitur Animasi 3D Produk

Website ini kini memiliki dua mode tampilan visual interaktif:

1. **Mode 3D WebGL Interaktif (360°)**:
   - **Auto-Rotate 3D**: Sepatu berputar secara otomatis dan mulus 360 derajat.
   - **Full Orbit Camera Drag**: Pengunjung dapat menggeser kursor / sentuhan layar untuk melihat sepatu dari semua sudut (atas, bawah sol, samping, tumit).
   - **Zoom in/out**: Scroll mouse untuk melihat detail rajutan dan sol sepatu.
   - **Sinkronisasi Varian Warna 3D**: Memilih varian warna (Onyx Black, Cloud White, Crimson Red) langsung mengubah material tekstur 3D secara *real-time*.
   - **Tombol Kontrol 3D**: Tersedia tombol "Jeda / Putar Animasi" dan "Reset Sudut".

2. **Mode Foto 2D dengan Efek 3D Parallax Tilt & Levitation**:
   - **Levitation Floating Animation**: Animasi mengapung/melayang vertikal yang halus dilengkapi bayangan lantai (*drop shadow*) dinamis.
   - **Interactive 3D Mouse Tilt**: Saat kursor diarahkan ke dalam kotak produk, sepatu akan miring (*tilt*) mengikuti posisi kursor dengan ilusi kedalaman 3D (*perspective 3D transform*).

---

## ✨ Fitur-Fitur Lainnya

- **4 Pilihan Warna & 7 Pilihan Ukuran**: EU 39 - 45 dengan indikator cm telapak kaki.
- **Modal Panduan Ukuran (*Size Guide*)**: Tabel konversi ukuran lengkap (EU, US, UK, CM).
- **Checkout Cepat PHP & Cetak Invoice**: Formulir transaksi dengan nomor invoice otomatis (`INV-AERO-YYYYMMDD-XXXX`) dan tombol cetak bukti pesanan (*Print/PDF*).
- **Direct WhatsApp Order**: Tautan pesan otomatis dengan format produk, warna, ukuran, dan total harga.
- **100% Responsif**: Mobile sticky buy bar untuk kemudahan pemesanan di HP.

---

## 🚀 Cara Menjalankan Website di XAMPP

1. Pastikan modul **Apache** di XAMPP Control Panel sudah dalam kondisi **Start**.
2. Buka browser dan kunjungi:
   ```text
   http://localhost/Tugas%20BP2/
   ```
3. Nikmati interaksi 3D dan animasi produk yang mulus!
