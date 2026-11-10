<!-- Vision & Mission Cards -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    @if(!empty($settings['title']) || !empty($settings['subtitle']))
      <div style="margin-bottom: 2rem;">
        @if(!empty($settings['subtitle']))
          <p class="section-label">{{ $settings['subtitle'] }}</p>
        @endif
        @if(!empty($settings['title']))
          <h2 class="section-title">{{ $settings['title'] }}</h2>
        @endif
      </div>
    @endif

    <div style="display: grid; gap: 2rem;" class="md-grid-2col">
      <div style="background: #ffffff; padding: 2.25rem; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); border-radius: var(--radius-md);">
        <div style="color: var(--color-sindoor);">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </div>
        <h3 style="margin-top: 1rem; font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">Our Vision</h3>
        <p style="margin-top: 0.75rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted);">
          To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.
        </p>
      </div>

      <div style="background: #ffffff; padding: 2.25rem; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line); border-top: 4px solid var(--color-haldi); border-radius: var(--radius-md);">
        <div style="color: var(--color-sindoor);">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
        </div>
        <h3 style="margin-top: 1rem; font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">Our Mission</h3>
        <p style="margin-top: 0.75rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted);">
          To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.
        </p>
      </div>
    </div>
  </div>
</section>
