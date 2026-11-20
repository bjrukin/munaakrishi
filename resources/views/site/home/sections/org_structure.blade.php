<!-- Organizational Structure Block -->
<section class="section-padding bg-cream-deep border-line-b" aria-labelledby="org-chart-title">
  <div class="container">
    <p class="section-label" style="text-align: center;">{{ $settings['subtitle'] ?? ($settings['label'] ?? 'Governance & Team') }}</p>
    <h2 id="org-chart-title" class="section-title" style="text-align: center; margin-left: auto; margin-right: auto;">{{ $settings['title'] ?? 'Organizational structure' }}</h2>
    <p class="section-copy" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2.5rem;">
      {{ $settings['copy'] ?? ($settings['subtitle'] ?? 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.') }}
    </p>

    @php
      $rawImg = $settings['image'] ?? '';
      if (!empty($rawImg)) {
        if (str_starts_with($rawImg, 'http') || str_starts_with($rawImg, 'assets/')) {
          $chartImg = asset($rawImg);
        } elseif (file_exists(public_path('storage/uploads/page/' . $rawImg))) {
          $chartImg = asset('storage/uploads/page/' . $rawImg);
        } elseif (file_exists(public_path('storage/uploads/about/' . $rawImg))) {
          $chartImg = asset('storage/uploads/about/' . $rawImg);
        } else {
          $chartImg = asset('storage/uploads/page/' . $rawImg);
        }
      } else {
        $chartImg = asset('assets/images/about/organization-chart.svg');
      }
    @endphp

    <figure style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; box-shadow: var(--shadow-sm); border-radius: var(--radius-md, 8px);">
      <div style="overflow-x: auto; padding: 1.5rem;" tabindex="0" aria-label="Scrollable organization chart">
        <img loading="lazy" decoding="async" src="{{ $chartImg }}" alt="{{ $settings['title'] ?? 'Munaa Krishi organizational structure chart' }}" width="1442" height="1060" style="min-width: 780px; width: 100%; height: auto;">
      </div>
      @if(!empty($settings['caption']))
      <figcaption style="border-top: 1px solid var(--color-line); padding: 0.75rem 1.25rem; font-size: 0.85rem; color: var(--color-muted); text-align: center;">
        {{ $settings['caption'] }}
      </figcaption>
      @endif
    </figure>
  </div>
</section>
