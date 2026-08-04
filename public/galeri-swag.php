<?php $pageTitle = 'Galeri Swag Season Sebelumnya'; $currentPage = 'galeri-swag'; ?>
<?php include __DIR__ . '/includes/header.php'; ?>
<div class="container">
      <div class="section-header text-center">
        <h1 class="section-title">Koleksi <span class="gradient-text">Hadiah & Swag Menarik</span></h1>
        <p class="section-subtitle">Intip hadiah unboxing dari periode sebelumnya untuk menambah motivasi belajarmu!</p>
      </div>

      <!-- Season Release Notice -->
      <div class="fasil-intro-card glass" style="padding: 24px; margin-bottom: 40px; border-left: 4px solid var(--accent-yellow);">
        <p style="color: var(--text-primary); font-weight: 600;">
          <i class="fa-solid fa-triangle-exclamation text-yellow"></i> Informasi Penting:
        </p>
        <p style="color: var(--text-secondary); font-size: 0.9rem; margin-top: 8px;">
          Seluruh foto unboxing dan bagan poin di bawah ini adalah <strong>hadiah dari season/periode sebelumnya</strong>. Hadiah resmi untuk season kali ini belum di-reveal secara resmi oleh tim Google Cloud global (Stay tuned!). Halaman ini akan segera di-update begitu informasi hadiah terbaru dirilis!
        </p>
      </div>

      <!-- Grid Layout of previous season swag (Using valid/active assets) -->
      <div class="gallery-grid" id="gallery-grid">
        <!-- Item 1: Swag Unboxing 1 -->
        <div class="gallery-item all" data-title="Google Cloud Swag - Unboxing Edisi 1" data-desc="Foto fisik unboxing paket merchandise berisi Ransel Google Cloud, botol minum stainless, lampu meja portabel, jam mini, speaker kapsul, dan pulpen eksklusif.">
          <div class="gallery-card glass">
            <div class="image-wrapper">
              <img src="/assets/swag_unboxing_1.jpg" alt="Google Cloud Swag Unboxing 1" loading="lazy">
              <div class="overlay">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 2: Swag Unboxing 2 -->
        <div class="gallery-item all" data-title="Google Cloud Swag - Unboxing Edisi 2" data-desc="Foto fisik paket merchandise berisi ransel anti-maling (hard-shell) Google Cloud, jaket hoodie abu-abu premium, botol lipat collapsible, pouch charger, dan pin.">
          <div class="gallery-card glass">
            <div class="image-wrapper">
              <img src="/assets/swag_unboxing_2.jpg" alt="Google Cloud Swag Unboxing 2" loading="lazy">
              <div class="overlay">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 3: Swag Tier Chart 1 -->
        <div class="gallery-item all" data-title="Tabel Poin & Tier Swag - Edisi Spesial" data-desc="Tabel acuan resmi penukaran poin Google Cloud Arcade untuk edisi spesial (Novice 25 poin, Trooper 45 poin, Ranger 65 poin, Champion 75 poin, Legend 95 poin).">
          <div class="gallery-card glass">
            <div class="image-wrapper">
              <img src="/assets/swag_tier_1.jpg" alt="Arcade Prize Tiers Edisi Spesial" loading="lazy">
              <div class="overlay">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 4: Swag Tier Chart 2 -->
        <div class="gallery-item all" data-title="Tabel Poin & Tier Swag - Edisi Standar" data-desc="Tabel acuan resmi penukaran poin Google Cloud Arcade untuk edisi standar (Novice 20 poin, Trooper 40 poin, Ranger 65 poin, Champion 75 poin, Legend 85 poin).">
          <div class="gallery-card glass">
            <div class="image-wrapper">
              <img src="/assets/swag_tier_2.jpg" alt="Arcade Prize Tiers Edisi Standar" loading="lazy">
              <div class="overlay">
                <i class="fa-solid fa-magnifying-glass-plus"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" style="display: none;">
  <div class="lightbox-content glass">
    <button class="lightbox-close">&times;</button>
    <img id="lightbox-img" src="" alt="Google Swag Preview">
    <h3 id="lightbox-title"></h3>
    <p id="lightbox-desc"></p>
  </div>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
