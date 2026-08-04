@extends('layouts.app')

@section('title', 'Pertanyaan Sering Diajukan (QnA)')

@section('content')
<div class="container">
      <div class="section-header text-center">
        <h1 class="section-title">Pertanyaan <span class="text-red">Paling Sering Diajukan</span> (FAQ)</h1>
        <p class="section-subtitle">Temukan jawaban cepat atas kebingunganmu di sini!</p>
      </div>

      <!-- FAQ Search -->
      <div class="faq-search-wrapper">
        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass search-icon"></i>
          <input type="text" id="faq-search" placeholder="Cari pertanyaan kamu (misal: 'gratis', 'swag', 'token')...">
          <button id="faq-clear" class="clear-btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
      </div>

      <!-- FAQ Grid -->
      <div class="faq-container" id="faq-list">
        <div class="faq-card glass" data-keywords="gratis free biaya bayar">
          <div class="faq-question">
            <h4>Apakah program Google Cloud Arcade X Dicoding ini gratis?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p><strong>Ya, 100% gratis!</strong> Kalian tidak dipungut biaya apa pun untuk mendaftar. Selama program berlangsung, kalian juga akan dibagikan token kredit gratis untuk mengerjakan seluruh lab di platform Google Cloud Skills Boost.</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="swag hadiah kirim ongkir rumah">
          <div class="faq-question">
            <h4>Bagaimana cara mendapatkan swag/hadiah? Apakah gratis ongkir?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Setiap lab/game yang kalian selesaikan akan memberikan lencana digital (badge). Di akhir musim, badge tersebut dapat ditukarkan dengan poin. Poin-poin tersebut dapat kalian gunakan untuk memesan merchandise di toko swag resmi. <strong>Ya, pengiriman merchandise ke Indonesia sepenuhnya gratis ongkir ditanggung oleh Google!</strong></p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="token kredit habis kurang error">
          <div class="faq-question">
            <h4>Bagaimana jika token lab saya habis atau akun saya terkena blokir?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Jika token habis, kalian bisa mengajukan permintaan token tambahan melalui form yang disediakan fasilitator di Saluran WhatsApp. Jika akun kalian diblokir (quota limit/lab block), kalian dapat menghubungi support resmi chat online di portal Google Cloud Skills Boost untuk mereset kuota kalian dengan cepat.</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="pemula basic background programming">
          <div class="faq-question">
            <h4>Saya pemula dan tidak punya background IT, apakah bisa ikut?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Tentu saja! Program ini dirancang untuk semua tingkatan. Setiap lab berisi langkah-langkah detail yang bisa kalian ikuti secara langsung (*copy-paste* perintah dan penjelasan). Selain itu, Kak Wilda selaku fasilitator akan membagikan video panduan serta membuka sesi tanya-jawab di grup untuk membantu kendala kalian.</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="poin kalkulasi hitung badges">
          <div class="faq-question">
            <h4>Berapa perhitungan poin untuk setiap badge yang didapatkan?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Umumnya, perhitungannya adalah:</p>
            <ul>
              <li><strong>1 Arcade Game Badge</strong> (Didapat dari game bulanan atau event trivia) = <strong>1 Poin</strong>.</li>
              <li><strong>2 Skill Badges</strong> (Didapat dari menyelesaikan materi terstruktur/Challenge Lab) = <strong>1 Poin</strong>.</li>
            </ul>
            <p>Kumpulkan poin sebanyak-banyaknya karena item swag premium (seperti jaket tebal dan backpack) membutuhkan jumlah poin yang lebih besar.</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="daftar link buka registrasi kapan">
          <div class="faq-question">
            <h4>Kapan pendaftaran dibuka dan di mana link pendaftarannya?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Pendaftaran bimbingan resmi dibuka mulai <strong>13 Juli 2026 pukul 09:00 WIB</strong> hingga <strong>14 September 2026 pukul 23:59 WIB</strong>. Saat ini status pendaftaran masih <strong>Coming Soon</strong>. Pastikan kalian sudah masuk ke Saluran WhatsApp Komunitas agar saat link pendaftaran dibuka, kalian bisa segera mendaftar sebelum kuota habis!</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="hp handphone smartphone mobile laptop pc device komputer">
          <div class="faq-question">
            <h4>Boleh pakai HP atau tidak? Atau jika tidak punya laptop gimana?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Boleh banget, asal tekun dan ada kemauan! Di season/musim sebelumnya, ada beberapa peserta pendampingan fasilitator yang tidak memiliki laptop dan hanya bermodalkan HP, tapi mereka tetap berhasil menyelesaikan seluruh tantangan lab dan sukses membawa pulang merchandise (swag) resmi Google Cloud.</p>
          </div>
        </div>

        <div class="faq-card glass" data-keywords="umur usia 18 tahun syarat batas minimal daftar akun">
          <div class="faq-question">
            <h4>Berapakah batas usia minimum untuk mendaftar Google Cloud Skills Boost?</h4>
            <span class="faq-toggle"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Berdasarkan Ketentuan Layanan Google Cloud Skills Boost, batas usia minimum resmi untuk mendaftar adalah <strong>18 tahun</strong>. Pastikan akun Anda telah memenuhi kriteria usia minimal tersebut agar proses pendaftaran berjalan lancar.</p>
          </div>
        </div>
      </div>
    </div>
@endsection
