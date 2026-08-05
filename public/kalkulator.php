<?php $pageTitle = 'Cek Poin & Leaderboard'; $currentPage = 'kalkulator'; ?>
<?php include __DIR__ . '/includes/header.php'; ?>




<div class="text-center" style="margin-bottom: 20px;">
      <span class="badge blue-badge"><i class="fa-solid fa-trophy"></i> Papan Skor</span>
      <h1 style="font-size: 2.5rem; margin-top: 10px;">Perolehan Badges dan Poin Peserta</h1>
      <p style="color: var(--text-secondary); max-width: 600px; margin: 10px auto 0;">
        Papan peringkat perolehan lencana dan poin peserta Google Cloud Arcade oleh Fasilitator WILDA ARIFFATUL FAISALNUR.
      </p>
      <p id="data-date-note" class="hidden" style="color: var(--accent-yellow); font-size: 0.85rem; margin-top: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; background: rgba(251, 188, 5, 0.08); padding: 6px 14px; border-radius: 30px; border: 1px solid rgba(251, 188, 5, 0.2); margin-left: auto; margin-right: auto;">
        <i class="fa-solid fa-calendar-day"></i> <span>Data direkap per tanggal <strong>...</strong> sebelum jam 15:00 WIB</span>
      </p>
    </div>

    <div style="margin-top: 40px;">
      <!-- Card: Leaderboard -->
      <div class="glass" style="padding: 30px; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 12px;">
          <div>
            <h3 class="text-yellow" style="font-size: 1.25rem;"><i class="fa-solid fa-trophy"></i> Papan Skor Komunitas</h3>
            <p style="font-size: 0.82rem; color: var(--text-secondary); margin-top: 4px;">Peringkat perolehan peserta pendampingan fasilitator.</p>
          </div>
          <button id="refresh-leaderboard" class="btn btn-outline" style="padding: 6px 12px; font-size: 0.75rem; display: flex; align-items: center; gap: 6px;">
            <i class="fa-solid fa-arrows-rotate"></i> Muat Ulang
          </button>
        </div>

        <div style="position: relative;">
          <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 0.85rem;"></i>
          <input type="text" id="leaderboard-search" placeholder="Cari nama peserta..." style="width: 100%; padding: 10px 14px 10px 38px; border-radius: var(--radius-sm); background: rgba(0,0,0,0.3); border: 1px solid var(--border-default); color: var(--text-primary); font-size: 0.85rem;">
        </div>

        <!-- Leaderboard Table Container -->
        <div id="leaderboard-loading" class="text-center" style="padding: 40px 0;">
          <i class="fa-solid fa-circle-notch fa-spin text-yellow" style="font-size: 1.8rem; margin-bottom: 10px;"></i>
          <p style="font-size: 0.8rem; color: var(--text-secondary);">Memuat papan peringkat...</p>
        </div>

        <div id="leaderboard-empty" class="hidden text-center" style="padding: 40px 20px; border: 1px dashed var(--border-default); border-radius: var(--radius-md);">
          <i class="fa-solid fa-users-slash text-muted" style="font-size: 2.2rem; margin-bottom: 12px;"></i>
          <p style="font-size: 0.85rem; color: var(--text-secondary);">Belum ada data peserta terdaftar.</p>
        </div>

        <div id="leaderboard-container" class="hidden">
          <div class="leaderboard-table-wrapper">
            <table class="leaderboard-table">
              <thead>
                <tr>
                  <th style="width: 80px; text-align: center;">Rank</th>
                  <th>Peserta</th>
                  <th style="width: 150px; text-align: center;"><i class="fa-solid fa-gamepad" style="color:var(--accent-blue);"></i> Arcade Games</th>
                  <th style="width: 150px; text-align: center;"><i class="fa-solid fa-award" style="color:var(--accent-yellow);"></i> Skill Badges</th>
                  <th style="width: 100px; text-align: center;">Poin</th>
                </tr>
              </thead>
              <tbody id="leaderboard-tbody">
                <!-- Dynamically populated -->
              </tbody>
            </table>
          </div>
          <div id="leaderboard-pagination" style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 15px;">
            <!-- Injected Dynamically -->
          </div>
        </div>
      </div>
    </div>

        <!-- Realtime Checker Card (Premium Glassmorphism) -->
    <div class="realtime-checker-section" style="margin-top: 30px; display: flex; flex-direction: column; gap: 20px;">
      <div style="position: relative; z-index: 1;">
        <h3 class="text-blue" style="font-size: 1.35rem; display:flex; align-items:center; gap:10px;">
          <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: rgba(66, 133, 244, 0.15); border-radius: 50%; color: var(--accent-blue); box-shadow: 0 0 15px rgba(66, 133, 244, 0.2);"><i class="fa-solid fa-bolt"></i></span>
          Cek Poin Kamu
        </h3>
        <p style="font-size: 0.85rem; color: var(--text-secondary); margin-top: 6px;">
          Masukkan URL profil publik Google Cloud Skills Boost kamu untuk melihat progres perolehan poin dan status milestone secara real-time.
        </p>
      </div>

      <div style="display: flex; gap: 12px; flex-wrap: wrap; position: relative; z-index: 1;">
        <div style="position: relative; flex: 1; min-width: 260px;">
          <i class="fa-solid fa-link" style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:var(--text-secondary); font-size:0.85rem;"></i>
          <input type="text" id="rt-url-input" placeholder="https://www.skills.google/public_profiles/..."
            style="width:100%; padding:12px 14px 12px 38px; border-radius:var(--radius-sm); background:rgba(0,0,0,0.35); border:1px solid var(--border-default); color:var(--text-primary); font-size:0.85rem; box-sizing:border-box; transition: var(--transition-fast); outline: none;">
        </div>
        <button id="rt-check-btn" onclick="runRealtimeCheck()"
          style="padding:12px 26px; background:linear-gradient(135deg,var(--accent-blue),#1d4ed8); color:#fff; border:none; border-radius:var(--radius-sm); font-weight:600; font-size:0.88rem; cursor:pointer; display:flex; align-items:center; gap:8px; white-space:nowrap; transition: var(--transition-smooth); box-shadow: 0 4px 15px rgba(66,133,244,0.25);">
          <i class="fa-solid fa-magnifying-glass"></i> Cek Sekarang
        </button>
      </div>

      <!-- State: Loading -->
      <div id="rt-loading" class="hidden text-center" style="padding:40px 0; position: relative; z-index: 1;">
        <i class="fa-solid fa-circle-notch fa-spin text-blue" style="font-size:2.2rem; margin-bottom:12px; filter: drop-shadow(0 0 8px rgba(66,133,244,0.4));"></i>
        <p style="font-size:0.85rem; color:var(--text-secondary); font-weight: 500;">Sedang mengambil data profil dan menghitung pencapaian...</p>
      </div>

      <!-- State: Error -->
      <div id="rt-error" class="hidden" style="padding:16px 20px; background:rgba(234,67,53,0.1); border:1px solid rgba(234,67,53,0.25); border-radius:var(--radius-sm); position: relative; z-index: 1;">
        <p id="rt-error-msg" style="color:#fca5a5; font-size:0.88rem; margin:0; display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-circle-exclamation"></i> Error</p>
      </div>

      <!-- State: Result -->
      <div id="rt-result" class="hidden result-glow-box">

        <!-- Profile Header -->
        <div style="display:flex; align-items:center; gap:20px; padding-bottom:20px; border-bottom:1px solid var(--border-default); flex-wrap:wrap;">
          <div id="rt-avatar" style="width:64px; height:64px; border-radius:50%; background:linear-gradient(135deg,var(--accent-blue),#1d4ed8); display:flex; align-items:center; justify-content:center; font-size:1.6rem; font-weight:700; color:#fff; flex-shrink:0; overflow:hidden; border: 2px solid rgba(255,255,255,0.15); box-shadow: 0 4px 15px rgba(0,0,0,0.25);"></div>
          <div style="flex:1; min-width:0;">
            <div id="rt-name" style="font-size:1.25rem; font-weight:700; color:var(--text-primary); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; letter-spacing: -0.01em;"></div>
            <div id="rt-milestone" style="margin-top:6px;"></div>
          </div>
          <div style="text-align:right; flex-shrink:0; background: rgba(255,255,255,0.03); padding: 8px 16px; border-radius: var(--radius-sm); border: 1px solid var(--border-default);">
            <div style="font-size:0.68rem; color:var(--text-secondary); letter-spacing:0.08em; text-transform:uppercase; font-weight: 700;">Total Poin</div>
            <div id="rt-total-points" class="overall-progress-glow" style="font-size:2.2rem; font-weight:800; line-height:1.1; margin-top:2px;"></div>
          </div>
        </div>

        <!-- Roadmap Peta Jalan Milestone -->
        <div style="margin-top: 25px; padding-bottom: 20px; border-bottom: 1px solid var(--border-default);">
          <div style="font-size:0.75rem; color:var(--text-secondary); font-weight:800; margin-bottom:12px; text-transform:uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 6px;"><i class="fa-solid fa-map-location-dot"></i> Peta Jalan Milestone Kamu</div>
          <div class="milestone-roadmap">
            <div class="roadmap-progress-bar" id="rt-roadmap-bar"></div>
            <div class="roadmap-step" id="step-m1">
              <div class="roadmap-node m1" title="Milestone 1 (6 Games & 14 Badges)"><i class="fa-solid fa-award" style="font-size: 0.9rem;"></i></div>
              <div class="roadmap-label">Tier 1</div>
            </div>
            <div class="roadmap-step" id="step-m2">
              <div class="roadmap-node m2" title="Milestone 2 (8 Games & 28 Badges)"><i class="fa-solid fa-award" style="font-size: 0.9rem;"></i></div>
              <div class="roadmap-label">Tier 2</div>
            </div>
            <div class="roadmap-step" id="step-m3">
              <div class="roadmap-node m3" title="Milestone 3 (10 Games & 42 Badges)"><i class="fa-solid fa-award" style="font-size: 0.9rem;"></i></div>
              <div class="roadmap-label">Tier 3</div>
            </div>
            <div class="roadmap-step" id="step-mu">
              <div class="roadmap-node mu" title="Ultimate Milestone (12 Games & 56 Badges)"><i class="fa-solid fa-trophy" style="font-size: 0.9rem;"></i></div>
              <div class="roadmap-label">Ultimate</div>
            </div>
          </div>
        </div>

        <!-- Stats Row -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(150px, 1fr)); gap:16px; margin-top:20px;">
          <div class="stat-card-premium blue">
            <div style="font-size:2rem; font-weight:800; color:var(--accent-blue); line-height: 1.1;" id="rt-arcade-count">0</div>
            <div style="font-size:0.75rem; color:var(--text-secondary); margin-top:6px; font-weight: 600;"><i class="fa-solid fa-gamepad" style="margin-right: 4px;"></i> Arcade Games</div>
          </div>
          <div class="stat-card-premium yellow">
            <div style="font-size:2rem; font-weight:800; color:var(--accent-yellow); line-height: 1.1;" id="rt-skill-count">0</div>
            <div style="font-size:0.75rem; color:var(--text-secondary); margin-top:6px; font-weight: 600;"><i class="fa-solid fa-award" style="margin-right: 4px;"></i> Skill Badges</div>
          </div>
          <div class="stat-card-premium green">
            <div style="font-size:2rem; font-weight:800; color:var(--accent-green); line-height: 1.1;" id="rt-bonus-points">0</div>
            <div style="font-size:0.75rem; color:var(--text-secondary); margin-top:6px; font-weight: 600;"><i class="fa-solid fa-circle-plus" style="margin-right: 4px;"></i> Poin Bonus</div>
          </div>
        </div>

        <!-- Motivational message + next milestone progress -->
        <div id="rt-motivation" style="margin-top:20px; padding:18px; background:rgba(66,133,244,0.06); border:1px solid rgba(66,133,244,0.15); border-radius:var(--radius-sm);">
          <div id="rt-motivation-text" style="font-size:0.9rem; color:var(--text-primary); font-weight:500; margin-bottom:12px; line-height: 1.5;"></div>
          <div id="rt-progress-wrap" class="hidden">
            <div style="display:flex; justify-content:space-between; font-size:0.75rem; color:var(--text-secondary); margin-bottom:6px; font-weight: 600;">
              <span id="rt-progress-label"></span>
              <span id="rt-progress-pct" style="color: var(--accent-blue);"></span>
            </div>
            <div style="height:8px; background:rgba(255,255,255,0.08); border-radius:99px; overflow:hidden; border: 1px solid rgba(255,255,255,0.03);">
              <div id="rt-progress-bar" style="height:100%; border-radius:99px; background:linear-gradient(90deg,var(--accent-blue),#a855f7,var(--accent-yellow)); transition:width 0.8s cubic-bezier(0.16, 1, 0.3, 1);"></div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Resources Section (Syllabus & Fast Track Badges) -->
    <div class="glass" style="margin-top: 40px; padding: 30px;">
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px; border-bottom: 1px solid var(--border-default); padding-bottom: 20px;">
        <h3 class="text-blue" style="font-size: 1.4rem; margin: 0; display: flex; align-items: center; gap: 10px;">
          <i class="fa-solid fa-graduation-cap"></i> Silabus & Panduan Poin Arcade 2026
        </h3>
        <!-- Resource Tabs -->
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
          <button class="filter-btn active" id="btn-tab-milestones" onclick="switchResourceTab('milestones')"><i class="fa-solid fa-award"></i> Milestones</button>
          <button class="filter-btn" id="btn-tab-arcade-games" onclick="switchResourceTab('arcade-games')"><i class="fa-solid fa-gamepad"></i> Arcade Games</button>
          <button class="filter-btn" id="btn-tab-fast-track" onclick="switchResourceTab('fast-track')"><i class="fa-solid fa-bolt"></i> Skill Badges</button>
        </div>
      </div>

      <!-- Tab Content: Milestones -->
      <div id="res-milestones" class="resource-tab-content" style="margin-top: 25px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
          <!-- Milestone Card 1 -->
          <div class="glass" style="padding: 20px; border-top: 4px solid var(--accent-blue); background: rgba(66, 133, 244, 0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <h4 style="color: var(--text-primary); font-size: 1.1rem; margin: 0;">Milestone 1</h4>
            </div>
            <ul style="font-size: 0.85rem; color: var(--text-secondary); list-style-type: none; padding-left: 0; display: flex; flex-direction: column; gap: 8px;">
              <li><i class="fa-solid fa-gamepad text-blue" style="width: 18px;"></i> 6 Arcade Games = 6 Poin</li>
              <li><i class="fa-solid fa-award text-blue" style="width: 18px;"></i> 14 Badge Keahlian = 7 Poin</li>
              <li><i class="fa-solid fa-circle-plus text-blue" style="width: 18px;"></i> Bonus Milestone = 7 Poin</li>
              <li style="border-top: 1px solid var(--border-default); padding-top: 8px; margin-top: 4px; font-weight: 700; color: var(--text-primary);">
                <i class="fa-solid fa-star text-yellow" style="width: 18px;"></i> Total: 20 Poin
              </li>
            </ul>
          </div>

          <!-- Milestone Card 2 -->
          <div class="glass" style="padding: 20px; border-top: 4px solid var(--accent-red); background: rgba(234, 67, 53, 0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <h4 style="color: var(--text-primary); font-size: 1.1rem; margin: 0;">Milestone 2</h4>
            </div>
            <ul style="font-size: 0.85rem; color: var(--text-secondary); list-style-type: none; padding-left: 0; display: flex; flex-direction: column; gap: 8px;">
              <li><i class="fa-solid fa-gamepad text-red" style="width: 18px;"></i> 8 Arcade Games = 8 Poin</li>
              <li><i class="fa-solid fa-award text-red" style="width: 18px;"></i> 28 Badge Keahlian = 14 Poin</li>
              <li><i class="fa-solid fa-circle-plus text-red" style="width: 18px;"></i> Bonus Milestone = 18 Poin</li>
              <li style="border-top: 1px solid var(--border-default); padding-top: 8px; margin-top: 4px; font-weight: 700; color: var(--text-primary);">
                <i class="fa-solid fa-star text-yellow" style="width: 18px;"></i> Total: 40 Poin
              </li>
            </ul>
          </div>

          <!-- Milestone Card 3 -->
          <div class="glass" style="padding: 20px; border-top: 4px solid var(--accent-yellow); background: rgba(251, 188, 5, 0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <h4 style="color: var(--text-primary); font-size: 1.1rem; margin: 0;">Milestone 3</h4>
            </div>
            <ul style="font-size: 0.85rem; color: var(--text-secondary); list-style-type: none; padding-left: 0; display: flex; flex-direction: column; gap: 8px;">
              <li><i class="fa-solid fa-gamepad text-yellow" style="width: 18px;"></i> 10 Arcade Games = 10 Poin</li>
              <li><i class="fa-solid fa-award text-yellow" style="width: 18px;"></i> 42 Badge Keahlian = 21 Poin</li>
              <li><i class="fa-solid fa-circle-plus text-yellow" style="width: 18px;"></i> Bonus Milestone = 29 Poin</li>
              <li style="border-top: 1px solid var(--border-default); padding-top: 8px; margin-top: 4px; font-weight: 700; color: var(--text-primary);">
                <i class="fa-solid fa-star text-yellow" style="width: 18px;"></i> Total: 60 Poin
              </li>
            </ul>
          </div>

          <!-- Milestone Card Ultimate -->
          <div class="glass" style="padding: 20px; border-top: 4px solid var(--accent-green); background: rgba(52, 168, 83, 0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <h4 style="color: var(--text-primary); font-size: 1.1rem; margin: 0;">Ultimate Milestone</h4>
            </div>
            <ul style="font-size: 0.85rem; color: var(--text-secondary); list-style-type: none; padding-left: 0; display: flex; flex-direction: column; gap: 8px;">
              <li><i class="fa-solid fa-gamepad text-green" style="width: 18px;"></i> 12 Arcade Games = 12 Poin</li>
              <li><i class="fa-solid fa-award text-green" style="width: 18px;"></i> 56 Badge Keahlian = 28 Poin</li>
              <li><i class="fa-solid fa-circle-plus text-green" style="width: 18px;"></i> Bonus Milestone = 40 Poin</li>
              <li style="border-top: 1px solid var(--border-default); padding-top: 8px; margin-top: 4px; font-weight: 700; color: var(--text-primary);">
                <i class="fa-solid fa-star text-yellow" style="width: 18px;"></i> Total: 80 Poin
              </li>
            </ul>
          </div>
        </div>
        <p style="font-size: 0.8rem; color: var(--text-secondary); margin-top: 15px; font-style: italic;">
          * Catatan: 1 arcade game = 1 poin. 1 skill badge = 0.5 poin (2 skill badges = 1 poin). Bonus poin ditambahkan otomatis jika kamu memenuhi kriteria jumlah game dan skill badge di atas.
        </p>
      </div>

      <!-- Tab Content: Arcade Games -->
      <div id="res-arcade-games" class="resource-tab-content hidden" style="margin-top: 25px;">
        <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 20px;">
          Silakan ikuti tautan game petualangan di bawah ini dan gunakan <strong>Access Code</strong> untuk masuk (Bernilai 1 Poin per Game):
        </p>
        <div id="arcade-games-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
          <!-- Generated Dynamically -->
        </div>
      </div>

      <!-- Tab Content: Fast Track -->
      <div id="res-fast-track" class="resource-tab-content hidden" style="margin-top: 25px;">
        <!-- Tracking Dashboard Panel -->
        <div class="glass" style="padding: 20px; margin-bottom: 25px; display: flex; flex-direction: column; gap: 15px;">
          <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <div>
              <h3 style="font-size: 1.1rem; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-clipboard-list text-blue"></i> Tracking Progres Mandiri
              </h3>
              <p style="font-size: 0.8rem; color: var(--text-secondary); margin: 4px 0 0 0;">
                Tandai skill badge yang telah Anda selesaikan untuk memantau pencapaian Anda secara real-time.
              </p>
            </div>
            <!-- Import/Export Buttons -->
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
              <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px;" onclick="exportKalkulatorExcel()">
                <i class="fa-solid fa-file-excel text-green"></i> Ekspor Excel
              </button>
              <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px;" onclick="triggerKalkulatorImport()">
                <i class="fa-solid fa-file-import"></i> Impor Progress
              </button>
              <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.78rem; display: inline-flex; align-items: center; gap: 6px; border-color: rgba(239, 68, 68, 0.4); color: #f87171;" onclick="resetKalkulatorProgress()">
                <i class="fa-solid fa-trash-can"></i> Reset
              </button>
              <input type="file" id="import-kalkulator-file-input" style="display: none;" accept=".json" onchange="importKalkulatorProgress(event)">
            </div>
          </div>

          <!-- Progress bar and numbers -->
          <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
            <div class="progress-bar-container" style="flex-grow: 1; height: 10px; background: rgba(255,255,255,0.06); border-radius: 99px; overflow: hidden; border: 1px solid var(--border-default); position: relative;">
              <div id="tracking-kalkulator-progress-bar" style="width: 0%; height: 100%; background: linear-gradient(90deg, var(--accent-blue), var(--accent-green)); transition: width 0.4s ease-in-out;"></div>
            </div>
            <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-primary); white-space: nowrap;">
              <span id="tracking-kalkulator-count">0</span> / <span id="tracking-kalkulator-total">0</span> Selesai (<span id="tracking-kalkulator-percent">0%</span>)
            </div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; gap: 15px; flex-wrap: wrap;">
          <p style="font-size: 0.9rem; color: var(--text-secondary); margin: 0;">
            Kumpulan link pengerjaan Skill Badges (Badge Fast Track ditandai khusus, bernilai 0.5 Poin per Badge):
          </p>
          <div style="position: relative; width: 100%; max-width: 300px;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 0.8rem;"></i>
            <input type="text" id="fast-track-search" placeholder="Cari skill badge..." style="width: 100%; padding: 8px 12px 8px 32px; border-radius: var(--radius-sm); background: rgba(0,0,0,0.3); border: 1px solid var(--border-default); color: var(--text-primary); font-size: 0.8rem;">
          </div>
        </div>
        <div id="fast-track-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 12px; margin-bottom: 20px;">
          <!-- Generated Dynamically -->
        </div>
        <div id="fast-track-pagination" style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 20px; margin-bottom: 10px;">
          <!-- Injected Dynamically -->
        </div>
      </div>
    </div>
<?php ob_start(); ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Elements
      const refreshBtn = document.getElementById('refresh-leaderboard');
      const searchInput = document.getElementById('leaderboard-search');
      const leaderboardLoading = document.getElementById('leaderboard-loading');
      const leaderboardEmpty = document.getElementById('leaderboard-empty');
      const leaderboardContainer = document.getElementById('leaderboard-container');
      const leaderboardTbody = document.getElementById('leaderboard-tbody');

      let leaderboardData = [];
      let filteredLeaderboardData = [];
      let leaderboardPage = 1;
      const leaderboardPerPage = 10;

      // Fetch leaderboard (fast — parses JSON from DB)
      async function fetchLeaderboard() {
        leaderboardLoading.classList.remove('hidden');
        leaderboardEmpty.classList.add('hidden');
        leaderboardContainer.classList.add('hidden');

        try {
          const res = await fetch(`/api/leaderboard.php?t=${Date.now()}`);
          const data = await res.json();
          if (data && data.records) {
            leaderboardData = data.records;
            filteredLeaderboardData = data.records;
            updateDateNote(data.fileDate);
          } else {
            leaderboardData = Array.isArray(data) ? data : [];
            filteredLeaderboardData = leaderboardData;
          }
          renderLeaderboard(1);
        } catch (err) {
          console.error(err);
          leaderboardLoading.classList.add('hidden');
          leaderboardEmpty.classList.remove('hidden');
        }
      }

      // Full sync — re-fetch/re-parse from database
      async function syncAllLeaderboard() {
        refreshBtn.disabled = true;
        refreshBtn.innerHTML = '<i class="fa-solid fa-arrows-rotate fa-spin"></i> Menyinkronkan...';
        leaderboardLoading.classList.remove('hidden');
        leaderboardContainer.classList.add('hidden');
        leaderboardEmpty.classList.add('hidden');

        try {
          const res = await fetch(`/api/sync-all.php?t=${Date.now()}`);
          const data = await res.json();
          if (data && data.records) {
            leaderboardData = data.records;
            filteredLeaderboardData = data.records;
            updateDateNote(data.fileDate);
            renderLeaderboard(1);
          } else if (Array.isArray(data)) {
            leaderboardData = data;
            filteredLeaderboardData = data;
            renderLeaderboard(1);
          } else {
            await fetchLeaderboard();
          }
        } catch (err) {
          console.error(err);
          await fetchLeaderboard();
        } finally {
          refreshBtn.disabled = false;
          refreshBtn.innerHTML = '<i class="fa-solid fa-arrows-rotate"></i> Muat Ulang';
        }
      }

      function updateDateNote(fileDate) {
        const dateNote = document.getElementById('data-date-note');
        if (dateNote && fileDate) {
          dateNote.querySelector('span').innerHTML = `Data direkap per tanggal <strong>${fileDate}</strong> sebelum jam 15:00 WIB`;
          dateNote.classList.remove('hidden');
        }
      }

      // ── Realtime Checker ──────────────────────────────────────────────────
      window.runRealtimeCheck = async function () {
        const input   = document.getElementById('rt-url-input');
        const btn     = document.getElementById('rt-check-btn');
        const loading = document.getElementById('rt-loading');
        const errBox  = document.getElementById('rt-error');
        const errMsg  = document.getElementById('rt-error-msg');
        const result  = document.getElementById('rt-result');

        const url = input.value.trim();
        if (!url) {
          input.style.borderColor = '#fca5a5';
          setTimeout(() => { input.style.borderColor = ''; }, 1500);
          return;
        }

        // Reset UI
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Mengambil...';
        loading.classList.remove('hidden');
        errBox.classList.add('hidden');
        result.classList.add('hidden');
        result.classList.remove('fade-in-up');

        try {
          const res  = await fetch(`/api/hitung-poin.php?url=${encodeURIComponent(url)}`);
          const data = await res.json();

          if (!res.ok || data.error) {
            throw new Error(data.error || 'Gagal mengambil data profil.');
          }

          const s = data.summary;
          const milestoneMap = {
            'Milestone 1':        { cls: 'm1', text: '🥉 Milestone 1' },
            'Milestone 2':        { cls: 'm2', text: '🥈 Milestone 2' },
            'Milestone 3':        { cls: 'm3', text: '🥇 Milestone 3' },
            'Ultimate Milestone': { cls: 'mu', text: '🏆 Ultimate' }
          };

          // Avatar
          const avatarEl = document.getElementById('rt-avatar');
          if (data.avatarUrl) {
            avatarEl.innerHTML = `<img src="${data.avatarUrl}" style="width:64px;height:64px;object-fit:cover;" referrerpolicy="no-referrer">`;
          } else {
            avatarEl.textContent = (data.name || '?').charAt(0).toUpperCase();
          }

          document.getElementById('rt-name').textContent = data.name || 'Peserta Arcade';

          const msEl   = document.getElementById('rt-milestone');
          const msData = milestoneMap[s.milestoneReached];
          msEl.innerHTML = msData
            ? `<span class="milestone-chip ${msData.cls}">${msData.text}</span>`
            : '<span style="font-size:0.75rem;color:var(--text-secondary);">Belum ada milestone</span>';

          document.getElementById('rt-total-points').textContent = Number(s.totalPoints).toFixed(1);
          document.getElementById('rt-arcade-count').textContent = s.arcadeGameCount;
          document.getElementById('rt-skill-count').textContent  = s.skillBadgeCount;
          document.getElementById('rt-bonus-points').textContent = s.bonusPoints;

          // ── Roadmap Steps Logic ──────────────────────────────────────────
          const stepM1 = document.getElementById('step-m1');
          const stepM2 = document.getElementById('step-m2');
          const stepM3 = document.getElementById('step-m3');
          const stepMu = document.getElementById('step-mu');
          const roadmapBar = document.getElementById('rt-roadmap-bar');

          [stepM1, stepM2, stepM3, stepMu].forEach(step => {
            step.classList.remove('active', 'completed');
          });

          const arcadeCount = s.arcadeGameCount;
          const skillCount = s.skillBadgeCount;
          let completedCount = 0;

          if (arcadeCount >= 6 && skillCount >= 14) {
            stepM1.classList.add('completed');
            completedCount = 1;
          } else {
            stepM1.classList.add('active');
          }

          if (arcadeCount >= 8 && skillCount >= 28) {
            stepM2.classList.add('completed');
            completedCount = 2;
          } else if (completedCount === 1) {
            stepM2.classList.add('active');
          }

          if (arcadeCount >= 10 && skillCount >= 42) {
            stepM3.classList.add('completed');
            completedCount = 3;
          } else if (completedCount === 2) {
            stepM3.classList.add('active');
          }

          if (arcadeCount >= 12 && skillCount >= 56) {
            stepMu.classList.add('completed');
            completedCount = 4;
          } else if (completedCount === 3) {
            stepMu.classList.add('active');
          }

          // Calculate roadmap progress bar width dynamically
          let progressPercent = 0;
          if (completedCount === 0) {
            const arcadePart = Math.min(100, (arcadeCount / 6) * 100);
            const skillPart = Math.min(100, (skillCount / 14) * 100);
            progressPercent = Math.round((arcadePart + skillPart) / 2) * 0.125;
          } else if (completedCount === 1) {
            const arcadePart = Math.min(100, ((arcadeCount - 6) / 2) * 100);
            const skillPart = Math.min(100, ((skillCount - 14) / 14) * 100);
            progressPercent = 12.5 + Math.round((arcadePart + skillPart) / 2) * 0.25;
          } else if (completedCount === 2) {
            const arcadePart = Math.min(100, ((arcadeCount - 8) / 2) * 100);
            const skillPart = Math.min(100, ((skillCount - 28) / 14) * 100);
            progressPercent = 37.5 + Math.round((arcadePart + skillPart) / 2) * 0.25;
          } else if (completedCount === 3) {
            const arcadePart = Math.min(100, ((arcadeCount - 10) / 2) * 100);
            const skillPart = Math.min(100, ((skillCount - 42) / 14) * 100);
            progressPercent = 62.5 + Math.round((arcadePart + skillPart) / 2) * 0.375;
          } else {
            progressPercent = 100;
          }
          
          roadmapBar.style.width = `${progressPercent}%`;

          // ── Motivation + Progress ────────────────────────────────────────
          const milestones = [
            { label: 'Milestone 1',        arcade: 6,  skill: 14 },
            { label: 'Milestone 2',        arcade: 8,  skill: 28 },
            { label: 'Milestone 3',        arcade: 10, skill: 42 },
            { label: 'Ultimate Milestone', arcade: 12, skill: 56 },
          ];

          const motivText  = document.getElementById('rt-motivation-text');
          const progWrap   = document.getElementById('rt-progress-wrap');
          const progLabel  = document.getElementById('rt-progress-label');
          const progPct    = document.getElementById('rt-progress-pct');
          const progBar    = document.getElementById('rt-progress-bar');

          const nextMs = milestones.find(m => s.arcadeGameCount < m.arcade || s.skillBadgeCount < m.skill);

          if (!nextMs) {
            motivText.innerHTML = '🏆 <strong>Luar biasa!</strong> Kamu telah menyelesaikan seluruh syarat dan meraih pencapaian tertinggi <strong>Ultimate Milestone</strong>!';
            progWrap.classList.add('hidden');
          } else {
            const needArcade = Math.max(0, nextMs.arcade - s.arcadeGameCount);
            const needSkill  = Math.max(0, nextMs.skill  - s.skillBadgeCount);

            const arcadePct  = Math.min(100, Math.round((s.arcadeGameCount / nextMs.arcade) * 100));
            const skillPct   = Math.min(100, Math.round((s.skillBadgeCount  / nextMs.skill)  * 100));
            const overallPct = Math.round((arcadePct + skillPct) / 2);

            let msg = '';
            if (s.milestoneReached === 'None') {
              msg = `Ayo mulai perjuanganmu! Selesaikan <strong>${needArcade} Arcade Game</strong> dan <strong>${needSkill} Skill Badge</strong> lagi untuk meraih <strong>${nextMs.label}</strong>.`;
            } else {
              msg = `Satu langkah lebih dekat! Kamu sudah berada di <strong>${s.milestoneReached}</strong>. Tambah <strong>${needArcade} Arcade Game</strong> dan <strong>${needSkill} Skill Badge</strong> lagi untuk naik ke <strong>${nextMs.label}</strong>.`;
            }

            motivText.innerHTML = msg;
            progLabel.textContent = `Menuju ${nextMs.label}`;
            progPct.textContent   = `${overallPct}%`;
            progBar.style.width   = `${overallPct}%`;
            progWrap.classList.remove('hidden');
          }

          loading.classList.add('hidden');
          result.classList.remove('hidden');
          
          void result.offsetWidth;
          result.classList.add('fade-in-up');

          // Refresh the leaderboard to show the updated rank!
          fetchLeaderboard();

        } catch (err) {
          loading.classList.add('hidden');
          errMsg.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i> ${err.message}`;
          errBox.classList.remove('hidden');
        } finally {
          btn.disabled = false;
          btn.innerHTML = '<i class="fa-solid fa-magnifying-glass"></i> Cek Sekarang';
        }
      };

      // Helper: generate milestone chip HTML for leaderboard
      function getMilestoneChip(milestone) {
        const map = {
          'Milestone 1':        { cls: 'm1', text: '🥉 Milestone 1' },
          'Milestone 2':        { cls: 'm2', text: '🥈 Milestone 2' },
          'Milestone 3':        { cls: 'm3', text: '🥇 Milestone 3' },
          'Ultimate Milestone': { cls: 'mu', text: '🏆 Ultimate' }
        };
        const m = map[milestone];
        return m ? `<span class="milestone-chip ${m.cls}">${m.text}</span>` : '';
      }

      function renderLeaderboard(page) {
        leaderboardPage = page;
        leaderboardLoading.classList.add('hidden');
        
        if (!filteredLeaderboardData || filteredLeaderboardData.length === 0) {
          if (searchInput.value.trim() !== '') {
            leaderboardEmpty.innerHTML = `
              <i class="fa-solid fa-users-slash text-muted" style="font-size: 2.2rem; margin-bottom: 12px;"></i>
              <p style="font-size: 0.85rem; color: var(--text-secondary);">Tidak ada peserta yang cocok dengan pencarian "${searchInput.value.trim()}".</p>
            `;
          } else {
            leaderboardEmpty.innerHTML = `
              <i class="fa-solid fa-users-slash text-muted" style="font-size: 2.2rem; margin-bottom: 12px;"></i>
              <p style="font-size: 0.85rem; color: var(--text-secondary);">Belum ada data peserta terdaftar.</p>
            `;
          }
          leaderboardEmpty.classList.remove('hidden');
          leaderboardContainer.classList.add('hidden');
          return;
        }

        leaderboardTbody.innerHTML = '';
        
        const startIndex = (page - 1) * leaderboardPerPage;
        const endIndex = startIndex + leaderboardPerPage;
        const pageItems = filteredLeaderboardData.slice(startIndex, endIndex);

        pageItems.forEach((p, index) => {
          const rank = startIndex + index + 1;
          const tr = document.createElement('tr');
          
          let rankClass = 'rank-other';
          let rowClass = '';
          if (rank === 1) {
            rankClass = 'rank-1';
            rowClass = 'row-rank-1';
          } else if (rank === 2) {
            rankClass = 'rank-2';
            rowClass = 'row-rank-2';
          } else if (rank === 3) {
            rankClass = 'rank-3';
            rowClass = 'row-rank-3';
          }

          if (rowClass) {
            tr.className = rowClass;
          }
          
          const initials = p.name.charAt(0).toUpperCase();
          const avatarId = `avatar-${startIndex + index}`;

          tr.innerHTML = `
            <td style="text-align: center;">
              <span class="rank-badge ${rankClass}">${rank}</span>
            </td>
            <td>
              <div class="participant-profile">
                <div id="${avatarId}" class="avatar-container-lazy" data-token="${p.profile_token}" data-initials="${initials}">
                  <div class="participant-avatar">${initials}</div>
                </div>
                <div>
                  <div class="participant-name">${p.name}</div>
                  ${getMilestoneChip(p.milestone_reached)}
                </div>
              </div>
            </td>
            <td style="text-align: center; font-weight: 600;">${p.arcade_count || 0}</td>
            <td style="text-align: center; font-weight: 600;">${p.skill_count || 0}</td>
            <td style="text-align: center;" class="points-highlight">${Number(p.total_points).toFixed(1)}</td>
          `;
          leaderboardTbody.appendChild(tr);
        });

        // Render Pagination UI
        const totalPages = Math.ceil(filteredLeaderboardData.length / leaderboardPerPage);
        const paginationContainer = document.getElementById('leaderboard-pagination');
        
        let paginationHTML = '';
        if (totalPages > 1) {
          let selectOptions = '';
          for (let i = 1; i <= totalPages; i++) {
            selectOptions += `<option value="${i}" ${i === page ? 'selected' : ''}>Halaman ${i} dari ${totalPages}</option>`;
          }

          paginationHTML += `
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.75rem;" ${page === 1 ? 'disabled' : `onclick="changeLeaderboardPage(${page - 1})"`}>
              <i class="fa-solid fa-chevron-left"></i> Prev
            </button>
            <select class="page-select" style="background: rgba(0,0,0,0.3); border: 1px solid var(--border-default); color: var(--text-primary); padding: 6px 12px; border-radius: var(--radius-sm); font-size: 0.75rem; text-align: center; cursor: pointer; outline: none;" onchange="changeLeaderboardPage(parseInt(this.value))">
              ${selectOptions}
            </select>
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.75rem;" ${page === totalPages ? 'disabled' : `onclick="changeLeaderboardPage(${page + 1})"`}>
              Next <i class="fa-solid fa-chevron-right"></i>
            </button>
          `;
        }
        paginationContainer.innerHTML = paginationHTML;

        leaderboardEmpty.classList.add('hidden');
        leaderboardContainer.classList.remove('hidden');

        lazyLoadAvatars();
      }

      // Client-side avatar caching in localStorage
      const getCachedAvatar = (url) => {
        try {
          const cache = JSON.parse(localStorage.getItem('g_avatar_cache') || '{}');
          return cache[url];
        } catch (e) {
          return null;
        }
      };

      const setCachedAvatar = (url, avatarUrl) => {
        try {
          const cache = JSON.parse(localStorage.getItem('g_avatar_cache') || '{}');
          cache[url] = avatarUrl;
          localStorage.setItem('g_avatar_cache', JSON.stringify(cache));
        } catch (e) {}
      };

      async function lazyLoadAvatars() {
        const containers = document.querySelectorAll('.avatar-container-lazy');
        containers.forEach(async (container) => {
          const token = container.getAttribute('data-token');
          const initials = container.getAttribute('data-initials');
          if (!token) return;

          const cached = getCachedAvatar(token);
          if (cached) {
            if (cached === 'none') return;
            container.innerHTML = `<img src="${cached}" alt="Avatar" class="participant-avatar" referrerpolicy="no-referrer" onerror="this.outerHTML='<div class=&quot;participant-avatar&quot;>${initials}</div>'">`;
            return;
          }

          try {
            const res = await fetch(`/api/avatar.php?id=${encodeURIComponent(token)}`);
            const data = await res.json();
            if (data.avatarUrl) {
              setCachedAvatar(token, data.avatarUrl);
              container.innerHTML = `<img src="${data.avatarUrl}" alt="Avatar" class="participant-avatar" referrerpolicy="no-referrer" onerror="this.outerHTML='<div class=&quot;participant-avatar&quot;>${initials}</div>'">`;
            } else {
              setCachedAvatar(token, 'none');
            }
          } catch (err) {
            console.error('Failed to load avatar:', err);
          }
        });
      }

      window.changeLeaderboardPage = (page) => {
        renderLeaderboard(page);
      };

      // Live search
      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        filteredLeaderboardData = leaderboardData.filter(p => p.name.toLowerCase().includes(query));
        renderLeaderboard(1);
      });

      // Refresh button — full sync from Google Skills
      refreshBtn.addEventListener('click', syncAllLeaderboard);

      // Initial Fetch
      fetchLeaderboard();

      // --- Render Resource Data (Arcade Games & Skill Badges) ---
      const arcadeGamesList = document.getElementById('arcade-games-list');
      const fastTrackList = document.getElementById('fast-track-list');
      const fastTrackSearch = document.getElementById('fast-track-search');

      const arcadeGames = [
        {
          name: "Spans and Plans (1 Poin)",
          url: "https://www.skills.google/games/7399?utm_source=googleskills&utm_medium=lp&utm_campaign=Special-Aug-arcade26",
          code: "1q-schema-27083",
          isExpired: false
        },
        {
          name: "Arcade Simulator: Network Security Engineer (1 Poin)",
          url: "https://www.skills.google/games/7397?utm_source=googleskills&utm_medium=lp&utm_campaign=spegame-Aug-arcade26",
          code: "1q-network-51470",
          isExpired: false
        },
        {
          name: "Arcade Trail: Cloud Delivery Systems (1 Poin)",
          url: "https://www.skills.google/games/7396?utm_source=googleskills&utm_medium=lp&utm_campaign=trail-Aug-arcade26",
          code: "1q-delivery-31058",
          isExpired: false
        },
        {
          name: "Arcade Base Camp August 2026 (1 Poin)",
          url: "https://www.skills.google/games/7394?utm_source=googleskills&utm_medium=lp&utm_campaign=basecamp-Aug-arcade26",
          code: "1q-basecamp-10219",
          isExpired: false
        },
        {
          name: "Arcade Adventure: Data Vault (1 Poin)",
          url: "https://www.skills.google/games/7395?utm_source=qwiklabs&utm_medium=lp&utm_campaign=adv-Aug-arcade26",
          code: "1q-datamgt-92372",
          isExpired: false
        },
        {
          name: "Arcade Voyage: Google Sheets (1 Poin)",
          url: "https://www.skills.google/games/7398?utm_source=googleskills&utm_medium=lp&utm_campaign=voyage-Aug-arcade26",
          code: "1q-sheets-29185",
          isExpired: false
        }
      ];

      const skillBadges = [
        { name: "Create Your First Gemini Enterprise Application", url: "https://www.skills.google/course_templates/1586?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: false },
        { name: "Develop AI-Powered Prototypes in Google AI Studio", url: "https://www.skills.google/course_templates/1426?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "The Basics of Google Cloud Compute", url: "https://www.skills.google/course_templates/754?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Implement Event-Driven Messaging and Automation Workflows", url: "https://www.skills.google/course_templates/728?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Implement Cloud Storage and Data Protection Solutions", url: "https://www.skills.google/course_templates/725?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Create a Streaming Data Lake on Cloud Storage", url: "https://www.skills.google/course_templates/705?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: false },
        { name: "Deploy and Manage Applications on Google App Engine", url: "https://www.skills.google/course_templates/671?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Implement Speech and Language Solutions with Pre-trained APIs", url: "https://www.skills.google/course_templates/700?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Using the Google Cloud Speech API", url: "https://www.skills.google/course_templates/756?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Analyze Speech and Language with Google APIs", url: "https://www.skills.google/course_templates/634?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Store, Process, and Manage Data on Google Cloud - Console", url: "https://www.skills.google/course_templates/658?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Store, Process, and Manage Data on Google Cloud - Command Line", url: "https://www.skills.google/course_templates/659?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Migrate MySQL Data to Cloud SQL Using Database Migration Service", url: "https://www.skills.google/course_templates/629?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Get Started with Sensitive Data Protection", url: "https://www.skills.google/course_templates/750?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Analyze Images with the Cloud Vision API", url: "https://www.skills.google/course_templates/633?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Build Event-Driven Applications with Eventarc", url: "https://www.skills.google/course_templates/727?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Configure Service Accounts and IAM Roles for Google Cloud", url: "https://www.skills.google/course_templates/702?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Get Started with App Development using Gemini Code Assist", url: "https://www.skills.google/course_templates/1399?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Implement Cloud Security Fundamentals in Google Cloud", url: "https://www.skills.google/course_templates/645?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Beginner", isFastTrack: true },
        { name: "Engineer AI Agents with Agent Development Kit (ADK)", url: "https://www.skills.google/course_templates/1596?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build Useful AI Applications with Gemini and Imagen", url: "https://www.skills.google/course_templates/1076?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: false },
        { name: "Build a Smart Cloud Application with Vibe Coding and MCP", url: "https://www.skills.google/course_templates/1459?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Implement Cloud Collaboration and Productivity Workflows", url: "https://www.skills.google/course_templates/676?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Analyze BigQuery Data in Connected Sheets", url: "https://www.skills.google/course_templates/632?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Streaming Analytics into BigQuery", url: "https://www.skills.google/course_templates/752?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create a Secure Data Lake on Cloud Storage", url: "https://www.skills.google/course_templates/704?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Secure Lakehouse Data", url: "https://www.skills.google/course_templates/751?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Enrich Metadata and Discovery of Lakehouse Data", url: "https://www.skills.google/course_templates/753?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Monitor and Manage Google Cloud Resources", url: "https://www.skills.google/course_templates/653?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Monitor and Log with Google Cloud Observability", url: "https://www.skills.google/course_templates/749?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Set Up a Google Cloud Network", url: "https://www.skills.google/course_templates/641?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Integrate BigQuery Data and Google Workspace using Apps Script", url: "https://www.skills.google/course_templates/737?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Engineer Data for Predictive Modeling with BigQuery ML", url: "https://www.skills.google/course_templates/627?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Implement DevOps Workflows in Google Cloud", url: "https://www.skills.google/course_templates/716?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create ML Models with BigQuery ML", url: "https://www.skills.google/course_templates/626?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build a Website on Google Cloud", url: "https://www.skills.google/course_templates/638?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Manage Kubernetes in Google Cloud", url: "https://www.skills.google/course_templates/783?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Share Data Using Google Data Cloud", url: "https://www.skills.google/course_templates/657?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Use Machine Learning APIs on Google Cloud", url: "https://www.skills.google/course_templates/630?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Monitor Environments with Google Cloud Managed Service for Prometheus", url: "https://www.skills.google/course_templates/761?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Organize and Manage Data with Dataplex", url: "https://www.skills.google/course_templates/726?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Analyze Sentiment with Natural Language API", url: "https://www.skills.google/course_templates/667?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Develop with Apps Script and AppSheet", url: "https://www.skills.google/course_templates/715?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Use APIs to Manage Cloud Storage", url: "https://www.skills.google/course_templates/755?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Monitoring in Google Cloud", url: "https://www.skills.google/course_templates/747?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Orchestrate Multi-agent Workflows with Gemini Enterprise", url: "https://www.skills.google/course_templates/1682?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: false },
        { name: "Connect Cloud Networks with NCC", url: "https://www.skills.google/course_templates/1364?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Privileged Access with IAM", url: "https://www.skills.google/course_templates/1337?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Enhance Gemini Model Capabilities", url: "https://www.skills.google/course_templates/1241?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Analyze and Reason on Multimodal Data with Gemini", url: "https://www.skills.google/course_templates/1240?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Implement Multimodal Vector Search with BigQuery", url: "https://www.skills.google/course_templates/1232?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Protect Cloud Traffic with Chrome Enterprise Premium Security", url: "https://www.skills.google/course_templates/784?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Discover and Protect Sensitive Data Across Your Ecosystem", url: "https://www.skills.google/course_templates/1177?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Secure Software Delivery", url: "https://www.skills.google/course_templates/1164?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create and Manage AlloyDB Instances", url: "https://www.skills.google/course_templates/642?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create and Manage Cloud SQL for PostgreSQL Instances", url: "https://www.skills.google/course_templates/652?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Deploy and Manage Apigee X", url: "https://www.skills.google/course_templates/661?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Develop Serverless Apps on Cloud Run", url: "https://www.skills.google/course_templates/741?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build a Data Warehouse with BigQuery", url: "https://www.skills.google/course_templates/624?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Prepare Data for ML APIs on Google Cloud", url: "https://www.skills.google/course_templates/631?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build Serverless Applications with Cloud Run Functions", url: "https://www.skills.google/course_templates/696?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Get Started with API Gateway", url: "https://www.skills.google/course_templates/662?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "App Building with AppSheet", url: "https://www.skills.google/course_templates/635?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build Google Cloud Infrastructure for AWS Professionals", url: "https://www.skills.google/course_templates/687?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create and Manage Bigtable Instances", url: "https://www.skills.google/course_templates/650?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Implement CI/CD Pipelines in Google Cloud", url: "https://www.skills.google/course_templates/691?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Using Functions, Formulas, and Charts in Google Sheets", url: "https://www.skills.google/course_templates/776?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Create and Manage Cloud Spanner Instances", url: "https://www.skills.google/course_templates/643?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Build Infrastructure with Terraform in Google Cloud", url: "https://www.skills.google/course_templates/636?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Perform Predictive Data Analysis in BigQuery", url: "https://www.skills.google/course_templates/656?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Automate Data Capture at Scale with Document AI", url: "https://www.skills.google/course_templates/674?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Develop and Secure APIs with Apigee X", url: "https://www.skills.google/course_templates/714?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Intermediate", isFastTrack: true },
        { name: "Explore Generative AI in Agent Platform", url: "https://www.skills.google/course_templates/959?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Implementing Cloud Load Balancing for Compute Engine", url: "https://www.skills.google/course_templates/648?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Prompt Design in Agent Platform", url: "https://www.skills.google/course_templates/976?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Inspect Rich Documents with Gemini Multimodality and Multimodal RAG", url: "https://www.skills.google/course_templates/981?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Develop Gen AI Apps with Gemini and Streamlit", url: "https://www.skills.google/course_templates/978?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Set Up an App Dev Environment on Google Cloud", url: "https://www.skills.google/course_templates/637?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Develop Your Google Cloud Network", url: "https://www.skills.google/course_templates/625?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Build a Secure Google Cloud Network", url: "https://www.skills.google/course_templates/654?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Deploy Kubernetes Applications on Google Cloud", url: "https://www.skills.google/course_templates/663?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Derive Insights from BigQuery Data", url: "https://www.skills.google/course_templates/623?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Build LookML Objects in Looker", url: "https://www.skills.google/course_templates/639?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Manage Data Models in Looker", url: "https://www.skills.google/course_templates/651?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Prepare Data for Looker Dashboards and Reports", url: "https://www.skills.google/course_templates/628?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Develop Serverless Apps with Firebase", url: "https://www.skills.google/course_templates/649?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Cloud Architecture: Design, Implement, and Manage", url: "https://www.skills.google/course_templates/640?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: false },
        { name: "Build Global and Regional Load Balancing Solutions", url: "https://www.skills.google/course_templates/1558?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: false },
        { name: "Google DeepMind: Train A Small Language Model", url: "https://www.skills.google/course_templates/1453?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Mitigate Threats and Vulnerabilities with Security Command Center", url: "https://www.skills.google/course_templates/759?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Build a Data Mesh with Knowledge Catalog", url: "https://www.skills.google/course_templates/681?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Deploy Multi-Agent Architectures", url: "https://www.skills.google/course_templates/1445?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true },
        { name: "Optimize Costs for Google Kubernetes Engine", url: "https://www.skills.google/course_templates/655?utm_source=gcaf-site&utm_medium=website&utm_campaign=arcade-facilitator26", level: "Advanced", isFastTrack: true }
      ];

      // Render Arcade Games
      arcadeGames.forEach(game => {
        const card = document.createElement('div');
        card.className = 'glass' + (game.isExpired ? ' expired-game' : '');
        if (game.isExpired) {
          card.style.opacity = '0.65';
          card.style.border = '1px solid rgba(239, 68, 68, 0.2)';
        }
        card.style.padding = '16px';
        card.style.display = 'flex';
        card.style.flexDirection = 'column';
        card.style.justifyContent = 'space-between';
        card.style.gap = '10px';
        
        const actionButton = game.isExpired
          ? `
            <button class="btn btn-secondary" style="padding: 8px 14px; font-size: 0.8rem; justify-content: center; width: 100%; margin-top: 5px; color: var(--text-secondary); cursor: not-allowed; border: 1px solid var(--border-default); background: rgba(255,255,255,0.02);" disabled>
              <i class="fa-solid fa-ban"></i> Selesai (Expired)
            </button>
          `
          : `
            <a href="${game.url}" target="_blank" class="btn btn-outline" style="padding: 8px 14px; font-size: 0.8rem; justify-content: center; width: 100%; margin-top: 5px;">
              <i class="fa-solid fa-play"></i> Mulai Game
            </a>
          `;
          
        card.innerHTML = `
          <div>
            <h4 style="color: var(--text-primary); font-size: 0.95rem; margin-bottom: 6px;">${game.name}</h4>
            <div style="font-size: 0.8rem; background: rgba(0,0,0,0.3); padding: 8px 12px; border-radius: var(--radius-sm); border: 1px solid var(--border-default); color: var(--text-primary); opacity: ${game.isExpired ? '0.5' : '1'};">
              Access Code: <code style="font-weight: 700; color: var(--accent-yellow); font-family: monospace;">${game.code}</code>
            </div>
          </div>
          ${actionButton}
        `;
        arcadeGamesList.appendChild(card);
      });

      // Render Skill Badges
      let skillBadgesPage = 1;
      const skillBadgesPerPage = 9;
      let filteredSkillBadges = [...skillBadges];

      function escapeHtml(str) {
        if (!str) return '';
        return str
          .replace(/&/g, "&amp;")
          .replace(/</g, "&lt;")
          .replace(/>/g, "&gt;")
          .replace(/"/g, "&quot;")
          .replace(/'/g, "&#039;");
      }

      function updateKalkulatorTrackingDashboard() {
        const completedSkills = JSON.parse(localStorage.getItem('completed_skill_badges') || '[]');
        const total = skillBadges.length;
        const completedCount = skillBadges.filter(b => completedSkills.includes(b.name)).length;
        const pct = total > 0 ? Math.round((completedCount / total) * 100) : 0;
        
        const countEl = document.getElementById('tracking-kalkulator-count');
        const totalEl = document.getElementById('tracking-kalkulator-total');
        const percentEl = document.getElementById('tracking-kalkulator-percent');
        const barEl = document.getElementById('tracking-kalkulator-progress-bar');
        
        if (countEl) countEl.textContent = completedCount;
        if (totalEl) totalEl.textContent = total;
        if (percentEl) percentEl.textContent = `${pct}%`;
        if (barEl) barEl.style.width = `${pct}%`;
      }

      window.exportKalkulatorExcel = () => {
        const completedSkills = JSON.parse(localStorage.getItem('completed_skill_badges') || '[]');
        
        let html = `<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">`;
        html += `<head><meta charset="utf-8">`;
        html += `<style>`;
        html += `
          table { border-collapse: collapse; font-family: 'Segoe UI', Helvetica, Arial, sans-serif; }
          .title-row { font-size: 16pt; font-weight: bold; color: #ffffff; background-color: #1a73e8; text-align: center; height: 50px; }
          .meta-label { font-weight: bold; background-color: #f8f9fa; color: #3c4043; border: 1px solid #dadce0; padding: 10px; font-size: 10pt; }
          .meta-val { color: #3c4043; border: 1px solid #dadce0; padding: 10px; font-size: 10pt; }
          th { background-color: #34a853; color: white; font-weight: bold; border: 1px solid #247e3a; padding: 12px 10px; text-align: left; font-size: 11pt; }
          td { border: 1px solid #dadce0; padding: 10px; font-size: 10pt; }
          .row-even { background-color: #ffffff; }
          .row-odd { background-color: #f8f9fa; }
          .status-done { background-color: #e6f4ea; color: #137333; font-weight: bold; text-align: center; }
          .status-pending { background-color: #fce8e6; color: #c5221f; font-weight: bold; text-align: center; }
          .level-beginner { background-color: #e8f0fe; color: #1a73e8; text-align: center; }
          .level-intermediate { background-color: #fef7e0; color: #b06000; text-align: center; }
          .level-advanced { background-color: #fce8e6; color: #c5221f; text-align: center; }
          .badge-ft { background-color: #e8f0fe; color: #1a73e8; font-weight: bold; text-align: center; }
          .badge-reg { text-align: center; color: #5f6368; }
        `;
        html += `</style></head><body>`;
        
        html += `<table>`;
        html += `<tr><td colspan="5" class="title-row" style="vertical-align: middle;">LAPORAN PROGRES ARCADE SKILL BADGES 2026</td></tr>`;
        html += `<tr><td colspan="5" style="height: 15px;"></td></tr>`;
        
        const dateStr = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        const total = skillBadges.length;
        const completedCount = skillBadges.filter(b => completedSkills.includes(b.name)).length;
        const pct = total > 0 ? Math.round((completedCount / total) * 100) : 0;

        html += `<tr>`;
        html += `<td colspan="2" class="meta-label">Tanggal Ekspor:</td>`;
        html += `<td colspan="3" class="meta-val">${dateStr}</td>`;
        html += `</tr>`;
        html += `<tr>`;
        html += `<td colspan="2" class="meta-label">Progres Pengerjaan:</td>`;
        html += `<td colspan="3" class="meta-val" style="font-weight: bold; color: #137333; background-color: #e6f4ea;">${completedCount} / ${total} Selesai (${pct}%)</td>`;
        html += `</tr>`;
        html += `<tr><td colspan="5" style="height: 15px;"></td></tr>`;
        
        html += `<tr>`;
        html += `<th style="width: 50px;">No</th>`;
        html += `<th style="width: 400px;">Nama Skill Badge</th>`;
        html += `<th style="width: 130px;">Level</th>`;
        html += `<th style="width: 130px;">Tipe</th>`;
        html += `<th style="width: 160px;">Status</th>`;
        html += `</tr>`;
        
        skillBadges.forEach((badge, idx) => {
          const isDone = completedSkills.includes(badge.name);
          const rowClass = idx % 2 === 0 ? 'row-even' : 'row-odd';
          const statusText = isDone ? 'SELESAI' : 'BELUM SELESAI';
          const statusClass = isDone ? 'status-done' : 'status-pending';
          const typeText = badge.isFastTrack ? 'Fast Track' : 'Regular';
          const typeClass = badge.isFastTrack ? 'badge-ft' : 'badge-reg';
          
          let lvlClass = 'level-beginner';
          if (badge.level === 'Intermediate') lvlClass = 'level-intermediate';
          else if (badge.level === 'Advanced') lvlClass = 'level-advanced';

          html += `<tr class="${rowClass}">`;
          html += `<td style="text-align: center; vertical-align: middle;">${idx + 1}</td>`;
          html += `<td style="vertical-align: middle;">${badge.name}</td>`;
          html += `<td class="${lvlClass}" style="vertical-align: middle;">${badge.level}</td>`;
          html += `<td class="${typeClass}" style="vertical-align: middle;">${typeText}</td>`;
          html += `<td class="${statusClass}" style="vertical-align: middle;">${statusText}</td>`;
          html += `</tr>`;
        });
        
        html += `</table></body></html>`;
        
        const blob = new Blob([html], { type: 'application/vnd.ms-excel;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `arcade_skill_badges_progress_${new Date().toISOString().slice(0,10)}.xls`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        setTimeout(() => {
          URL.revokeObjectURL(url);
        }, 1000);
      };

      window.triggerKalkulatorImport = () => {
        document.getElementById('import-kalkulator-file-input').click();
      };

      window.importKalkulatorProgress = (event) => {
        const file = event.target.files[0];
        if (!file) return;
        
        const reader = new FileReader();
        reader.onload = (e) => {
          try {
            const data = JSON.parse(e.target.result);
            if (Array.isArray(data)) {
              localStorage.setItem('completed_skill_badges', JSON.stringify(data));
              renderSkillBadges(1);
              updateKalkulatorTrackingDashboard();
              alert('Berhasil mengimpor progres skill badges!');
            } else {
              alert('Format file cadangan tidak valid.');
            }
          } catch (err) {
            alert('Gagal membaca file cadangan.');
          }
        };
        reader.readAsText(file);
      };

      window.resetKalkulatorProgress = () => {
        if (confirm('Apakah Anda yakin ingin mereset seluruh progres skill badges Anda? Tindakan ini tidak dapat dibatalkan.')) {
          localStorage.removeItem('completed_skill_badges');
          renderSkillBadges(1);
          updateKalkulatorTrackingDashboard();
        }
      };

      window.toggleSkillBadgeFromKalkulator = (badgeName, event) => {
        if (event) event.stopPropagation();
        let completedSkills = JSON.parse(localStorage.getItem('completed_skill_badges') || '[]');
        const index = completedSkills.indexOf(badgeName);
        if (index === -1) {
          completedSkills.push(badgeName);
        } else {
          completedSkills.splice(index, 1);
        }
        localStorage.setItem('completed_skill_badges', JSON.stringify(completedSkills));
        renderSkillBadges(skillBadgesPage);
        updateKalkulatorTrackingDashboard();
      };

      function renderSkillBadges(page) {
        updateKalkulatorTrackingDashboard();
        skillBadgesPage = page;
        fastTrackList.innerHTML = '';
        
        if (filteredSkillBadges.length === 0) {
          fastTrackList.innerHTML = '<p style="grid-column: 1/-1; text-align: center; color: var(--text-secondary); padding: 20px;">Tidak ada skill badge yang cocok.</p>';
          document.getElementById('fast-track-pagination').innerHTML = '';
          return;
        }

        const startIndex = (page - 1) * skillBadgesPerPage;
        const endIndex = startIndex + skillBadgesPerPage;
        const pageItems = filteredSkillBadges.slice(startIndex, endIndex);

        const completedSkills = JSON.parse(localStorage.getItem('completed_skill_badges') || '[]');

        updateKalkulatorTrackingDashboard();
        pageItems.forEach(badge => {
          const item = document.createElement('div');
          item.className = 'glass skill-badge-card-item';
          item.style.padding = '20px';
          item.style.display = 'flex';
          item.style.flexDirection = 'column';
          item.style.justifyContent = 'space-between';
          item.style.gap = '15px';
          item.style.position = 'relative';
          item.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease';

          const isCompleted = completedSkills.includes(badge.name);
          if (isCompleted) {
            item.style.border = '1px solid rgba(16, 185, 129, 0.4)';
            item.style.boxShadow = '0 0 15px rgba(16, 185, 129, 0.1)';
          } else {
            item.style.border = '1px solid var(--border-default)';
            item.style.boxShadow = 'none';
          }

          item.onmouseover = () => {
            item.style.transform = 'translateY(-4px)';
            item.style.boxShadow = isCompleted 
              ? '0 8px 25px rgba(16, 185, 129, 0.2)' 
              : '0 8px 25px rgba(0, 0, 0, 0.35)';
          };
          item.onmouseout = () => {
            item.style.transform = 'translateY(0)';
            item.style.boxShadow = isCompleted 
              ? '0 0 15px rgba(16, 185, 129, 0.1)' 
              : 'none';
          };
          
          let lvlBadge = 'blue-badge';
          if (badge.level === 'Intermediate') lvlBadge = 'yellow-badge';
          else if (badge.level === 'Advanced') lvlBadge = 'red-badge';

          const fastTrackTag = badge.isFastTrack 
            ? `<span class="badge" style="font-size: 0.6rem; padding: 2px 6px; background: linear-gradient(135deg, #10b981, #059669); color: white; margin-left: 5px;"><i class="fa-solid fa-bolt"></i> Fast Track</span>` 
            : '';

          const checkmarkHTML = `
            <div class="badge-check-wrapper" onclick="toggleSkillBadgeFromKalkulator('${escapeHtml(badge.name)}', event)" style="position: absolute; top: 15px; right: 15px; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 6px; border: 1px solid ${isCompleted ? '#10b981' : 'var(--border-default)'}; background: ${isCompleted ? '#10b981' : 'rgba(0,0,0,0.3)'}; color: ${isCompleted ? 'white' : 'transparent'}; transition: all 0.2s ease;" title="${isCompleted ? 'Tandai belum selesai' : 'Tandai selesai'}">
              <i class="fa-solid fa-check" style="font-size: 0.7rem;"></i>
            </div>
          `;

          item.innerHTML = `
            ${checkmarkHTML}
            <div style="display: flex; flex-direction: column; justify-content: space-between; height: 100%; gap: 12px; width: 100%;">
              <div>
                <a href="${badge.url}" target="_blank" style="font-weight: 700; font-size: 0.95rem; color: var(--text-primary); margin-bottom: 8px; min-height: 44px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; padding-right: 25px; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--accent-blue)'" onmouseout="this.style.color='var(--text-primary)'">
                  ${badge.name} <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.7rem; margin-left: 4px; opacity: 0.7;"></i>
                </a>
                <div style="display: flex; gap: 6px; flex-wrap: wrap; margin-top: 4px;">
                  <span class="badge ${lvlBadge}" style="font-size: 0.6rem; padding: 2px 6px;">${badge.level}</span>
                  ${fastTrackTag}
                </div>
              </div>
              <a href="${badge.url}" target="_blank" class="btn btn-primary" style="padding: 8px 14px; font-size: 0.8rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; width: 100%; margin-top: 5px; background: linear-gradient(135deg, var(--accent-blue), #2563eb); border: none; border-radius: var(--radius-md); text-decoration: none;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Mulai Badge
              </a>
            </div>
          `;
          fastTrackList.appendChild(item);
        });

        // Render Pagination UI
        const totalPages = Math.ceil(filteredSkillBadges.length / skillBadgesPerPage);
        const paginationContainer = document.getElementById('fast-track-pagination');
        
        let paginationHTML = '';
        if (totalPages > 1) {
          paginationHTML += `
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.75rem;" ${page === 1 ? 'disabled' : `onclick="changeSkillBadgesPage(${page - 1})"`}>
              <i class="fa-solid fa-chevron-left"></i>
            </button>
            <span style="font-size: 0.85rem; color: var(--text-secondary); min-width: 80px; text-align: center;">Halaman ${page} dari ${totalPages}</span>
            <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.75rem;" ${page === totalPages ? 'disabled' : `onclick="changeSkillBadgesPage(${page + 1})"`}>
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          `;
        }
        paginationContainer.innerHTML = paginationHTML;
      }

      window.changeSkillBadgesPage = (page) => {
        renderSkillBadges(page);
      };

      // Initial skill badges render
      renderSkillBadges(1);

      // Skill badge search filter
      fastTrackSearch.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        filteredSkillBadges = skillBadges.filter(b => b.name.toLowerCase().includes(query));
        renderSkillBadges(1);
      });
    });

    // Global Tab Switching Function
    window.switchResourceTab = (tabId) => {
      document.querySelectorAll('.resource-tab-content').forEach(el => {
        el.classList.add('hidden');
      });
      document.querySelectorAll('.filter-btn').forEach(btn => {
        if (btn.id && btn.id.startsWith('btn-tab-')) {
          btn.classList.remove('active');
        }
      });
      
      document.getElementById(`res-${tabId}`).classList.remove('hidden');
      document.getElementById(`btn-tab-${tabId}`).classList.add('active');
    };
  </script>
<?php $extraScripts = ob_get_clean(); include __DIR__ . '/includes/footer.php'; ?>
