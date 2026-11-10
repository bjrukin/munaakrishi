@extends('layout.site')

@section('body_class', 'gallery-page')

@section('content')
  @php
    $photos = $photos ?? [];
  @endphp
  @include('site._partial.ticker')

  <main class="gallery-page">
    @include('site._partial.breadcrumb', [
      'title' => 'Photo Gallery',
      'nepali_title' => 'फोटो ग्यालरी',
      'subtitle' => 'Scenes from our partner farms, seasonal harvests and daily life at Munaa outlets.',
      'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => ['Gallery' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <!-- Album Filters -->
        <div class="filter-bar">
          <button type="button" class="filter-pill gallery-album-btn active" data-album="all">All photos ({{ count($photos) }})</button>
          <button type="button" class="filter-pill gallery-album-btn" data-album="harvest">Harvests</button>
          <button type="button" class="filter-pill gallery-album-btn" data-album="farm-visits">Farm visits</button>
          <button type="button" class="filter-pill gallery-album-btn" data-album="outlets">Outlets</button>
          <button type="button" class="filter-pill gallery-album-btn" data-album="community">Community</button>
        </div>

        <!-- Masonry / Columns Photo Grid -->
        <div class="gallery-columns-wrap" style="margin-top: 2.5rem;">
          @foreach($photos as $idx => $photo)
            <div class="gallery-photo-item" data-album="{{ $photo['album'] ?? 'harvest' }}">
              <button type="button" class="gallery-card-btn" data-gallery-index="{{ $idx }}">
                <div class="gallery-img-box">
                  <img src="{{ asset($photo['image']) }}" alt="{{ $photo['caption'] }}" loading="lazy">
                </div>
                <div class="gallery-caption-box">
                  <strong>{{ $photo['caption'] }}</strong>
                  <span>{{ $photo['place'] }}</span>
                </div>
              </button>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  </main>

  <script>
    window.GALLERY_PHOTOS = @json(array_values($photos));
  </script>
@endsection
