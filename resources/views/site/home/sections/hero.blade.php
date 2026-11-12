<!-- Hero Slider -->
<section class="hero-slider" aria-label="Featured highlights">
  @if(isset($banners) && $banners->isNotEmpty())
    @foreach($banners as $bIndex => $banner)
      <div class="hero-slide {{ $bIndex === 0 ? 'active' : '' }}">
        <img src="{{ (str_starts_with($banner->image, 'assets/') || str_starts_with($banner->image, 'http')) ? asset($banner->image) : asset('storage/uploads/banner/' . $banner->image) }}" alt="{{ $banner->name }}" class="hero-slide-img" loading="{{ $bIndex === 0 ? 'eager' : 'lazy' }}" decoding="async" @if($bIndex === 0) fetchpriority="high" @endif>
        <div class="hero-slide-overlay"></div>
        <div class="container hero-content-wrap">
          <div class="hero-content">
            <p class="hero-kicker">{{ $settings['subtitle'] ?? 'Munaa Krishi Limited' }}</p>
            <h1 class="hero-title">{{ $banner->name }}</h1>
            <p class="hero-text">{{ $settings['copy'] ?? 'A social enterprise and agribusiness initiative jointly envisioned by NRNA and the Government of Nepal.' }}</p>
            <div class="hero-actions">
              <a href="{{ route('products') }}" class="btn btn-primary btn-lg">See products →</a>
              <a href="{{ route('about') }}" class="btn btn-outline-white btn-lg">About Munaa</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @else
    <!-- Slide 1 -->
    <div class="hero-slide active">
      <img src="{{ asset('assets/images/farms/nepal-terrace-farm.jpg') }}" alt="Terraced agricultural fields in Nepal" class="hero-slide-img" loading="eager" decoding="async" fetchpriority="high">
      <div class="hero-slide-overlay"></div>
      <div class="container hero-content-wrap">
        <div class="hero-content">
          <p class="hero-kicker">{{ $settings['subtitle'] ?? 'Munaa Krishi Limited' }}</p>
          <h1 class="hero-title">Empowering Nepali Farmers,<br>Connecting Every Table</h1>
          <p class="hero-text">{{ $settings['copy'] ?? 'A social enterprise and agribusiness initiative jointly envisioned by NRNA and the Government of Nepal.' }}</p>
          <div class="hero-actions">
            <a href="{{ route('products') }}" class="btn btn-primary btn-lg">See products →</a>
            <a href="{{ route('about') }}" class="btn btn-outline-white btn-lg">About Munaa</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide">
      <img src="{{ asset('assets/images/gallery/farmer-cutting-millet.jpg') }}" alt="Farmer working with harvest" class="hero-slide-img" loading="lazy" decoding="async">
      <div class="hero-slide-overlay"></div>
      <div class="container hero-content-wrap">
        <div class="hero-content">
          <p class="hero-kicker">Farmer partnership</p>
          <h1 class="hero-title">Fair partnership with farmers,<br>Guaranteed Market Access</h1>
          <p class="hero-text">Munaa provides a buy-back guarantee for farmers and works on agricultural value chain development.</p>
          <div class="hero-actions">
            <a href="{{ route('about') }}" class="btn btn-primary btn-lg">What we do →</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">Contact us</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide">
      <img src="{{ asset('assets/images/farms/nepal-terrace-farm.jpg') }}" alt="Agricultural products ready for market" class="hero-slide-img" loading="lazy" decoding="async">
      <div class="hero-slide-overlay"></div>
      <div class="container hero-content-wrap">
        <div class="hero-content">
          <p class="hero-kicker">Products and distribution</p>
          <h1 class="hero-title">Safe, fresh, and quality products,<br>Direct From Local Farms</h1>
          <p class="hero-text">Shop through Munaabazar Mart and outlets, online shopping, call on delivery, and international export.</p>
          <div class="hero-actions">
            <a href="{{ route('outlets') }}" class="btn btn-primary btn-lg">Find an outlet →</a>
            <a href="{{ route('products') }}" class="btn btn-outline-white btn-lg">View product categories</a>
          </div>
        </div>
      </div>
    </div>
  @endif

  <!-- Controls & Progress Tabs -->
  @php
    $slideCount = (isset($banners) && $banners->isNotEmpty()) ? $banners->count() : 3;
  @endphp
  <div class="hero-controls">
    <div class="container hero-controls-inner">
      <div class="hero-tabs">
        @for($i = 0; $i < $slideCount; $i++)
          <button type="button" class="hero-tab {{ $i === 0 ? 'active' : '' }}" aria-label="Go to slide {{ $i + 1 }}">
            <span class="hero-tab-bar"><span class="hero-tab-progress"></span></span>
          </button>
        @endfor
      </div>
      <div class="hero-nav-arrows">
        <button type="button" class="hero-arrow-btn prev" aria-label="Previous slide">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
        </button>
        <button type="button" class="hero-arrow-btn next" aria-label="Next slide">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>
      </div>
    </div>
  </div>
</section>
