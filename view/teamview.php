<?php
/**
 * MIND VI — "The Six Minds" Team View
 * 
 * Exact reproduction of the reference Team design:
 * Features the central Astrological Clock Dial with the 6 Minds in illuminated portholes,
 * Left Manifesto ("Different minds. One vision."), and Right Active Member Details with Carousel.
 */

$navLinks = $navLinks ?? [
    ['label' => 'Home', 'href' => '/', 'active' => false],
    ['label' => 'Our Projects', 'href' => '/projects', 'active' => false],
    ['label' => 'Our Team', 'href' => '/team', 'active' => true],
    ['label' => 'About Us', 'href' => '/#about-us', 'active' => false],
];
$navCTA = $navCTA ?? "Let's Talk";

$manifesto = $manifesto ?? [
    'number'         => '01',
    'sideLabel'      => 'OUR TEAM',
    'headlineLight'  => 'Different',
    'headlineLight2' => 'minds.',
    'headlineAccent' => 'One vision.',
    'description'    => 'A team driven by creativity, strategy and a shared passion for visual experiences.',
];

$members = $members ?? [
    [
        'index'       => '01',
        'name'        => 'alexander',
        'role'        => 'creative Director',
        'bio'         => 'Orchestrates the overarching artistic vision, blending brand storytelling with visionary design aesthetics.',
        'specialties' => ['Creative Direction', 'Brand Concept', 'Visual Storytelling'],
        'tools'       => ['Figma', 'Photoshop', 'Cinema 4D'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
    [
        'index'       => '02',
        'name'        => 'takwa',
        'role'        => 'web design Director',
        'bio'         => 'Guides the creative vision and brings ideas to life through storytelling, design and strategy.',
        'specialties' => ['Creative Direction', 'Brand Identity', 'Visual Strategy'],
        'tools'       => ['Figma', 'Adobe Suite', 'Blender'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
    [
        'index'       => '03',
        'name'        => 'yassine',
        'role'        => 'visual production Lead',
        'bio'         => 'Brings cinematic scale to brand identities through high-impact art direction and dynamic imagery.',
        'specialties' => ['Art Direction', 'Visual Concept', 'Set & Light Design'],
        'tools'       => ['Illustrator', 'Lightroom', 'Cinema 4D'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
    [
        'index'       => '04',
        'name'        => 'sarah',
        'role'        => 'motion & 3D Artist',
        'bio'         => 'Crafts captivating spatial visuals and fluid motion systems that animate digital worlds.',
        'specialties' => ['3D Motion Design', 'Visual Effects', 'Spatial Audio'],
        'tools'       => ['Blender', 'After Effects', 'Unreal Engine'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
    [
        'index'       => '05',
        'name'        => 'karim',
        'role'        => 'lead digital Architect',
        'bio'         => 'Engineers interactive experiences, creative web algorithms, and silky fluid interfaces.',
        'specialties' => ['Creative Coding', 'Interactive Systems', 'Full-Stack Architecture'],
        'tools'       => ['GSAP', 'WebGL', 'Tailwind', 'PHP'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
    [
        'index'       => '06',
        'name'        => 'nour',
        'role'        => 'brand strategist & Producer',
        'bio'         => 'Shapes meaningful narratives and strategic roadmaps that elevate brands to cultural impact.',
        'specialties' => ['Brand Narrative', 'Content Strategy', 'Executive Production'],
        'tools'       => ['Notion', 'Keynote', 'Analytics'],
        'socials'     => ['instagram' => '#', 'linkedin' => '#', 'behance' => '#'],
    ],
];

$footer = $footer ?? [
    'tagline'   => 'DIFFERENT MINDS. ONE VISION.',
    'links'     => [
        ['label' => 'Our project', 'href' => '/projects'],
        ['label' => 'Our Team', 'href' => '/team'],
        ['label' => 'About Us', 'href' => '/#about-us'],
        ['label' => 'contact', 'href' => '/contact'],
    ],
    'copyright' => '2026 MIND VI ALL rights reserved',
];

// JSON encode member array for fast client-side reactive carousel
$membersJson = htmlspecialchars(json_encode($members), ENT_QUOTES, 'UTF-8');
?>

<!-- ==================== FIXED TEAM ASTROLOGICAL CLOCK BACKGROUND ==================== -->
<div class="team-bg-fixed fixed inset-0 w-full h-full z-[1] pointer-events-none overflow-hidden">
  <img 
    src="/assets/images/team-clock-bg.jpg" 
    alt="MIND VI The Six Minds" 
    class="w-full h-full object-cover object-center scale-[1.02]"
  >
  <!-- Subtle dark vignette layer for crisp typography contrast -->
  <div class="absolute inset-0 bg-gradient-to-r from-black-deep/80 via-transparent to-black-deep/80 pointer-events-none"></div>
  <div class="absolute inset-0 bg-gradient-to-t from-black-deep/70 via-transparent to-black-deep/40 pointer-events-none"></div>
</div>

<div class="bg-transparent text-warm-white min-h-screen relative z-10 flex flex-col justify-between">

  <!-- ==================== NAVIGATION BAR ==================== -->
  <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-5 px-6 md:px-16 flex justify-between items-center">
    <a href="/" class="flex flex-col items-start cursor-pointer group">
      <div class="flex items-baseline space-x-0.5">
        <span class="font-body font-light text-warm-white text-2xl tracking-wide group-hover:text-gold-highlight transition-colors">mind</span>
        <span class="font-display font-bold italic text-orange-accent text-2xl group-hover:text-gold-luminous transition-colors">VI</span>
      </div>
      <span class="text-[7.5px] uppercase tracking-[0.25em] text-warm-white/45 font-body -mt-0.5">DIFFERENT MINDS. ONE VISION.</span>
    </a>

    <div class="hidden md:flex items-center space-x-10">
      <?php foreach ($navLinks as $link): ?>
        <a href="<?= htmlspecialchars($link['href']) ?>" class="nav-link text-xs tracking-wide transition-colors font-body <?= !empty($link['active']) ? 'active text-gold' : 'text-warm-white/80 hover:text-gold' ?>">
          <?= htmlspecialchars($link['label']) ?>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="hidden md:block">
      <a href="/contact" class="magnetic-wrap pill-btn inline-block border border-orange-accent/60 text-warm-white/90 px-5 py-1.5 rounded-full text-xs font-body hover:border-gold hover:text-gold transition-all duration-300">
        <?= htmlspecialchars($navCTA) ?>
      </a>
    </div>

    <!-- Mobile Hamburger Toggle -->
    <button id="menu-toggle" class="md:hidden z-[60] flex flex-col space-y-1.5 p-2 focus:outline-none" aria-label="Toggle Navigation">
      <span class="menu-bar w-6 h-0.5 bg-gold transition-all duration-300"></span>
      <span class="menu-bar w-6 h-0.5 bg-gold transition-all duration-300"></span>
      <span class="menu-bar w-6 h-0.5 bg-gold transition-all duration-300"></span>
    </button>
  </nav>

  <!-- Mobile Drawer Menu -->
  <div id="mobile-menu" class="fixed inset-0 bg-black-deep/95 backdrop-blur-xl z-40 flex flex-col justify-center items-center pointer-events-none transition-all duration-500 opacity-0">
    <div class="flex flex-col space-y-8 text-center">
      <?php foreach ($navLinks as $link): ?>
        <a href="<?= htmlspecialchars($link['href']) ?>" class="mobile-link text-2xl font-display italic text-warm-white hover:text-gold transition-colors">
          <?= htmlspecialchars($link['label']) ?>
        </a>
      <?php endforeach; ?>
      <a href="/contact" class="mobile-link mt-8 border border-orange-accent text-warm-white px-8 py-3 rounded-full hover:bg-gold hover:text-black-deep transition-colors duration-300 font-body text-sm">
        <?= htmlspecialchars($navCTA) ?>
      </a>
    </div>
  </div>

  <!-- ==================== MAIN STAGE: THE SIX MINDS ==================== -->
  <main id="main-content" class="relative z-10 w-full pt-28 md:pt-32 pb-16 flex-1 flex items-center">
    <div class="container mx-auto px-6 md:px-14 lg:px-20 w-full">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center">

        <!-- ==================== LEFT COLUMN: MANIFESTO ==================== -->
        <div class="md:col-span-4 lg:col-span-3 flex flex-col items-start text-left interactive-tilt z-20">
          
          <!-- Indicator 01 -->
          <div class="flex flex-col items-start animate-float mb-4">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($manifesto['number']) ?>
            </span>
            <div class="w-[1px] h-10 bg-white/20 my-2"></div>
            <span class="text-[9px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">
              <?= htmlspecialchars($manifesto['sideLabel']) ?>
            </span>
          </div>

          <!-- Headline -->
          <h1 class="overflow-hidden pb-1">
            <span class="hero-text-line text-warm-white font-display text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.08] block">
              <?= htmlspecialchars($manifesto['headlineLight']) ?>
            </span>
            <span class="hero-text-line text-warm-white font-display text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.08] block">
              <?= htmlspecialchars($manifesto['headlineLight2']) ?>
            </span>
            <span class="hero-text-line text-orange-accent glow-accent font-display text-4xl sm:text-5xl lg:text-6xl font-bold italic leading-[1.08] block">
              <?= htmlspecialchars($manifesto['headlineAccent']) ?>
            </span>
          </h1>

          <p class="text-warm-white/70 font-body text-xs sm:text-sm mt-5 leading-relaxed max-w-xs hero-fade-in">
            <?= htmlspecialchars($manifesto['description']) ?>
          </p>
        </div>

        <!-- ==================== CENTER COLUMN: INTERACTIVE CLOCK HOTSPOTS ==================== -->
        <div class="md:col-span-4 lg:col-span-5 relative flex items-center justify-center min-h-[360px] sm:min-h-[460px] md:min-h-[520px]">
          
          <!-- Dial Hotspots Container (Overlays the 6 clock portholes in the background artwork) -->
          <div id="clock-hotspots-container" class="relative w-[320px] h-[320px] sm:w-[400px] sm:h-[400px] md:w-[440px] md:h-[440px] rounded-full pointer-events-auto">
            
            <!-- Porthole 01 (12 o'clock - Top) -->
            <button
              type="button"
              class="member-porthole-btn absolute top-[3%] left-[50%] -translate-x-1/2 w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer"
              data-index="0"
              aria-label="Alexander - Creative Director"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

            <!-- Porthole 02 (2 o'clock - Top Right) -->
            <button
              type="button"
              class="member-porthole-btn absolute top-[23%] right-[8%] w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer active"
              data-index="1"
              aria-label="Takwa - Web Design Director"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

            <!-- Porthole 03 (4 o'clock - Bottom Right) -->
            <button
              type="button"
              class="member-porthole-btn absolute bottom-[23%] right-[8%] w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer"
              data-index="2"
              aria-label="Yassine - Visual Production Lead"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

            <!-- Porthole 04 (6 o'clock - Bottom) -->
            <button
              type="button"
              class="member-porthole-btn absolute bottom-[3%] left-[50%] -translate-x-1/2 w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer"
              data-index="3"
              aria-label="Sarah - Motion & 3D Artist"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

            <!-- Porthole 05 (8 o'clock - Bottom Left) -->
            <button
              type="button"
              class="member-porthole-btn absolute bottom-[23%] left-[8%] w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer"
              data-index="4"
              aria-label="Karim - Lead Digital Architect"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

            <!-- Porthole 06 (10 o'clock - Top Left) -->
            <button
              type="button"
              class="member-porthole-btn absolute top-[23%] left-[8%] w-16 h-16 sm:w-20 sm:h-20 rounded-full border border-gold/40 hover:border-gold hover:scale-110 transition-all duration-300 flex items-center justify-center focus:outline-none group cursor-pointer"
              data-index="5"
              aria-label="Nour - Brand Strategist"
            >
              <div class="porthole-ring w-full h-full rounded-full transition-all duration-300 group-hover:shadow-[0_0_20px_#C9A227]"></div>
            </button>

          </div>
        </div>

        <!-- ==================== RIGHT COLUMN: ACTIVE MEMBER DETAILS ==================== -->
        <div class="md:col-span-4 lg:col-span-4 flex flex-col items-start text-left interactive-tilt z-20 md:pl-4 lg:pl-8">
          
          <!-- Indicator 02 -->
          <div class="flex flex-col items-start animate-float mb-3">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">02</span>
            <div class="w-[1px] h-8 bg-white/20 my-1.5"></div>
            <span class="text-[9px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">MEET THE MINDS</span>
          </div>

          <!-- Counter & Prev/Next Arrows -->
          <div class="flex items-center space-x-4 my-2">
            <span id="member-counter" class="font-body text-xs tracking-widest text-warm-white/90 font-medium">02 / 06</span>
            <div class="flex items-center space-x-2">
              <button
                id="prev-member-btn"
                type="button"
                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full border border-warm-white/30 text-warm-white/80 flex items-center justify-center hover:border-gold hover:text-gold transition-colors duration-200 text-xs focus:outline-none cursor-pointer"
                aria-label="Previous Mind"
              >
                &larr;
              </button>
              <button
                id="next-member-btn"
                type="button"
                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full border border-warm-white/30 text-warm-white/80 flex items-center justify-center hover:border-gold hover:text-gold transition-colors duration-200 text-xs focus:outline-none cursor-pointer"
                aria-label="Next Mind"
              >
                &rarr;
              </button>
            </div>
          </div>

          <!-- Member Profile Card Container with Smooth Transition -->
          <div id="member-card-wrapper" class="w-full flex flex-col items-start mt-2">
            
            <!-- Name & Role -->
            <h2 id="member-name" class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-warm-white leading-tight capitalize">
              takwa
            </h2>
            <h3 id="member-role" class="font-display italic text-lg sm:text-xl lg:text-2xl text-orange-accent font-semibold mt-0.5">
              web design Director
            </h3>

            <!-- Bio -->
            <p id="member-bio" class="font-body text-xs sm:text-sm text-warm-white/70 mt-3 sm:mt-4 leading-relaxed max-w-sm">
              Guides the creative vision and brings ideas to life through storytelling, design and strategy.
            </p>

            <!-- Specialty -->
            <div class="mt-5 w-full">
              <span class="text-[9px] uppercase tracking-[0.2em] text-warm-white/45 font-body font-semibold block mb-2">SPECIALTY</span>
              <div id="member-specialties" class="flex flex-col space-y-1 text-xs text-warm-white/85 font-body">
                <span>Creative Direction</span>
                <span>Brand Identity</span>
                <span>Visual Strategy</span>
              </div>
            </div>

            <!-- Tools -->
            <div class="mt-4 w-full">
              <span class="text-[9px] uppercase tracking-[0.2em] text-warm-white/45 font-body font-semibold block mb-2">TOOLS</span>
              <div id="member-tools" class="flex flex-wrap gap-2.5 sm:gap-3 text-xs text-warm-white/85 font-body">
                <span>Figma</span>
                <span>Adobe Suite</span>
                <span>Blender</span>
              </div>
            </div>

            <!-- Social Links -->
            <div id="member-socials" class="flex items-center space-x-3 mt-6">
              <a href="#" class="social-icon-btn w-7 h-7 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/75 hover:border-gold hover:text-gold transition-colors text-xs" aria-label="Instagram">
                <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
              </a>
              <a href="#" class="social-icon-btn w-7 h-7 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/75 hover:border-gold hover:text-gold transition-colors text-xs" aria-label="LinkedIn">
                <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
              </a>
              <a href="#" class="social-icon-btn w-7 h-7 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/75 hover:border-gold hover:text-gold transition-colors text-xs font-serif font-bold" aria-label="Behance">
                Bē
              </a>
            </div>

          </div>

        </div>

      </div>
    </div>
  </main>

  <!-- ==================== EDITORIAL FOOTER ==================== -->
  <footer class="relative z-20 bg-black-deep pt-14 pb-10 px-6 md:px-14 lg:px-20 border-t border-warm-white/10 font-body">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 pb-10 items-center">
        
        <!-- Brand -->
        <div class="md:col-span-4 flex flex-col items-start md:border-r md:border-warm-white/10 md:pr-12 footer-fade">
          <a href="/" class="flex flex-col items-start cursor-pointer group">
            <div class="flex items-baseline space-x-0.5">
              <span class="font-body font-light text-warm-white text-2xl tracking-wide group-hover:text-gold-highlight transition-colors">mind</span>
              <span class="font-display font-bold italic text-orange-accent text-2xl group-hover:text-gold-luminous transition-colors">VI</span>
            </div>
            <span class="text-[7.5px] uppercase tracking-[0.25em] text-warm-white/45 font-body -mt-0.5">DIFFERENT MINDS. ONE VISION.</span>
          </a>
        </div>

        <!-- Links -->
        <div class="md:col-span-4 flex flex-col items-start md:border-r md:border-warm-white/10 md:pr-12 md:pl-6 footer-fade">
          <div class="flex flex-col space-y-2">
            <?php foreach ($footer['links'] as $link): ?>
              <a href="<?= htmlspecialchars($link['href']) ?>" class="text-xs text-warm-white/60 hover:text-gold transition-colors tracking-wide">
                <?= htmlspecialchars($link['label']) ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Social Icons -->
        <div class="md:col-span-4 flex flex-col items-start md:pl-6 footer-fade">
          <p class="text-warm-white/70 text-xs tracking-wider mb-4">Stay connects</p>
          <div class="flex items-center space-x-3">
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="Facebook">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs font-bold font-body" aria-label="TikTok">
              t
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="Instagram">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="LinkedIn">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
          </div>
        </div>

      </div>

      <div class="pt-8 border-t border-warm-white/10 flex flex-col sm:flex-row justify-between items-center text-xs text-warm-white/40 footer-fade">
        <p><?= htmlspecialchars($footer['copyright']) ?></p>
        <div class="flex space-x-6 mt-4 sm:mt-0">
          <a href="#" class="hover:text-gold transition-colors">privacy policy</a>
          <a href="#" class="hover:text-gold transition-colors">terms of service</a>
        </div>
      </div>
    </div>
  </footer>

</div>

<!-- Data attribute storage for reactive JavaScript carousel -->
<script id="team-members-data" type="application/json"><?= $membersJson ?></script>
