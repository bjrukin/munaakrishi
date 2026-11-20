<!-- What We Do Section -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    <div style="display: grid; gap: 3rem; align-items: center;" class="lg-grid-2col">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'What we do' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'From farmers to markets' }}</h2>
        @php
          $rawImg = $settings['image'] ?? '';
          if (!empty($rawImg)) {
            $imgUrl = (str_starts_with($rawImg, 'http') || str_starts_with($rawImg, 'assets/'))
              ? asset($rawImg)
              : asset('storage/uploads/page/' . $rawImg);
          } else {
            $imgUrl = asset('assets/images/gallery/farmer-cutting-millet.jpg');
          }
        @endphp
        <div style="position: relative; margin-top: 2rem; overflow: hidden; box-shadow: var(--shadow-sm); border-radius: var(--radius-md, 8px);">
          <img loading="lazy" decoding="async" src="{{ $imgUrl }}" alt="{{ $settings['title'] ?? 'What Munaa Krishi does' }}" style="aspect-ratio: 16/10; width: 100%; object-fit: cover;">
          <div style="position: absolute; bottom: 0; left: 0; background: var(--color-haldi); color: var(--color-ink); padding: 0.6rem 1.15rem; font-weight: 700; font-size: 0.92rem;">
            Fair partnership with farmers
          </div>
        </div>
      </div>
      <div>
        @php
          $items = (!empty($settings['items']) && is_array($settings['items'])) ? $settings['items'] : [
            'Buy-back guarantee for farmers',
            'Agricultural value chain development',
            'Collection, grading, packaging, and distribution',
            'Promotion of safe and organic farming',
            'Technology transfer and farmer training',
            'Retail marketing through the Munaa Bazar supermarket chain',
            'Market linkage and business development'
          ];
        @endphp
        <ul style="border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0; margin: 0;">
          @foreach($items as $iIdx => $item)
            <li class="what-we-do-step" style="--step-index: {{ $iIdx }}; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; {{ !$loop->last ? 'border-bottom: 1px solid var(--color-line);' : '' }}">
              <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">{{ str_pad($iIdx + 1, 2, '0', STR_PAD_LEFT) }}</span>
              <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">{{ $item }}</h3>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
