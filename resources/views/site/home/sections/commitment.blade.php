<!-- Our Commitment & Why Munaa -->
<section class="section-padding bg-forest-dark text-white">
  <div class="container">
    <div style="display: grid; gap: 3rem;" class="lg-grid-2col">
      <div>
        <p class="section-label haldi">{{ $settings['subtitle'] ?? 'Our commitment' }}</p>
        <h2 class="section-title light">{{ $settings['title'] ?? 'Commercial sustainability with positive social impact' }}</h2>
        @if(!empty($settings['copy']))
          <p style="margin-top: 1.25rem; font-size: 1.08rem; line-height: 1.8; color: rgba(255, 255, 255, 0.85);">
            {!! nl2br(e($settings['copy'])) !!}
          </p>
        @else
          <p style="margin-top: 1.25rem; font-size: 1.08rem; line-height: 1.8; color: rgba(255, 255, 255, 0.85);">
            Munaa operates as a socially responsible, profit-oriented agribusiness enterprise, balancing commercial sustainability with positive social impact.
          </p>
          <p style="margin-top: 1rem; font-size: 1.08rem; line-height: 1.8; color: rgba(255, 255, 255, 0.85);">
            Munaa is committed to building a transparent, technology-driven, and inclusive agricultural ecosystem that benefits both producers and consumers while supporting Nepal’s long-term agricultural transformation.
          </p>
        @endif
      </div>

      <div>
        <h3 style="font-size: 1.45rem; font-weight: 800; color: #ffffff;">Why Munaa</h3>
        <ul style="margin-top: 1.25rem; border-top: 1px solid rgba(255, 255, 255, 0.15); border-bottom: 1px solid rgba(255, 255, 255, 0.15); list-style: none; padding: 0;">
          <li style="padding: 0.85rem 0; border-bottom: 1px solid rgba(255, 255, 255, 0.15); font-size: 1.05rem;">✓ Trusted NRN initiative</li>
          <li style="padding: 0.85rem 0; border-bottom: 1px solid rgba(255, 255, 255, 0.15); font-size: 1.05rem;">✓ Fair partnership with farmers</li>
          <li style="padding: 0.85rem 0; border-bottom: 1px solid rgba(255, 255, 255, 0.15); font-size: 1.05rem;">✓ Technology-driven agriculture</li>
          <li style="padding: 0.85rem 0; border-bottom: 1px solid rgba(255, 255, 255, 0.15); font-size: 1.05rem;">✓ Safe, fresh, and quality products</li>
          <li style="padding: 0.85rem 0; border-bottom: 1px solid rgba(255, 255, 255, 0.15); font-size: 1.05rem;">✓ Transparent and sustainable business practices</li>
          <li style="padding: 0.85rem 0; font-size: 1.05rem;">✓ Dedicated to strengthening Nepal's agriculture</li>
        </ul>
      </div>
    </div>
  </div>
</section>
