<!-- Custom Rich Content Block -->
<section class="section-padding {{ $settings['bg_style'] ?? '' }}">
  <div class="container" style="max-width: 960px; margin: 0 auto;">
    @if(!empty($settings['subtitle']))
      <p class="section-label">{{ $settings['subtitle'] }}</p>
    @endif
    @if(!empty($settings['title']))
      <h2 class="section-title" style="margin-top: 0.5rem;">{{ $settings['title'] }}</h2>
    @endif
    @if(!empty($settings['copy']))
      <div style="margin-top: 1.5rem; font-size: 1.05rem; line-height: 1.85; color: var(--color-ink);">
        {!! $settings['copy'] !!}
      </div>
    @endif
    @if(!empty($settings['btn_text']) && !empty($settings['btn_link']))
      <div style="margin-top: 2rem;">
        <a href="{{ $settings['btn_link'] }}" class="btn btn-outline-forest">
          {{ $settings['btn_text'] }}
        </a>
      </div>
    @endif
  </div>
</section>
