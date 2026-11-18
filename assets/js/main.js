/**
 * AEROSTEP ZERO 1 - Interactive Product Logic & 3D Animations
 * Handles 3D WebGL Model Viewer, 3D Parallax Tilt, variant selection, and WhatsApp order generator.
 */

document.addEventListener('DOMContentLoaded', () => {
  // Global State
  const state = {
    price: window.PRODUCT_DATA ? window.PRODUCT_DATA.price : 849000,
    productName: window.PRODUCT_DATA ? window.PRODUCT_DATA.name : 'AEROSTEP ZERO 1',
    waNumber: window.PRODUCT_DATA ? window.PRODUCT_DATA.waNumber : '6281234567890',
    selectedColor: 'Onyx Black',
    selectedImage: 'assets/images/products/shoe-black.jpg',
    modelVariant: 'midnight',
    selectedSize: '42',
    selectedSizeCm: '26.5',
    quantity: 1,
    viewMode: '3d' // '3d' or '2d'
  };

  // DOM Elements
  const mainImg = document.getElementById('product-main-image');
  const selectedColorLabel = document.getElementById('selected-color-label');
  const selectedSizeCmLabel = document.getElementById('selected-size-cm');
  const qtyInput = document.getElementById('input-qty');
  const btnQtyMinus = document.getElementById('btn-qty-minus');
  const btnQtyPlus = document.getElementById('btn-qty-plus');
  const btnBuyNow = document.getElementById('btn-buy-now');
  const btnWaOrder = document.getElementById('btn-wa-order');
  const btnMobileBuy = document.getElementById('btn-mobile-buy');

  // 3D & 2D Showcase Elements
  const modelViewer = document.getElementById('shoe-3d-viewer');
  const btnMode3d = document.getElementById('btn-mode-3d');
  const btnMode2d = document.getElementById('btn-mode-2d');
  const container3d = document.getElementById('container-3d-view');
  const container2d = document.getElementById('container-2d-view');
  const btnToggleRotate = document.getElementById('btn-toggle-rotate');
  const labelToggleRotate = document.getElementById('label-toggle-rotate');
  const btnResetCamera = document.getElementById('btn-reset-camera');
  const showcaseBox = document.getElementById('main-showcase-box');
  const tiltTarget = document.getElementById('shoe-tilt-target');
  
  // Modals
  const modalCheckout = document.getElementById('modal-checkout');
  const modalSizeGuide = document.getElementById('modal-sizeguide');
  const btnOpenSizeGuide = document.getElementById('btn-open-sizeguide');
  const closeButtons = document.querySelectorAll('.btn-close-modal, .modal-backdrop-close');

  // Format IDR Helper
  function formatRupiah(number) {
    return 'Rp ' + Number(number).toLocaleString('id-ID');
  }

  // Update Dynamic WhatsApp Link
  function updateWhatsAppLink() {
    if (!btnWaOrder) return;
    
    const total = state.price * state.quantity;
    const message = `Halo ${window.APP_NAME || 'KINETIC LABS'}, saya ingin memesan produk:\n\n` +
      `👟 Produk: ${state.productName}\n` +
      `🎨 Warna: ${state.selectedColor}\n` +
      `📏 Ukuran: EU ${state.selectedSize} (${state.selectedSizeCm} cm)\n` +
      `📦 Jumlah: ${state.quantity} pasang\n` +
      `💰 Total: ${formatRupiah(total)}\n\n` +
      `Mohon info ketersediaan stok & petunjuk pembayarannya. Terima kasih!`;

    const encodedMsg = encodeURIComponent(message);
    const waUrl = `https://wa.me/${state.waNumber}?text=${encodedMsg}`;
    btnWaOrder.setAttribute('href', waUrl);
  }

  // Update Checkout Modal Details
  function syncModalData() {
    const total = state.price * state.quantity;
    
    const modalThumb = document.getElementById('modal-summary-thumb');
    const modalColor = document.getElementById('modal-summary-color');
    const modalSize = document.getElementById('modal-summary-size');
    const modalQty = document.getElementById('modal-summary-qty');
    const modalTotal = document.getElementById('modal-summary-total');
    
    const formColorInput = document.getElementById('form-input-color');
    const formSizeInput = document.getElementById('form-input-size');
    const formQtyInput = document.getElementById('form-input-qty');
    const formTotalInput = document.getElementById('form-input-total');

    if (modalThumb) modalThumb.src = state.selectedImage;
    if (modalColor) modalColor.textContent = state.selectedColor;
    if (modalSize) modalSize.textContent = 'EU ' + state.selectedSize + ` (${state.selectedSizeCm} cm)`;
    if (modalQty) modalQty.textContent = state.quantity + ' pasang';
    if (modalTotal) modalTotal.textContent = formatRupiah(total);

    if (formColorInput) formColorInput.value = state.selectedColor;
    if (formSizeInput) formSizeInput.value = state.selectedSize;
    if (formQtyInput) formQtyInput.value = state.quantity;
    if (formTotalInput) formTotalInput.value = total;
  }

  // ==========================================
  // 1. Logika Switcher Mode 3D vs 2D Foto
  // ==========================================
  function setViewMode(mode) {
    state.viewMode = mode;
    if (mode === '3d') {
      if (btnMode3d) btnMode3d.classList.add('active');
      if (btnMode2d) btnMode2d.classList.remove('active');
      if (container3d) container3d.classList.add('active');
      if (container2d) container2d.classList.remove('active');
    } else {
      if (btnMode2d) btnMode2d.classList.add('active');
      if (btnMode3d) btnMode3d.classList.remove('active');
      if (container2d) container2d.classList.add('active');
      if (container3d) container3d.classList.remove('active');
    }
  }

  if (btnMode3d) btnMode3d.addEventListener('click', () => setViewMode('3d'));
  if (btnMode2d) btnMode2d.addEventListener('click', () => setViewMode('2d'));

  // ==========================================
  // 2. Kontrol 3D Model Viewer
  // ==========================================
  if (btnToggleRotate && modelViewer) {
    btnToggleRotate.addEventListener('click', () => {
      const isAutoRotating = modelViewer.hasAttribute('auto-rotate');
      if (isAutoRotating) {
        modelViewer.removeAttribute('auto-rotate');
        if (labelToggleRotate) labelToggleRotate.textContent = '▶ Mulai Putar';
      } else {
        modelViewer.setAttribute('auto-rotate', '');
        if (labelToggleRotate) labelToggleRotate.textContent = '⏸ Jeda Putar';
      }
    });
  }

  if (btnResetCamera && modelViewer) {
    btnResetCamera.addEventListener('click', () => {
      modelViewer.cameraOrbit = '45deg 75deg 105%';
      modelViewer.fieldOfView = 'auto';
      if (typeof modelViewer.jumpCameraToGoal === 'function') {
        modelViewer.jumpCameraToGoal();
      }
    });
  }

  // ==========================================
  // 3. Efek 3D Parallax Tilt pada Mode 2D Foto
  // ==========================================
  if (showcaseBox && tiltTarget) {
    let isMouseOver = false;

    showcaseBox.addEventListener('mouseenter', () => {
      if (state.viewMode === '2d') {
        isMouseOver = true;
        tiltTarget.style.animation = 'none'; // Jeda animasi melayang ketika mouse masuk
      }
    });

    showcaseBox.addEventListener('mousemove', (e) => {
      if (!isMouseOver || state.viewMode !== '2d') return;

      const rect = showcaseBox.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      // Hitung sudut rotasi 3D (antara -16deg hingga +16deg)
      const rotateX = ((y - centerY) / centerY) * -16;
      const rotateY = ((x - centerX) / centerX) * 16;

      tiltTarget.style.transform = `perspective(900px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.04, 1.04, 1.04)`;
    });

    showcaseBox.addEventListener('mouseleave', () => {
      if (state.viewMode !== '2d') return;
      isMouseOver = false;
      tiltTarget.style.transform = '';
      tiltTarget.style.animation = 'levitateShoe 4s ease-in-out infinite';
    });
  }

  // ==========================================
  // 4. Seleksi Varian Warna & Sinkronisasi 3D
  // ==========================================
  const colorRadios = document.querySelectorAll('input[name="color_variant"]');
  const thumbCards = document.querySelectorAll('.thumb-card');

  function changeColor(colorName, imageSrc, modelVariant) {
    state.selectedColor = colorName;
    state.selectedImage = imageSrc;
    if (modelVariant) state.modelVariant = modelVariant;

    if (selectedColorLabel) {
      selectedColorLabel.textContent = colorName;
    }

    // Update Gambar 2D dengan transisi halus
    if (mainImg) {
      mainImg.classList.add('fade-out');
      setTimeout(() => {
        mainImg.src = imageSrc;
        mainImg.classList.remove('fade-out');
      }, 150);
    }

    // Update Material Varian pada 3D Model Viewer
    if (modelViewer && modelVariant) {
      const applyVariant = () => {
        try {
          if (modelViewer.availableVariants && modelViewer.availableVariants.includes(modelVariant)) {
            modelViewer.variantName = modelVariant;
          }
        } catch (err) {
          console.debug('3D variant apply:', err);
        }
      };

      if (modelViewer.availableVariants && modelViewer.availableVariants.length > 0) {
        applyVariant();
      } else {
        modelViewer.addEventListener('load', applyVariant, { once: true });
      }
    }

    // Sinkronisasi status aktif thumbnail
    thumbCards.forEach(card => {
      if (card.getAttribute('data-color') === colorName) {
        card.classList.add('active');
      } else {
        card.classList.remove('active');
      }
    });

    updateWhatsAppLink();
  }

  colorRadios.forEach(radio => {
    radio.addEventListener('change', (e) => {
      const colorName = e.target.getAttribute('data-name');
      const imageSrc = e.target.getAttribute('data-image');
      const modelVariant = e.target.getAttribute('data-model-variant');
      changeColor(colorName, imageSrc, modelVariant);
    });
  });

  thumbCards.forEach(card => {
    card.addEventListener('click', () => {
      const colorName = card.getAttribute('data-color');
      const imageSrc = card.getAttribute('data-image');
      const modelVariant = card.getAttribute('data-model-variant');
      
      // Pilih radio yang cocok
      const targetRadio = document.querySelector(`input[name="color_variant"][data-name="${colorName}"]`);
      if (targetRadio) targetRadio.checked = true;

      changeColor(colorName, imageSrc, modelVariant);
    });
  });

  // ==========================================
  // 5. Seleksi Ukuran Sepatu
  // ==========================================
  const sizeRadios = document.querySelectorAll('input[name="size_variant"]');
  sizeRadios.forEach(radio => {
    radio.addEventListener('change', (e) => {
      state.selectedSize = e.target.value;
      state.selectedSizeCm = e.target.getAttribute('data-cm');

      if (selectedSizeCmLabel) {
        selectedSizeCmLabel.textContent = `(Panjang telapak kaki: ${state.selectedSizeCm} cm)`;
      }

      updateWhatsAppLink();
    });
  });

  // ==========================================
  // 6. Pengatur Kuantitas (Quantity Counter)
  // ==========================================
  if (btnQtyMinus && btnQtyPlus && qtyInput) {
    btnQtyMinus.addEventListener('click', () => {
      let current = parseInt(qtyInput.value) || 1;
      if (current > 1) {
        current -= 1;
        qtyInput.value = current;
        state.quantity = current;
        updateWhatsAppLink();
      }
    });

    btnQtyPlus.addEventListener('click', () => {
      let current = parseInt(qtyInput.value) || 1;
      if (current < 10) {
        current += 1;
        qtyInput.value = current;
        state.quantity = current;
        updateWhatsAppLink();
      }
    });

    qtyInput.addEventListener('change', () => {
      let val = parseInt(qtyInput.value) || 1;
      if (val < 1) val = 1;
      if (val > 10) val = 10;
      qtyInput.value = val;
      state.quantity = val;
      updateWhatsAppLink();
    });
  }

  // ==========================================
  // 7. Penanganan Modal (Size Guide & Checkout)
  // ==========================================
  function openModal(modal) {
    if (!modal) return;
    syncModalData();
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (btnBuyNow) {
    btnBuyNow.addEventListener('click', () => openModal(modalCheckout));
  }

  if (btnMobileBuy) {
    btnMobileBuy.addEventListener('click', () => openModal(modalCheckout));
  }

  if (btnOpenSizeGuide) {
    btnOpenSizeGuide.addEventListener('click', (e) => {
      e.preventDefault();
      openModal(modalSizeGuide);
    });
  }

  closeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      closeModal(modalCheckout);
      closeModal(modalSizeGuide);
    });
  });

  // Tutup modal jika klik di latar belakang atau tombol ESC
  window.addEventListener('click', (e) => {
    if (e.target === modalCheckout) closeModal(modalCheckout);
    if (e.target === modalSizeGuide) closeModal(modalSizeGuide);
  });

  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeModal(modalCheckout);
      closeModal(modalSizeGuide);
    }
  });

  // ==========================================
  // 8. FAQ Accordion
  // ==========================================
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      
      faqItems.forEach(i => i.classList.remove('open'));

      if (!isOpen) {
        item.classList.add('open');
      }
    });
  });

  // ==========================================
  // 9. Mobile Navbar Toggle
  // ==========================================
  const mobileBtn = document.querySelector('.mobile-menu-btn');
  const navMenu = document.querySelector('.nav-menu');
  if (mobileBtn && navMenu) {
    mobileBtn.addEventListener('click', () => {
      navMenu.classList.toggle('open');
    });

    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
      });
    });
  }

  // ==========================================
  // 10. Navbar Scroll Effect
  // ==========================================
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // Inisialisasi awal
  updateWhatsAppLink();
});
