<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Google Cloud Arcade X Dicoding') - Portal Komunitas</title>
  <meta name="description" content="Bergabunglah bersama Fasilitator WILDA ARIFFATUL FAISALNUR untuk mendapatkan info token lab gratis, tips tutorial, dan info Swag Drop.">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @yield('styles')
</head>
<body>

  <!-- Disclaimer Top Bar -->
  <div class="top-disclaimer">
    <div class="container">
      <p>
        <span class="badge red-badge">INFO FASILITATOR</span> 
        Website ini dibuat mandiri oleh <strong>WILDA ARIFFATUL FAISALNUR</strong> sebagai Fasilitator dan <strong>BUKAN</strong> website resmi Google Cloud / Dicoding.
      </p>
    </div>
  </div>

  <!-- Header Navigation -->
  <header>
    <div class="container nav-container">
      <a href="{{ route('home') }}" class="logo">
        <span class="g-blue">G</span><span class="g-red">o</span><span class="g-yellow">o</span><span class="g-blue">g</span><span class="g-green">l</span><span class="g-red">e</span>
        <span class="arcade-title">Arcade</span>
      </a>
      
      <nav class="desktop-nav">
        <ul>
          <li><a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('tentang') }}" class="nav-link {{ Route::is('tentang') ? 'active' : '' }}">Tentang Program</a></li>
          <li><a href="{{ route('cara-main') }}" class="nav-link {{ Route::is('cara-main') ? 'active' : '' }}">Cara Main</a></li>
          <li><a href="{{ route('kalkulator') }}" class="nav-link {{ Route::is('kalkulator') ? 'active' : '' }}">Cek Poin</a></li>
          <li class="nav-item-dropdown">
            <a href="#" class="nav-link {{ Route::is('strategi') || Route::is('solusi-lab') ? 'active' : '' }}">Strategi <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 2px;"></i></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('strategi') }}">Strategi Poin</a></li>
              <li><a href="{{ route('solusi-lab') }}">Tutorial Lab</a></li>
            </ul>
          </li>
          <li><a href="{{ route('galeri-swag') }}" class="nav-link {{ Route::is('galeri-swag') ? 'active' : '' }}">Galeri Swag</a></li>
          <li><a href="{{ route('qna') }}" class="nav-link {{ Route::is('qna') ? 'active' : '' }}">QnA</a></li>
          <li><a href="{{ route('komunitas') }}" class="nav-link {{ Route::is('komunitas') ? 'active' : '' }}">Komunitas</a></li>
          <li class="nav-item-dropdown">
            <a href="#" class="nav-link {{ Route::is('panduan-skills') || Route::is('panduan-gear') ? 'active' : '' }}">Panduan <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 2px;"></i></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('panduan-skills') }}">Skills Google</a></li>
              <li><a href="{{ route('panduan-gear') }}">Google GEAR</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <div class="nav-actions">
        <a href="https://bit.ly/GoogleSkills26" id="nav-cta-btn" class="btn btn-primary" target="_blank">
          <i class="fa-solid fa-rocket"></i> Daftar Sekarang
        </a>
        <button class="mobile-menu-toggle" aria-label="Toggle Menu">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Nav Overlay -->
  <div class="mobile-nav-overlay">
    <div class="mobile-nav-content">
      <button class="mobile-menu-close"><i class="fa-solid fa-xmark"></i></button>
      <a href="{{ route('home') }}" class="mobile-logo" style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800;">
        <span class="g-blue">G</span><span class="g-red">o</span><span class="g-yellow">o</span><span class="g-blue">g</span><span class="g-green">l</span><span class="g-red">e</span> Arcade
      </a>
      <ul>
        <li><a href="{{ route('home') }}" class="mobile-link {{ Route::is('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('tentang') }}" class="mobile-link {{ Route::is('tentang') ? 'active' : '' }}">Tentang Program</a></li>
        <li><a href="{{ route('cara-main') }}" class="mobile-link {{ Route::is('cara-main') ? 'active' : '' }}">Cara Main</a></li>
        <li><a href="{{ route('kalkulator') }}" class="mobile-link {{ Route::is('kalkulator') ? 'active' : '' }}">Cek Poin & Papan Skor</a></li>
        <li><a href="{{ route('strategi') }}" class="mobile-link {{ Route::is('strategi') ? 'active' : '' }}">Strategi Point</a></li>
        <li><a href="{{ route('solusi-lab') }}" class="mobile-link {{ Route::is('solusi-lab') ? 'active' : '' }}">Tutorial Lab</a></li>
        <li><a href="{{ route('galeri-swag') }}" class="mobile-link {{ Route::is('galeri-swag') ? 'active' : '' }}">Galeri Swag</a></li>
        <li><a href="{{ route('qna') }}" class="mobile-link {{ Route::is('qna') ? 'active' : '' }}">QnA</a></li>
        <li><a href="{{ route('komunitas') }}" class="mobile-link {{ Route::is('komunitas') ? 'active' : '' }}">Komunitas</a></li>
        <li><a href="{{ route('panduan-skills') }}" class="mobile-link {{ Route::is('panduan-skills') ? 'active' : '' }}">Panduan Skills Google</a></li>
        <li><a href="{{ route('panduan-gear') }}" class="mobile-link {{ Route::is('panduan-gear') ? 'active' : '' }}">Panduan Google GEAR</a></li>
      </ul>
      <div class="mobile-cta-wrapper">
        <a href="https://bit.ly/GoogleSkills26" class="btn btn-primary mobile-cta" target="_blank">
          <i class="fa-solid fa-rocket"></i> Daftar Sekarang
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content View -->
  <main class="section-padding">
    @yield('content')
  </main>

  <!-- Floating Chatbot Widget -->
  <div class="chatbot-container" id="chatbot">
    <button class="chatbot-toggle" id="chatbot-toggle-btn" aria-label="Open Chatbot">
      <i class="fa-solid fa-comments chat-open-icon"></i>
      <i class="fa-solid fa-xmark chat-close-icon hidden"></i>
      <span class="chat-badge-pulse">1</span>
    </button>

    <div class="chatbot-window hidden" id="chatbot-window">
      <!-- Chat Header -->
      <div class="chatbot-header">
        <div class="bot-info">
          <div class="bot-avatar"><i class="fa-solid fa-robot"></i></div>
          <div>
            <h4>GSkillBot</h4>
            <p><span class="online-indicator"></span> Aktif - Asisten Fasil Wilda</p>
          </div>
        </div>
      </div>

      <!-- Chat Body/Messages -->
      <div class="chatbot-body" id="chatbot-messages">
        <div class="message bot-message">
          <p>Halo! Selamat datang 👋 Saya <strong>GSkillBot</strong>, asisten virtual Kak Wilda.</p>
        </div>
        <div class="message bot-message">
          <p>Ada yang bisa saya bantu seputar program <strong>Google Cloud Arcade X Dicoding</strong>? Pilih salah satu menu di bawah atau ketik pertanyaanmu:</p>
        </div>
        <!-- Quick Options -->
        <div class="quick-options" id="quick-options">
          <button class="quick-opt-btn" data-query="apa itu arcade">🤔 Apa itu Arcade?</button>
          <button class="quick-opt-btn" data-query="bagaimana cara daftar">📝 Cara Daftar?</button>
          <button class="quick-opt-btn" data-query="apakah gratis">💸 Apakah Gratis?</button>
          <button class="quick-opt-btn" data-query="cara dapat swag">🎁 Cara Dapat Swag?</button>
          <button class="quick-opt-btn" data-query="saluran whatsapp">💬 Gabung WhatsApp Group</button>
          <button class="quick-opt-btn" data-query="chat pribadi">📞 Chat Pribadi Kak Wilda</button>
        </div>
      </div>

      <!-- Chat Input -->
      <div class="chatbot-footer">
        <input type="text" id="chat-input" placeholder="Tulis pesan di sini..." aria-label="Tanya chatbot">
        <button id="chat-send" aria-label="Kirim pesan"><i class="fa-solid fa-paper-plane"></i></button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container footer-content">
      <div class="footer-logo">
        <span class="g-blue">G</span><span class="g-red">o</span><span class="g-yellow">o</span><span class="g-blue">g</span><span class="g-green">l</span><span class="g-red">e</span> Arcade
      </div>
      <p class="footer-tagline">Portal Komunitas Fasilitator WILDA ARIFFATUL FAISALNUR</p>
      
      <div class="social-links">
        <a href="https://www.linkedin.com/in/wildaafn/" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://www.instagram.com/m_wildaafn" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://github.com/wildaafn" target="_blank" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.youtube.com/c/wildaafn" target="_blank" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
      </div>

      <div class="footer-divider"></div>
      
      <p class="disclaimer-text">
        <strong>Disclaimer Hukum:</strong> Situs web ini dibangun secara independen oleh WILDA ARIFFATUL FAISALNUR untuk keperluan belajar bersama komunitas peserta Google Cloud Arcade X Dicoding. Seluruh merek dagang, logo, materi pembelajaran, dan kekayaan intelektual terkait Google Cloud, Google Cloud Skills Boost, dan Dicoding adalah milik masing-masing entitas tersebut.
      </p>
      <p class="copyright-text">
        &copy; 2026 WILDA ARIFFATUL FAISALNUR. All Rights Reserved. Built with <i class="fa-solid fa-heart text-red"></i> for Indonesian Tech Community.
      </p>
    </div>
  </footer>

  <!-- Custom JS -->
  <script src="{{ asset('js/script.js') }}"></script>
  @yield('scripts')
</body>
</html>
