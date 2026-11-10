<!-- Call to Action Banner -->
<section class="section-padding {{ $settings['bg_style'] ?? 'bg-forest-dark text-white' }}">
  <div class="container text-center" style="max-width: 860px; margin: 0 auto;">
    @if(!empty($settings['subtitle']))
      <p class="section-label {{ ($settings['bg_style'] ?? 'bg-forest-dark') === 'bg-forest-dark' ? 'haldi' : '' }}" style="display: inline-block;">{{ $settings['subtitle'] }}</p>
    @endif
    <h2 class="section-title {{ ($settings['bg_style'] ?? 'bg-forest-dark') === 'bg-forest-dark' ? 'light' : '' }}" style="margin-top: 0.5rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem);">
      {{ $settings['title'] ?? 'Join the Munaa Agricultural Movement' }}
    </h2>
    @if(!empty($settings['copy']))
      <p style="margin-top: 1.25rem; font-size: 1.12rem; line-height: 1.8; opacity: 0.9;">
        {!! nl2br(e($settings['copy'])) !!}
      </p>
    @endif
    <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
      <a href="{{ $settings['btn_link'] ?? route('contact') }}" class="btn btn-primary btn-lg">
        {{ $settings['btn_text'] ?? 'Get in touch →' }}
      </a>
      <a href="{{ route('outlets') }}" class="btn btn-outline-white btn-lg">
        Locate Nearest Outlet
      </a>
    </div>
  </div>
</section>
