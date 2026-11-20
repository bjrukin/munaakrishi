<!-- Who We Are Section -->
<section class="section-padding">
  <div class="container">
    <div style="display: grid; gap: 2.5rem; align-items: center;" class="lg-grid-2col">
      <div class="who-we-are-content">
        <p class="section-label">{{ $settings['label'] ?? ($settings['subtitle'] ?? 'Who we are') }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Building a trusted national agricultural brand' }}</h2>
        @if(!empty($settings['reg_info']))
          <p style="margin-top: 1rem; font-weight: 700; color: var(--color-forest); font-size: 0.95rem;">{{ $settings['reg_info'] }}</p>
        @endif
        <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem; color: var(--color-muted); font-size: 1.05rem; line-height: 1.8;">
          @if(!empty($settings['content']))
            {!! $settings['content'] !!}
          @elseif(!empty($settings['copy']))
            <p>{!! nl2br(e($settings['copy'])) !!}</p>
          @else
            <p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.</p>
            <p>The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, and promote high-value products in national and international markets.</p>
          @endif
        </div>
      </div>
      @php
        $rawImg = $settings['image'] ?? '';
        if (!empty($rawImg)) {
          if (str_starts_with($rawImg, 'http') || str_starts_with($rawImg, 'assets/')) {
            $imgUrl = asset($rawImg);
          } elseif (file_exists(public_path('storage/uploads/page/' . $rawImg))) {
            $imgUrl = asset('storage/uploads/page/' . $rawImg);
          } elseif (file_exists(public_path('storage/uploads/about/' . $rawImg))) {
            $imgUrl = asset('storage/uploads/about/' . $rawImg);
          } else {
            $imgUrl = asset('storage/uploads/page/' . $rawImg);
          }
        } else {
          $imgUrl = asset('assets/images/team/team-field.jpg');
        }
      @endphp
      <div class="who-we-are-media" style="position: relative; overflow: hidden; box-shadow: var(--shadow-md); border-radius: var(--radius-md, 8px);">
        <img loading="lazy" decoding="async" src="{{ $imgUrl }}" alt="{{ $settings['title'] ?? 'Munaa Krishi Agriculture' }}" style="aspect-ratio: 4/3; width: 100%; object-fit: cover;">
        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(7, 91, 50, 0.92); color: #ffffff; padding: 0.85rem 1.25rem; font-size: 0.92rem; font-weight: 600;">
          Munaa Krishi works across the agricultural value chain.
        </div>
      </div>
    </div>
  </div>
</section>
