@extends('layouts.app')

@section('title', 'Tutorial Lab')

@section('content')
<div class="text-center" style="margin-bottom: 30px;">
      <span class="badge blue-badge"><i class="fa-solid fa-graduation-cap"></i> Tutorial</span>
      <h1 style="font-size: 2.5rem; margin-top: 10px;">Tutorial Pengerjaan Lab</h1>
      <p style="color: var(--text-secondary); max-width: 600px; margin: 10px auto 0;">
        Panduan video tutorial dan aset pendukung untuk membantu menyelesaikan target lab Google Cloud Arcade secara aman dan terbimbing.
      </p>
    </div>

    <!-- Search and Navigation Tabs -->
    <div class="glass" style="padding: 24px; margin-bottom: 30px;">
      <div style="position: relative; margin-bottom: 20px;">
        <i class="fa-solid fa-magnifying-glass"
          style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 0.85rem;"></i>
        <input type="text" id="lab-search-input" placeholder="Cari nama game, badge, atau judul lab..."
          style="width: 100%; padding: 12px 14px 12px 38px; border-radius: var(--radius-sm); background: rgba(0,0,0,0.3); border: 1px solid var(--border-default); color: var(--text-primary); font-size: 0.88rem; outline: none; transition: var(--transition-fast);">
      </div>

      <!-- Tab Buttons -->
      <div class="tab-navigation">
        <button class="tab-btn active" id="tab-btn-arcade" onclick="switchMainTab('arcade')">
          <i class="fa-solid fa-gamepad"></i> Arcade Games
        </button>
        <button class="tab-btn" id="tab-btn-skills" onclick="switchMainTab('skills')">
          <i class="fa-solid fa-award"></i> Skill Badges
        </button>
        <button class="tab-btn" id="tab-btn-complaints" onclick="switchMainTab('complaints')">
          <i class="fa-solid fa-circle-question"></i> Pengaduan Kendala
        </button>
      </div>
    </div>

    <!-- Tab Content: Arcade Games -->
    <div id="tab-content-arcade" class="main-tab-content">
      <!-- Month Sub-Tabs Selector -->
      <div class="month-selector">
        <button class="month-btn" id="btn-month-july" onclick="switchMonthTab('july')">
          <i class="fa-solid fa-calendar-times"></i> Juli 2026 (Expired)
        </button>
        <button class="month-btn active" id="btn-month-august" onclick="switchMonthTab('august')">
          <i class="fa-solid fa-clock"></i> Agustus 2026 (Segera)
        </button>
        <button class="month-btn coming-soon" title="Segera Hadir di Bulan September">
          <i class="fa-solid fa-lock"></i> September (Segera)
        </button>
      </div>

      <!-- July Games Accordion Container -->
      <div id="july-games-container" class="hidden">
        <!-- Will be populated dynamically -->
      </div>

      <!-- August Games Container -->
      <div id="august-games-container">
        <div class="glass text-center" style="padding: 40px; margin-top: 20px;">
          <i class="fa-solid fa-hourglass-half text-yellow" style="font-size: 3rem; margin-bottom: 15px; text-shadow: 0 0 10px rgba(234, 179, 8, 0.3);"></i>
          <h3 style="color: var(--text-primary); margin-bottom: 10px;">Menunggu Rilis Game Agustus</h3>
          <p style="color: var(--text-secondary); max-width: 500px; margin: 0 auto 15px; font-size: 0.9rem; line-height: 1.5;">
            Game Arcade Google Cloud periode Agustus 2026 akan segera dirilis secara resmi oleh Google. Fasilitator sedang menyiapkan materi dan tutorial pengerjaan solusi terbaik untuk Anda!
          </p>
          <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.8rem; background: rgba(0,0,0,0.4); padding: 8px 16px; border-radius: 99px; border: 1px solid var(--border-default); color: var(--text-primary);">
            <span class="pulse-dot"></span> Selalu pantau WhatsApp Group Komunitas untuk info Access Code!
          </div>
        </div>
      </div>

    </div>

    <!-- Tab Content: Pengaduan Kendala -->
    <div id="tab-content-complaints" class="main-tab-content hidden" style="margin-top: 25px;">
      <!-- Title Card -->
      <div class="glass" style="padding: 30px; margin-bottom: 25px; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; align-items: flex-start; gap: 20px; flex-wrap: wrap;">
          <div style="background: rgba(219, 68, 85, 0.1); padding: 16px; border-radius: 16px; border: 1px solid rgba(219, 68, 85, 0.2); display: flex; align-items: center; justify-content: center; color: var(--accent-red); flex-shrink: 0;">
            <i class="fa-solid fa-headset" style="font-size: 2.2rem;"></i>
          </div>
          <div style="flex: 1; min-width: 250px;">
            <h2 style="font-size: 1.4rem; color: var(--text-primary); margin: 0 0 8px 0; font-weight: 700;">
              Pusat Pengaduan Kendala & Error Lab
            </h2>
            <p style="font-size: 0.92rem; color: var(--text-secondary); margin: 0; line-height: 1.6;">
              Apakah kamu mengalami kendala saat mengikuti video tutorial atau error dari platform Qwiklabs/Google Cloud Skills Boost? Fasilitator siap membantu menyelesaikan kendalamu.
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ & Petunjuk Step by Step -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-bottom: 25px;">
        
        <!-- Petunjuk Pengaduan -->
        <div class="glass" style="padding: 25px; display: flex; flex-direction: column; gap: 15px;">
          <h3 style="font-size: 1.1rem; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 8px; font-weight: 600;">
            <i class="fa-solid fa-list-check text-blue"></i> Prosedur Pengaduan Kendala
          </h3>
          <ul style="margin: 0; padding-left: 20px; color: var(--text-secondary); font-size: 0.88rem; line-height: 1.6; display: flex; flex-direction: column; gap: 8px;">
            <li><strong>Langkah 1:</strong> Cek terlebih dahulu Solusi Lab di tab <em>Arcade Games</em> dan pastikan langkah/perintah yang kamu jalankan sudah persis seperti tutorial.</li>
            <li><strong>Langkah 2:</strong> Jika terjadi kendala saat mengerjakan lab, catat <strong>Kode Lab (GSP XXX)</strong>.</li>
            <li><strong>Langkah 3:</strong> Ambil <strong>Screenshot penuh</strong> dari layar Google Cloud Console / terminal yang menampilkan pesan error secara jelas.</li>
            <li><strong>Langkah 4:</strong> Isi <strong>Form Laporan Kendala</strong> di sebelah kanan dengan lengkap dan benar.</li>
          </ul>
        </div>

        <!-- Form Pengiriman Laporan -->
        <div class="glass" style="padding: 25px; border-left: 4px solid var(--accent-red); display: flex; flex-direction: column; justify-content: space-between; gap: 15px;">
          <div>
            <h3 style="font-size: 1.1rem; color: var(--text-primary); margin: 0 0 10px 0; display: flex; align-items: center; gap: 8px; font-weight: 600;">
              <i class="fa-solid fa-circle-exclamation text-red"></i> Kirim Laporan Kendalamu
            </h3>
            <p style="font-size: 0.88rem; color: var(--text-secondary); line-height: 1.5; margin: 0 0 15px 0;">
              Kirimkan laporan kendalamu langsung melalui form di bawah ini agar fasilitator dapat melacak dan merespon secepat mungkin.
            </p>
            
            <form id="lab-complaint-form" style="display: flex; flex-direction: column; gap: 15px;">
              <div style="display: flex; flex-direction: column; gap: 6px;">
                <label for="complaint-gsp-code" style="font-size: 0.8rem; font-weight: 600; color: var(--text-primary); display: flex; align-items: center; gap: 6px;">
                  <i class="fa-solid fa-code text-yellow"></i> Kode Lab (GSP)
                </label>
                <input type="text" id="complaint-gsp-code" placeholder="Contoh: GSP123" required
                  style="width: 100%; padding: 10px 12px; background: var(--bg-input); border: 1px solid var(--border-default); border-radius: var(--radius-sm); color: var(--text-primary); font-size: 0.85rem; outline: none; transition: border-color 0.2s;"
                  onfocus="this.style.borderColor='var(--accent-blue)'" onblur="this.style.borderColor='var(--border-default)'">
              </div>
              <div style="display: flex; flex-direction: column; gap: 6px;">
                <label for="complaint-phone" style="font-size: 0.8rem; font-weight: 600; color: var(--text-primary); display: flex; align-items: center; gap: 6px;">
                  <i class="fa-solid fa-phone text-green"></i> No. HP (WhatsApp)
                </label>
                <input type="text" id="complaint-phone" placeholder="Contoh: 085155308891" required
                  style="width: 100%; padding: 10px 12px; background: var(--bg-input); border: 1px solid var(--border-default); border-radius: var(--radius-sm); color: var(--text-primary); font-size: 0.85rem; outline: none; transition: border-color 0.2s;"
                  onfocus="this.style.borderColor='var(--accent-blue)'" onblur="this.style.borderColor='var(--border-default)'">
              </div>
              <div style="display: flex; flex-direction: column; gap: 6px;">
                <label for="complaint-detail" style="font-size: 0.8rem; font-weight: 600; color: var(--text-primary); display: flex; align-items: center; gap: 6px;">
                  <i class="fa-solid fa-triangle-exclamation text-yellow"></i> Kendala yang Dihadapi
                </label>
                <textarea id="complaint-detail" placeholder="Contoh: Lab error di langkah nomor 5..." required rows="3"
                  style="width: 100%; padding: 10px 12px; background: var(--bg-input); border: 1px solid var(--border-default); border-radius: var(--radius-sm); color: var(--text-primary); font-size: 0.85rem; outline: none; transition: border-color 0.2s; resize: vertical;"
                  onfocus="this.style.borderColor='var(--accent-blue)'" onblur="this.style.borderColor='var(--border-default)'"></textarea>
              </div>
              <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 0.8rem; font-weight: 600; color: var(--text-primary); display: flex; align-items: center; gap: 6px;">
                  <i class="fa-solid fa-image text-red"></i> Screenshot Kendala (Opsional)
                </label>
                <div class="image-upload-wrapper" style="position: relative; border: 1px dashed var(--border-default); border-radius: var(--radius-sm); padding: 15px; text-align: center; background: rgba(9, 13, 22, 0.4); cursor: pointer; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent-red)'" onmouseout="this.style.borderColor='var(--border-default)'" onclick="document.getElementById('complaint-screenshot').click()">
                  <i class="fa-solid fa-cloud-arrow-up text-muted" style="font-size: 1.5rem; margin-bottom: 8px; display: block;" id="upload-icon"></i>
                  <span style="font-size: 0.8rem; color: var(--text-secondary);" id="upload-text">Klik untuk pilih gambar screenshot</span>
                  <input type="file" id="complaint-screenshot" accept="image/*" style="display: none;" onchange="handleScreenshotSelect(event)">
                </div>
                <!-- Preview area -->
                <div id="screenshot-preview-container" class="hidden" style="position: relative; margin-top: 8px; border-radius: var(--radius-sm); overflow: hidden; border: 1px solid var(--border-default); max-height: 150px; background: rgba(0,0,0,0.3);">
                  <img id="screenshot-preview" src="" style="width: 100%; height: auto; display: block; max-height: 150px; object-fit: contain; margin: 0 auto;">
                  <button type="button" onclick="clearScreenshot(event)" style="position: absolute; top: 5px; right: 5px; background: rgba(239, 68, 68, 0.85); border: none; border-radius: 50%; color: white; width: 22px; height: 22px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.75rem;">
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                </div>
              </div>
              <button type="submit" id="btn-submit-complaint" class="btn btn-primary" style="padding: 12px; font-size: 0.9rem; background: linear-gradient(135deg, var(--accent-red), #c53030); border: none; border-radius: var(--radius-md); display: inline-flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600; box-shadow: 0 4px 15px rgba(219, 68, 85, 0.2); transition: all 0.2s; cursor: pointer; color: white;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(219, 68, 85, 0.35)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(219, 68, 85, 0.2)';" onclick="this.style.transform='translateY(0)'">
                <i class="fa-solid fa-paper-plane"></i> Kirim Laporan Kendala
              </button>
            </form>

            <div id="lab-complaint-success" class="hidden" style="margin-top: 15px; color: var(--accent-green); font-size: 0.85rem; font-weight: 600; background: var(--accent-green-subtle); border: 1px solid rgba(61, 171, 94, 0.2); padding: 12px; border-radius: var(--radius-sm); text-align: center;">
              <i class="fa-solid fa-circle-check"></i> Terima kasih! Laporan kendalamu berhasil terkirim. Fasilitator akan segera mengeceknya.
            </div>
          </div>

          <div style="margin-top: 10px;">
            <span style="font-size: 0.72rem; color: var(--text-secondary); text-align: center; display: block;">
              <i class="fa-solid fa-shield-halved text-green"></i> Laporanmu dijamin aman dan akan ditinjau langsung oleh fasilitator.
            </span>
          </div>
        </div>

      </div>
    </div>

    <!-- Tab Content: Skill Badges -->
    <div id="tab-content-skills" class="main-tab-content hidden">
      <!-- Tracking Dashboard Panel -->
      <div class="glass" style="padding: 20px; margin-bottom: 25px; display: flex; flex-direction: column; gap: 15px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
          <div>
            <h3 style="font-size: 1.1rem; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-clipboard-list text-blue"></i> Tracking Progres Mandiri
            </h3>
            <p style="font-size: 0.8rem; color: var(--text-secondary); margin: 4px 0 0 0;">
              Tandai skill badge yang telah Anda selesaikan untuk memantau pencapaian Anda.
            </p>
          </div>
          <!-- Import/Export Buttons -->
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px;" onclick="exportProgressExcel()">
              <i class="fa-solid fa-file-excel text-green"></i> Ekspor Excel
            </button>
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px;" onclick="triggerImport()">
              <i class="fa-solid fa-file-import"></i> Impor
            </button>
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px; border-color: rgba(239, 68, 68, 0.4); color: #f87171;" onclick="resetProgress()">
              <i class="fa-solid fa-trash-can"></i> Reset
            </button>
            <input type="file" id="import-file-input" style="display: none;" accept=".json,.csv,.xlsx,.xls" onchange="importProgress(event)">
          </div>
        </div>

        <!-- Progress bar and numbers -->
        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
          <div class="progress-bar-container" style="flex-grow: 1; height: 10px; background: rgba(255,255,255,0.06); border-radius: 99px; overflow: hidden; border: 1px solid var(--border-default); position: relative;">
            <div id="tracking-progress-bar" style="width: 0%; height: 100%; background: linear-gradient(90deg, var(--accent-blue), var(--accent-green)); transition: width 0.4s ease-in-out;"></div>
          </div>
          <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-primary); white-space: nowrap;">
            <span id="tracking-count">0</span> / <span id="tracking-total">0</span> Selesai (<span id="tracking-percent">0%</span>)
          </div>
        </div>
      </div>

      <!-- Skill Badges Cards List -->
      <div id="skills-badges-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 16px;">
        <!-- Will be populated dynamically -->
      </div>
    </div>
@endsection
