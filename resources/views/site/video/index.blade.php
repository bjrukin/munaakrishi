@extends('layout.site')

@section('body_class', 'videos-page')

@section('content')
  @php
    $videos = $videos ?? [];
    $vb = $videoBlock ?? [];
    $cb = $ctaBlock ?? [];

    $heroTitle = $vb['title'] ?? 'Videos';
    $heroSubtitle = $vb['copy'] ?? 'Company introductions, field activities and agricultural stories.';
    $heroBg = !empty($vb['image'])
      ? (str_starts_with($vb['image'], 'http') || str_starts_with($vb['image'], 'assets/')
          ? asset($vb['image'])
          : asset('storage/uploads/page/' . $vb['image']))
      : asset('assets/images/farms/nepal-terrace-farm.jpg');
  @endphp
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => $heroTitle,
      'nepali_title' => 'भिडियोहरू',
      'subtitle' => $heroSubtitle,
      'bg_image' => $heroBg,
      'breadcrumbs' => ['Videos' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <!-- Videos Grid Block -->
        <div class="video-grid">
          @if(count($videos) > 0)
            @foreach($videos as $vid)
              @php
                $imgSrc = $vid['image'];
                if (!str_starts_with($imgSrc, 'http')) {
                    $imgSrc = asset($imgSrc);
                }
                $embedUrl = $vid['embed_url'] ?? $vid['video_url'];
              @endphp
              <article class="video-card">
                <div class="video-thumbnail-wrap" onclick="openVideoPlayer('{{ addslashes($vid['title']) }}', '{{ $embedUrl }}')">
                  <img src="{{ $imgSrc }}" alt="{{ $vid['title'] }}" loading="lazy">
                  <div class="video-play-center">
                    <span class="video-play-btn" aria-label="Play video">
                      <svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    </span>
                  </div>
                </div>
                <div class="video-card-body">
                  <h3 class="video-card-title">{{ $vid['title'] }}</h3>
                  <p class="video-card-subtitle">{{ $vid['description'] }}</p>
                </div>
              </article>
            @endforeach
          @endif
        </div>

        <!-- YouTube Channel / CTA Block -->
        @if($cb === null || ($cb['is_enabled'] ?? true))
          @php
            $ctaTitle = $cb['title'] ?? 'Subscribe to our YouTube Channel';
            $ctaCopy = $cb['copy'] ?? 'Watch regular harvest updates, farmer stories and cooking demonstrations with indigenous ingredients.';
            $ctaBtnText = $cb['btn_text'] ?? 'Visit YouTube Channel';
            $ctaBtnLink = $cb['btn_link'] ?? 'https://www.youtube.com/channel/UC9BHnImyXSO6p79Gxta9wsg';
          @endphp
          <div style="margin-top: 3.5rem; background: var(--color-leaf-soft); border-left: 4px solid var(--color-haldi); padding: 2rem; border-radius: 4px;">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--color-forest);">{{ $ctaTitle }}</h2>
            @if(!empty($ctaCopy))
              <p style="margin-top: 0.5rem; font-size: 1.05rem; color: var(--color-muted); line-height: 1.6;">
                {{ $ctaCopy }}
              </p>
            @endif
            @if(!empty($ctaBtnText))
              <div style="margin-top: 1.25rem;">
                <a href="{{ $ctaBtnLink }}" target="_blank" rel="noreferrer" class="btn btn-forest" style="display: inline-flex; align-items: center; gap: 0.6rem;">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                  {{ $ctaBtnText }}
                </a>
              </div>
            @endif
          </div>
        @endif
      </div>
    </section>

    <!-- Video Modal -->
    <div id="video-modal" class="modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="modal-video-title" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); z-index: 1000; align-items: center; justify-content: center; padding: 1rem;">
      <div style="background: #000000; border-radius: 8px; width: 100%; max-width: 850px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.5);">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.25rem; background: var(--color-forest-dark); border-bottom: 1px solid rgba(255,255,255,0.1);">
          <h3 id="modal-video-title" style="color: #ffffff; font-weight: 700; font-size: 1.1rem; margin: 0;">Munaa Krishi Video</h3>
          <button type="button" onclick="closeVideoPlayer()" style="background: transparent; border: none; color: #ffffff; font-size: 1.5rem; cursor: pointer; line-height: 1;">&times;</button>
        </div>
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
          <iframe id="video-modal-iframe" src="" style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </main>

  <script>
    function toEmbedUrl(url) {
      if (!url) return '';
      if (url.includes('/embed/')) return url;
      const match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/);
      return match ? 'https://www.youtube.com/embed/' + match[1] + '?autoplay=1' : url;
    }
    function openVideoPlayer(title, embedUrl) {
      document.getElementById('modal-video-title').textContent = title;
      document.getElementById('video-modal-iframe').src = toEmbedUrl(embedUrl);
      const modal = document.getElementById('video-modal');
      modal.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }
    function closeVideoPlayer() {
      const modal = document.getElementById('video-modal');
      modal.style.display = 'none';
      document.getElementById('video-modal-iframe').src = '';
      document.body.style.overflow = '';
    }
    document.getElementById('video-modal')?.addEventListener('click', function(e) {
      if (e.target === this) closeVideoPlayer();
    });
  </script>
@endsection
