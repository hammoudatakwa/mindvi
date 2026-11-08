<?php
/**
 * MIND VI — Projects Showcase View
 * 
 * Exact reproduction of the reference Projects design:
 * Features the Intro Card, Filter Tabs (All, Branding, Web Dev, etc.),
 * and Staggered Floating Glassmorphic Project Cards over the full-page video background.
 */

// Fallbacks if rendered standalone
$navLinks = $navLinks ?? [
    ['label' => 'Home', 'href' => '/', 'active' => false],
    ['label' => 'Our Projects', 'href' => '/projects', 'active' => true],
    ['label' => 'Our Team', 'href' => '/#our-team', 'active' => false],
    ['label' => 'About Us', 'href' => '/#about-us', 'active' => false],
];
$navCTA = $navCTA ?? "Let's Talk";

$intro = $intro ?? [
    'number'         => '01',
    'sideLabel'      => 'all projects',
    'headlineLight'  => 'Our',
    'headlineAccent' => 'Projects.',
    'description'    => 'we showcase our latest work across concept, visual and digital design.',
    'ctaText'        => 'About All',
    'ctaHref'        => '#projects-grid',
];

$categories = $categories ?? [
    ['id' => 'all', 'label' => 'All'],
    ['id' => 'branding', 'label' => 'Branding'],
    ['id' => 'web-development', 'label' => 'Web Development'],
    ['id' => 'production', 'label' => 'Production'],
    ['id' => 'design', 'label' => 'Design'],
    ['id' => 'story', 'label' => 'Story'],
    ['id' => 'photography', 'label' => 'Photography'],
];

$projects = $projects ?? [
    [
        'id'             => 'brand-identity',
        'number'         => '01',
        'sideLabel'      => 'branding',
        'category'       => 'branding',
        'headlineLight'  => 'Brand',
        'headlineAccent' => 'Identity',
        'description'    => 'Creating unique identities that make a lasting impression.',
        'ctaText'        => 'View All',
        'ctaHref'        => '#',
        'align'          => 'right',
    ],
    [
        'id'             => 'digital-experiences',
        'number'         => '02',
        'sideLabel'      => 'web development',
        'category'       => 'web-development',
        'headlineLight'  => 'Digital',
        'headlineAccent' => 'Experiences',
        'description'    => 'we build impactful digital solutions that create real connection.',
        'ctaText'        => 'View All',
        'ctaHref'        => '#',
        'align'          => 'left',
    ],
    [
        'id'             => 'visual-production',
        'number'         => '03',
        'sideLabel'      => 'visual production',
        'category'       => 'production',
        'headlineLight'  => 'Visual',
        'headlineAccent' => 'Production',
        'description'    => 'Bringing ideas to life through powerful visuals.',
        'ctaText'        => 'View All',
        'ctaHref'        => '#',
        'align'          => 'right',
    ],
    [
        'id'             => 'creative-design',
        'number'         => '04',
        'sideLabel'      => 'creative design',
        'category'       => 'design',
        'headlineLight'  => 'Creative',
        'headlineAccent' => 'Design',
        'description'    => 'Designs that communicate, inspire and create connections.',
        'ctaText'        => 'View All',
        'ctaHref'        => '#',
        'align'          => 'left',
    ],
    [
        'id'             => 'moments-that-matter',
        'number'         => '05',
        'sideLabel'      => 'photography',
        'category'       => 'photography',
        'headlineLight'  => 'Moments',
        'headlineAccent' => 'That Matter',
        'description'    => 'Authentic stories captured with artistic precision.',
        'ctaText'        => 'View All',
        'ctaHref'        => '#',
        'align'          => 'right',
    ],
];

$footer = $footer ?? [
    'tagline'   => 'Creative Production House',
    'links'     => [
        ['label' => 'Our project', 'href' => '/projects'],
        ['label' => 'Our Team', 'href' => '/#our-team'],
        ['label' => 'About Us', 'href' => '/#about-us'],
        ['label' => 'Contact', 'href' => '/contact'],
    ],
    'copyright' => '2024 MIND VI. all rights reserved',
];
?>

<div class="bg-transparent text-warm-white min-h-screen relative z-10">

  <!-- ==================== NAVIGATION BAR ==================== -->
  <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-5 px-6 md:px-16 flex justify-between items-center">
    <a href="/" class="flex items-baseline space-x-0.5 cursor-pointer group">
      <span class="font-body font-light text-warm-white text-2xl tracking-wide group-hover:text-gold-highlight transition-colors">mind</span>
      <span class="font-display font-bold italic text-orange-accent text-2xl group-hover:text-gold-luminous transition-colors">VI</span>
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

  <!-- ==================== MAIN PROJECTS CONTENT ==================== -->
  <main id="main-content" class="relative z-10 w-full pt-28 md:pt-36 pb-24">

    <!-- Section 01: Top Header Card -->
    <section class="container mx-auto px-6 md:px-16 lg:px-24 mb-16 md:mb-20">
      <div class="max-w-xl">
        <!-- Floating Glassmorphic Intro Card -->
        <div class="project-glass-card rounded-2xl md:rounded-3xl p-7 sm:p-9 md:p-10 interactive-tilt hero-fade-in relative">
          <div class="flex items-start gap-5 sm:gap-6">
            
            <!-- Left Card Indicator -->
            <div class="flex flex-col items-center pt-1 shrink-0 animate-float">
              <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
                <?= htmlspecialchars($intro['number']) ?>
              </span>
              <div class="w-[1px] h-10 bg-white/20 my-2.5"></div>
              <span class="text-[9px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap [writing-mode:vertical-lr] rotate-180">
                <?= htmlspecialchars($intro['sideLabel']) ?>
              </span>
            </div>

            <!-- Card Content -->
            <div class="flex flex-col items-start text-left">
              <h1 class="overflow-hidden pb-1">
                <span class="text-warm-white font-display text-4xl sm:text-5xl md:text-6xl font-normal leading-[1.08] block">
                  <?= htmlspecialchars($intro['headlineLight']) ?>
                </span>
                <span class="text-orange-accent glow-accent font-display text-4xl sm:text-5xl md:text-6xl font-bold italic leading-[1.08] block">
                  <?= htmlspecialchars($intro['headlineAccent']) ?>
                </span>
              </h1>

              <p class="text-warm-white/70 font-body text-xs sm:text-sm mt-4 leading-relaxed max-w-sm">
                <?= htmlspecialchars($intro['description']) ?>
              </p>

              <div class="mt-7">
                <a href="<?= htmlspecialchars($intro['ctaHref']) ?>" class="magnetic-wrap pill-btn inline-flex items-center space-x-2 border border-warm-white/30 text-warm-white font-body text-[11px] uppercase tracking-widest px-5 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                  <span><?= htmlspecialchars($intro['ctaText']) ?></span>
                  <svg class="w-3 h-3 fill-none stroke-currentColor stroke-2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Filter Categories Bar -->
    <section class="container mx-auto px-6 md:px-16 lg:px-24 mb-20 md:mb-28">
      <div class="flex flex-wrap items-center gap-2.5 sm:gap-3 filter-container">
        <?php foreach ($categories as $index => $cat): ?>
          <button
            type="button"
            class="filter-tab px-4 sm:px-5 py-1.5 sm:py-2 rounded-full text-xs font-body tracking-wide transition-all duration-300 <?= $cat['id'] === 'all' ? 'active' : '' ?>"
            data-filter="<?= htmlspecialchars($cat['id']) ?>"
          >
            <?= htmlspecialchars($cat['label']) ?>
          </button>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Projects Grid / Asymmetric Staggered List -->
    <section id="projects-grid" class="container mx-auto px-6 md:px-16 lg:px-24">
      <div class="flex flex-col space-y-20 sm:space-y-28 md:space-y-36">

        <?php foreach ($projects as $project): ?>
          <div 
            class="project-item w-full flex <?= $project['align'] === 'right' ? 'justify-end' : 'justify-start' ?>"
            data-category="<?= htmlspecialchars($project['category']) ?>"
          >
            <!-- Project Glass Card -->
            <div class="project-glass-card w-full sm:w-[460px] md:w-[500px] lg:w-[540px] rounded-2xl md:rounded-3xl p-7 sm:p-9 md:p-10 interactive-tilt relative group">
              <div class="flex items-start gap-5 sm:gap-6">
                
                <!-- Card Indicator -->
                <div class="flex flex-col items-center pt-1 shrink-0 animate-float">
                  <span class="text-warm-white/80 font-body text-xs font-semibold tracking-wider">
                    <?= htmlspecialchars($project['number']) ?>
                  </span>
                  <div class="w-[1px] h-10 bg-white/20 my-2.5">
                    <div class="project-gold-line w-full bg-gold h-0"></div>
                  </div>
                  <span class="text-[9px] uppercase tracking-widest text-warm-white/50 font-body whitespace-nowrap [writing-mode:vertical-lr] rotate-180">
                    <?= htmlspecialchars($project['sideLabel']) ?>
                  </span>
                </div>

                <!-- Card Content -->
                <div class="flex flex-col items-start text-left flex-1">
                  <h2 class="overflow-hidden pb-1">
                    <span class="text-warm-white font-display text-3xl sm:text-4xl md:text-5xl font-normal leading-[1.1] block">
                      <?= htmlspecialchars($project['headlineLight']) ?>
                    </span>
                    <span class="text-orange-accent glow-accent font-display text-3xl sm:text-4xl md:text-5xl font-bold italic leading-[1.1] block">
                      <?= htmlspecialchars($project['headlineAccent']) ?>
                    </span>
                  </h2>

                  <p class="text-warm-white/70 font-body text-xs sm:text-sm mt-3 sm:mt-4 leading-relaxed">
                    <?= htmlspecialchars($project['description']) ?>
                  </p>

                  <div class="mt-6 sm:mt-8">
                    <a href="<?= htmlspecialchars($project['ctaHref']) ?>" class="magnetic-wrap pill-btn inline-flex items-center space-x-2 border border-warm-white/30 text-warm-white font-body text-[11px] uppercase tracking-widest px-5 py-2 rounded-full hover:border-gold hover:text-gold transition-colors duration-300">
                      <span><?= htmlspecialchars($project['ctaText']) ?></span>
                      <svg class="w-3 h-3 fill-none stroke-currentColor stroke-2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </section>

  </main>

  <!-- ==================== EDITORIAL FOOTER ==================== -->
  <footer class="relative z-20 bg-black-deep pt-16 pb-10 px-6 md:px-16 lg:px-24 border-t border-warm-white/10 font-body">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 pb-12 items-center">
        <div class="md:col-span-4 flex flex-col items-start md:border-r md:border-warm-white/10 md:pr-12 footer-fade">
          <a href="/" class="flex items-baseline space-x-0.5 group">
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
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 hover:border-gold hover:text-gold transition-colors text-xs" aria-label="Dribbble">
              <svg class="w-3.5 h-3.5 fill-currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm10.164 10.597c-.328-.047-2.316-.328-4.664.633-.141-.305-.281-.609-.434-.914 2.809-1.418 3.906-3.27 4.02-3.473 1.082 1.137 1.801 2.531 2.051 4.055-.328-.109-.656-.207-.973-.301zm-3.551-5.117c-.125.195-1.168 1.895-3.867 3.238-1.258-2.309-2.617-4.285-2.828-4.594 1.84-.711 3.879-.762 5.75-.125.328.461.645.961.945 1.481zm-8.867-2.648c.203.297 1.543 2.246 2.805 4.527-3.719 1.066-7.078 1.066-7.441 1.066.867-2.484 2.602-4.57 4.828-5.742.27-.086.539-.148.808-.203v.352zm-7.691 7.641c.367 0 3.328 0 6.945-.965.234.469.453.949.664 1.434-4.809 1.488-6.398 4.707-6.527 4.973-.938-1.574-1.43-3.375-1.41-5.215.109-.082.219-.156.328-.227zm2.426 7.008c.188-.344 1.836-3.23 6.375-4.531 1.258 3.375 1.766 6.535 1.836 7.004-1.922.953-4.102 1.238-6.207.797-.84-.863-1.527-1.898-2.004-3.27zm10.02 2.598c-.086-.531-.594-3.578-1.805-6.848 2.211-.965 4.148-.711 4.453-.664-.266 2.824-1.742 5.301-3.984 6.844-.223.234-.445.457-.664.668z"/></svg>
            </a>
            <a href="#" class="social-icon-btn w-8 h-8 rounded border border-warm-white/20 flex items-center justify-center text-warm-white/70 hover:border-gold hover:text-gold transition-colors text-xs" aria-label="LinkedIn">
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
