<!-- Implementation Strategies Block -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? ($settings['label'] ?? 'Implementation') }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'Implementation strategies' }}</h2>
    </div>

    @php
      $strategies = (!empty($settings['items']) && is_array($settings['items'])) ? $settings['items'] : [
        'Expand progressively to major cities throughout Nepal.',
        'Collaborate with relevant government agencies for certification, quality regulation, and branding.',
        'Coordinate with three tiers of government for land, infrastructure, insurance, and policy support.'
      ];
    @endphp

    <ul style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted); list-style: disc; padding-left: 1.25rem;">
      @foreach($strategies as $strategy)
        <li>{{ $strategy }}</li>
      @endforeach
    </ul>
  </div>
</section>
