<!-- Who Can Invest Block -->
<section class="section-padding bg-white border-line-y">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? ($settings['label'] ?? 'Investment opportunities') }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'Who can invest' }}</h2>
    </div>

    @php
      $investors = (!empty($settings['items']) && is_array($settings['items'])) ? $settings['items'] : [
        'Non-Resident Nepalis (NRNs)',
        'Nepali entrepreneurs',
        'Farmers and farmer cooperatives',
        'Financial institutions',
        'Development partners',
        'Other interested institutional and individual investors'
      ];
    @endphp

    <ul style="margin-top: 1.5rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0;">
      @foreach($investors as $investor)
        <li style="padding: 0.85rem 0; {{ !$loop->last ? 'border-bottom: 1px solid var(--color-line);' : '' }} font-weight: 700; color: var(--color-forest); font-size: 1.05rem;">
          <span style="display: inline-block; width: 8px; height: 8px; background: var(--color-haldi); border-radius: 50%; margin-right: 10px; vertical-align: middle;"></span>
          {{ $investor }}
        </li>
      @endforeach
    </ul>
  </div>
</section>
