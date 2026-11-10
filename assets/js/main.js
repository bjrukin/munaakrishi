/**
 * Munaa Krishi Limited - Vanilla JavaScript Controller
 * Clean, modern, responsive interactions without dependencies.
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavChevrons();
  initStickyHeader();
  initMobileMenu();
  initLanguageSwitcher();
  initCookieConsent();
  initHeroSlider();
  initPageJourneyAnimations();
  initProductJourney();
  initFaqAccordions();
  initGalleryLightbox();
  initForms();
  initShareButtons();
  initCatalogFilters();
  initFarmFilters();
  initNewsFilters();
  initGalleryFilters();
  initBackToTop();
});

/* ==========================================================================
   0. Nav Dropdown Arrows
   ========================================================================== */
function initNavChevrons() {
  document.querySelectorAll('.main-nav .nav-dropdown > .nav-link').forEach(link => {
    if (!link.querySelector('.dropdown-chevron')) {
      const chevron = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      chevron.setAttribute('class', 'dropdown-chevron');
      chevron.setAttribute('viewBox', '0 0 24 24');
      chevron.setAttribute('fill', 'none');
      chevron.setAttribute('stroke', 'currentColor');
      chevron.setAttribute('stroke-width', '2');
      chevron.setAttribute('aria-hidden', 'true');
      chevron.innerHTML = '<polyline points="6 9 12 15 18 9"></polyline>';
      link.appendChild(chevron);
    }
  });
}

/* ==========================================================================
   Homepage Journey Motion
   ========================================================================== */
function initPageJourneyAnimations() {
  const page = document.querySelector('.home-page');
  if (!page) return;

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reducedMotion || !('IntersectionObserver' in window)) {
    page.classList.add('motion-disabled');
    return;
  }

  const candidates = new Set();
  const sections = page.querySelectorAll('main > section:not(.hero-slider)');

  sections.forEach(section => {
    section.querySelectorAll('.section-label, .section-title, .section-copy').forEach(element => candidates.add(element));
    section.querySelectorAll('.product-card-wrap, .home-farm-card, .news-card, .journey-step, .what-we-do-step').forEach(element => candidates.add(element));
    section.querySelectorAll('.lg-grid-2col > *, .md-grid-2col > *, .shopping-grid > *').forEach(element => candidates.add(element));
  });

  candidates.forEach((element, index) => {
    element.classList.add('journey-reveal');
    element.style.setProperty('--journey-delay', `${Math.min(index % 7, 5) * 70}ms`);

    if (element.parentElement?.classList.contains('lg-grid-2col') || element.parentElement?.classList.contains('md-grid-2col')) {
      element.dataset.motion = Array.from(element.parentElement.children).indexOf(element) % 2 === 0 ? 'left' : 'right';
    } else {
      element.dataset.motion = 'up';
    }
  });

  page.classList.add('motion-ready');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

  candidates.forEach(element => observer.observe(element));
}

/* ==========================================================================
   1. Sticky Header
   ========================================================================== */
function initStickyHeader() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  const onScroll = () => {
    if (window.scrollY > 8) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* ==========================================================================
   2. Mobile Drawer Navigation
   ========================================================================== */
function initMobileMenu() {
  const toggleBtn = document.querySelector('.mobile-menu-toggle');
  const drawer = document.querySelector('.mobile-drawer');
  const closeBtn = document.querySelector('.drawer-close');

  if (!toggleBtn || !drawer) return;

  const openDrawer = () => {
    drawer.classList.add('open');
    document.body.classList.add('menu-open');
    toggleBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  };

  const closeDrawer = () => {
    drawer.classList.remove('open');
    document.body.classList.remove('menu-open');
    toggleBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  toggleBtn.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);

  drawer.addEventListener('click', (e) => {
    if (e.target === drawer) closeDrawer();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('open')) {
      closeDrawer();
    }
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 1024 && drawer.classList.contains('open')) {
      closeDrawer();
    }
  });

  const dropdownItems = drawer.querySelectorAll('.mobile-dropdown');

  // Highlight active link based on current page URL while keeping the drawer menu consistent
  const currentPath = (window.location.pathname.split('/').pop() || 'index.html').toLowerCase();
  const parentMap = {
    'product-detail.html': 'products.html',
    'farm-profile.html': 'farms.html',
    'news-article.html': 'news.html'
  };
  const targetFile = parentMap[currentPath] || currentPath;

  const allDrawerLinks = drawer.querySelectorAll('.mobile-nav-link, .mobile-sub-link');
  allDrawerLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (!href) return;
    const linkFile = href.split('/').pop().toLowerCase();
    if (linkFile === targetFile || (targetFile === '' && linkFile === 'index.html')) {
      link.classList.add('active');
      const parentDropdown = link.closest('.mobile-dropdown');
      if (parentDropdown) {
        parentDropdown.classList.add('has-active');
      }
    }
  });

  // Accordion toggle for mobile dropdown items
  dropdownItems.forEach(item => {
    const trigger = item.querySelector('.mobile-dropdown-trigger');
    if (!trigger) return;

    if (item.classList.contains('is-open')) {
      trigger.setAttribute('aria-expanded', 'true');
    }

    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const isOpen = item.classList.contains('is-open');

      // Close other accordions
      dropdownItems.forEach(other => {
        if (other !== item) {
          other.classList.remove('is-open');
          const otherTrigger = other.querySelector('.mobile-dropdown-trigger');
          if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
        }
      });

      if (isOpen) {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  // Close drawer when clicking regular links
  const navLinks = drawer.querySelectorAll('.mobile-nav-link, .mobile-sub-link, .drawer-cta-btn');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      closeDrawer();
    });
  });
}

/* ==========================================================================
   3. Language Switcher (Google Translate Integration)
   ========================================================================== */
function initLanguageSwitcher() {
  const switchers = document.querySelectorAll('.lang-switcher');
  if (!switchers.length) return;

  const COOKIE_NAME = 'googtrans';

  function setLanguageCookie(val) {
    document.cookie = `${COOKIE_NAME}=${val};path=/;SameSite=Lax`;
  }

  // Check current language from cookie
  const currentLang = document.cookie.includes(`${COOKIE_NAME}=/en/ne`) ? 'ne' : 'en';

  switchers.forEach(sw => {
    const enBtn = sw.querySelector('.lang-btn-en');
    const npBtn = sw.querySelector('.lang-btn-np');

    if (currentLang === 'ne') {
      if (enBtn) enBtn.classList.remove('active');
      if (npBtn) npBtn.classList.add('active');
    } else {
      if (enBtn) enBtn.classList.add('active');
      if (npBtn) npBtn.classList.remove('active');
    }

    if (enBtn) {
      enBtn.addEventListener('click', () => {
        setLanguageCookie('/en/en');
        window.location.reload();
      });
    }

    if (npBtn) {
      npBtn.addEventListener('click', () => {
        setLanguageCookie('/en/ne');
        const select = document.querySelector('.goog-te-combo');
        if (select) {
          select.value = 'ne';
          select.dispatchEvent(new Event('change'));
        } else {
          window.location.reload();
        }
      });
    }
  });

  // Inject Google Translate script if not present
  if (!document.querySelector('script[data-munaa-translate]')) {
    window.initMunaaTranslation = () => {
      if (!window.google || document.querySelector('.goog-te-combo')) return;
      new window.google.translate.TranslateElement(
        { pageLanguage: 'en', includedLanguages: 'en,ne', autoDisplay: false },
        'google_translate_element'
      );
    };

    const script = document.createElement('script');
    script.src = 'https://translate.google.com/translate_a/element.js?cb=initMunaaTranslation';
    script.async = true;
    script.dataset.munaaTranslate = 'true';
    document.body.appendChild(script);
  }
}

/* ==========================================================================
   5. Cookie Consent Banner & Settings
   ========================================================================== */
function initCookieConsent() {
  const banner = document.querySelector('#cookie-banner');
  const footerBtn = document.querySelector('#open-cookie-settings');
  if (!banner) return;

  const STORAGE_KEY = 'munaa_cookie_consent_v1';
  let consent = null;

  try {
    const raw = localStorage.getItem(STORAGE_KEY);
    if (raw) consent = JSON.parse(raw);
  } catch (e) {}

  if (!consent) {
    setTimeout(() => {
      banner.classList.add('open');
    }, 1200);
  }

  const saveConsent = (preferences, analytics) => {
    const data = {
      necessary: true,
      preferences: !!preferences,
      analytics: !!analytics,
      savedAt: new Date().toISOString()
    };
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    } catch (e) {}
    banner.classList.remove('open');
  };

  // Accept all
  const btnAcceptAll = banner.querySelector('#cookie-accept-all');
  if (btnAcceptAll) {
    btnAcceptAll.addEventListener('click', () => saveConsent(true, true));
  }

  // Necessary only
  const btnNecessary = banner.querySelector('#cookie-necessary-only');
  if (btnNecessary) {
    btnNecessary.addEventListener('click', () => saveConsent(false, false));
  }

  // Customise toggle
  const btnCustomise = banner.querySelector('#cookie-customise-btn');
  const customSection = banner.querySelector('#cookie-custom-section');
  const standardButtons = banner.querySelector('#cookie-standard-actions');
  const customButtons = banner.querySelector('#cookie-custom-actions');
  const saveCustomBtn = banner.querySelector('#cookie-save-custom');

  if (btnCustomise && customSection) {
    btnCustomise.addEventListener('click', () => {
      customSection.style.display = 'block';
      if (standardButtons) standardButtons.style.display = 'none';
      if (customButtons) customButtons.style.display = 'flex';
    });
  }

  if (saveCustomBtn) {
    saveCustomBtn.addEventListener('click', () => {
      const prefCheck = banner.querySelector('#cookie-pref-toggle');
      const analCheck = banner.querySelector('#cookie-anal-toggle');
      saveConsent(prefCheck ? prefCheck.checked : false, analCheck ? analCheck.checked : false);
    });
  }

  // Footer re-open buttons
  const reopenBtns = document.querySelectorAll('#open-cookie-settings, .open-cookie-settings-trigger, #open-cookie-settings-footer');
  reopenBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (customSection) customSection.style.display = 'block';
      if (standardButtons) standardButtons.style.display = 'none';
      if (customButtons) customButtons.style.display = 'flex';
      banner.classList.add('open');
    });
  });
}

/* ==========================================================================
   6. Hero Slider (Homepage Carousel)
   ========================================================================== */
function initHeroSlider() {
  const slider = document.querySelector('.hero-slider');
  if (!slider) return;

  const slides = slider.querySelectorAll('.hero-slide');
  const tabs = slider.querySelectorAll('.hero-tab');
  const prevBtn = slider.querySelector('.hero-arrow-btn.prev');
  const nextBtn = slider.querySelector('.hero-arrow-btn.next');

  if (!slides.length) return;

  let currentIndex = 0;
  let timer = null;
  const INTERVAL = 7000;

  const showSlide = (idx) => {
    currentIndex = (idx + slides.length) % slides.length;
    
    slides.forEach((s, i) => {
      s.classList.toggle('active', i === currentIndex);
    });

    tabs.forEach((t, i) => {
      t.classList.remove('active', 'completed');
      const progressBar = t.querySelector('.hero-tab-progress');
      if (progressBar) {
        progressBar.style.animation = 'none';
        void progressBar.offsetWidth;
        progressBar.style.animation = '';
      }

      if (i === currentIndex) {
        t.classList.add('active');
      } else if (i < currentIndex) {
        t.classList.add('completed');
      }
    });

    if (timer) clearTimeout(timer);
    timer = setTimeout(nextSlide, INTERVAL);
  };

  const nextSlide = () => showSlide(currentIndex + 1);
  const prevSlide = () => showSlide(currentIndex - 1);

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      nextSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      prevSlide();
    });
  }

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => {
      showSlide(i);
    });
  });

  showSlide(0);
}

/* ==========================================================================
   7. Product Journey (Homepage Animated Value Chain)
   ========================================================================== */
function initProductJourney() {
  const journeyWrap = document.querySelector('.journey-wrap');
  if (!journeyWrap) return;

  const steps = journeyWrap.querySelectorAll('.journey-step');
  const vehicle = journeyWrap.querySelector('.journey-vehicle');
  const fillLine = journeyWrap.querySelector('.journey-line-fill');
  const detailBox = journeyWrap.querySelector('.journey-detail');
  let detailInner = journeyWrap.querySelector('.journey-detail-inner');

  if (!steps.length || !detailBox) return;

  if (!detailInner) {
    detailBox.innerHTML = `<div class="journey-detail-inner">${detailBox.innerHTML}</div>`;
    detailInner = journeyWrap.querySelector('.journey-detail-inner');
  }

  const strategies = (typeof SYNOPSIS_DATA !== 'undefined' && SYNOPSIS_DATA.workingStrategies) ? SYNOPSIS_DATA.workingStrategies : [
    'Collect agricultural products directly from farmers and cooperatives.',
    'Transport products safely to centralized processing facilities.',
    'Conduct quality inspection and certification.',
    'Clean, grade, package, label, and brand agricultural products.',
    'Store products in cold chain facilities where necessary.',
    'Through Munaa marts, retailers, and home delivery.',
    'Promote selected high-value agricultural commodities in international markets.'
  ];
  const shortLabels = ['Collect', 'Transport', 'Inspect', 'Prepare', 'Cold store', 'Distribute', 'Export'];

  let activeIndex = -1;
  let isManualOverride = false;
  let manualResumeTimer = null;
  let fadeTimeout = null;

  // 14s continuous journey across 7 steps, plus 1.8s pause on the completed 7th step
  const DRIVE_DURATION = 14000;
  const COMPLETE_PAUSE = 1800;
  const CYCLE_DURATION = DRIVE_DURATION + COMPLETE_PAUSE;
  let cycleStart = performance.now();

  const setStageUI = (idx, force = false) => {
    const clamped = Math.max(0, Math.min(6, idx));
    if (clamped === activeIndex && !force) return;
    activeIndex = clamped;

    // Update steps styling smoothly
    steps.forEach((step, i) => {
      step.classList.toggle('is-complete', i <= activeIndex);
      step.classList.toggle('is-active', i === activeIndex);
    });

    // Update detail text with smooth cross-fade
    if (detailInner) {
      detailInner.classList.add('is-fading');
      if (fadeTimeout) clearTimeout(fadeTimeout);
      fadeTimeout = setTimeout(() => {
        const label = shortLabels[activeIndex] || `Step ${activeIndex + 1}`;
        const copy = strategies[activeIndex] || '';
        detailInner.innerHTML = `
          <span>STEP ${activeIndex + 1} OF 7</span>
          <h3>${label}</h3>
          <p>${copy}</p>
        `;
        detailInner.classList.remove('is-fading');
      }, 120);
    }
  };

  const renderFrame = (now) => {
    if (!isManualOverride) {
      const elapsed = (now - cycleStart) % CYCLE_DURATION;
      let progress = 0;
      let stage = 0;

      if (elapsed < DRIVE_DURATION) {
        progress = elapsed / DRIVE_DURATION;
        stage = Math.min(6, Math.floor(progress * 7));
      } else {
        progress = 1;
        stage = 6;
      }

      const isTraveling = elapsed < DRIVE_DURATION;
      if (vehicle) {
        vehicle.classList.toggle('is-traveling', isTraveling);
        vehicle.classList.toggle('is-paused', !isTraveling);
      }

      // Smooth horizontal position across the desktop line: 7.14% to 92.86%
      const position = 7.14 + progress * 85.72;
      journeyWrap.style.setProperty('--journey-position', `${position}%`);
      journeyWrap.style.setProperty('--journey-fill', `${progress * 100}%`);

      setStageUI(stage);
    }
    requestAnimationFrame(renderFrame);
  };

  requestAnimationFrame(renderFrame);

  // Click handler on any step for instant smooth interactive jump
  steps.forEach((step, i) => {
    step.addEventListener('click', () => {
      isManualOverride = true;
      if (manualResumeTimer) clearTimeout(manualResumeTimer);

      if (vehicle) vehicle.classList.add('is-transitioning');
      if (fillLine) fillLine.classList.add('is-transitioning');

      const clickProgress = i / 6;
      const targetPos = 7.14 + clickProgress * 85.72;
      journeyWrap.style.setProperty('--journey-position', `${targetPos}%`);
      journeyWrap.style.setProperty('--journey-fill', `${clickProgress * 100}%`);

      setStageUI(i, true);

      // Resume continuous gliding after 3.5 seconds
      manualResumeTimer = setTimeout(() => {
        if (vehicle) vehicle.classList.remove('is-transitioning');
        if (fillLine) fillLine.classList.remove('is-transitioning');
        cycleStart = performance.now() - (clickProgress * DRIVE_DURATION);
        isManualOverride = false;
      }, 3500);
    });
  });
}

/* ==========================================================================
   8. FAQ Accordion
   ========================================================================== */
function initFaqAccordions() {
  const accordions = document.querySelectorAll('.accordion');
  accordions.forEach(acc => {
    const items = acc.querySelectorAll('.accordion-item');
    items.forEach(item => {
      const header = item.querySelector('.accordion-header');
      if (!header) return;

      header.addEventListener('click', () => {
        const isOpen = item.classList.contains('open');
        // Close siblings if needed
        items.forEach(other => {
          if (other !== item) other.classList.remove('open');
        });
        if (isOpen) {
          item.classList.remove('open');
        } else {
          item.classList.add('open');
        }
      });
    });
  });

  // Contact Page FAQ list with rotating plus icon
  const faqListItems = document.querySelectorAll('.faq-list-item');
  faqListItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger-btn');
    if (!trigger) return;

    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      faqListItems.forEach(other => {
        if (other !== item) other.classList.remove('open');
      });
      if (isOpen) {
        item.classList.remove('open');
      } else {
        item.classList.add('open');
      }
    });
  });
}

/* ==========================================================================
   9. Photo Gallery Lightbox
   ========================================================================== */
function initGalleryLightbox() {
  const lightbox = document.querySelector('#gallery-lightbox');
  if (!lightbox) return;

  const photoBtns = document.querySelectorAll('[data-gallery-index]');
  const imgEl = lightbox.querySelector('.lightbox-img');
  const countEl = lightbox.querySelector('#lightbox-counter');
  const captionEl = lightbox.querySelector('#lightbox-caption');
  const placeEl = lightbox.querySelector('#lightbox-place');
  const prevBtn = lightbox.querySelector('.lightbox-arrow.prev');
  const nextBtn = lightbox.querySelector('.lightbox-arrow.next');
  const closeBtn = lightbox.querySelector('#lightbox-close');

  let currentPhotos = typeof GALLERY_PHOTOS !== 'undefined' ? GALLERY_PHOTOS : [];
  let currentIndex = 0;

  const updateLightbox = () => {
    if (!currentPhotos.length) return;
    const photo = currentPhotos[currentIndex];
    if (imgEl) imgEl.src = photo.image;
    if (imgEl) imgEl.alt = photo.caption;
    if (countEl) countEl.textContent = `${currentIndex + 1} of ${currentPhotos.length}`;
    if (captionEl) captionEl.textContent = photo.caption;
    if (placeEl) placeEl.textContent = photo.place;
  };

  const openLightbox = (index) => {
    currentIndex = index;
    updateLightbox();
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
  };

  const closeLightbox = () => {
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
  };

  const prevPhoto = () => {
    currentIndex = (currentIndex - 1 + currentPhotos.length) % currentPhotos.length;
    updateLightbox();
  };

  const nextPhoto = () => {
    currentIndex = (currentIndex + 1) % currentPhotos.length;
    updateLightbox();
  };

  photoBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const idx = parseInt(btn.getAttribute('data-gallery-index'), 10) || 0;
      openLightbox(idx);
    });
  });

  if (prevBtn) prevBtn.addEventListener('click', prevPhoto);
  if (nextBtn) nextBtn.addEventListener('click', nextPhoto);
  if (closeBtn) closeBtn.addEventListener('click', closeLightbox);

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox || e.target.classList.contains('lightbox-body')) {
      closeLightbox();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (!lightbox.classList.contains('open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevPhoto();
    if (e.key === 'ArrowRight') nextPhoto();
  });

  window.setLightboxPhotos = (photos) => {
    currentPhotos = photos;
  };
}

/* ==========================================================================
   10. Form Handling & Math Captcha Validation
   ========================================================================== */
function initForms() {
  // Math Spam challenge generator
  const setupMathChallenges = () => {
    document.querySelectorAll('.math-challenge').forEach(challenge => {
      const a = Math.floor(Math.random() * 8) + 2;
      const b = Math.floor(Math.random() * 8) + 1;
      challenge.setAttribute('data-answer', a + b);
      const textSpan = challenge.querySelector('.math-challenge-text');
      if (textSpan) textSpan.textContent = `What is ${a} + ${b}?`;
    });
  };
  setupMathChallenges();

  // General Inquiry Contact Form
  const contactForm = document.querySelector('#general-inquiry-form');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      let hasError = false;

      const nameInput = contactForm.querySelector('[name="name"]');
      const phoneInput = contactForm.querySelector('[name="phone"]');
      const emailInput = contactForm.querySelector('[name="email"]');
      const messageInput = contactForm.querySelector('[name="message"]');
      const mathInput = contactForm.querySelector('[name="math_answer"]');
      const challenge = contactForm.querySelector('.math-challenge');

      // Clear existing errors
      contactForm.querySelectorAll('.form-error').forEach(el => el.textContent = '');

      if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
        showError(nameInput, 'Please enter your full name.');
        hasError = true;
      }

      const phoneRegex = /^(\+977)?[9][6-8]\d{8}$/;
      const cleanPhone = phoneInput.value.replace(/[\s-]/g, '');
      if (!cleanPhone || !phoneRegex.test(cleanPhone)) {
        showError(phoneInput, 'Enter a valid Nepali phone number (e.g. 9841234567).');
        hasError = true;
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailInput.value.trim() || !emailRegex.test(emailInput.value.trim())) {
        showError(emailInput, 'Please enter a valid email address.');
        hasError = true;
      }

      if (!messageInput.value.trim() || messageInput.value.trim().length < 10) {
        showError(messageInput, 'Please write a little more so we can help.');
        hasError = true;
      }

      const expectedAnswer = challenge ? challenge.getAttribute('data-answer') : '';
      if (!mathInput.value.trim() || mathInput.value.trim() !== expectedAnswer) {
        showError(mathInput, 'Math answer is not correct. Please try again.');
        hasError = true;
      }

      if (hasError) return;

      // Submit animation
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = `Sending...`;

      setTimeout(() => {
        contactForm.innerHTML = `
          <div style="background-color: var(--color-leaf-soft); padding: 2.5rem; text-align: center;">
            <svg style="width: 48px; height: 48px; color: var(--color-forest); margin: 0 auto;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <h3 style="margin-top: 1rem; font-size: 1.5rem; font-weight: 800; color: var(--color-forest);">Dhanyabad! Your message has reached us.</h3>
            <p style="margin-top: 0.5rem; color: var(--color-ink);">Our team will review your enquiry and respond within one business day.</p>
            <button type="button" class="btn btn-forest" style="margin-top: 1.5rem;" onclick="window.location.reload()">Send another message</button>
          </div>
        `;
      }, 800);
    });
  }

  // Contact Page Form Tabs (General Inquiry vs Farmer Onboarding)
  const contactTabBtns = document.querySelectorAll('.contact-tab-btn');
  const tabGeneral = document.querySelector('#tab-pane-general');
  const tabFarmer = document.querySelector('#tab-pane-farmer');

  contactTabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      contactTabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const target = btn.getAttribute('data-tab');
      if (target === 'farmer') {
        if (tabGeneral) tabGeneral.style.display = 'none';
        if (tabFarmer) tabFarmer.style.display = 'block';
      } else {
        if (tabGeneral) tabGeneral.style.display = 'block';
        if (tabFarmer) tabFarmer.style.display = 'none';
      }
    });
  });

  // Farmer Onboarding Crop Pill toggles
  document.querySelectorAll('.crop-pill-label').forEach(label => {
    const checkbox = label.querySelector('input[type="checkbox"]');
    if (checkbox) {
      label.addEventListener('click', (e) => {
        // Prevent default double triggering if clicking input vs label
        if (e.target !== checkbox) {
          checkbox.checked = !checkbox.checked;
        }
        if (checkbox.checked) {
          label.classList.add('selected');
        } else {
          label.classList.remove('selected');
        }
      });
    }
  });

  // Farmer group type toggle (members count)
  const groupSelect = document.querySelector('#fo-group');
  const membersGroup = document.querySelector('#fo-members-wrap');
  if (groupSelect && membersGroup) {
    groupSelect.addEventListener('change', () => {
      if (groupSelect.value === 'Individual farmer') {
        membersGroup.style.display = 'none';
      } else {
        membersGroup.style.display = 'block';
      }
    });
  }

  // Farmer Onboarding Form
  const farmerForm = document.querySelector('#farmer-onboarding-form');
  if (farmerForm) {
    farmerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      let hasError = false;

      const nameInput = farmerForm.querySelector('[name="name"]');
      const phoneInput = farmerForm.querySelector('[name="phone"]');
      const districtSelect = farmerForm.querySelector('[name="district"]');
      const landInput = farmerForm.querySelector('[name="land"]');
      const harvestInput = farmerForm.querySelector('[name="harvest"]');
      const consentCheck = farmerForm.querySelector('[name="consent"]');
      const mathInput = farmerForm.querySelector('[name="math_answer"]');
      const challenge = farmerForm.querySelector('.math-challenge');
      const selectedCrops = farmerForm.querySelectorAll('.crop-pill-label input[type="checkbox"]:checked');
      const cropError = farmerForm.querySelector('#fo-crops-error');
      const consentError = farmerForm.querySelector('#fo-consent-error');

      farmerForm.querySelectorAll('.form-error').forEach(el => el.textContent = '');

      if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
        showError(nameInput, 'Please enter your name or group name.');
        hasError = true;
      }

      const phoneRegex = /^(\+977)?[9][6-8]\d{8}$/;
      const cleanPhone = phoneInput.value.replace(/[\s-]/g, '');
      if (!cleanPhone || !phoneRegex.test(cleanPhone)) {
        showError(phoneInput, 'Enter a valid mobile number (e.g. 9841234567).');
        hasError = true;
      }

      if (!districtSelect.value) {
        showError(districtSelect, 'Please choose your district.');
        hasError = true;
      }

      if (selectedCrops.length === 0) {
        if (cropError) cropError.textContent = 'Choose at least one crop type.';
        hasError = true;
      }

      if (!landInput.value.trim() || parseFloat(landInput.value) <= 0) {
        showError(landInput, 'Enter your land area.');
        hasError = true;
      }

      if (!harvestInput.value.trim() || parseFloat(harvestInput.value) <= 0) {
        showError(harvestInput, 'Enter an expected quantity.');
        hasError = true;
      }

      if (!consentCheck.checked) {
        if (consentError) consentError.textContent = 'Please agree so our team can contact you.';
        hasError = true;
      }

      const expectedAnswer = challenge ? challenge.getAttribute('data-answer') : '';
      if (!mathInput.value.trim() || mathInput.value.trim() !== expectedAnswer) {
        showError(mathInput, 'Math answer is not correct.');
        hasError = true;
      }

      if (hasError) return;

      const submitBtn = farmerForm.querySelector('button[type="submit"]');
      submitBtn.disabled = true;
      submitBtn.innerHTML = `Submitting application...`;

      const firstName = nameInput.value.trim().split(' ')[0] || 'Farmer';
      setTimeout(() => {
        farmerForm.innerHTML = `
          <div style="background-color: var(--color-leaf-soft); padding: 2.5rem; text-align: center;">
            <svg style="width: 48px; height: 48px; color: var(--color-forest); margin: 0 auto;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <h3 style="margin-top: 1rem; font-size: 1.5rem; font-weight: 800; color: var(--color-forest);">Dhanyabad, ${firstName}!</h3>
            <p style="margin-top: 0.5rem; color: var(--color-ink); max-width: 500px; margin-left: auto; margin-right: auto;">
              Your application is with our field team. Someone will call you on <strong>${phoneInput.value}</strong> within seven days to discuss produce collection and plan a farm visit.
            </p>
            <button type="button" class="btn btn-forest" style="margin-top: 1.5rem;" onclick="window.location.reload()">Submit another application</button>
          </div>
        `;
      }, 800);
    });
  }

  // Product Inquiry Modal
  const inquiryModal = document.querySelector('#product-inquiry-modal');
  const openInquiryBtns = document.querySelectorAll('.open-inquiry-modal');
  if (inquiryModal) {
    const modalClose = inquiryModal.querySelector('.modal-close-btn');
    const inquiryForm = inquiryModal.querySelector('#modal-inquiry-form');
    const productNameDisplay = inquiryModal.querySelector('#inquiry-product-name');
    const productField = inquiryModal.querySelector('[name="product_name"]');

    openInquiryBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const pName = btn.getAttribute('data-product') || 'Selected Product';
        if (productNameDisplay) productNameDisplay.textContent = pName;
        if (productField) productField.value = pName;
        setupMathChallenges();
        inquiryModal.classList.add('open');
        document.body.style.overflow = 'hidden';
      });
    });

    const closeInquiry = () => {
      inquiryModal.classList.remove('open');
      document.body.style.overflow = '';
    };

    if (modalClose) modalClose.addEventListener('click', closeInquiry);
    inquiryModal.addEventListener('click', (e) => {
      if (e.target === inquiryModal) closeInquiry();
    });

    if (inquiryForm) {
      inquiryForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let hasError = false;

        const nameInput = inquiryForm.querySelector('[name="name"]');
        const phoneInput = inquiryForm.querySelector('[name="phone"]');
        const mathInput = inquiryForm.querySelector('[name="math_answer"]');
        const challenge = inquiryForm.querySelector('.math-challenge');

        inquiryForm.querySelectorAll('.form-error').forEach(el => el.textContent = '');

        if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
          showError(nameInput, 'Please enter your name.');
          hasError = true;
        }

        const cleanPhone = phoneInput.value.replace(/[\s-]/g, '');
        if (!cleanPhone || cleanPhone.length < 9) {
          showError(phoneInput, 'Enter a valid contact number.');
          hasError = true;
        }

        const expected = challenge ? challenge.getAttribute('data-answer') : '';
        if (!mathInput.value.trim() || mathInput.value.trim() !== expected) {
          showError(mathInput, 'Math answer is not correct.');
          hasError = true;
        }

        if (hasError) return;

        const submitBtn = inquiryForm.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        setTimeout(() => {
          inquiryForm.innerHTML = `
            <div style="background-color: var(--color-leaf-soft); padding: 2rem; text-align: center;">
              <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Enquiry Sent!</h3>
              <p style="margin-top: 0.5rem; color: var(--color-ink);">Thank you for asking about our produce. An outlet officer will contact you shortly.</p>
              <button type="button" class="btn btn-forest" style="margin-top: 1.25rem;" onclick="document.querySelector('#product-inquiry-modal').classList.remove('open'); document.body.style.overflow='';">Close</button>
            </div>
          `;
        }, 800);
      });
    }
  }

  function showError(inputEl, msg) {
    const parent = inputEl.closest('.form-group');
    if (parent) {
      const err = parent.querySelector('.form-error');
      if (err) err.textContent = msg;
    }
  }
}

/* ==========================================================================
   11. Social Share & Copy Link
   ========================================================================== */
function initShareButtons() {
  const shareFbBtns = document.querySelectorAll('.share-facebook');
  shareFbBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const url = encodeURIComponent(window.location.href);
      window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
    });
  });

  const copyBtns = document.querySelectorAll('.copy-link-btn');
  copyBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(window.location.href);
        const original = btn.innerHTML;
        btn.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!`;
        setTimeout(() => {
          btn.innerHTML = original;
        }, 2000);
      } catch (err) {}
    });
  });
}

/* ==========================================================================
   12. Products Catalog Category Filter (products.html)
   ========================================================================== */
function initCatalogFilters() {
  const container = document.querySelector('.products-catalog-page');
  if (!container) return;

  const filterBtns = container.querySelectorAll('.category-filter-btn');
  const cards = container.querySelectorAll('.product-card-wrap');

  // Check URL param ?category=...
  const urlParams = new URLSearchParams(window.location.search);
  const initialCategory = urlParams.get('category');

  const filterCards = (catId) => {
    filterBtns.forEach(b => {
      if (b.getAttribute('data-category') === catId || (!catId && b.getAttribute('data-category') === 'all')) {
        b.classList.add('active');
      } else {
        b.classList.remove('active');
      }
    });

    cards.forEach(card => {
      const cardCat = card.getAttribute('data-category');
      if (!catId || catId === 'all' || cardCat === catId) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  };

  if (initialCategory) {
    filterCards(initialCategory);
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const cat = btn.getAttribute('data-category');
      filterCards(cat);
      // Update browser URL without reloading
      const url = new URL(window.location);
      if (cat === 'all') {
        url.searchParams.delete('category');
      } else {
        url.searchParams.set('category', cat);
      }
      window.history.pushState({}, '', url);
    });
  });
}

/* ==========================================================================
   13. Farms Search & Province Filter (farms.html)
   ========================================================================== */
function initFarmFilters() {
  const container = document.querySelector('.farms-directory-page');
  if (!container) return;

  const searchInput = container.querySelector('#farm-search-input');
  const provinceSelect = container.querySelector('#farm-province-select');
  const countDisplay = container.querySelector('#farm-count-display');
  const farmCards = container.querySelectorAll('.farm-card-wrap');
  const noMatchMsg = container.querySelector('#farm-no-match');

  const applyFilters = () => {
    const q = (searchInput ? searchInput.value : '').toLowerCase().trim();
    const prov = provinceSelect ? provinceSelect.value : 'all';
    let visibleCount = 0;

    farmCards.forEach(card => {
      const text = (card.getAttribute('data-search-text') || '').toLowerCase();
      const cardProvince = card.getAttribute('data-province') || '';

      const matchesQuery = !q || text.includes(q);
      const matchesProvince = prov === 'all' || cardProvince === prov;

      if (matchesQuery && matchesProvince) {
        card.style.display = 'block';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (countDisplay) {
      countDisplay.textContent = `${visibleCount} partner farms shown`;
    }

    if (noMatchMsg) {
      noMatchMsg.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  };

  if (searchInput) searchInput.addEventListener('input', applyFilters);
  if (provinceSelect) provinceSelect.addEventListener('change', applyFilters);
}

/* ==========================================================================
   14. News Category Filter (news.html)
   ========================================================================== */
function initNewsFilters() {
  const container = document.querySelector('.news-archive-page');
  if (!container) return;

  const filterBtns = container.querySelectorAll('.news-filter-btn');
  const cards = container.querySelectorAll('.news-item-wrap');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cat = btn.getAttribute('data-category');
      cards.forEach(card => {
        const cardCat = card.getAttribute('data-category');
        if (cat === 'all' || cardCat === cat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}

/* ==========================================================================
   15. Gallery Album Filter (gallery.html)
   ========================================================================== */
function initGalleryFilters() {
  const container = document.querySelector('.gallery-page');
  if (!container) return;

  const filterBtns = container.querySelectorAll('.gallery-album-btn');
  const items = container.querySelectorAll('.gallery-photo-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const album = btn.getAttribute('data-album');
      const filteredPhotos = [];

      items.forEach((item, i) => {
        const itemAlbum = item.getAttribute('data-album');
        if (album === 'all' || itemAlbum === album) {
          item.style.display = 'block';
          if (typeof GALLERY_PHOTOS !== 'undefined') {
            filteredPhotos.push(GALLERY_PHOTOS[i]);
          }
        } else {
          item.style.display = 'none';
        }
      });

      if (window.setLightboxPhotos) {
        window.setLightboxPhotos(album === 'all' ? GALLERY_PHOTOS : filteredPhotos);
      }
    });
  });
}

/* ==========================================================================
   16. Floating Back to Top Button
   ========================================================================== */
function initBackToTop() {
  let btn = document.getElementById('back-to-top');
  if (!btn) {
    btn = document.createElement('button');
    btn.type = 'button';
    btn.id = 'back-to-top';
    btn.className = 'back-to-top';
    btn.setAttribute('aria-label', 'Back to top');
    btn.setAttribute('title', 'Back to top');
    btn.innerHTML = `
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <line x1="12" y1="19" x2="12" y2="5"></line>
        <polyline points="5 12 12 5 19 12"></polyline>
      </svg>
    `;
    document.body.appendChild(btn);
  } else {
    btn.classList.add('back-to-top');
  }

  let isTicking = false;
  const toggleVisibility = () => {
    if (window.scrollY > 300) {
      btn.classList.add('is-visible');
    } else {
      btn.classList.remove('is-visible');
    }
    isTicking = false;
  };

  window.addEventListener('scroll', () => {
    if (!isTicking) {
      window.requestAnimationFrame(toggleVisibility);
      isTicking = true;
    }
  }, { passive: true });

  toggleVisibility();

  btn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

