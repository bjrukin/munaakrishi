<!-- Call to Action Banner -->
@php
  $style = $settings['style'] ?? 'default';
  $btnLink = $settings['btn_link'] ?? route('contact');
  $isYoutube = ($style === 'youtube_callout') || str_contains($btnLink, 'youtube.com') || str_contains($btnLink, 'youtu.be');
@endphp

@if($isYoutube)
  <div class="container" style="margin-top: 2.5rem; margin-bottom: 2.5rem;">
    <div style="background: var(--color-leaf-soft); border-left: 4px solid var(--color-haldi); padding: 2rem; border-radius: 4px;">
      <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--color-forest);">
        {{ $settings['title'] ?? 'Subscribe to our YouTube Channel' }}
      </h2>
      @if(!empty($settings['copy']))
        <p style="margin-top: 0.5rem; font-size: 1.05rem; color: var(--color-muted); line-height: 1.6;">
          {!! nl2br(e($settings['copy'])) !!}
        </p>
      @endif
      @if(!empty($settings['btn_text']))
        <div style="margin-top: 1.25rem;">
          <a href="{{ $btnLink }}" target="_blank" rel="noreferrer" class="btn btn-forest" style="display: inline-flex; align-items: center; gap: 0.6rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            {{ $settings['btn_text'] ?? 'Visit YouTube Channel' }}
          </a>
        </div>
      @endif
    </div>
  </div>
@else
  @php
    $rawBg = $settings['image'] ?? '';
    if (!empty($rawBg)) {
      $bgUrl = (str_starts_with($rawBg, 'http') || str_starts_with($rawBg, 'assets/'))
        ? asset($rawBg)
        : asset('storage/uploads/page/' . $rawBg);
      $bgStyle = "background-image: linear-gradient(rgba(7, 91, 50, 0.88), rgba(7, 91, 50, 0.88)), url('{$bgUrl}'); background-size: cover; background-position: center;";
    } else {
      $bgStyle = "";
    }
  @endphp

  <section class="section-padding {{ empty($rawBg) ? ($settings['bg_style'] ?? 'bg-forest-dark text-white') : 'text-white' }}" @if(!empty($bgStyle)) style="{{ $bgStyle }}" @endif>
    <div class="container text-center" style="max-width: 860px; margin: 0 auto;">
      @if(!empty($settings['subtitle']))
        <p class="section-label haldi" style="display: inline-block;">{{ $settings['subtitle'] }}</p>
      @endif
      <h2 class="section-title light" style="margin-top: 0.5rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem); color: #ffffff;">
        {{ $settings['title'] ?? 'Join the Munaa Agricultural Movement' }}
      </h2>
      @if(!empty($settings['copy']))
        <p style="margin-top: 1.25rem; font-size: 1.12rem; line-height: 1.8; opacity: 0.9;">
          {!! nl2br(e($settings['copy'])) !!}
        </p>
      @endif
      <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <a href="{{ $btnLink }}" class="btn btn-primary btn-lg">
          {{ $settings['btn_text'] ?? 'Get in touch →' }}
        </a>
        <a href="{{ route('outlets') }}" class="btn btn-outline-white btn-lg">
          Locate Nearest Outlet
        </a>
      </div>
    </div>
  </section>
@endif
