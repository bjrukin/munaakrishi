@props([
    'title' => '',
    'nepali_title' => '',
    'subtitle' => '',
    'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
    'breadcrumbs' => []
])

<!-- Page Banner -->
<section class="page-banner">
  <img src="{{ (str_starts_with($bg_image, 'assets/') || str_starts_with($bg_image, 'http')) ? asset($bg_image) : asset('storage/uploads/' . $bg_image) }}" alt="{{ $title }}" class="page-banner-bg" loading="eager" decoding="async" fetchpriority="high">
  <div class="page-banner-overlay"></div>
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">Home</a>
      @foreach($breadcrumbs as $label => $url)
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
        @if($url)
          <a href="{{ $url }}">{{ $label }}</a>
        @else
          <span>{{ $label }}</span>
        @endif
      @endforeach
    </nav>
    @if(!empty($nepali_title))
      <p class="banner-nepali">{{ $nepali_title }}</p>
    @endif
    <h1 class="banner-title">{{ $title }}</h1>
    @if(!empty($subtitle))
      <p class="banner-lead">{{ $subtitle }}</p>
    @endif
  </div>
</section>
