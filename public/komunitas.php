<?php 
require_once __DIR__ . '/db/init.php';

$pageTitle = 'Gabung Komunitas'; 
$currentPage = 'komunitas'; 

// Fetch profiles from DB
$instagramProfiles = $db->query("SELECT * FROM mutual_profiles WHERE type='Instagram' AND is_verified=1 ORDER BY id DESC")->fetchAll();
$linkedinProfiles = $db->query("SELECT * FROM mutual_profiles WHERE type='LinkedIn' AND is_verified=1 ORDER BY id DESC")->fetchAll();
$githubProfiles = $db->query("SELECT * FROM mutual_profiles WHERE type='GitHub' AND is_verified=1 ORDER BY id DESC")->fetchAll();

include __DIR__ . '/includes/header.php'; 
?>
<div class="container">
  <div class="komunitas-card glass">
    <div class="komunitas-grid">
      <div class="komunitas-text">
        <span class="badge green-badge"><i class="fa-solid fa-users"></i> Whatsapp Group</span>
        <h2>Sudah Siap Belajar Bersama?</h2>
        <p>
          Jangan belajar sendirian! Bergabunglah dengan ratusan peserta lainnya di WhatsApp Group pendampingan fasilitator. Di grup ini, kita akan saling berbagi tips, menyelesaikan kendala error, membagikan info token gratis, serta merayakan keseruan klaim swag bersama!
        </p>
        <div class="group-benefits">
          <div class="benefit"><i class="fa-solid fa-check text-green"></i> Update info terhangat program secara instan</div>
          <div class="benefit"><i class="fa-solid fa-check text-green"></i> Distribusi kode token lab gratis dari Google</div>
          <div class="benefit"><i class="fa-solid fa-check text-green"></i> Sesi live QnA mingguan bareng fasilitator</div>
          <div class="benefit"><i class="fa-solid fa-check text-green"></i> Teman belajar bareng & motivasi klaim swag</div>
        </div>
        
        <a href="https://chat.whatsapp.com/Cbbe9EzpMfSBDwBcwe0a70?mode=gi_t" target="_blank" class="btn btn-success btn-lg">
          <i class="fa-brands fa-whatsapp"></i> Gabung Grup Sekarang (Gratis)
        </a>
      </div>
      <div class="komunitas-image">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Komunitas Belajar Google Cloud" class="rounded-img" style="width: 100%; aspect-ratio: 1.1/1; object-fit: cover;">
      </div>
    </div>
  </div>

  <!-- Mutualan Sosmed Section -->
  <div class="komunitas-card glass" style="margin-top: 40px;">
    <div style="text-align: center; max-width: 700px; margin: 0 auto 32px auto;">
      <span class="badge yellow-badge"><i class="fa-solid fa-share-nodes"></i> Koneksi Sosial Media</span>
      <h2 style="margin-top: 12px; margin-bottom: 12px;">Mutualan Sosial Media Peserta</h2>
      <p style="font-size: 0.95rem; color: var(--text-secondary); margin-bottom: 12px;">
        Saking banyaknya member di grup chat WhatsApp, pesan diskusi sering kali tertimbun oleh kiriman link mutualan. 
        Yuk, manfaatkan fitur ini buat saling follow Instagram, LinkedIn, atau GitHub sesama peserta komunitas biar WhatsApp Group tetap rapi dan kalian bisa nambah relasi baru!
      </p>
    </div>

    <div class="mutualan-container">
      <!-- Left Column: List of Profiles -->
      <div>
        <div class="mutualan-tabs">
          <button class="mutual-tab-btn active" id="tab-btn-instagram" onclick="switchMutualTab('instagram')">
            <i class="fa-brands fa-instagram"></i> Instagram (<?php echo count($instagramProfiles); ?>)
          </button>
          <button class="mutual-tab-btn" id="tab-btn-linkedin" onclick="switchMutualTab('linkedin')">
            <i class="fa-brands fa-linkedin"></i> LinkedIn (<?php echo count($linkedinProfiles); ?>)
          </button>
          <button class="mutual-tab-btn" id="tab-btn-github" onclick="switchMutualTab('github')">
            <i class="fa-brands fa-github"></i> GitHub (<?php echo count($githubProfiles); ?>)
          </button>
        </div>

        <!-- Search Bar Mutualan -->
        <div class="mutual-search-wrapper" style="margin-bottom: 24px; position: relative;">
          <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 0.95rem; pointer-events: none;"></i>
          <input type="text" id="mutual-search-input" placeholder="Cari username atau nama lengkap peserta...">
        </div>

        <!-- Instagram Grid -->
        <div class="mutual-grid active instagram-theme" id="grid-instagram">
          <?php if(empty($instagramProfiles)): ?>
            <p style="padding: 20px; color: var(--text-secondary);">Belum ada peserta Instagram terverifikasi.</p>
          <?php else: foreach($instagramProfiles as $profile): 
            $isAdmin = strpos(strtolower($profile['username']), 'wilda') !== false;
          ?>
            <div class="mutual-card <?php echo $isAdmin ? 'admin-card' : ''; ?>">
              <div class="mutual-info">
                <div class="mutual-avatar-icon"><i class="fa-brands fa-instagram"></i></div>
                <div class="mutual-details">
                  <h5><?php echo htmlspecialchars($profile['username']); ?></h5>
                  <?php if($isAdmin): ?>
                    <span class="mutual-badge badge-admin">Fasilitator (Admin)</span>
                  <?php else: ?>
                    <span>Peserta Arcade</span>
                  <?php endif; ?>
                </div>
              </div>
              <a href="<?php echo htmlspecialchars($profile['link']); ?>" target="_blank" class="mutual-action-btn" aria-label="Follow">
                <i class="fa-solid fa-user-plus"></i>
              </a>
            </div>
          <?php endforeach; endif; ?>
        </div>

        <!-- LinkedIn Grid -->
        <div class="mutual-grid linkedin-theme" id="grid-linkedin">
          <?php if(empty($linkedinProfiles)): ?>
            <p style="padding: 20px; color: var(--text-secondary);">Belum ada peserta LinkedIn terverifikasi.</p>
          <?php else: foreach($linkedinProfiles as $profile): 
            $isAdmin = strpos(strtolower($profile['username']), 'wilda') !== false;
          ?>
            <div class="mutual-card <?php echo $isAdmin ? 'admin-card' : ''; ?>">
              <div class="mutual-info">
                <div class="mutual-avatar-icon"><i class="fa-brands fa-linkedin"></i></div>
                <div class="mutual-details">
                  <h5><?php echo htmlspecialchars($profile['username']); ?></h5>
                  <?php if($isAdmin): ?>
                    <span class="mutual-badge badge-admin">Fasilitator (Admin)</span>
                  <?php else: ?>
                    <span>Peserta Arcade</span>
                  <?php endif; ?>
                </div>
              </div>
              <a href="<?php echo htmlspecialchars($profile['link']); ?>" target="_blank" class="mutual-action-btn" aria-label="Connect">
                <i class="fa-solid fa-user-plus"></i>
              </a>
            </div>
          <?php endforeach; endif; ?>
        </div>

        <!-- GitHub Grid -->
        <div class="mutual-grid github-theme" id="grid-github">
          <?php if(empty($githubProfiles)): ?>
            <p style="padding: 20px; color: var(--text-secondary);">Belum ada peserta GitHub terverifikasi.</p>
          <?php else: foreach($githubProfiles as $profile): 
            $isAdmin = strpos(strtolower($profile['username']), 'wilda') !== false;
          ?>
            <div class="mutual-card <?php echo $isAdmin ? 'admin-card' : ''; ?>">
              <div class="mutual-info">
                <div class="mutual-avatar-icon"><i class="fa-brands fa-github"></i></div>
                <div class="mutual-details">
                  <h5><?php echo htmlspecialchars($profile['username']); ?></h5>
                  <?php if($isAdmin): ?>
                    <span class="mutual-badge badge-admin">Fasilitator (Admin)</span>
                  <?php else: ?>
                    <span>Peserta Arcade</span>
                  <?php endif; ?>
                </div>
              </div>
              <a href="<?php echo htmlspecialchars($profile['link']); ?>" target="_blank" class="mutual-action-btn" aria-label="Follow">
                <i class="fa-solid fa-user-plus"></i>
              </a>
            </div>
          <?php endforeach; endif; ?>
        </div>
      </div>

      <!-- Right Column: Submission Form -->
      <div>
        <div class="mutual-form-card glass">
          <h3 style="font-size: 1.15rem; margin-bottom: 12px; color: var(--text-primary);"><i class="fa-solid fa-paper-plane"></i> Tambah Profil Kalian</h3>
          <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 20px; line-height: 1.5;">
            Mau nama kalian dipajang di list mutualan atas biar makin banyak koneksi belajar? Langsung aja kirim detail sosmed kalian di bawah. Nanti bakal diverifikasi terlebih dahulu oleh admin demi keamanan.
          </p>
          
          <form id="mutual-form-php" style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="mutual-type">Tipe Sosial Media</label>
              <select id="mutual-type" name="type" required>
                <option value="Instagram">Instagram</option>
                <option value="LinkedIn">LinkedIn</option>
                <option value="GitHub">GitHub</option>
              </select>
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="mutual-username">Username / Nama Lengkap</label>
              <input type="text" id="mutual-username" name="username" placeholder="Contoh: @username atau Nama Lengkap" required>
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
              <label for="mutual-link">Link Profil Lengkap</label>
              <input type="url" id="mutual-link" name="link" placeholder="Contoh: https://instagram.com/username" required>
            </div>

            <button type="submit" id="mutual-submit-btn-php" class="btn btn-primary btn-block" style="margin-top: 8px;">
              Kirim Link Profil <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>

          <!-- Success Message -->
          <div id="mutual-success-php" class="hidden" style="margin-top: 16px; padding: 12px; border-radius: var(--radius-sm); background: var(--accent-green-subtle); border: 1px solid rgba(61, 171, 94, 0.25); color: var(--text-primary); font-size: 0.82rem; display: flex; align-items: flex-start; gap: 10px;">
            <i class="fa-solid fa-circle-check text-green" style="margin-top: 3px;"></i>
            <span id="mutual-success-text">Berhasil terkirim! Profil kalian akan segera diverifikasi.</span>
          </div>

          <!-- Error Message -->
          <div id="mutual-error-php" class="hidden" style="margin-top: 16px; padding: 12px; border-radius: var(--radius-sm); background: var(--accent-red-subtle); border: 1px solid rgba(224, 85, 69, 0.25); color: var(--text-primary); font-size: 0.82rem; display: flex; align-items: flex-start; gap: 10px;">
            <i class="fa-solid fa-circle-exclamation text-red" style="margin-top: 3px;"></i>
            <span id="mutual-error-text">Terjadi kesalahan. Silakan coba lagi.</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Komunitas Group Photo Section -->
  <div class="fasil-intro-card glass" style="padding: 40px; margin-top: 40px; text-align: center;">
    <h3 class="text-blue" style="margin-bottom: 24px;"><i class="fa-solid fa-camera-retro"></i> Dokumentasi & Foto Pendampingan Kak Wilda</h3>
    
    <div class="bimbingan-grid" style="max-width: 800px; margin-left: auto; margin-right: auto;">
      <div class="bimbingan-card">
        <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=400&q=80" alt="Sesi Pendampingan Online">
      </div>
      <div class="bimbingan-card">
        <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=400&q=80" alt="Diskusi Solusi Lab">
      </div>
      <div class="bimbingan-card">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=400&q=80" alt="Materi & Tips Khusus">
      </div>
    </div>
    
    <p style="color: var(--text-secondary); font-size: 0.92rem; max-width: 700px; margin: 0 auto;">
      Dokumentasi sesi pendampingan intensif, diskusi pemecahan kendala lab, dan tips trik pengerjaan dari periode sebelumnya. Mari bergabung dan jadilah bagian dari cerita sukses berikutnya!
    </p>
  </div>
</div>

<?php 
$extraScripts = "
<script>
  const formPhp = document.getElementById('mutual-form-php');
  const successDiv = document.getElementById('mutual-success-php');
  const successText = document.getElementById('mutual-success-text');
  const errorDiv = document.getElementById('mutual-error-php');
  const errorText = document.getElementById('mutual-error-text');
  const submitBtn = document.getElementById('mutual-submit-btn-php');

  if (formPhp) {
    formPhp.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const type = document.getElementById('mutual-type').value;
      const username = document.getElementById('mutual-username').value.trim();
      const link = document.getElementById('mutual-link').value.trim();

      successDiv.classList.add('hidden');
      errorDiv.classList.add('hidden');
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class=\"fa-solid fa-circle-notch fa-spin\"></i> Mengirim...';

      fetch('/api/mutual.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ type, username, link })
      })
      .then(async response => {
        const data = await response.json();
        if (response.ok && data.success) {
          formPhp.reset();
          successText.textContent = data.message;
          successDiv.classList.remove('hidden');
        } else {
          errorText.textContent = data.message || 'Error occurred';
          errorDiv.classList.remove('hidden');
        }
      })
      .catch(err => {
        errorText.textContent = 'Connection error. Please try again.';
        errorDiv.classList.remove('hidden');
      })
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Kirim Link Profil <i class=\"fa-solid fa-paper-plane\"></i>';
      });
    });
  }
</script>
";
include __DIR__ . '/includes/footer.php'; 
?>
