/**
 * MIND VI — Dynamic Scroll-Synchronized Animation Controller
 * Smoothly synchronizes all page animations with mouse scroll using GSAP ScrollTrigger & Lenis
 */

document.addEventListener('DOMContentLoaded', () => {
  // Register GSAP plugins
  gsap.registerPlugin(ScrollTrigger);

  // ==================== 1. LENIS SMOOTH SCROLLING (SNAPPY & FLUID) ====================
  const lenis = new Lenis({
    duration: 0.95,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    orientation: 'vertical',
    gestureOrientation: 'vertical',
    smoothWheel: true,
    wheelMultiplier: 1.15,
    touchMultiplier: 1.5,
  });

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);

  // Smooth anchor navigation with Lenis
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      const targetId = anchor.getAttribute('href');
      if (targetId && targetId !== '#') {
        const targetEl = document.querySelector(targetId);
        if (targetEl) {
          e.preventDefault();
          lenis.scrollTo(targetEl, {
            offset: -30,
            duration: 1.1,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
          });
        }
      }
    });
  });

  // ==================== 2. DYNAMIC TOP SCROLL PROGRESS BAR ====================
  const scrollProgress = document.getElementById('scroll-progress');
  lenis.on('scroll', (e) => {
    if (scrollProgress) {
      const totalScroll = document.documentElement.scrollHeight - window.innerHeight;
      if (totalScroll > 0) {
        const progress = Math.min(100, Math.max(0, (e.scroll / totalScroll) * 100));
        scrollProgress.style.width = `${progress}%`;
      }
    }
  });

  // ==================== 3. NAVBAR SCROLL & ACTIVE LINK SPY ====================
  const navbar = document.getElementById('navbar');
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const navLinks = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('section[id]');
  let lastScrollY = window.scrollY;
  let isMenuOpen = false;

  window.addEventListener('scroll', () => {
    const currentScrollY = window.scrollY;

    // Navbar background blur on scroll
    if (currentScrollY > 60) {
      navbar?.classList.add('nav-scrolled');
    } else {
      navbar?.classList.remove('nav-scrolled');
    }

    // Auto-hide on downward scroll, reveal on upward scroll
    if (currentScrollY > lastScrollY && currentScrollY > 150 && !isMenuOpen) {
      gsap.to(navbar, { yPercent: -100, duration: 0.3, ease: 'power2.out' });
    } else {
      gsap.to(navbar, { yPercent: 0, duration: 0.3, ease: 'power2.out' });
    }
    lastScrollY = currentScrollY;

    // Scroll-Spy: active link highlight on home
    let currentSectionId = '';
    sections.forEach((sec) => {
      const rect = sec.getBoundingClientRect();
      if (rect.top <= window.innerHeight * 0.45 && rect.bottom >= window.innerHeight * 0.25) {
        currentSectionId = sec.getAttribute('id');
      }
    });

    if (currentSectionId) {
      navLinks.forEach((link) => {
        const href = link.getAttribute('href');
        if (href === `#${currentSectionId}` || href === `/#${currentSectionId}`) {
          link.classList.add('active');
        } else if (!link.getAttribute('href').startsWith('/projects')) {
          link.classList.remove('active');
        }
      });
    }
  }, { passive: true });

  // Mobile drawer toggle
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
      isMenuOpen = !isMenuOpen;
      const bars = menuToggle.querySelectorAll('.menu-bar');

      if (isMenuOpen) {
        mobileMenu.classList.remove('pointer-events-none');
        gsap.to(mobileMenu, { opacity: 1, duration: 0.35 });
        gsap.fromTo('.mobile-link', { y: 25, opacity: 0 }, { y: 0, opacity: 1, duration: 0.35, stagger: 0.06 });
        bars[0].classList.add('rotate-45', 'translate-y-2');
        bars[1].classList.add('opacity-0');
        bars[2].classList.add('-rotate-45', '-translate-y-2');
      } else {
        mobileMenu.classList.add('pointer-events-none');
        gsap.to(mobileMenu, { opacity: 0, duration: 0.25 });
        bars[0].classList.remove('rotate-45', 'translate-y-2');
        bars[1].classList.remove('opacity-0');
        bars[2].classList.remove('-rotate-45', '-translate-y-2');
      }
    });

    document.querySelectorAll('.mobile-link').forEach((link) => {
      link.addEventListener('click', () => {
        isMenuOpen = false;
        mobileMenu.classList.add('pointer-events-none');
        gsap.to(mobileMenu, { opacity: 0, duration: 0.25 });
        const bars = menuToggle.querySelectorAll('.menu-bar');
        bars[0].classList.remove('rotate-45', 'translate-y-2');
        bars[1].classList.remove('opacity-0');
        bars[2].classList.remove('-rotate-45', '-translate-y-2');
      });
    });
  }

  // ==================== 4. CINEMATIC VIDEO BACKGROUND PLAYBACK ====================
  const video = document.getElementById('cinematic-video');
  if (video) {
    video.muted = true;
    video.defaultMuted = true;

    const startPlay = () => {
      const promise = video.play();
      if (promise !== undefined) {
        promise.catch(() => {
          const unlock = () => {
            video.play().catch(() => {});
          };
          window.addEventListener('click', unlock, { once: true });
          window.addEventListener('touchstart', unlock, { once: true });
          window.addEventListener('scroll', unlock, { once: true });
        });
      }
    };
    startPlay();

    video.addEventListener('ended', () => {
      video.currentTime = 0;
      video.play().catch(() => {});
    });

    document.addEventListener('visibilitychange', () => {
      if (!document.hidden && video.paused) {
        video.play().catch(() => {});
      }
    });
  }

  // ==================== 5. INTERACTIVE MAGNETIC BUTTONS ====================
  const magneticButtons = document.querySelectorAll('.magnetic-wrap, .pill-btn');
  const isFinePointer = window.matchMedia('(pointer: fine)').matches;

  if (isFinePointer) {
    magneticButtons.forEach((btn) => {
      btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        gsap.to(btn, {
          x: x * 0.35,
          y: y * 0.35,
          duration: 0.25,
          ease: 'power2.out',
        });
      });

      btn.addEventListener('mouseleave', () => {
        gsap.to(btn, {
          x: 0,
          y: 0,
          duration: 0.6,
          ease: 'elastic.out(1.1, 0.4)',
        });
      });
    });
  }

  // ==================== 6. INTERACTIVE 3D MOUSE PARALLAX ====================
  const tiltWrappers = document.querySelectorAll('.interactive-tilt');
  if (isFinePointer && tiltWrappers.length > 0) {
    window.addEventListener('mousemove', (e) => {
      const normX = (e.clientX / window.innerWidth) - 0.5;
      const normY = (e.clientY / window.innerHeight) - 0.5;

      tiltWrappers.forEach((el) => {
        gsap.to(el, {
          x: normX * 16,
          y: normY * 16,
          rotateX: -normY * 4,
          rotateY: normX * 4,
          duration: 0.5,
          ease: 'power2.out',
          overwrite: 'auto',
        });
      });
    });
  }

  // ==================== 7. HOME HERO: ENTRANCE & SCROLL-SYNCED EXIT ====================
  const heroSection = document.getElementById('home');
  if (heroSection) {
    // Initial entrance on load
    gsap.fromTo('.hero-text-line', 
      { y: 80, opacity: 0, skewY: 2 }, 
      { y: 0, opacity: 1, skewY: 0, duration: 1.1, stagger: 0.14, ease: 'power3.out', delay: 0.1 }
    );
    gsap.fromTo('.hero-fade-in', 
      { opacity: 0, y: 20 }, 
      { opacity: 1, y: 0, duration: 0.8, stagger: 0.1, ease: 'power3.out', delay: 0.4 }
    );

    // Dynamic scroll scrub: hero floats up and fades in direct sync with scrolling down
    gsap.to('.hero-content', {
      y: -140,
      opacity: 0,
      ease: 'none',
      scrollTrigger: {
        trigger: '#home',
        start: 'top top',
        end: 'bottom 40%',
        scrub: 0.8,
      },
    });

    gsap.to('.hero-fade-in', {
      y: -80,
      opacity: 0,
      ease: 'none',
      scrollTrigger: {
        trigger: '#home',
        start: 'top top',
        end: 'bottom 50%',
        scrub: 0.8,
      },
    });
  }

  // ==================== 8. SECTION 02: IDEAS TO IMPACT (SCROLL-SYNCED) ====================
  const ideasSection = document.querySelector('.section-ideas');
  if (ideasSection) {
    // Entrance scrub: line draws and headline reveals in sync with scroll
    const ideasTl = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-ideas',
        start: 'top 85%',
        end: 'center 45%',
        scrub: 0.8,
      },
    });

    ideasTl
      .fromTo('.ideas-gold-line', { height: '0%' }, { height: '100%', ease: 'none' })
      .fromTo('.ideas-reveal', 
        { opacity: 0, x: 90, skewX: -3 }, 
        { opacity: 1, x: 0, skewX: 0, stagger: 0.1, ease: 'none' }, 
        0
      );

    // Exit scrub: floats smoothly as user scrolls past
    gsap.to('.ideas-wrapper', {
      y: -70,
      opacity: 0.3,
      ease: 'none',
      scrollTrigger: {
        trigger: '.section-ideas',
        start: 'center 45%',
        end: 'bottom top',
        scrub: 0.8,
      },
    });
  }

  // ==================== 9. SECTION 03: DIFFERENT MINDS (SCROLL-SYNCED) ====================
  const dmSection = document.querySelector('.section-dm');
  if (dmSection) {
    const dmTl = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-dm',
        start: 'top 85%',
        end: 'center 45%',
        scrub: 0.8,
      },
    });

    dmTl
      .fromTo('.dm-gold-line', { height: '0%' }, { height: '100%', ease: 'none' })
      .fromTo('.dm-reveal', 
        { opacity: 0, y: 80, skewY: 2 }, 
        { opacity: 1, y: 0, skewY: 0, stagger: 0.1, ease: 'none' }, 
        0
      );

    gsap.to('.dm-wrapper', {
      y: -70,
      opacity: 0.3,
      ease: 'none',
      scrollTrigger: {
        trigger: '.section-dm',
        start: 'center 45%',
        end: 'bottom top',
        scrub: 0.8,
      },
    });
  }

  // ==================== 10. SECTION 04: MORE THAN STUDIO (SCROLL-SYNCED) ====================
  const mtsSection = document.querySelector('.section-mts');
  if (mtsSection) {
    const mtsTl = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-mts',
        start: 'top 85%',
        end: 'center 45%',
        scrub: 0.8,
      },
    });

    mtsTl
      .fromTo('.mts-gold-line', { height: '0%' }, { height: '100%', ease: 'none' })
      .fromTo('.mts-reveal', 
        { opacity: 0, x: 90, skewX: -3 }, 
        { opacity: 1, x: 0, skewX: 0, stagger: 0.1, ease: 'none' }, 
        0
      );

    gsap.to('.mts-wrapper', {
      y: -70,
      opacity: 0.3,
      ease: 'none',
      scrollTrigger: {
        trigger: '.section-mts',
        start: 'center 45%',
        end: 'bottom top',
        scrub: 0.8,
      },
    });
  }

  // ==================== 11. SECTION 05: HAVE AN IDEA? (SCROLL-SYNCED) ====================
  const ctaSection = document.querySelector('.section-cta');
  if (ctaSection) {
    const ctaTl = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-cta',
        start: 'top 85%',
        end: 'center 45%',
        scrub: 0.8,
      },
    });

    ctaTl
      .fromTo('.cta-indicator', { opacity: 0, y: 50 }, { opacity: 1, y: 0, ease: 'none' }, 0)
      .fromTo('.cta-reveal', 
        { opacity: 0, y: 90, scale: 0.95 }, 
        { opacity: 1, y: 0, scale: 1, stagger: 0.1, ease: 'none' }, 
        0
      );
  }

  // ==================== 12. PROJECTS SHOWCASE SCROLL-SYNCED ANIMATIONS ====================
  const projectItems = document.querySelectorAll('.project-item');
  const filterTabs = document.querySelectorAll('.filter-tab');
  const projectIntroCard = document.querySelector('.project-glass-card.hero-fade-in');

  if (projectIntroCard) {
    // Initial entrance on Projects page
    gsap.fromTo(projectIntroCard,
      { y: 60, opacity: 0, scale: 0.96 },
      { y: 0, opacity: 1, scale: 1, duration: 1, ease: 'power3.out', delay: 0.1 }
    );

    // Parallax float on scroll
    gsap.to(projectIntroCard, {
      y: -80,
      opacity: 0.35,
      ease: 'none',
      scrollTrigger: {
        trigger: projectIntroCard,
        start: 'top 20%',
        end: 'bottom top',
        scrub: 0.8,
      },
    });
  }

  // Project Cards: dynamically glide and draw gold lines directly in sync with scroll
  if (projectItems.length > 0) {
    projectItems.forEach((item) => {
      const card = item.querySelector('.project-glass-card');
      const goldLine = item.querySelector('.project-gold-line');

      if (card) {
        // Scroll entrance: card glides up and becomes fully focused
        gsap.fromTo(card,
          { y: 120, opacity: 0.15, scale: 0.94 },
          {
            y: 0,
            opacity: 1,
            scale: 1,
            ease: 'none',
            scrollTrigger: {
              trigger: item,
              start: 'top 95%',
              end: 'center 50%',
              scrub: 0.8,
            },
          }
        );

        // Continuous exit glide: card continues floating smoothly as user scrolls past
        gsap.to(card, {
          y: -70,
          opacity: 0.45,
          ease: 'none',
          scrollTrigger: {
            trigger: item,
            start: 'center 40%',
            end: 'bottom -20%',
            scrub: 0.8,
          },
        });
      }

      if (goldLine) {
        // Gold line draws down from 0% to 100% in exact sync with mouse scroll
        gsap.fromTo(goldLine,
          { height: '0%' },
          {
            height: '100%',
            ease: 'none',
            scrollTrigger: {
              trigger: item,
              start: 'top 90%',
              end: 'center 50%',
              scrub: 0.8,
            },
          }
        );
      }
    });

    // Category filter tab click handling
    if (filterTabs.length > 0) {
      filterTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
          const selectedFilter = tab.getAttribute('data-filter');

          filterTabs.forEach((t) => t.classList.remove('active'));
          tab.classList.add('active');

          projectItems.forEach((item) => {
            const itemCat = item.getAttribute('data-category');
            if (selectedFilter === 'all' || itemCat === selectedFilter) {
              item.classList.remove('filter-hidden');
              gsap.fromTo(item, 
                { opacity: 0, scale: 0.95, y: 30 }, 
                { opacity: 1, scale: 1, y: 0, duration: 0.4, ease: 'power2.out' }
              );
            } else {
              item.classList.add('filter-hidden');
            }
          });

          // Refresh ScrollTrigger after filtering
          setTimeout(() => {
            ScrollTrigger.refresh();
          }, 50);
        });
      });
    }
  }

  // ==================== 13. EDITORIAL FOOTER SCROLL SYNC ====================
  const footerEl = document.querySelector('footer');
  if (footerEl) {
    gsap.fromTo('.footer-fade',
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        stagger: 0.08,
        ease: 'none',
        scrollTrigger: {
          trigger: footerEl,
          start: 'top 95%',
          end: 'bottom 90%',
          scrub: 0.8,
        },
      }
    );
  }

  // ==================== 14. THE SIX MINDS TEAM CAROUSEL ====================
  const teamDataEl = document.getElementById('team-members-data');
  const portholeBtns = document.querySelectorAll('.member-porthole-btn');
  const prevMemberBtn = document.getElementById('prev-member-btn');
  const nextMemberBtn = document.getElementById('next-member-btn');
  const memberCounter = document.getElementById('member-counter');
  const memberName = document.getElementById('member-name');
  const memberRole = document.getElementById('member-role');
  const memberBio = document.getElementById('member-bio');
  const memberSpecialties = document.getElementById('member-specialties');
  const memberTools = document.getElementById('member-tools');
  const memberCardWrapper = document.getElementById('member-card-wrapper');

  if (teamDataEl && memberName && memberRole && memberBio) {
    let teamMembers = [];
    try {
      teamMembers = JSON.parse(teamDataEl.textContent);
    } catch (e) {
      teamMembers = [];
    }

    let currentIndex = 1; // Default to Takwa (02 in counter)

    const updateMemberDisplay = (newIndex) => {
      if (!teamMembers[newIndex]) return;
      currentIndex = newIndex;
      const member = teamMembers[newIndex];

      // Update counter
      if (memberCounter) {
        memberCounter.textContent = `${member.index} / 06`;
      }

      // Update active porthole button
      portholeBtns.forEach((btn, idx) => {
        if (idx === newIndex) {
          btn.classList.add('active');
        } else {
          btn.classList.remove('active');
        }
      });

      // Animate text transition
      if (memberCardWrapper) {
        gsap.to(memberCardWrapper, {
          opacity: 0,
          y: -10,
          duration: 0.18,
          ease: 'power2.in',
          onComplete: () => {
            memberName.textContent = member.name;
            memberRole.textContent = member.role;
            memberBio.textContent = member.bio;

            if (memberSpecialties && member.specialties) {
              memberSpecialties.innerHTML = member.specialties
                .map((s) => `<span>${s}</span>`)
                .join('');
            }

            if (memberTools && member.tools) {
              memberTools.innerHTML = member.tools
                .map((t) => `<span>${t}</span>`)
                .join('');
            }

            gsap.fromTo(memberCardWrapper,
              { opacity: 0, y: 15 },
              { opacity: 1, y: 0, duration: 0.35, ease: 'power2.out' }
            );
          },
        });
      }
    };

    // Porthole button click
    portholeBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.getAttribute('data-index'), 10);
        if (!isNaN(idx) && idx !== currentIndex) {
          updateMemberDisplay(idx);
        }
      });
    });

    // Prev / Next button click
    if (prevMemberBtn) {
      prevMemberBtn.addEventListener('click', () => {
        const nextIdx = (currentIndex - 1 + teamMembers.length) % teamMembers.length;
        updateMemberDisplay(nextIdx);
      });
    }

    if (nextMemberBtn) {
      nextMemberBtn.addEventListener('click', () => {
        const nextIdx = (currentIndex + 1) % teamMembers.length;
        updateMemberDisplay(nextIdx);
      });
    }
  }
});
