<!-- What We Do Section -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    <div style="display: grid; gap: 3rem; align-items: center;" class="lg-grid-2col">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'What we do' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'From farmers to markets' }}</h2>
        <div style="position: relative; margin-top: 2rem; overflow: hidden; box-shadow: var(--shadow-sm);">
          <img loading="lazy" decoding="async" src="{{ asset('assets/images/gallery/farmer-cutting-millet.jpg') }}" alt="Farmer handling harvested produce" style="aspect-ratio: 16/10; width: 100%; object-fit: cover;">
          <div style="position: absolute; bottom: 0; left: 0; background: var(--color-haldi); color: var(--color-ink); padding: 0.6rem 1.15rem; font-weight: 700; font-size: 0.92rem;">
            Fair partnership with farmers
          </div>
        </div>
      </div>
      <div>
        <ul style="border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0; margin: 0;">
          <li class="what-we-do-step" style="--step-index: 0; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">01</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Buy-back guarantee for farmers</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 1; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">02</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Agricultural value chain development</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 2; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">03</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Collection, grading, packaging, and distribution</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 3; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">04</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Promotion of safe and organic farming</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 4; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">05</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Technology transfer and farmer training</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 5; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">06</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Retail marketing through the Munaa Bazar supermarket chain</h3>
          </li>
          <li class="what-we-do-step" style="--step-index: 6; display: grid; grid-template-columns: 42px 1fr; gap: 0.75rem; align-items: center; padding: 1.1rem 0;">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 0.95rem;">07</span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-ink); margin: 0;">Market linkage and business development</h3>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
