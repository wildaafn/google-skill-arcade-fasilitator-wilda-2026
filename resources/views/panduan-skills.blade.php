@extends('layouts.app')

@section('title', 'Panduan Skills Google')

@section('content')
<div class="container">
      <div class="section-header text-center">
        <h1 class="section-title">Panduan Pendaftaran <span class="text-blue">Skills Google</span></h1>
        <p class="section-subtitle">Pelajari langkah-langkah mendaftar akun Google Cloud Skills Boost dan cara mengatasi kendala teknis.</p>
      </div>

      <div class="grid-2col" style="margin-top: 40px; align-items: start; gap: 40px;">
        <!-- Left Column: Guide Details -->
        <div>
          <!-- Important Notice Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; margin-bottom: 28px; border-left: 4px solid var(--accent-red); background: rgba(234, 67, 53, 0.03); display: block;">
            <h3 class="text-red" style="margin-bottom: 12px; font-size: 1.15rem;"><i class="fa-solid fa-user-check"></i> Syarat Batas Usia (Penting!)</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6;">
              Berdasarkan ketentuan resmi Google Cloud Skills Boost, program ini ditujukan untuk peserta dengan usia minimum <strong>18 tahun</strong>. Pastikan akun Google yang Anda gunakan telah memenuhi persyaratan usia resmi ini agar kelayakan partisipasi dan proses pembuatan akun berjalan dengan lancar.
            </p>
          </div>

          <!-- Do Not Start Early Notice Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; margin-bottom: 28px; border-left: 4px solid var(--accent-yellow); background: rgba(251, 188, 5, 0.03); display: block;">
            <h3 class="text-yellow" style="margin-bottom: 12px; font-size: 1.15rem;"><i class="fa-solid fa-triangle-exclamation"></i> Jangan Mulai Mengerjakan Sebelum 13 Juli</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6;">
              Harap diingat: <strong>jangan mengerjakan atau menyelesaikan badge Google Skills terlebih dahulu sebelum tanggal 13 Juli 2026 pukul 09:00 WIB</strong>. Hal ini sangat penting agar progres pengerjaan lencana kalian nantinya dapat dideteksi dan terbaca secara maksimal oleh sistem otomatis Google Cloud saat periode program resmi dimulai.
            </p>
          </div>

          <!-- Captcha Solution Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; margin-bottom: 28px; border-left: 4px solid var(--accent-yellow); background: rgba(251, 188, 5, 0.03); display: block;">
            <h3 class="text-yellow" style="margin-bottom: 12px; font-size: 1.15rem;"><i class="fa-solid fa-robot"></i> Mengatasi Captcha Gagal / Error</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6; margin-bottom: 12px;">
              Banyak calon peserta yang mengalami masalah saat registrasi di mana <strong>Captcha gagal diverifikasi</strong> atau tombol submit tidak merespons. Jangan panik! Berikut beberapa solusi alternatif yang terbukti berhasil:
            </p>
            <ul style="padding-left: 20px; color: var(--text-secondary); font-size: 0.88rem; display: flex; flex-direction: column; gap: 8px;">
              <li><strong>Ganti Jaringan Internet:</strong> Jika menggunakan Wi-Fi rumah/kampus, matikan dan beralih ke Mobile Data seluler kalian (tethering HP), atau sebaliknya.</li>
              <li><strong>Ganti Browser / Mode Incognito:</strong> Coba gunakan Google Chrome Mode Incognito (Penyamaran), Microsoft Edge, atau Firefox. Bersihkan cache browser terlebih dahulu.</li>
              <li><strong>Coba Device Lain:</strong> Jika pendaftaran lewat laptop terus menerus error captcha, coba lakukan registrasi menggunakan Handphone (smartphone) kalian.</li>
            </ul>
          </div>

          <!-- Step by Step Card -->
          <div class="fasil-intro-card glass" style="padding: 28px; display: block;">
            <h3 class="text-green" style="margin-bottom: 16px; font-size: 1.15rem;"><i class="fa-solid fa-list-check"></i> Langkah-Langkah Registrasi</h3>
            <ol style="padding-left: 20px; color: var(--text-secondary); font-size: 0.88rem; display: flex; flex-direction: column; gap: 12px;">
              <li>Kunjungi situs resmi pendaftaran di <a href="https://www.cloudskillsboost.google/" target="_blank" style="color: var(--accent-blue); text-decoration: underline; font-weight: 600;">skills.google (Google Cloud Skills Boost)</a>.</li>
              <li>Klik tombol <strong>"Join"</strong> atau <strong>"Sign In"</strong> di pojok kanan atas.</li>
              <li>Disarankan memilih opsi <strong>"Sign in with Google"</strong> agar proses sinkronisasi profil lebih cepat dan mudah.</li>
              <li>Pastikan akun Google Anda memenuhi batas usia minimum (18 tahun) sesuai ketentuan.</li>
              <li>Setelah berhasil masuk, lengkapi profil kalian dan pastikan untuk menyetel profil kalian menjadi <strong>Public</strong> agar lencana (badges) yang didapatkan dapat diverifikasi oleh fasilitator.</li>
            </ol>
          </div>
        </div>

        <!-- Right Column: Success Screenshot Preview -->
        <div class="fasil-intro-card glass text-center" style="padding: 24px; position: sticky; top: 100px; display: block;">
          <h3 class="text-blue" style="font-size: 1.1rem; margin-bottom: 16px;"><i class="fa-solid fa-circle-check"></i> Contoh Akun Sukses Terdaftar</h3>
          
          <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-default); box-shadow: 0 10px 30px rgba(0,0,0,0.4); margin-bottom: 12px;">
            <img src="assets/berhasil skills google.jpeg" alt="Bukti Berhasil Terdaftar di Google Cloud Skills Boost" style="width: 100%; height: auto; object-fit: cover;">
          </div>
          
          <p style="font-size: 0.8rem; color: var(--text-secondary);">
            Tampilan dasbor profil Google Cloud Skills Boost setelah kalian berhasil mendaftar dan login ke sistem.
          </p>
        </div>
      </div>
    </div>
@endsection
