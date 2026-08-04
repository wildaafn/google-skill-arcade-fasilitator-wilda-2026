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
  <script src="/js/script.js"></script>
  <?php if (!empty($extraScripts)) echo $extraScripts; ?>
</body>
</html>
