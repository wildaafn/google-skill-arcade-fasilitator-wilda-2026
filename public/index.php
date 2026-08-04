<?php $pageTitle = 'Portal Belajar Google Cloud Arcade'; $currentPage = 'home'; ?>
<?php include __DIR__ . '/includes/header.php'; ?>

  <!-- Hero Section -->
  <section id="home" class="hero-section">
    <div class="container hero-container">
      <div class="hero-text-content">
        <div class="welcome-badge">
          <i class="fa-solid fa-hands-clapping text-yellow"></i> Halo! Selamat Datang di Portal Belajar Kak Wilda Pada Event Google Cloud Arcade X Dicoding 2026!
        </div>
        <h1>
          Mari Belajar Skill Cloud & Dapatkan <span class="gradient-text">Swag Eksklusif Google!</span>
        </h1>
        <p class="hero-desc">
          Google Cloud Arcade X Dicoding adalah program gamifikasi belajar cloud gratis. Bersama saya, <strong>WILDA ARIFFATUL FAISALNUR</strong> sebagai fasilitator kalian, ayo taklukkan tantangan lab, kumpulkan poin, dan klaim merchandise idaman kalian!
        </p>

        <div class="hero-buttons">
          <a href="https://chat.whatsapp.com/Cbbe9EzpMfSBDwBcwe0a70?mode=gi_t" target="_blank" class="btn btn-success">
            <i class="fa-brands fa-whatsapp"></i> Gabung WhatsApp Group
          </a>
          <a href="/tentang.php" class="btn btn-outline">
            Pelajari Selengkapnya <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

        <div class="info-highlights">
          <div class="highlight-item">
            <div class="icon-wrapper blue-glow"><i class="fa-solid fa-tags"></i></div>
            <div class="highlight-text">
              <h4>100% Gratis</h4>
              <p>Mendapat akses token lab gratis</p>
            </div>
          </div>
          <div class="highlight-item">
            <div class="icon-wrapper green-glow"><i class="fa-solid fa-gift"></i></div>
            <div class="highlight-text">
              <h4>Klaim Swag</h4>
              <p>Kaos, jaket, tas, botol Google</p>
            </div>
          </div>
          <div class="highlight-item">
            <div class="icon-wrapper yellow-glow"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="highlight-text">
              <h4>Bimbingan Fasil</h4>
              <p>Didampingi penuh hingga selesai</p>
            </div>
          </div>
        </div>
      </div>

      <div class="hero-visual-content">
        <div class="main-visual-card glass">
          <div class="card-glow"></div>
          <div class="visual-header">
            <div class="dots">
              <span class="dot red-dot"></span>
              <span class="dot yellow-dot"></span>
              <span class="dot green-dot"></span>
            </div>
            <span class="visual-title">Google Cloud Skills Boost</span>
          </div>
          <div class="visual-body">
            <div class="profile-simulation">
              <div class="avatar-row">
                <div class="simulated-avatar"><i class="fa-solid fa-user-astronaut"></i></div>
                <div class="simulated-info">
                  <h3>Arcade Player</h3>
                  <p><span class="badge blue-badge">Level 1: Trooper</span></p>
                </div>
                <div class="points-badge-disabled" title="Poin belum dimulai">
                  <span class="pts-disabled"><i class="fa-solid fa-circle-question"></i></span> <span class="pts-lbl">Poin</span>
                </div>
              </div>
              <div class="badge-shelf">
                <div class="shelf-title">Badges Terkumpul:</div>
                <div class="badges-row">
                  <div class="sim-badge" title="Generative AI Badge"><i class="fa-solid fa-brain"></i></div>
                  <div class="sim-badge" title="Kubernetes Challenge"><i class="fa-solid fa-cubes"></i></div>
                  <div class="sim-badge" title="BigQuery Hero"><i class="fa-solid fa-database"></i></div>
                  <div class="sim-badge" title="Cloud Security Defender"><i class="fa-solid fa-shield-halved"></i></div>
                </div>
              </div>

              <!-- Strategi Kalkulator Teaser -->
              <div class="strategy-teaser-card" id="strategy-teaser">
                <button class="btn btn-block btn-outline btn-strategy-toggle" id="strategy-toggle-btn">
                  <i class="fa-solid fa-calculator"></i> Strategi Poin & Estimasi Waktu <span class="badge-teaser">Sneak Peek</span>
                </button>
                <div class="strategy-details-panel hidden" id="strategy-details-panel">
                  <h5>💡 Estimasi Strategi Penyelesaian (Berdasarkan Aturan Resmi):</h5>
                  <ul>
                    <li><strong>1 Game Badge:</strong> Selesaikan ~4-6 Labs (Senilai <strong>1 Poin</strong>).</li>
                    <li><strong>2 Skill Badges (Keahlian):</strong> Selesaikan 2 Challenge Labs (Senilai <strong>1 Poin</strong>).</li>
                    <li><strong>Milestone 1 (Minimal):</strong> 6 Game Badges + 14 Skill Badges (Total: <strong>30 Poin</strong> - termasuk bonus 10 poin).</li>
                    <li><strong>Milestone 2:</strong> 8 Game Badges + 28 Skill Badges (Total: <strong>50 Poin</strong> - termasuk bonus 10 poin).</li>
                    <li><strong>Milestone 3:</strong> 10 Game Badges + 42 Skill Badges (Total: <strong>70 Poin</strong> - termasuk bonus 10 poin).</li>
                    <li><strong>Ultimate Milestone:</strong> 12 Game Badges + 56 Skill Badges (Total: <strong>90 Poin</strong> - termasuk bonus 10 poin).</li>
                  </ul>
                  <p class="strategy-note">* Lencana hanya dihitung jika diselesaikan dari tanggal 13 Juli 2026 hingga 14 September 2026.</p>
                </div>
              </div>

              <!-- Countdown / Registration Info Card -->
              <div class="countdown-card" id="registration-card">
                <div class="card-status-info">
                  <i class="fa-solid fa-calendar-days text-red blink"></i>
                  <div>
                    <h4 id="registration-title">Pendaftaran Event Dibuka:</h4>
                    <p id="registration-desc">Pendaftaran resmi dimulai pada 13 Juli 2026, 09:00 WIB.</p>
                  </div>
                </div>
                <div class="timer-display" id="countdown-timer">
                  <div class="time-block">
                    <span class="time-num" id="days">--</span>
                    <span class="time-lbl">Hari</span>
                  </div>
                  <div class="time-block">
                    <span class="time-num" id="hours">--</span>
                    <span class="time-lbl">Jam</span>
                  </div>
                  <div class="time-block">
                    <span class="time-num" id="minutes">--</span>
                    <span class="time-lbl">Menit</span>
                  </div>
                  <div class="time-block">
                    <span class="time-num" id="seconds">--</span>
                    <span class="time-lbl">Detik</span>
                  </div>
                </div>
                <div class="card-action-wrapper" id="card-action-container">
                  <button class="btn btn-block btn-secondary disabled" id="card-action-btn">
                    <i class="fa-solid fa-hourglass-half"></i> Pendaftaran Belum Dibuka
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Overview Sections -->
  <section class="section-padding overview-section">
    <div class="container grid-2col">
      <div class="overview-img-wrapper">
        <div class="badge-shelf glass" style="padding: 24px;">
          <h3 style="margin-bottom:16px;" class="text-blue">Tentang Program</h3>
          <p style="color: var(--text-secondary); margin-bottom: 24px;">
            Dapatkan Tutorial, Panduan & Info Intensif dari Kak WILDA ARIFFATUL FAISALNUR selaku fasilitator resmi. Pelajari apa itu Google Cloud Skills Boost, perbedaannya dengan Google Cloud Arcade, serta manfaat luar biasa yang bisa kamu dapatkan secara gratis.
          </p>
          <a href="/tentang.php" class="btn btn-primary">Baca Tentang Program <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <div class="overview-img-wrapper">
        <div class="badge-shelf glass" style="padding: 24px;">
          <h3 style="margin-bottom:16px;" class="text-yellow">Bagaimana Cara Bermain?</h3>
          <p style="color: var(--text-secondary); margin-bottom: 24px;">
            Pahami langkah-langkah mendaftarkan akun, mengklaim kode token lab gratis, menyelesaikan kuis trivia bulanan, mengumpulkan lencana digital, hingga cara menukarkan poin dengan hadiah eksklusif.
          </p>
          <a href="/cara-main.php" class="btn btn-outline">Pelajari Langkah Main <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <div class="container grid-2col" style="margin-top: 30px;">
      <div class="overview-img-wrapper">
        <div class="badge-shelf glass" style="padding: 24px;">
          <h3 style="margin-bottom:16px;" class="text-green"><i class="fa-solid fa-calculator"></i> Kalkulator & Papan Skor</h3>
          <p style="color: var(--text-secondary); margin-bottom: 24px;">
            Cek total perolehan poin kamu secara otomatis hanya dengan memasukkan link profil publik Google Cloud Skills Boost kamu, serta lihat peringkat kamu di Leaderboard komunitas!
          </p>
          <a href="/kalkulator.php" class="btn btn-primary">Kalkulator & Papan Skor <i class="fa-solid fa-trophy"></i></a>
        </div>
      </div>

      <div class="overview-img-wrapper">
        <div class="badge-shelf glass" style="padding: 24px;">
          <h3 style="margin-bottom:16px;" class="text-red"><i class="fa-solid fa-lightbulb"></i> Strategi Poin & Milestones</h3>
          <p style="color: var(--text-secondary); margin-bottom: 24px;">
            Pelajari strategi jitu menyelesaikan lab secara konsisten tanpa melampaui batas harian (max 15 lab/hari), 8 lab wajib game, dan informasi tier penukaran merchandise Google.
          </p>
          <a href="/strategi.php" class="btn btn-outline">Lihat Panduan Strategi <i class="fa-solid fa-chess-knight"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Swag Teaser Section -->
  <section class="section-padding bg-slate">
    <div class="container text-center">
      <h2 class="section-title">Ingin Mendapatkan Hadiah Keren Ini?</h2>
      <p class="section-subtitle" style="margin-bottom: 40px;">
        Intip koleksi swag dari season-season sebelumnya yang berhasil diklaim oleh peserta pada periode sebelumnya.
      </p>

      <div class="gallery-grid" style="margin-bottom: 40px;">
        <div class="gallery-card glass" style="overflow: hidden;">
          <img src="/assets/swag_unboxing_1.jpg" alt="Google Cloud Arcade Swag Unboxing" style="height: 220px; width: 100%; object-fit: cover; display: block;">
        </div>
        <div class="gallery-card glass" style="overflow: hidden;">
          <img src="/assets/swag_unboxing_2.jpg" alt="Google Cloud Arcade Swag Package" style="height: 220px; width: 100%; object-fit: cover; display: block;">
        </div>
        <div class="gallery-card glass" style="overflow: hidden;">
          <img src="/assets/swag_tier_2.jpg" alt="Google Cloud Arcade Prize Tiers" style="height: 220px; width: 100%; object-fit: cover; display: block;">
        </div>
      </div>

      <a href="/galeri-swag.php" class="btn btn-primary btn-lg">Lihat Semua Swag Musim Lalu <i class="fa-solid fa-images"></i></a>
    </div>
  </section>

  <!-- Community / WhatsApp Section -->
  <section id="komunitas" class="section-padding">
    <div class="container">
      <div class="komunitas-card glass">
        <div class="komunitas-grid">
          <div class="komunitas-text">
            <span class="badge green-badge"><i class="fa-solid fa-users"></i> Komunitas Whatsapp</span>
            <h2>Sudah Siap Belajar Bersama?</h2>
            <p>
              Jangan belajar sendirian! Bergabunglah dengan ratusan peserta lainnya di WhatsApp Group yang difasilitasi oleh Kak Wilda. Di grup ini, kita akan saling berbagi tips, menyelesaikan kendala error, membagikan info token gratis, serta merayakan keseruan klaim swag bersama!
            </p>
            <div class="group-benefits">
              <div class="benefit"><i class="fa-solid fa-check text-green"></i> Update info terhangat program</div>
              <div class="benefit"><i class="fa-solid fa-check text-green"></i> Distribusi kode token lab gratis</div>
              <div class="benefit"><i class="fa-solid fa-check text-green"></i> Sesi live QnA bareng fasilitator</div>
            </div>
            <a href="https://chat.whatsapp.com/Cbbe9EzpMfSBDwBcwe0a70?mode=gi_t" target="_blank" class="btn btn-success btn-lg">
              <i class="fa-brands fa-whatsapp"></i> Gabung Grup Sekarang (Gratis)
            </a>
          </div>
          <div class="komunitas-image">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Komunitas Belajar Google Cloud Arcade" class="rounded-img" style="width: 100%; aspect-ratio: 1/1; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Anonymous Feedback Section -->
  <section class="section-padding" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container" style="max-width: 650px;">
      <div class="glass" style="padding: 32px; border-radius: var(--radius-md); text-align: center; position: relative;">
        <h3 style="margin-bottom: 8px;"><i class="fa-solid fa-envelope"></i> Pesan & Kesan Anonim</h3>
        <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 24px;">
          Punya kritik, saran, koreksi pribadi, atau usulan fitur untuk perbaikan website ini? Tulis di bawah secara anonim (identitas kalian aman).
        </p>

        <form id="feedback-form" style="display: flex; flex-direction: column; gap: 16px; text-align: left;">
          <div>
            <label for="feedback-message" style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-primary); margin-bottom: 6px;">Pesan / Masukan:</label>
            <textarea id="feedback-message" rows="4" style="width: 100%; padding: 12px; background: var(--bg-input); border: 1px solid var(--border-default); border-radius: var(--radius-sm); color: var(--text-primary); font-family: var(--font-body); font-size: 0.85rem; outline: none; resize: vertical;" placeholder="Tuliskan kritik, masukan, atau ide fitur di sini..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-block" style="padding: 12px;">
            <i class="fa-solid fa-paper-plane"></i> Kirim Masukan Anonim
          </button>
        </form>

        <div id="feedback-success" class="hidden" style="margin-top: 16px; color: var(--accent-green); font-size: 0.85rem; font-weight: 600; background: var(--accent-green-subtle); border: 1px solid rgba(61, 171, 94, 0.2); padding: 12px; border-radius: var(--radius-sm);">
          <i class="fa-solid fa-circle-check"></i> Terima kasih! Masukan anonim kamu telah berhasil dikirim.
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
