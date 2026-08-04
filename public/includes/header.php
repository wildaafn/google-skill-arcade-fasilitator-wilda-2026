<?php
// Determine active page for navigation highlighting
$currentPage = $currentPage ?? '';
$pageTitle = $pageTitle ?? 'Google Cloud Arcade X Dicoding';
$extraStyles = $extraStyles ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?> - Portal Komunitas</title>
  <meta name="description" content="Bergabunglah bersama Fasilitator WILDA ARIFFATUL FAISALNUR untuk mendapatkan info token lab gratis, tips tutorial, dan info Swag Drop.">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <?php echo $extraStyles; ?>
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
      <a href="/index.php" class="logo">
        <span class="g-blue">G</span><span class="g-red">o</span><span class="g-yellow">o</span><span class="g-blue">g</span><span class="g-green">l</span><span class="g-red">e</span>
        <span class="arcade-title">Arcade</span>
      </a>
      
      <nav class="desktop-nav">
        <ul>
          <li><a href="/index.php" class="nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>">Home</a></li>
          <li><a href="/tentang.php" class="nav-link <?php echo $currentPage === 'tentang' ? 'active' : ''; ?>">Tentang Program</a></li>
          <li><a href="/cara-main.php" class="nav-link <?php echo $currentPage === 'cara-main' ? 'active' : ''; ?>">Cara Main</a></li>
          <li><a href="/kalkulator.php" class="nav-link <?php echo $currentPage === 'kalkulator' ? 'active' : ''; ?>">Cek Poin</a></li>
          <li class="nav-item-dropdown">
            <a href="#" class="nav-link <?php echo ($currentPage === 'strategi' || $currentPage === 'solusi-lab') ? 'active' : ''; ?>">Strategi <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 2px;"></i></a>
            <ul class="dropdown-menu">
              <li><a href="/strategi.php">Strategi Poin</a></li>
              <li><a href="/solusi-lab.php">Tutorial Lab</a></li>
            </ul>
          </li>
          <li><a href="/galeri-swag.php" class="nav-link <?php echo $currentPage === 'galeri-swag' ? 'active' : ''; ?>">Galeri Swag</a></li>
          <li><a href="/qna.php" class="nav-link <?php echo $currentPage === 'qna' ? 'active' : ''; ?>">QnA</a></li>
          <li><a href="/komunitas.php" class="nav-link <?php echo $currentPage === 'komunitas' ? 'active' : ''; ?>">Komunitas</a></li>
          <li class="nav-item-dropdown">
            <a href="#" class="nav-link <?php echo ($currentPage === 'panduan-skills' || $currentPage === 'panduan-gear') ? 'active' : ''; ?>">Panduan <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 2px;"></i></a>
            <ul class="dropdown-menu">
              <li><a href="/panduan-skills.php">Skills Google</a></li>
              <li><a href="/panduan-gear.php">Google GEAR</a></li>
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
      <a href="/index.php" class="mobile-logo" style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800;">
        <span class="g-blue">G</span><span class="g-red">o</span><span class="g-yellow">o</span><span class="g-blue">g</span><span class="g-green">l</span><span class="g-red">e</span> Arcade
      </a>
      <ul>
        <li><a href="/index.php" class="mobile-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>">Home</a></li>
        <li><a href="/tentang.php" class="mobile-link <?php echo $currentPage === 'tentang' ? 'active' : ''; ?>">Tentang Program</a></li>
        <li><a href="/cara-main.php" class="mobile-link <?php echo $currentPage === 'cara-main' ? 'active' : ''; ?>">Cara Main</a></li>
        <li><a href="/kalkulator.php" class="mobile-link <?php echo $currentPage === 'kalkulator' ? 'active' : ''; ?>">Cek Poin & Papan Skor</a></li>
        <li><a href="/strategi.php" class="mobile-link <?php echo $currentPage === 'strategi' ? 'active' : ''; ?>">Strategi Point</a></li>
        <li><a href="/solusi-lab.php" class="mobile-link <?php echo $currentPage === 'solusi-lab' ? 'active' : ''; ?>">Tutorial Lab</a></li>
        <li><a href="/galeri-swag.php" class="mobile-link <?php echo $currentPage === 'galeri-swag' ? 'active' : ''; ?>">Galeri Swag</a></li>
        <li><a href="/qna.php" class="mobile-link <?php echo $currentPage === 'qna' ? 'active' : ''; ?>">QnA</a></li>
        <li><a href="/komunitas.php" class="mobile-link <?php echo $currentPage === 'komunitas' ? 'active' : ''; ?>">Komunitas</a></li>
        <li><a href="/panduan-skills.php" class="mobile-link <?php echo $currentPage === 'panduan-skills' ? 'active' : ''; ?>">Panduan Skills Google</a></li>
        <li><a href="/panduan-gear.php" class="mobile-link <?php echo $currentPage === 'panduan-gear' ? 'active' : ''; ?>">Panduan Google GEAR</a></li>
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
