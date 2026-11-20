<!-- Objectives / Aims to Achieve Block -->
<section class="section-padding bg-white border-line-y">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? ($settings['label'] ?? 'Objectives') }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'What Munaa Krishi aims to achieve' }}</h2>
    </div>

    @php
      $aims = (!empty($settings['items']) && is_array($settings['items'])) ? $settings['items'] : [
        'Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.',
        'Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.',
        'Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.',
        'Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.',
        'Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.',
        'Develop a trusted national agricultural brand.'
      ];
    @endphp

    <ol style="margin-top: 2.5rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0;">
      @foreach($aims as $idx => $aim)
        <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; {{ !$loop->last ? 'border-bottom: 1px solid var(--color-line);' : '' }}">
          <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
          <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">{{ $aim }}</span>
        </li>
      @endforeach
    </ol>
  </div>
</section>
