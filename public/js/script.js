/* ==========================================================================
   INTERACTIVE LOGIC - GOOGLE CLOUD ARCADE FASIL WEB (MULTI-PAGE)
   Built by WILDA ARIFFATUL FAISALNUR
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  
  // WhatsApp Link Config
  const WA_LINK = "https://chat.whatsapp.com/Cbbe9EzpMfSBDwBcwe0a70?mode=gi_t";

  // ==========================================
  // 1. NAVIGATION & SCROLL EFFECT
  // ==========================================
  const header = document.querySelector('header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // ==========================================
  // 2. MOBILE MENU TOGGLE
  // ==========================================
  const mobileToggle = document.querySelector('.mobile-menu-toggle');
  const mobileClose = document.querySelector('.mobile-menu-close');
  const mobileOverlay = document.querySelector('.mobile-nav-overlay');
  const mobileLinks = document.querySelectorAll('.mobile-link');

  if (mobileToggle && mobileOverlay) {
    const openMobileMenu = () => {
      mobileOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    };

    const closeMobileMenu = () => {
      mobileOverlay.classList.remove('active');
      document.body.style.overflow = '';
    };

    mobileToggle.addEventListener('click', openMobileMenu);
    if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
    mobileLinks.forEach(link => link.addEventListener('click', closeMobileMenu));
  }


  // ==========================================
  // 3. REGISTRATION STATE & REALTIME COUNTDOWN
  // ==========================================
  const navCtaBtn = document.getElementById('nav-cta-btn');
  const mobileCta = document.querySelector('.mobile-cta');
  
  // Timer Elements
  const daysEl = document.getElementById('days');
  const hoursEl = document.getElementById('hours');
  const minutesEl = document.getElementById('minutes');
  const secondsEl = document.getElementById('seconds');
  const regTitle = document.getElementById('registration-title');
  const regDesc = document.getElementById('registration-desc');
  const cardActionContainer = document.getElementById('card-action-container');

  // TARGET DATE: 13 July 2026 09:00:00 (GMT+0700 Waktu Indonesia Barat)
  const targetDate = new Date("2026-07-13T09:00:00+07:00");
  let countdownInterval;

  function updateCountdown() {
    const now = new Date().getTime();
    const difference = targetDate.getTime() - now;

    if (difference <= 0) {
      clearInterval(countdownInterval);
      setRegistrationOpen();
      return;
    }

    if (daysEl) {
      const days = Math.floor(difference / (1000 * 60 * 60 * 24));
      const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((difference % (1000 * 60)) / 1000);

      daysEl.textContent = String(days).padStart(2, '0');
      hoursEl.textContent = String(hours).padStart(2, '0');
      minutesEl.textContent = String(minutes).padStart(2, '0');
      secondsEl.textContent = String(seconds).padStart(2, '0');
    }
  }

  function startCountdown() {
    updateCountdown();
    countdownInterval = setInterval(updateCountdown, 1000);
  }

  function setRegistrationClosed() {
    // Header CTA updates (coming soon)
    if (navCtaBtn) {
      navCtaBtn.innerHTML = '<i class="fa-solid fa-lock"></i> Pendaftaran (Coming Soon)';
      navCtaBtn.className = "btn btn-primary btn-coming-soon";
      navCtaBtn.href = "#";
      navCtaBtn.style.pointerEvents = 'none';
      navCtaBtn.onclick = (e) => { e.preventDefault(); };
    }

    if (mobileCta) {
      mobileCta.innerHTML = '<i class="fa-solid fa-lock"></i> Pendaftaran (Coming Soon)';
      mobileCta.className = "btn btn-primary btn-coming-soon mobile-cta";
      mobileCta.href = "#";
      mobileCta.style.pointerEvents = 'none';
    }

    // Card inside Hero
    if (regTitle) regTitle.textContent = "Pendaftaran Bimbingan Dibuka:";
    if (regDesc) regDesc.textContent = "Pendaftaran resmi dimulai pada 13 Juli 2026, 09:00 WIB.";
    
    // Countdown visible
    const timerDisplay = document.getElementById('countdown-timer');
    if (timerDisplay) timerDisplay.style.display = 'grid';

    // Action button inside card
    if (cardActionContainer) {
      cardActionContainer.innerHTML = `
        <button class="btn btn-block btn-secondary disabled" id="card-action-btn" style="pointer-events: none; opacity: 0.65;">
          <i class="fa-solid fa-hourglass-half"></i> Pendaftaran Belum Dibuka
        </button>
      `;
    }

    // Start timer
    clearInterval(countdownInterval);
    if (daysEl) startCountdown();
  }

  function setRegistrationOpen() {
    clearInterval(countdownInterval);

    // Header CTA updates (open)
    if (navCtaBtn) {
      navCtaBtn.innerHTML = '<i class="fa-solid fa-rocket"></i> Daftar Sekarang';
      navCtaBtn.className = "btn btn-primary btn-glow";
      navCtaBtn.href = "https://bit.ly/GoogleSkills26";
      navCtaBtn.target = "_blank";
      navCtaBtn.style.pointerEvents = 'auto';
      navCtaBtn.onclick = null;
    }

    if (mobileCta) {
      mobileCta.innerHTML = '<i class="fa-solid fa-rocket"></i> Daftar Sekarang';
      mobileCta.className = "btn btn-primary btn-glow mobile-cta";
      mobileCta.href = "https://bit.ly/GoogleSkills26";
      mobileCta.target = "_blank";
      mobileCta.style.pointerEvents = 'auto';
    }

    // Card inside Hero
    if (regTitle) regTitle.textContent = "Pendaftaran TELAH DIBUKA! 🎉";
    if (regDesc) regDesc.textContent = "Klik tombol di bawah ini untuk mendaftar secara resmi.";
    
    // Hide Countdown
    const timerDisplay = document.getElementById('countdown-timer');
    if (timerDisplay) timerDisplay.style.display = 'none';

    // Action button inside card
    if (cardActionContainer) {
      cardActionContainer.innerHTML = `
        <a href="https://bit.ly/GoogleSkills26" target="_blank" class="btn btn-block btn-success btn-glow" id="card-action-btn">
          <i class="fa-solid fa-user-plus"></i> Daftar Sekarang
        </a>
      `;
    }
  }

  // Real-time Initialization Check
  const now = new Date().getTime();
  if (targetDate.getTime() - now <= 0) {
    setRegistrationOpen();
  } else {
    setRegistrationClosed();
  }


  // ==========================================
  // 4. POINT STRATEGY PREVIEW (SNEAK PEEK)
  // ==========================================
  const strategyBtn = document.getElementById('strategy-toggle-btn');
  const strategyPanel = document.getElementById('strategy-details-panel');

  if (strategyBtn && strategyPanel) {
    strategyBtn.addEventListener('click', () => {
      const isHidden = strategyPanel.classList.contains('hidden');
      if (isHidden) {
        strategyPanel.classList.remove('hidden');
        strategyBtn.innerHTML = '<i class="fa-solid fa-chevron-up"></i> Sembunyikan Strategi';
      } else {
        strategyPanel.classList.add('hidden');
        strategyBtn.innerHTML = '<i class="fa-solid fa-calculator"></i> Strategi Poin & Estimasi Waktu <span class="badge-teaser">Sneak Peek</span>';
      }
    });
  }


  // ==========================================
  // 5. ACCORDIONS (FAQ & TENTANG PROGRAM)
  // ==========================================
  const setupAccordion = (selectors) => {
    const items = document.querySelectorAll(selectors);
    if (items.length === 0) return;
    
    items.forEach(item => {
      const headerEl = item.querySelector('.accordion-header') || item.querySelector('.faq-question');
      if (!headerEl) return;

      headerEl.addEventListener('click', () => {
        const isOpen = item.classList.contains('active') || item.classList.contains('open');
        
        // Close all items in this accordion
        items.forEach(otherItem => {
          otherItem.classList.remove('active', 'open');
          const content = otherItem.querySelector('.accordion-content') || otherItem.querySelector('.faq-answer');
          if (content) content.style.maxHeight = null;
        });

        // Open clicked item if it was closed
        if (!isOpen) {
          item.classList.add(item.classList.contains('faq-card') ? 'open' : 'active');
          const content = item.querySelector('.accordion-content') || item.querySelector('.faq-answer');
          if (content) content.style.maxHeight = content.scrollHeight + 'px';
        }
      });
    });
  };

  setupAccordion('.accordion-item');
  setupAccordion('.faq-card');


  // ==========================================
  // 6. GALLERY & LIGHTBOX
  // ==========================================
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxTitle = document.getElementById('lightbox-title');
  const lightboxDesc = document.getElementById('lightbox-desc');
  const lightboxClose = document.querySelector('.lightbox-close');

  if (galleryItems.length > 0 && lightbox) {
    // Lightbox open
    galleryItems.forEach(item => {
      const wrapper = item.querySelector('.image-wrapper');
      if (!wrapper) return;
      
      wrapper.addEventListener('click', () => {
        const imgSrc = item.querySelector('img').getAttribute('src');
        const title = item.getAttribute('data-title');
        const desc = item.getAttribute('data-desc');

        lightboxImg.setAttribute('src', imgSrc);
        lightboxTitle.textContent = title;
        lightboxDesc.textContent = desc;

        lightbox.style.display = 'flex';
        document.body.style.overflow = 'hidden';
      });
    });

    // Lightbox close
    const closeLightbox = () => {
      lightbox.style.display = 'none';
      document.body.style.overflow = '';
    };

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });
  }


  // ==========================================
  // 7. FAQ REALTIME SEARCH
  // ==========================================
  const faqSearch = document.getElementById('faq-search');
  const faqClear = document.getElementById('faq-clear');
  const faqCards = document.querySelectorAll('.faq-card');

  if (faqSearch) {
    faqSearch.addEventListener('input', () => {
      const value = faqSearch.value.toLowerCase().trim();
      
      if (value.length > 0) {
        if (faqClear) faqClear.style.display = 'block';
      } else {
        if (faqClear) faqClear.style.display = 'none';
      }

      faqCards.forEach(card => {
        const question = card.querySelector('h4').textContent.toLowerCase();
        const answer = card.querySelector('.faq-answer p').textContent.toLowerCase();
        const keywords = card.getAttribute('data-keywords').toLowerCase();

        if (question.includes(value) || answer.includes(value) || keywords.includes(value)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });

    if (faqClear) {
      faqClear.addEventListener('click', () => {
        faqSearch.value = '';
        faqClear.style.display = 'none';
        faqCards.forEach(card => {
          card.style.display = 'block';
        });
        faqSearch.focus();
      });
    }
  }


  // ==========================================
  // 8. INTERACTIVE CHATBOT (GSKILLBOT)
  // ==========================================
  const chatbot = document.getElementById('chatbot');
  const chatToggleBtn = document.getElementById('chatbot-toggle-btn');
  const chatWindow = document.getElementById('chatbot-window');
  const chatOpenIcon = document.querySelector('.chat-open-icon');
  const chatCloseIcon = document.querySelector('.chat-close-icon');
  const chatMessages = document.getElementById('chatbot-messages');
  const chatInput = document.getElementById('chat-input');
  const chatSendBtn = document.getElementById('chat-send');
  const chatBadge = document.querySelector('.chat-badge-pulse');
  const quickOptionBtns = document.querySelectorAll('.quick-opt-btn');

  if (chatToggleBtn && chatWindow) {
    // Toggle chatbot window
    chatToggleBtn.addEventListener('click', () => {
      const isHidden = chatWindow.classList.contains('hidden');
      
      if (isHidden) {
        chatWindow.classList.remove('hidden');
        if (chatOpenIcon) chatOpenIcon.classList.add('hidden');
        if (chatCloseIcon) chatCloseIcon.classList.remove('hidden');
        if (chatBadge) chatBadge.style.display = 'none'; // hide badge once opened
        if (chatInput) chatInput.focus();
      } else {
        chatWindow.classList.add('hidden');
        if (chatOpenIcon) chatOpenIcon.classList.remove('hidden');
        if (chatCloseIcon) chatCloseIcon.classList.add('hidden');
      }
    });

    // Message sending logic
    function addMessage(text, sender) {
      if (!chatMessages) return;
      const msgDiv = document.createElement('div');
      msgDiv.classList.add('message', sender === 'user' ? 'user-message' : 'bot-message');
      msgDiv.innerHTML = text;
      chatMessages.appendChild(msgDiv);
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Local bot brain response dictionary
    function getBotResponse(userMsg) {
      const query = userMsg.toLowerCase().trim();
      
      // WhatsApp Group
      if (query.includes('wa') || query.includes('whatsapp') || query.includes('grup') || query.includes('komunitas')) {
        return `Bagus sekali! Diskusi dan info penting didistribusikan di Whatsapp. Silakan gabung di Saluran WhatsApp Kak Wilda melalui tautan berikut:<br><br><a href="${WA_LINK}" target="_blank" class="btn btn-success btn-block" style="padding: 8px 12px; font-size: 0.8rem; margin-top: 5px;"><i class="fa-brands fa-whatsapp"></i> Join Saluran WA</a>`;
      }

      // Personal chat with Kak Wilda
      if (query.includes('pribadi') || query.includes('kontak') || query.includes('hubungi') || query.includes('nomor') || query.includes('chat pribadi')) {
        return `Kamu dapat menghubungi Kak Wilda secara pribadi melalui WhatsApp Group atau tautan komunitas berikut:<br><br><a href="${WA_LINK}" target="_blank" class="btn btn-success btn-block" style="padding: 8px 12px; font-size: 0.8rem; margin-top: 5px;"><i class="fa-brands fa-whatsapp"></i> Gabung Grup WA</a>`;
      }
      
      // Registration / How to join
      if (query.includes('daftar') || query.includes('registrasi') || query.includes('ikut') || query.includes('join') || query.includes('cara masuk')) {
        const now = new Date().getTime();
        const isRegOpen = (targetDate.getTime() - now) <= 0;
        if (isRegOpen) {
          return `Pendaftaran <strong>TELAH DIBUKA!</strong> 😍<br>Kamu dapat langsung mendaftar secara resmi melalui link berikut: <a href="https://bit.ly/GoogleSkills26" target="_blank" style="color: var(--accent-blue); font-weight: 700; text-decoration: underline;">https://bit.ly/GoogleSkills26</a>. Jangan lupa untuk join Saluran WA agar dibimbing Kak Wilda!`;
        } else {
          return `Saat ini status pendaftaran program masih <strong>Coming Soon</strong> (Belum Dibuka) dan akan dibuka pada <strong>13 Juli 2026, 09:00 WIB</strong>.<br><br>Gunakan waktu ini untuk bersiap dengan membuat akun di <a href="https://www.cloudskillsboost.google/" target="_blank" style="color: var(--accent-blue); text-decoration: underline;">Google Cloud Skills Boost</a>. Begitu link pendaftaran dibuka, Kak Wilda akan langsung share infonya di Saluran WhatsApp!`;
        }
      }

      // Is it free?
      if (query.includes('gratis') || query.includes('free') || query.includes('bayar') || query.includes('biaya')) {
        return `Tenang saja! Seluruh program bimbingan Google Cloud Arcade X Dicoding ini <strong>100% gratis</strong>. Kamu tidak perlu membayar biaya pendaftaran, modul belajar, ataupun pengiriman merchandise swag. Semua biaya ditanggung penuh oleh Google.`;
      }

      // Swag / Prizes
      if (query.includes('swag') || query.includes('hadiah') || query.includes('merchandise') || query.includes('kaos') || query.includes('jaket') || query.includes('tas') || query.includes('botol') || query.includes('hoodie')) {
        return `Hadiah (Swag) yang bisa kamu dapatkan di antaranya adalah <strong>Hoodie eksklusif, Ransel (Backpack), Botol Minum Lipat, Mug, Kaos, hingga Deskmat/Mousepad</strong>.<br><br>Kamu menukarkannya dengan <em>Arcade Points</em> yang didapatkan setelah menyelesaikan lab. Cek halaman <a href="/galeri-swag" style="color: var(--accent-blue); text-decoration: underline;">Galeri Swag</a> di web ini untuk melihat foto aslinya!`;
      }

      // Points calculation
      if (query.includes('poin') || query.includes('point') || query.includes('hitung') || query.includes('kalkulasi') || query.includes('badge') || query.includes('kalkulator') || query.includes('leaderboard') || query.includes('skor') || query.includes('peringkat') || query.includes('strategi')) {
        return `Kamu dapat menghitung poin kamu secara otomatis, melihat papan peringkat (leaderboard), serta mempelajari strategi sukses di halaman khusus berikut:<br><br>
        • <a href="/kalkulator" style="color: var(--accent-blue); text-decoration: underline; font-weight: 600;"><i class="fa-solid fa-calculator"></i> Cek Poin & Leaderboard</a><br>
        • <a href="/strategi" style="color: var(--accent-blue); text-decoration: underline; font-weight: 600;"><i class="fa-solid fa-chess-knight"></i> Strategi Poin & Milestones</a><br><br>
        <strong>Aturan Poin Resmi:</strong><br>
        • 1 Arcade Game/Trivia Badge = 1 Poin.<br>
        • 2 Skill Badges = 1 Poin.<br>
        • Milestone 1: 30 Poin | Milestone 2: 50 Poin | Milestone 3: 70 Poin | Ultimate: 90 Poin.<br><br>
        Silakan kunjungi link di atas untuk mencoba kalkulator poin langsung!`;
      }

      // Token issues
      if (query.includes('token') || query.includes('kredit') || query.includes('token habis') || query.includes('credit')) {
        return `Untuk mengerjakan lab, kamu memerlukan kredit/token khusus. Kak Wilda akan membagikan kode token gratis secara berkala di Saluran WA.<br><br>Jika kamu kehabisan kredit di tengah jalan, kamu juga bisa meminta token tambahan melalui form khusus fasilitator atau langsung menghubungi menu support chat di web Skills Boost.`;
      }

      // Role of Facilitator / Wilda
      if (query.includes('fasil') || query.includes('fasilitator') || query.includes('wilda') || query.includes('kak wilda')) {
        return `Kak <strong>WILDA ARIFFATUL FAISALNUR</strong> adalah Fasilitator berlisensi untuk program Google Cloud Arcade X Dicoding. Tugas Kak Wilda adalah:<br>
        1. Membimbing kamu mendaftar program.<br>
        2. Membagikan token akses lab gratis.<br>
        3. Membantu memberikan panduan/solusi jika kamu stuck terkena error lab.<br>
        4. Mengoordinasikan pengiriman info penting agar kamu tidak tertinggal Swag Drop.`;
      }

      // Program explanation
      if (query.includes('apa itu') || query.includes('arcade') || query.includes('program') || query.includes('tentang')) {
        return `<strong>Google Cloud Arcade X Dicoding</strong> adalah ajang belajar Cloud Computing dan AI secara interaktif dan menyenangkan (gamifikasi).<br><br>Di sini kamu belajar hands-on lab, meraih lencana, mengumpulkan poin, dan menukarkannya dengan merchandise eksklusif Google.`;
      }

      // Default response
      return `Maaf, saya belum memahami pertanyaan kamu 😅<br><br>Coba tanyakan hal berikut:<br>
      • "cara daftar"<br>
      • "apakah gratis?"<br>
      • "saluran whatsapp"<br>
      • "chat pribadi"<br>
      • "hadiah swag"<br>
      • "sistem poin"<br>
      • "bagaimana jika token habis?"<br><br>
      Atau kamu bisa menanyakan kendala khusus langsung ke Kak Wilda di Saluran WhatsApp.`;
    }

    // Handle user input submit
    function handleSendMessage() {
      if (!chatInput) return;
      const text = chatInput.value.trim();
      if (!text) return;

      // Add user message
      addMessage(text, 'user');
      chatInput.value = '';

      // Simulate Bot Typing
      const typingDiv = document.createElement('div');
      typingDiv.classList.add('message', 'bot-message', 'typing-indicator');
      typingDiv.innerHTML = '<span class="dot-bounce"></span><span class="dot-bounce"></span><span class="dot-bounce"></span>';
      chatMessages.appendChild(typingDiv);
      chatMessages.scrollTop = chatMessages.scrollHeight;

      // Send actual reply after brief delay
      setTimeout(() => {
        if (chatMessages.contains(typingDiv)) {
          chatMessages.removeChild(typingDiv);
        }
        const botResponse = getBotResponse(text);
        addMessage(botResponse, 'bot');
      }, 800);
    }

    // Quick Action Buttons
    quickOptionBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const query = btn.getAttribute('data-query');
        addMessage(query, 'user');
        
        // Simulate typing
        const typingDiv = document.createElement('div');
        typingDiv.classList.add('message', 'bot-message', 'typing-indicator');
        typingDiv.innerHTML = '<span class="dot-bounce"></span><span class="dot-bounce"></span><span class="dot-bounce"></span>';
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        setTimeout(() => {
          if (chatMessages.contains(typingDiv)) {
            chatMessages.removeChild(typingDiv);
          }
          const response = getBotResponse(query);
          addMessage(response, 'bot');
        }, 700);
      });
    });

    if (chatSendBtn) {
      chatSendBtn.addEventListener('click', handleSendMessage);
    }
    if (chatInput) {
      chatInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
          handleSendMessage();
        }
      });
    }
  }

  // ==========================================
  // 9. ANONYMOUS FEEDBACK SUBMISSION
  // ==========================================
  const feedbackForm = document.getElementById('feedback-form');
  const feedbackSuccess = document.getElementById('feedback-success');
  const feedbackMessage = document.getElementById('feedback-message');

  if (feedbackForm && feedbackSuccess) {
    feedbackForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const message = feedbackMessage.value.trim();
      if (!message) return;

      // ----------------------------------------------------
      // INTEGRASI GOOGLE FORM (Kirim secara background)
      // ----------------------------------------------------
      const formUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSdjykb5NiyW57GowHRhFOyuE9GvjwcVsF8smy7dGq77vGreIw/formResponse';
      const entryId = 'entry.1958733736';

      if (formUrl && formUrl !== 'YOUR_GOOGLE_FORM_URL') {
        const formData = new URLSearchParams();
        formData.append(entryId, message);

        fetch(formUrl, {
          method: 'POST',
          mode: 'no-cors',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: formData.toString()
        }).catch(err => console.warn('Feedback send error:', err));
      }

      // Simpan juga di localStorage lokal sebagai cadangan
      const existingFeedback = JSON.parse(localStorage.getItem('arcade_anonymous_feedback') || '[]');
      existingFeedback.push({
        timestamp: new Date().toISOString(),
        content: message
      });
      localStorage.setItem('arcade_anonymous_feedback', JSON.stringify(existingFeedback));

      // Tampilkan pesan sukses dan reset form
      feedbackForm.reset();
      feedbackSuccess.classList.remove('hidden');

      setTimeout(() => {
        feedbackSuccess.classList.add('hidden');
      }, 5000);
    });
  }

  // ==========================================
  // INTEGRASI FORM MUTUALAN SOSMED
  // ==========================================
  const mutualForm = document.getElementById('mutual-form');
  const mutualSuccess = document.getElementById('mutual-success');
  const mutualSubmitBtn = document.getElementById('mutual-submit-btn');

  if (mutualForm && mutualSuccess) {
    mutualForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const sosmedType = document.getElementById('mutual-type').value;
      const username = document.getElementById('mutual-username').value.trim();
      const link = document.getElementById('mutual-link').value.trim();
      
      if (!username || !link) return;

      const message = `[Mutualan Request]\nTipe: ${sosmedType}\nUsername: ${username}\nLink: ${link}`;

      // POST to Google Form
      const formUrl = 'https://docs.google.com/forms/d/e/1FAIpQLScrReJb1rJeHNA2AZFyHoTweVUlPS9AB8dl-RSYt0HJpflvxw/formResponse';
      const entryId = 'entry.1233135674';

      mutualSubmitBtn.disabled = true;
      mutualSubmitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Mengirim...';

      const formData = new URLSearchParams();
      formData.append(entryId, message);

      fetch(formUrl, {
        method: 'POST',
        mode: 'no-cors',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: formData.toString()
      })
      .then(() => {
        mutualForm.reset();
        mutualSuccess.classList.remove('hidden');
        setTimeout(() => {
          mutualSuccess.classList.add('hidden');
        }, 5000);
      })
      .catch(err => {
        console.warn('Mutual send error:', err);
        mutualForm.reset();
        mutualSuccess.classList.remove('hidden');
        setTimeout(() => {
          mutualSuccess.classList.add('hidden');
        }, 5000);
      })
      .finally(() => {
        mutualSubmitBtn.disabled = false;
        mutualSubmitBtn.innerHTML = 'Kirim Link Profil <i class="fa-solid fa-paper-plane"></i>';
      });
    });
  }

  // ==========================================
  // 5. MUTUALAN PAGINATION & SEARCH FEATURE
  // ==========================================
  const searchInput = document.getElementById('mutual-search-input');
  const instagramGrid = document.getElementById('grid-instagram');
  const linkedinGrid = document.getElementById('grid-linkedin');
  const githubGrid = document.getElementById('grid-github');

  if (instagramGrid || linkedinGrid || githubGrid) {
    const paginationContainer = document.createElement('div');
    paginationContainer.id = 'mutual-pagination';
    paginationContainer.className = 'mutual-pagination-container';
    
    const activeGrid = instagramGrid || linkedinGrid || githubGrid;
    activeGrid.parentNode.appendChild(paginationContainer);

    const CARDS_PER_PAGE = 12;
    let currentPage = 1;

    window.resetMutualPageIndex = function() {
      currentPage = 1;
    };

    window.updateMutualPagination = function() {
      const currentActiveGrid = document.querySelector('.mutual-grid.active');
      if (!currentActiveGrid) return;

      const activeTab = currentActiveGrid.id.replace('grid-', '');
      paginationContainer.className = 'mutual-pagination-container ' + activeTab + '-theme';

      const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
      const allCards = Array.from(currentActiveGrid.querySelectorAll('.mutual-card'));

      // Filter cards by search query
      const filteredCards = allCards.filter(card => {
        const h5 = card.querySelector('h5');
        if (!h5) return false;
        const text = h5.textContent.toLowerCase();
        return text.includes(query);
      });

      // Hide all cards first
      allCards.forEach(card => card.style.display = 'none');

      // Calculate total pages
      const totalPages = Math.ceil(filteredCards.length / CARDS_PER_PAGE) || 1;
      if (currentPage > totalPages) {
        currentPage = totalPages;
      }
      if (currentPage < 1) {
        currentPage = 1;
      }

      // Show cards for the current page
      const startIndex = (currentPage - 1) * CARDS_PER_PAGE;
      const endIndex = startIndex + CARDS_PER_PAGE;
      const pageCards = filteredCards.slice(startIndex, endIndex);
      pageCards.forEach(card => {
        card.style.display = '';
      });

      // Render pagination controls
      renderPaginationControls(totalPages);
    };

    function renderPaginationControls(totalPages) {
      paginationContainer.innerHTML = '';
      
      if (totalPages <= 1) {
        return; // Don't show pagination if only 1 page
      }

      // Prev Button
      const prevBtn = document.createElement('button');
      prevBtn.className = `pag-btn ${currentPage === 1 ? 'disabled' : ''}`;
      prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
      prevBtn.disabled = currentPage === 1;
      prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
          currentPage--;
          window.updateMutualPagination();
          scrollToGridTop();
        }
      });
      paginationContainer.appendChild(prevBtn);

      // Page numbers (smart rendering for large page count)
      const range = 1;
      let pages = [];

      for (let i = 1; i <= totalPages; i++) {
        if (
          i === 1 ||
          i === totalPages ||
          (i >= currentPage - range && i <= currentPage + range)
        ) {
          pages.push(i);
        } else if (i === currentPage - range - 1 || i === currentPage + range + 1) {
          pages.push('...');
        }
      }

      pages = pages.filter((item, pos, self) => {
        return pos === 0 || !(item === '...' && self[pos - 1] === '...');
      });

      pages.forEach(page => {
        if (page === '...') {
          const dots = document.createElement('span');
          dots.className = 'pag-dots';
          dots.textContent = '...';
          paginationContainer.appendChild(dots);
        } else {
          const pageBtn = document.createElement('button');
          pageBtn.className = `pag-btn ${currentPage === page ? 'active' : ''}`;
          pageBtn.textContent = page;
          pageBtn.addEventListener('click', () => {
            currentPage = page;
            window.updateMutualPagination();
            scrollToGridTop();
          });
          paginationContainer.appendChild(pageBtn);
        }
      });

      // Next Button
      const nextBtn = document.createElement('button');
      nextBtn.className = `pag-btn ${currentPage === totalPages ? 'disabled' : ''}`;
      nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
      nextBtn.disabled = currentPage === totalPages;
      nextBtn.addEventListener('click', () => {
        if (currentPage < totalPages) {
          currentPage++;
          window.updateMutualPagination();
          scrollToGridTop();
        }
      });
      paginationContainer.appendChild(nextBtn);
    }

    function scrollToGridTop() {
      const target = document.querySelector('.mutual-tab-nav') || searchInput;
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

    if (searchInput) {
      searchInput.addEventListener('input', () => {
        currentPage = 1;
        window.updateMutualPagination();
      });
    }

    // Initial load
    window.updateMutualPagination();
  }

});

// Global function for switching tabs on Mutual page
window.switchMutualTab = function(tabName) {
  const tabs = document.querySelectorAll('.mutual-tab-btn');
  const grids = document.querySelectorAll('.mutual-grid');
  
  tabs.forEach(tab => {
    if (tab.id === `tab-btn-${tabName}`) {
      tab.classList.add('active');
    } else {
      tab.classList.remove('active');
    }
  });
  
  grids.forEach(grid => {
    if (grid.id === `grid-${tabName}`) {
      grid.classList.add('active');
    } else {
      grid.classList.remove('active');
    }
  });

  // Call updateMutualPagination if it exists
  if (typeof window.updateMutualPagination === 'function') {
    if (typeof window.resetMutualPageIndex === 'function') {
      window.resetMutualPageIndex();
    }
    window.updateMutualPagination();
  }
};



