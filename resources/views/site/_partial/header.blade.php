@php
    $current_nav = $nav ?? 'home';
@endphp
<!-- Header -->
<header class="site-header">
  <div class="container header-inner">
    <a href="{{ route('home') }}" class="site-logo" aria-label="Munaa Krishi Home">
      <img src="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}" alt="Munaa Krishi Logo" width="1200" height="468" loading="eager" decoding="async">
    </a>

    <!-- Desktop Nav -->
    <nav class="main-nav" aria-label="Primary Navigation">
      <div class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ $current_nav === 'home' ? 'active' : '' }}">Home</a>
      </div>

      <div class="nav-item nav-dropdown">
        <a href="{{ route('about') }}" class="nav-link {{ in_array($current_nav, ['about', 'chairman']) ? 'active' : '' }}">
          About Us
          <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="dropdown-menu">
          <a href="{{ route('about') }}" class="dropdown-item">
            <div class="dropdown-title">Company Profile</div>
            <div class="dropdown-note">Profile, purpose and organization</div>
          </a>
          <!-- <a href="{{ route('chairman.message') }}" class="dropdown-item">
            <div class="dropdown-title">Chairman's Message</div>
            <div class="dropdown-note">Message from leadership</div>
          </a>
          <a href="{{ route('board.of.directors') }}" class="dropdown-item">
            <div class="dropdown-title">Board of Directors</div>
            <div class="dropdown-note">Governance and company oversight</div>
          </a>
          <a href="{{ route('team') }}" class="dropdown-item">
            <div class="dropdown-title">Our Team</div>
            <div class="dropdown-note">People across Munaa Krishi</div>
          </a> -->
        </div>
      </div>

      <div class="nav-item nav-dropdown">
        <a href="{{ route('products') }}" class="nav-link {{ in_array($current_nav, ['products', 'farms']) ? 'active' : '' }}">
          Business
          <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="dropdown-menu">
          <a href="{{ route('products') }}" class="dropdown-item">
            <div class="dropdown-title">Products</div>
            <div class="dropdown-note">Agricultural products and inputs</div>
          </a>
          <a href="{{ route('farms') }}" class="dropdown-item">
            <div class="dropdown-title">Farmer Origin</div>
            <div class="dropdown-note">Partner farms and source regions</div>
          </a>
        </div>
      </div>

      <div class="nav-item nav-dropdown">
        <a href="{{ route('news') }}" class="nav-link {{ in_array($current_nav, ['news', 'gallery', 'videos']) ? 'active' : '' }}">
          Media
          <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="dropdown-menu">
          <a href="{{ route('news') }}" class="dropdown-item">
            <div class="dropdown-title">News & Stories</div>
            <div class="dropdown-note">Company news and field activities</div>
          </a>
          <a href="{{ route('gallery') }}" class="dropdown-item">
            <div class="dropdown-title">Photo Gallery</div>
            <div class="dropdown-note">Photos from harvests and farms</div>
          </a>
          <a href="{{ route('videos') }}" class="dropdown-item">
            <div class="dropdown-title">Videos</div>
            <div class="dropdown-note">Farmer and company video stories</div>
          </a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('outlets') }}" class="nav-link {{ $current_nav === 'outlets' ? 'active' : '' }}">Outlets</a>
      </div>

      <div class="nav-item nav-dropdown">
        <a href="{{ route('contact') }}" class="nav-link {{ in_array($current_nav, ['contact', 'faq']) ? 'active' : '' }}">
          Support
          <svg class="dropdown-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="dropdown-menu">
          <a href="{{ route('faq') }}" class="dropdown-item">
            <div class="dropdown-title">FAQ</div>
            <div class="dropdown-note">Helpful answers to common questions</div>
          </a>
          <a href="{{ route('contact') }}" class="dropdown-item">
            <div class="dropdown-title">Contact Us</div>
            <div class="dropdown-note">Inquiries, partnerships & assistance</div>
          </a>
        </div>
      </div>
    </nav>

    <div class="header-actions">
      <div class="lang-switcher header-lang-switcher" aria-label="Language selection">
        <button type="button" class="lang-btn lang-btn-en active">EN</button>
        <button type="button" class="lang-btn lang-btn-np">NP</button>
      </div>
      <a href="{{ route('contact') }}" class="btn btn-primary header-cta">Contact us</a>
      <button type="button" class="mobile-menu-toggle" aria-label="Toggle navigation menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
    </div>
  </div>
</header>

<!-- Mobile Drawer Menu -->
<div class="mobile-drawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
  <div class="drawer-panel">
    <div class="drawer-header">
      <a href="{{ route('home') }}" aria-label="Munaa Krishi Home">
        <img src="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}" alt="Munaa Krishi" loading="eager" decoding="async">
      </a>
      <button type="button" class="drawer-close" aria-label="Close menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </button>
    </div>
    <div class="drawer-content">
      <ul class="mobile-nav-list">
        <li class="mobile-nav-item">
          <a href="{{ route('home') }}" class="mobile-nav-link {{ $current_nav === 'home' ? 'active' : '' }}">Home</a>
        </li>

        <li class="mobile-nav-item mobile-dropdown {{ in_array($current_nav, ['about', 'chairman']) ? 'has-active' : '' }}">
          <button type="button" class="mobile-dropdown-trigger" aria-expanded="false">
            <span>About Us</span>
            <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <ul class="mobile-sub-list">
            <li><a href="{{ route('about') }}" class="mobile-sub-link {{ $current_nav === 'about' ? 'active' : '' }}">Company Profile</a></li>
            <li><a href="{{ route('chairman.message') }}" class="mobile-sub-link {{ $current_nav === 'chairman' ? 'active' : '' }}">Chairman's Message</a></li>
            <li><a href="{{ route('board.of.directors') }}" class="mobile-sub-link">Board of Directors</a></li>
            <li><a href="{{ route('team') }}" class="mobile-sub-link">Our Team</a></li>
          </ul>
        </li>

        <li class="mobile-nav-item mobile-dropdown {{ in_array($current_nav, ['products', 'farms']) ? 'has-active' : '' }}">
          <button type="button" class="mobile-dropdown-trigger" aria-expanded="false">
            <span>Business</span>
            <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <ul class="mobile-sub-list">
            <li><a href="{{ route('products') }}" class="mobile-sub-link {{ $current_nav === 'products' ? 'active' : '' }}">Products Catalogue</a></li>
            <li><a href="{{ route('farms') }}" class="mobile-sub-link {{ $current_nav === 'farms' ? 'active' : '' }}">Farmer Origin</a></li>
          </ul>
        </li>

        <li class="mobile-nav-item mobile-dropdown {{ in_array($current_nav, ['news', 'gallery', 'videos']) ? 'has-active' : '' }}">
          <button type="button" class="mobile-dropdown-trigger" aria-expanded="false">
            <span>Media</span>
            <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <ul class="mobile-sub-list">
            <li><a href="{{ route('news') }}" class="mobile-sub-link {{ $current_nav === 'news' ? 'active' : '' }}">News & Stories</a></li>
            <li><a href="{{ route('gallery') }}" class="mobile-sub-link {{ $current_nav === 'gallery' ? 'active' : '' }}">Photo Gallery</a></li>
            <li><a href="{{ route('videos') }}" class="mobile-sub-link {{ $current_nav === 'videos' ? 'active' : '' }}">Videos</a></li>
          </ul>
        </li>

        <li class="mobile-nav-item">
          <a href="{{ route('outlets') }}" class="mobile-nav-link {{ $current_nav === 'outlets' ? 'active' : '' }}">Outlets</a>
        </li>

        <li class="mobile-nav-item mobile-dropdown {{ in_array($current_nav, ['contact', 'faq']) ? 'has-active' : '' }}">
          <button type="button" class="mobile-dropdown-trigger" aria-expanded="false">
            <span>Support</span>
            <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
          <ul class="mobile-sub-list">
            <li><a href="{{ route('faq') }}" class="mobile-sub-link {{ $current_nav === 'faq' ? 'active' : '' }}">Frequently Asked Questions</a></li>
            <li><a href="{{ route('contact') }}" class="mobile-sub-link {{ $current_nav === 'contact' ? 'active' : '' }}">Contact Us</a></li>
          </ul>
        </li>
      </ul>

      <a href="{{ route('contact') }}" class="drawer-cta-btn">Contact us</a>

      <div class="drawer-lang-row">
        <span class="drawer-lang-label">Language / भाषा</span>
        <div class="lang-switcher drawer-lang-switcher" aria-label="Language selection">
          <button type="button" class="lang-btn lang-btn-en active">EN</button>
          <button type="button" class="lang-btn lang-btn-np">NP</button>
        </div>
      </div>
    </div>
  </div>
</div>
