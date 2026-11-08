<?php
/**
 * MIND VI — Home View
 * 
 * Full page view matching the cinematic editorial design
 * with full-page video background, GSAP scroll transitions, and custom cursor.
 */

// Fallbacks if rendered standalone or without extracted variables
$navLinks = $navLinks ?? [
    ['label' => 'Home', 'href' => '#home'],
    ['label' => 'Our Projects', 'href' => '#our-projects'],
    ['label' => 'Our Team', 'href' => '#our-team'],
    ['label' => 'About Us', 'href' => '#about-us'],
];
$navCTA = $navCTA ?? "Let's Talk";

$hero = $hero ?? [
    'sectionNumber'  => '01',
    'sideLabel'      => ['Creative', 'Production', 'House'],
    'headlineLight'  => 'use time',
    'headlineAccent' => 'wisely.',
    'tagline'        => 'ideas turn into impact',
    'subTagline'     => "let's create what's matter",
    'ctaText'        => "let's talk",
];

$ideas = $ideas ?? [
    'sectionNumber'  => '02',
    'sideLabel'      => 'our work',
    'headlineLight'  => 'Ideas',
    'headlineAccent' => 'To impact',
    'description'    => 'from strategy to visual experiences we bring ideas to life through creative and digital solutions',
    'ctaText'        => 'discover our projects',
];

$differentMinds = $differentMinds ?? [
    'sectionNumber'  => '03',
    'sideLabel'      => 'our work',
    'headlineLight'  => 'Different minds',
    'headlineAccent' => 'one direction',
    'description'    => 'we combine creativity, strategy and technology to create meaningful experiences',
    'ctaText'        => 'our services',
];

$moreThanStudio = $moreThanStudio ?? [
    'sectionNumber'  => '04',
    'sideLabel'      => 'our work',
    'headlineLight'  => 'More than',
    'headlineAccent' => 'studio',
    'description'    => 'we combine creativity, strategy and technology to create meaningful experiences',
    'ctaText'        => 'our services',
];

$cta = $cta ?? [
    'sectionNumber'  => '05',
    'sideLabel'      => 'our work',
    'headlineLight'  => 'Have an idea?',
    'headlineAccent' => "Let's make it real",
    'description'    => 'we combine creativity, strategy and technology to create meaningful experiences',
    'ctaText'        => 'our services',
];

$footer = $footer ?? [
    'tagline'   => 'Creative Production House',
    'links'     => [
        ['label' => 'Our project', 'href' => '#our-projects'],
        ['label' => 'Our Team', 'href' => '#our-team'],
        ['label' => 'About Us', 'href' => '#about-us'],
        ['label' => 'Contact', 'href' => '/contact'],
    ],
    'copyright' => '2024 MIND VI. all rights reserved',
];

$bgVideo = $bgVideo ?? '/assets/videos/mindvi-background.mp4';
$bgPoster = $bgPoster ?? '/assets/images/mindvi-full-bg.jpg';
?>

<div class="bg-transparent text-warm-white min-h-screen relative z-10">

  <!-- ==================== NAVIGATION BAR ==================== -->
  <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-5 px-6 md:px-16 flex justify-between items-center">
    <a href="#home" class="flex items-baseline space-x-0.5 cursor-pointer group">
      <span class="font-body font-light text-warm-white text-2xl tracking-wide group-hover:text-gold-highlight transition-colors">mind</span>
      <span class="font-display font-bold italic text-orange-accent text-2xl group-hover:text-gold-luminous transition-colors">VI</span>
    </a>

    <div class="hidden md:flex items-center space-x-10">
      <?php foreach ($navLinks as $link): ?>
        <a href="<?= htmlspecialchars($link['href']) ?>" class="nav-link text-xs tracking-wide text-warm-white/80 hover:text-gold transition-colors font-body">
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

  <!-- ==================== MAIN CONTENT SECTIONS ==================== -->
  <main id="main-content" class="relative z-10 w-full">

    <!-- Section 01 — Hero -->
    <section id="home" class="relative w-full min-h-screen flex items-center overflow-hidden pt-24 pb-16">
      <div class="container mx-auto px-6 md:px-16 lg:px-24 w-full">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-span-2 flex flex-col items-start hero-fade-in animate-float">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($hero['sectionNumber']) ?>
            </span>
            <div class="w-[1px] h-12 bg-white/20 my-3"></div>
            <div class="flex flex-col text-[10px] uppercase tracking-widest text-warm-white/50 font-body leading-relaxed">
              <?php foreach ($hero['sideLabel'] as $word): ?>
                <span><?= htmlspecialchars($word) ?></span>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="md:col-span-10 flex flex-col items-start text-left hero-content interactive-tilt">
            <h1 class="overflow-hidden pb-2">
              <span class="hero-text-line text-warm-white font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-normal leading-[1.08] block">
                <?= htmlspecialchars($hero['headlineLight']) ?>
              </span>
              <span class="hero-text-line text-orange-accent glow-accent font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold italic leading-[1.08] block">
                <?= htmlspecialchars($hero['headlineAccent']) ?>
              </span>
            </h1>

            <div class="mt-6 flex flex-col items-start gap-1 hero-fade-in">
              <p class="text-warm-white/70 font-body text-xs sm:text-sm tracking-wide">
                <?= htmlspecialchars($hero['tagline']) ?>
              </p>
              <p class="text-warm-white/70 font-body text-xs sm:text-sm tracking-wide">
                <?= htmlspecialchars($hero['subTagline']) ?>
              </p>
            </div>

            <div class="mt-8 hero-fade-in">
              <a href="#contact" class="magnetic-wrap pill-btn inline-block border border-warm-white/40 text-warm-white font-body text-[11px] uppercase tracking-widest px-6 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                <?= htmlspecialchars($hero['ctaText']) ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 02 — Ideas To Impact -->
    <section id="our-projects" class="relative w-full min-h-screen flex items-center overflow-hidden py-24 section-ideas">
      <div class="container mx-auto px-6 md:px-16 lg:px-24 w-full">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-start-6 md:col-span-5 flex flex-col items-start text-left ideas-wrapper interactive-tilt">
            <h2 class="overflow-hidden pb-2">
              <span class="ideas-reveal text-warm-white font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-normal leading-[1.08] block">
                <?= htmlspecialchars($ideas['headlineLight']) ?>
              </span>
              <span class="ideas-reveal text-orange-accent glow-accent font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold italic leading-[1.08] block">
                <?= htmlspecialchars($ideas['headlineAccent']) ?>
              </span>
            </h2>

            <p class="ideas-reveal text-warm-white/70 font-body text-xs sm:text-sm max-w-sm leading-relaxed mt-6">
              <?= htmlspecialchars($ideas['description']) ?>
            </p>

            <div class="ideas-reveal mt-8">
              <a href="/projects" class="magnetic-wrap pill-btn inline-block border border-orange-accent/50 text-warm-white font-body text-[11px] uppercase tracking-widest px-6 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                <?= htmlspecialchars($ideas['ctaText']) ?>
              </a>
            </div>
          </div>

          <div class="md:col-span-1 flex flex-col items-start md:items-end ideas-indicator animate-float">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($ideas['sectionNumber']) ?>
            </span>
            <div class="w-[1px] h-12 bg-white/20 my-3">
              <div class="ideas-gold-line w-full bg-gold h-0"></div>
            </div>
            <span class="text-[10px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">
              <?= htmlspecialchars($ideas['sideLabel']) ?>
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 03 — Different Minds One Direction -->
    <section id="our-team" class="relative w-full min-h-screen flex items-center overflow-hidden py-24 section-dm">
      <div class="container mx-auto px-6 md:px-16 lg:px-24 w-full">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-span-2 flex flex-col items-start dm-indicator animate-float">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($differentMinds['sectionNumber']) ?>
            </span>
            <div class="w-[1px] h-12 bg-white/20 my-3">
              <div class="dm-gold-line w-full bg-gold h-0"></div>
            </div>
            <span class="text-[10px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">
              <?= htmlspecialchars($differentMinds['sideLabel']) ?>
            </span>
          </div>

          <div class="md:col-span-6 flex flex-col items-start text-left dm-wrapper interactive-tilt">
            <h2 class="overflow-hidden pb-2">
              <span class="dm-reveal text-warm-white font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold leading-[1.08] block">
                <?= htmlspecialchars($differentMinds['headlineLight']) ?>
              </span>
              <span class="dm-reveal text-orange-accent glow-accent font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold italic leading-[1.08] block">
                <?= htmlspecialchars($differentMinds['headlineAccent']) ?>
              </span>
            </h2>

            <p class="dm-reveal text-warm-white/70 font-body text-xs sm:text-sm max-w-sm leading-relaxed mt-6">
              <?= htmlspecialchars($differentMinds['description']) ?>
            </p>

            <div class="dm-reveal mt-8">
              <a href="/team" class="magnetic-wrap pill-btn inline-block border border-orange-accent/50 text-warm-white font-body text-[11px] uppercase tracking-widest px-6 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                <?= htmlspecialchars($differentMinds['ctaText']) ?>
              </a>
            </div>
          </div>

          <div class="hidden md:block md:col-span-4"></div>
        </div>
      </div>
    </section>

    <!-- Section 04 — More Than Studio -->
    <section id="about-us" class="relative w-full min-h-screen flex items-center overflow-hidden py-24 section-mts">
      <div class="container mx-auto px-6 md:px-16 lg:px-24 w-full">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-start-5 md:col-span-6 flex flex-col items-start text-left mts-wrapper interactive-tilt">
            <h2 class="overflow-hidden pb-2">
              <span class="mts-reveal text-warm-white font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold leading-[1.08] block">
                <?= htmlspecialchars($moreThanStudio['headlineLight']) ?>
              </span>
              <span class="mts-reveal text-orange-accent glow-accent font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold italic leading-[1.08] block">
                <?= htmlspecialchars($moreThanStudio['headlineAccent']) ?>
              </span>
            </h2>

            <p class="mts-reveal text-warm-white/70 font-body text-xs sm:text-sm max-w-sm leading-relaxed mt-6">
              <?= htmlspecialchars($moreThanStudio['description']) ?>
            </p>

            <div class="mts-reveal mt-8">
              <a href="#about-us" class="magnetic-wrap pill-btn inline-block border border-orange-accent/50 text-warm-white font-body text-[11px] uppercase tracking-widest px-6 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                <?= htmlspecialchars($moreThanStudio['ctaText']) ?>
              </a>
            </div>
          </div>

          <div class="md:col-span-1 flex flex-col items-start md:items-end mts-indicator animate-float">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($moreThanStudio['sectionNumber']) ?>
            </span>
            <div class="w-[1px] h-12 bg-white/20 my-3">
              <div class="mts-gold-line w-full bg-gold h-0"></div>
            </div>
            <span class="text-[10px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">
              <?= htmlspecialchars($moreThanStudio['sideLabel']) ?>
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 05 — Have An Idea? Let's Make It Real -->
    <section id="contact" class="relative w-full min-h-screen flex items-center overflow-hidden py-24 section-cta">
      <div class="container mx-auto px-6 md:px-16 lg:px-24 w-full">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-span-2 flex flex-col items-start cta-indicator animate-float">
            <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
              <?= htmlspecialchars($cta['sectionNumber']) ?>
            </span>
            <div class="w-[1px] h-12 bg-white/20 my-3"></div>
            <span class="text-[10px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap">
              <?= htmlspecialchars($cta['sideLabel']) ?>
            </span>
          </div>

          <div class="md:col-span-10 flex flex-col items-start text-left cta-wrapper interactive-tilt">
            <h2 class="overflow-hidden pb-2">
              <span class="cta-reveal text-warm-white font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold leading-[1.08] block">
                <?= htmlspecialchars($cta['headlineLight']) ?>
              </span>
              <span class="cta-reveal text-orange-accent glow-accent font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold italic leading-[1.08] block">
                Let's make it real
              </span>
            </h2>

            <p class="cta-reveal text-warm-white/70 font-body text-xs sm:text-sm max-w-sm leading-relaxed mt-6">
              <?= htmlspecialchars($cta['description']) ?>
            </p>

            <div class="cta-reveal mt-8">
              <a href="#contact" class="magnetic-wrap pill-btn inline-block border border-orange-accent/50 text-warm-white font-body text-[11px] uppercase tracking-widest px-6 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                <?= htmlspecialchars($cta['ctaText']) ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ==================== EDITORIAL FOOTER ==================== -->
  <footer class="relative z-20 bg-black-deep pt-16 pb-10 px-6 md:px-16 lg:px-24 border-t border-warm-white/10 font-body">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 pb-12 items-center">
        <div class="md:col-span-4 flex flex-col items-start md:border-r md:border-warm-white/10 md:pr-12 footer-fade">
          <a href="#home" class="flex items-baseline space-x-0.5 group">
            <span class="font-body font-light text-warm-white text-2xl tracking-wide group-hover:text-gold-highlight transition-colors">mind</span>
            <span class="font-display font-bold italic text-orange-accent text-2xl group-hover:text-gold-luminous transition-colors">VI</span>
          </a>
        </div>

        <div class="md:col-span-4 flex flex-col items-start md:border-r md:border-warm-white/10 md:pr-12 md:pl-6 footer-fade">
          <div class="flex flex-col space-y-2">
            <?php foreach ($footer['links'] as $link): ?>
              <a href="<?= htmlspecialchars($link['href']) ?>" class="text-xs text-warm-white/60 hover:text-gold transition-colors tracking-wide">
                <?= htmlspecialchars($link['label']) ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="md:col-span-4 flex flex-col items-start md:pl-6 footer-fade">
          <p class="text-warm-white/70 text-xs tracking-wider mb-4">Stay connected</p>
          <div class="flex items-center space-x-3">
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="Facebook">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="Instagram">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 text-xs" aria-label="Dribbble">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm10.164 10.597c-.328-.047-2.316-.328-4.664.633-.141-.305-.281-.609-.434-.914 2.809-1.418 3.906-3.27 4.02-3.473 1.082 1.137 1.801 2.531 2.051 4.055-.328-.109-.656-.207-.973-.301zm-3.551-5.117c-.125.195-1.168 1.895-3.867 3.238-1.258-2.309-2.617-4.285-2.828-4.594 1.84-.711 3.879-.762 5.75-.125.328.461.645.961.945 1.481zm-8.867-2.648c.203.297 1.543 2.246 2.805 4.527-3.719 1.066-7.078 1.066-7.441 1.066.867-2.484 2.602-4.57 4.828-5.742.27-.086.539-.148.808-.203v.352zm-7.691 7.641c.367 0 3.328 0 6.945-.965.234.469.453.949.664 1.434-4.809 1.488-6.398 4.707-6.527 4.973-.938-1.574-1.43-3.375-1.41-5.215.109-.082.219-.156.328-.227zm2.426 7.008c.188-.344 1.836-3.23 6.375-4.531 1.258 3.375 1.766 6.535 1.836 7.004-1.922.953-4.102 1.238-6.207.797-.84-.863-1.527-1.898-2.004-3.27zm10.02 2.598c-.086-.531-.594-3.578-1.805-6.848 2.211-.965 4.148-.711 4.453-.664-.266 2.824-1.742 5.301-3.984 6.844-.223.234-.445.457-.664.668z"/></svg>
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
