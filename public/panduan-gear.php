<?php $pageTitle = 'Panduan Google GEAR'; $currentPage = 'panduan-gear'; ?>
<?php include __DIR__ . '/includes/header.php'; ?>
<div class="container">
      <div class="section-header text-center">
        <h1 class="section-title">Panduan Pendaftaran <span class="text-green">Google GEAR</span></h1>
        <p class="section-subtitle">Pelajari petunjuk mendaftar Google Developer Program (GEAR) dan cara mengisi data institusi dengan benar.</p>
      </div>

      <div class="grid-2col" style="margin-top: 40px; align-items: start; gap: 40px;">
        <!-- Left Column: Guide Details -->
        <div>
          <!-- Institution Fields Guide Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; margin-bottom: 28px; border-left: 4px solid var(--accent-blue); background: rgba(66, 133, 244, 0.03); display: block;">
            <h3 class="text-blue" style="margin-bottom: 16px; font-size: 1.15rem;"><i class="fa-solid fa-building-columns"></i> Cara Mengisi Kolom Institusi / Komunitas</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6; margin-bottom: 16px;">
              Banyak pendaftar yang bingung saat mengisi kolom **Institusi** atau **Komunitas** di form pendaftaran Google Developer Program (GEAR). Jangan bingung, sesuaikan dengan status kalian saat ini:
            </p>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
              <div style="display: flex; align-items: flex-start; gap: 12px; background: rgba(255,255,255,0.02); padding: 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-default);">
                <div style="color: var(--accent-blue); font-size: 1.1rem; padding-top: 2px;"><i class="fa-solid fa-school"></i></div>
                <div>
                  <h5 style="color: var(--text-primary); font-size: 0.9rem; margin-bottom: 2px;">Bagi yang masih Sekolah</h5>
                  <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;">Silakan isi kolom institusi dengan <strong>Nama Sekolah</strong> kalian (misalnya: SMKN 1 Jakarta).</p>
                </div>
              </div>

              <div style="display: flex; align-items: flex-start; gap: 12px; background: rgba(255,255,255,0.02); padding: 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-default);">
                <div style="color: var(--accent-green); font-size: 1.1rem; padding-top: 2px;"><i class="fa-solid fa-university"></i></div>
                <div>
                  <h5 style="color: var(--text-primary); font-size: 0.9rem; margin-bottom: 2px;">Bagi yang sedang Kuliah</h5>
                  <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;">Silakan isi kolom institusi dengan <strong>Nama Universitas / Kampus</strong> kalian (misalnya: Universitas Indonesia).</p>
                </div>
              </div>

              <div style="display: flex; align-items: flex-start; gap: 12px; background: rgba(255,255,255,0.02); padding: 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-default);">
                <div style="color: var(--accent-red); font-size: 1.1rem; padding-top: 2px;"><i class="fa-solid fa-briefcase"></i></div>
                <div>
                  <h5 style="color: var(--text-primary); font-size: 0.9rem; margin-bottom: 2px;">Bagi yang sudah Bekerja</h5>
                  <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;">Silakan isi kolom institusi dengan <strong>Nama Perusahaan / Tempat Kerja</strong> kalian (misalnya: PT Ruang Raya Indonesia).</p>
                </div>
              </div>

              <div style="display: flex; align-items: flex-start; gap: 12px; background: rgba(255,255,255,0.02); padding: 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-default);">
                <div style="color: var(--accent-yellow); font-size: 1.1rem; padding-top: 2px;"><i class="fa-solid fa-graduation-cap"></i></div>
                <div>
                  <h5 style="color: var(--text-primary); font-size: 0.9rem; margin-bottom: 2px;">Bagi yang sedang mencari kerja / tidak bekerja</h5>
                  <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;">Silakan isi kolom institusi dengan nama <strong>Institusi Pendidikan Terakhir</strong> kalian.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Step by Step Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; display: block;">
            <h3 class="text-green" style="margin-bottom: 16px; font-size: 1.15rem;"><i class="fa-solid fa-list-check"></i> Langkah-Langkah Registrasi GEAR</h3>
            <ol style="padding-left: 20px; color: var(--text-secondary); font-size: 0.88rem; display: flex; flex-direction: column; gap: 12px;">
              <li>Kunjungi situs resmi GEAR di <a href="https://developers.google.com/program/gear" target="_blank" style="color: var(--accent-green); text-decoration: underline; font-weight: 600;">developers.google.com/program/gear</a>.</li>
              <li>Klik tombol <strong>"Join Google Developer Program"</strong>.</li>
              <li>Masuk menggunakan akun Google kalian.</li>
              <li>Isi data diri kalian, termasuk kolom institusi/komunitas sesuai panduan di atas.</li>
              <li>Setujui syarat & ketentuan, lalu klik submit. Pastikan kalian melihat halaman sukses pendaftaran.</li>
            </ol>
          </div>

          <!-- Penting: Tanda Berhasil & Akun Publik -->
          <div class="fasil-intro-card glass" style="padding: 24px; margin-top: 24px; border: 1px solid rgba(251, 188, 5, 0.2); background: rgba(251, 188, 5, 0.03); display: block;">
            <p style="color: var(--accent-yellow); font-size: 0.95rem; font-weight: 600; margin-bottom: 8px;">
              <i class="fa-solid fa-triangle-exclamation"></i> Catatan Penting Pendaftaran GEAR:
            </p>
            <ul style="padding-left: 20px; color: var(--text-secondary); font-size: 0.85rem; display: flex; flex-direction: column; gap: 8px;">
              <li><strong>Tanda Berhasil:</strong> Pendaftaran kalian dinyatakan berhasil jika kalian sudah mendapatkan badge GEAR yaitu <strong>Gemini Enterprise Agent Ready</strong> di dalam profil Google Developer kalian. Yang terpenting adalah lencana/badge tersebut sudah muncul dan aktif.</li>
              <li><strong>Atur Akun Publik:</strong> Jangan lupa untuk mengatur akun/profil GEAR kalian ke **Public (Set Public)** agar data dan kemajuan kalian dapat divalidasi dan terbaca secara otomatis oleh panitia/sistem.</li>
            </ul>
          </div>
        </div>

        <!-- Right Column: Success Screenshot Preview -->
        <div class="fasil-intro-card glass text-center" style="padding: 24px; position: sticky; top: 100px; display: block;">
          <h3 class="text-blue" style="font-size: 1.1rem; margin-bottom: 16px;"><i class="fa-solid fa-circle-check"></i> Contoh Pendaftaran Sukses GEAR</h3>
          
          <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-default); box-shadow: 0 10px 30px rgba(0,0,0,0.4); margin-bottom: 12px;">
            <div style="width: 100%; height: 200px; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; color: var(--text-secondary);">
              [Gambar Pendaftaran Sukses]
            </div>
          </div>
          
          <p style="font-size: 0.8rem; color: var(--text-secondary);">
            Tampilan lencana profil setelah kalian sukses terdaftar di Google Developer Program GEAR.
          </p>
        </div>
      </div>
    </div>
<?php include __DIR__ . '/includes/footer.php'; ?>
