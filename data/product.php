<?php
/**
 * Data Produk Tunggal (Single Product Catalog)
 * File: data/product.php
 */

$product = [
    'id' => 'aerostep-01',
    'name' => 'AEROSTEP ZERO 1',
    'badge' => 'Seri Unggulan 2026',
    'tagline' => 'Ultralight Everyday Sneaker & Performance Trainer',
    'short_desc' => 'Didesain untuk mobilitas tanpa batas. Memadukan rajutan Breathable Knit generasi terbaru dengan bantalan CloudCushion berdensitas ganda, memberikan rasa seringan melangkah di udara sepanjang hari.',
    'price' => 849000,
    'original_price' => 1199000,
    'discount_percent' => 29,
    'rating' => 4.9,
    'review_count' => 384,
    'sold_count' => 1850,
    
    // Varian Warna
    'variants' => [
        [
            'id' => 'black',
            'name' => 'Onyx Black',
            'hex' => '#171717',
            'border' => '#27272a',
            'image' => 'assets/images/products/shoe-black.jpg',
            'model_variant' => 'midnight',
            'badge' => 'Paling Populer',
            'desc' => 'Warna hitam monokrom tegas dengan aksen matte modern, cocok untuk gaya kasual maupun semi-formal.'
        ],
        [
            'id' => 'white',
            'name' => 'Cloud White',
            'hex' => '#F4F4F5',
            'border' => '#D4D4D8',
            'image' => 'assets/images/products/shoe-white.jpg',
            'model_variant' => 'beach',
            'badge' => 'Clean Aesthetic',
            'desc' => 'Tampilan putih bersih yang abadi dan serbaguna, memberikan kesan minimalis dan segar di setiap momen.'
        ],
        [
            'id' => 'red',
            'name' => 'Crimson Red',
            'hex' => '#DC2626',
            'border' => '#B91C1C',
            'image' => 'assets/images/products/shoe-red.jpg',
            'model_variant' => 'street',
            'badge' => 'Edisi Terbatas',
            'desc' => 'Nuansa merah enerjik dengan kontras berani, siap mencuri perhatian di lintasan lari maupun jalanan kota.'
        ],
        [
            'id' => 'blue',
            'name' => 'Obsidian Navy',
            'hex' => '#1E3A8A',
            'border' => '#1E40AF',
            'image' => 'assets/images/products/shoe-blue.jpg',
            'model_variant' => 'midnight',
            'badge' => 'Warna Baru',
            'desc' => 'Biru navy pekat berpadu aksen netral yang tenang, menghadirkan estetika premium yang elegan.'
        ]
    ],

    // Varian Ukuran & Panduan
    'sizes' => [
        ['eu' => 39, 'us' => 6.5, 'cm' => 24.5, 'stock' => 14],
        ['eu' => 40, 'us' => 7.5, 'cm' => 25.0, 'stock' => 22],
        ['eu' => 41, 'us' => 8.0, 'cm' => 26.0, 'stock' => 35],
        ['eu' => 42, 'us' => 8.5, 'cm' => 26.5, 'stock' => 28],
        ['eu' => 43, 'us' => 9.5, 'cm' => 27.5, 'stock' => 19],
        ['eu' => 44, 'us' => 10.0, 'cm' => 28.0, 'stock' => 9],
        ['eu' => 45, 'us' => 11.0, 'cm' => 29.0, 'stock' => 4]
    ],

    // Fitur Unggulan Produk
    'features' => [
        [
            'icon' => 'feather',
            'title' => 'Ultra Ringan 230g',
            'desc' => 'Bobot sangat ringan yang mereduksi kelelahan otot kaki hingga 40% saat digunakan beraktivitas seharian penuh.'
        ],
        [
            'icon' => 'wind',
            'title' => 'AeroKnit Mesh Berventilasi',
            'desc' => 'Anyaman rajut presisi dengan sirkulasi udara 360 derajat menjaga kaki tetap sejuk, kering, dan bebas bau lembap.'
        ],
        [
            'icon' => 'zap',
            'title' => 'Midsole CloudCushion Pro',
            'desc' => 'Busa bantalan responsif tinggi menyerap benturan langkah dan memberikan dorongan energi balik di setiap pijakan.'
        ],
        [
            'icon' => 'shield',
            'title' => 'TractionGrip Rubber Sole',
            'desc' => 'Outsole karet alami berpola heksagonal memberikan cengkeraman maksimal di permukaan kering maupun basah licin.'
        ]
    ],

    // Spesifikasi Teknis
    'specifications' => [
        'Material Upper' => 'Engineered Micro-Knit Poly-Blend + TPU Support Film',
        'Insole' => 'Ergonomic Memory Foam Arch-Support (Dapat Dilepas)',
        'Midsole' => 'Dual-Density CloudCushion EVA Foam',
        'Outsole' => 'Non-Marking Natural Rubber Compound',
        'Drop Heel-to-Toe' => '8 mm',
        'Bobot Sepatu' => '230 gram (Ukuran EU 42)',
        'Rekomendasi Pemakaian' => 'Daily Commute, Walking, Light Running, Casual Wear, Gym',
        'Perawatan' => 'Lap bersih menggunakan kain lembap, hindari mesin cuci langsung'
    ],

    // Ulasan Pembeli
    'reviews' => [
        [
            'name' => 'Dimas Arya Pratama',
            'location' => 'Jakarta Selatan',
            'avatar' => 'D',
            'variant' => 'Onyx Black, Size 42',
            'rating' => 5,
            'date' => '3 hari lalu',
            'content' => 'Sepatu paling nyaman yang pernah saya pakai tahun ini. Bantalan busanya empuk banget dan kaki ga pegal meski seharian keliling kantor dan mall. Finishing rapih dan packing sangat aman.'
        ],
        [
            'name' => 'Nathalia Wijaya',
            'location' => 'Surabaya',
            'avatar' => 'N',
            'variant' => 'Cloud White, Size 40',
            'rating' => 5,
            'date' => '1 minggu lalu',
            'content' => 'Warna Cloud White aslinya jauh lebih cakep daripada di foto! Desainnya minimalis, pas banget dipadukan celana kulot atau jeans. Pengiriman ke Surabaya cuma 2 hari. Recommended!'
        ],
        [
            'name' => 'Rendra Wicaksana',
            'location' => 'Bandung',
            'avatar' => 'R',
            'variant' => 'Crimson Red, Size 43',
            'rating' => 5,
            'date' => '2 minggu lalu',
            'content' => 'Warna merahnya stand out tapi tetap berkelas. Dipakai buat lari santai 5K responsif dan cengkeraman solnya mantap ga licin. Worth it dengan harga promo.'
        ]
    ],

    // Pertanyaan yang Sering Diajukan (FAQ)
    'faqs' => [
        [
            'question' => 'Bagaimana jika ukuran sepatu yang saya terima kekecilan atau kebesaran?',
            'answer' => 'Jangan khawatir! Kami menyediakan garansi tukar ukuran gratis selama 14 hari sejak barang diterima, selama sepatu belum dipakai kotor dan tag masih utuh. Anda cukup hubungi CS kami via WhatsApp.'
        ],
        [
            'question' => 'Apakah ukuran sepatunya True to Size (sesuai ukuran lokal)?',
            'answer' => 'Ya, ukuran AEROSTEP ZERO 1 adalah True to Size standar EU lokal. Jika Anda memiliki tipe punggung kaki lebar, kami sarankan memilih 1 nomor lebih besar (upsize) untuk kenyamanan optimal.'
        ],
        [
            'question' => 'Metode pembayaran apa saja yang tersedia?',
            'answer' => 'Kami mendukung pembayaran melalui Transfer Bank Otomatis (BCA, Mandiri, BNI, BRI), E-Wallet (GoPay, OVO, ShopeePay), QRIS, serta layanan COD (Bayar di Tempat) untuk seluruh wilayah pulau Jawa dan kota besar luar Jawa.'
        ],
        [
            'question' => 'Berapa lama estimasi pengiriman paket?',
            'answer' => 'Pesanan sebelum jam 15.00 WIB dikirim di hari yang sama. Estimasi tiba untuk area Jabodetabek adalah 1-2 hari kerja, dan luar Jabodetabek 2-4 hari kerja dengan ekspedisi prioritas J&T / SiCepat / JNE.'
        ]
    ]
];
