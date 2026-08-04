@extends('layouts.app')

@section('title', 'Cara Bermain')

@section('content')
<div class="container">
      <div class="section-header text-center">
        <h1 class="section-title">Langkah Mudah <span class="text-yellow">Mulai Petualanganmu</span></h1>
        <p class="section-subtitle">Ikuti panduan langkah demi langkah ini untuk memastikan kamu mengumpulkan poin dengan benar!</p>
      </div>

      <div class="timeline" style="margin-bottom: 80px;">
        <div class="timeline-item">
          <div class="timeline-number">1</div>
          <div class="timeline-content glass">
            <h4>Daftar & Gabung Grup</h4>
            <p>Daftarkan dirimu melalui link registrasi resmi (saat pendaftaran dibuka) dan pastikan langsung bergabung ke Saluran WhatsApp Komunitas untuk koordinasi.</p>
            <div class="step-badge-icon blue-glow"><i class="fa-solid fa-user-plus"></i></div>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">2</div>
          <div class="timeline-content glass">
            <h4>Klaim Token & Mulai Lab</h4>
            <p>Kamu akan mendapatkan token akses gratis. Gunakan token ini untuk meluncurkan Google Cloud Console dan mulai menyelesaikan quest/lab bulanan yang ditentukan.</p>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 8px; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 8px;">
              <i class="fa-solid fa-circle-info text-blue"></i> Cara ini baru akan digunakan setelah kalian mendapatkan email konfirmasi pendaftaran program nanti.
            </p>
            <div class="step-badge-icon red-glow"><i class="fa-solid fa-key"></i></div>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">3</div>
          <div class="timeline-content glass">
            <h4>Kumpulkan Badges & Poin</h4>
            <p>Selesaikan lab untuk meraih lencana. Ada 2 tipe lencana: <strong>Arcade Game Badge</strong> (1 Poin) dan <strong>Skills Badge</strong> (2 Lencana = 1 Poin). Kumpulkan sebanyak-banyaknya!</p>
            <div class="step-badge-icon yellow-glow"><i class="fa-solid fa-award"></i></div>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">4</div>
          <div class="timeline-content glass">
            <h4>Redeem Swag Impian</h4>
            <p>Ketika masa "Swag Drop" dibuka, tukarkan akumulasi poinmu di website resmi Arcade Google Cloud dengan merchandise eksklusif pilihanmu.</p>
            <div class="step-badge-icon green-glow"><i class="fa-solid fa-truck-fast"></i></div>
          </div>
        </div>
      </div>

      <!-- Detail Aturan Arcade Game & Skill Badges -->
      <div class="grid-2col" style="margin-top: 60px;">
        <div class="fasil-intro-card glass" style="display: block; padding: 32px;">
          <h3 class="text-blue" style="margin-bottom: 16px;"><i class="fa-solid fa-gamepad"></i> 1. Arcade Game Badges (1 Poin)</h3>
          <p style="color: var(--text-secondary); margin-bottom: 16px;">
            Setiap bulannya, Google Cloud merilis game bertema spesifik (seperti Trivia, Level 1, Level 2, dll.). 
          </p>
          <ul style="padding-left: 20px; color: var(--text-secondary); display: flex; flex-direction: column; gap: 8px;">
            <li>Satu game biasanya memuat 4 hingga 8 lab praktik.</li>
            <li>Tidak ada pengerjaan kuis berulang; kamu cukup menyelesaikan lab hingga mendapat centang hijau.</li>
            <li>Begitu game terselesaikan 100%, badge digital akan otomatis masuk ke profil kamu dalam waktu 24 jam.</li>
            <li>Nilai penukaran: <strong>1 Badge = 1 Arcade Point</strong>.</li>
          </ul>
        </div>

        <div class="fasil-intro-card glass" style="display: block; padding: 32px;">
          <h3 class="text-green" style="margin-bottom: 16px;"><i class="fa-solid fa-graduation-cap"></i> 2. Skill Badges (2 Badges = 1 Poin)</h3>
          <p style="color: var(--text-secondary); margin-bottom: 16px;">
            Merupakan lencana yang didapat dengan menyelesaikan rangkaian lab terstruktur yang diakhiri dengan **Challenge Lab**.
          </p>
          <ul style="padding-left: 20px; color: var(--text-secondary); display: flex; flex-direction: column; gap: 8px;">
            <li>Challenge Lab menguji kemampuan mandiri kamu (tanpa ada instruksi langkah-langkah di dalam lab).</li>
            <li>Kak Wilda akan memandu tips mengerjakan Challenge Lab ini lewat video panduan di grup.</li>
            <li>Skill badge memiliki kredensial resmi yang bisa dipajang di LinkedIn.</li>
            <li>Nilai penukaran: <strong>2 Badges = 1 Arcade Point</strong>.</li>
          </ul>
        </div>
      </div>

      <!-- Catatan Penting Validitas Tanggal -->
      <div class="fasil-intro-card glass" style="padding: 24px; margin-top: 24px; border: 1px solid rgba(251, 188, 5, 0.2); background: rgba(251, 188, 5, 0.03);">
        <p style="color: var(--accent-yellow); font-size: 0.9rem; font-weight: 600; margin-bottom: 8px;">
          <i class="fa-solid fa-triangle-exclamation"></i> Syarat Validitas Penyelesaian Lencana (Badge):
        </p>
        <p style="color: var(--text-secondary); font-size: 0.85rem;">
          Lencana (baik Game Badge maupun Skill Badge) hanya akan dihitung masuk ke dalam akumulasi poin program jika diselesaikan <strong>pada atau setelah tanggal 13 Juli 2026 pukul 09:00 WIB</strong> hingga program pendaftaran resmi ditutup pada <strong>14 September 2026 pukul 23:59 WIB</strong>. Lencana yang diselesaikan sebelum tanggal pembukaan tidak akan dihitung oleh sistem otomatis Google Cloud.
        </p>
      </div>

      <!-- Video Tutorial & Gambaran Pengerjaan -->
      <div class="fasil-intro-card glass" style="display: block; padding: 40px; margin-top: 40px;">
        <h3 class="text-blue" style="margin-bottom: 16px; text-align: center;"><i class="fa-brands fa-youtube"></i> Panduan Klaim Kredit & Gambaran Pengerjaan Lab</h3>
        
        <p style="color: var(--text-secondary); font-size: 0.95rem; text-align: center; max-width: 700px; margin: 0 auto 24px auto;">
          Sebelum mulai belajar, tonton video singkat dari YouTube berikut untuk melihat cara melakukan klaim token/kredit gratis serta demo singkat pengerjaan lab di Google Cloud Skills Boost.
        </p>

        <!-- Video Wrapper for Responsive Iframe -->
        <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: var(--radius-md); border: 1px solid var(--border-default); max-width: 700px; margin: 0 auto 24px auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
          <iframe 
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
            src="https://www.youtube.com/embed/3fjIsJTeWfk" 
            title="Cara Klaim Kredit Google Cloud Skills Boost" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </div>

        <div style="max-width: 700px; margin: 0 auto; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-default); padding: 20px; border-radius: var(--radius-sm);">
          <h4 style="color: var(--text-primary); margin-bottom: 12px; font-size: 0.95rem;"><i class="fa-solid fa-circle-info"></i> Ringkasan Cara Pengerjaan Lab:</h4>
          <ol style="padding-left: 20px; color: var(--text-secondary); display: flex; flex-direction: column; gap: 12px; font-size: 0.85rem;">
            <li>
              <strong>Login ke Akun Kalian:</strong> Masuk ke platform <a href="https://www.cloudskillsboost.google/" target="_blank" style="color: var(--accent-blue); text-decoration: underline;">Google Cloud Skills Boost</a>.
              <div style="margin-top: 6px; padding-left: 15px; border-left: 2px solid var(--accent-blue); font-size: 0.8rem; color: var(--text-secondary); display: flex; flex-direction: column; gap: 4px;">
                <span>• <em>Belum punya akun?</em> Silakan klik tombol <strong>Join</strong> di kanan atas. Untuk pendaftaran instan, disarankan memilih opsi <strong>Sign in with Google</strong>.</span>
                <span>• <em>Notes Batas Usia:</em> Pastikan akun Anda memenuhi batas usia minimum (18 tahun) sesuai Ketentuan Layanan Google Cloud.</span>
                <span>• <em>Pengaturan Profil Publik (Penting!):</em> Setelah masuk, buka menu Profil kalian (klik foto lingkaran di pojok kanan atas) &rarr; klik <strong>Profile</strong> &rarr; klik tombol <strong>Make Profile Public</strong> (atau <strong>Share Profile</strong> &rarr; <strong>Make Profile Public</strong>) agar lencana kalian tercatat.</span>
              </div>
            </li>
            <li>
              <strong>Klaim Kredit:</strong> Masukkan kode token gratis yang dibagikan Kak Wilda di menu promo/claim credit.
              <div style="margin-top: 6px; padding-left: 15px; border-left: 2px solid var(--accent-red); font-size: 0.8rem; color: var(--text-secondary);">
                <span>• <em>Notes Penting:</em> Cara klaim kredit ini baru akan kalian gunakan <strong>setelah kalian mendapatkan email konfirmasi pendaftaran program</strong> resmi nanti.</span>
              </div>
            </li>
            <li><strong>Mulai Lab (Start Lab):</strong> Buka lab yang ditargetkan, lalu klik tombol <strong>"Start Lab"</strong> untuk membuat kredensial Google Cloud Console sementara.</li>
            <li><strong>Masuk ke Google Cloud Console:</strong> Gunakan username & password sementara yang disediakan di sisi kiri layar (jangan gunakan akun Gmail pribadi kalian).</li>
            <li><strong>Selesaikan Instruksi:</strong> Ikuti petunjuk praktikum di instruksi lab secara perlahan dan pastikan untuk menekan tombol <strong>"Check my progress"</strong> untuk menyimpan kemajuan kalian hingga meraih skor 100/100.</li>
            <li><strong>Akhiri Lab:</strong> Klik <strong>"End Lab"</strong> setelah selesai, dan pastikan lencana atau status lab berubah menjadi centang hijau/selesai.</li>
          </ol>
        </div>
      </div>

    </div>

    </div>
@endsection
