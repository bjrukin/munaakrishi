<!-- Who We Are Section -->
<section class="section-padding">
  <div class="container">
    <div style="display: grid; gap: 2.5rem; align-items: center;" class="lg-grid-2col">
      <div class="who-we-are-content">
        <p class="section-label">{{ $settings['subtitle'] ?? 'Who we are' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'An integrated agricultural value chain under the munaa brand' }}</h2>
        <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem; color: var(--color-muted); font-size: 1.05rem; line-height: 1.8;">
          @if(!empty($settings['copy']))
            <p>{!! nl2br(e($settings['copy'])) !!}</p>
          @else
            <p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.</p>
            <p>The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, and promote high-value products in national and international markets.</p>
          @endif
        </div>
      </div>
      <div class="who-we-are-media" style="position: relative; overflow: hidden; box-shadow: var(--shadow-md);">
        <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-field.jpg') }}" alt="Agricultural field coordination in Nepal" style="aspect-ratio: 4/3; width: 100%; object-fit: cover;">
        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(7, 91, 50, 0.92); color: #ffffff; padding: 0.85rem 1.25rem; font-size: 0.92rem; font-weight: 600;">
          Munaa Krishi works across the agricultural value chain.
        </div>
      </div>
    </div>
  </div>
</section>
