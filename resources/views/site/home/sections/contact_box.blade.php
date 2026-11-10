<!-- Quick Contact / Hotline Box -->
<section class="section-padding bg-cream-deep border-line-y">
  <div class="container">
    <div style="background: #ffffff; border: 1px solid var(--color-line); border-left: 6px solid var(--color-forest); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
      <div style="display: grid; gap: 2rem; align-items: center;" class="lg-grid-2col">
        <div>
          <p class="section-label">{{ $settings['subtitle'] ?? 'Reach Munaa Krishi' }}</p>
          <h2 class="section-title" style="margin-top: 0.25rem;">{{ $settings['title'] ?? 'Direct Farmer & Consumer Hotline' }}</h2>
          <p style="margin-top: 0.75rem; font-size: 1.05rem; line-height: 1.7; color: var(--color-muted);">
            {{ $settings['copy'] ?? 'Have questions about sourcing, wholesale partnerships, mart locations, or home delivery? Our customer support is ready to assist.' }}
          </p>
        </div>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
          <div style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 44px; height: 44px; background: var(--color-leaf-soft); color: var(--color-forest); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <span class="material-symbols-outlined">call</span>
            </div>
            <div>
              <small class="text-muted" style="display: block;">Direct Call / WhatsApp</small>
              <strong style="font-size: 1.15rem; color: var(--color-ink);">+977-98031 65605</strong>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 44px; height: 44px; background: var(--color-leaf-soft); color: var(--color-forest); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <span class="material-symbols-outlined">mail</span>
            </div>
            <div>
              <small class="text-muted" style="display: block;">Email Inquiries</small>
              <strong style="font-size: 1.05rem; color: var(--color-ink);">info@munaakrishi.com</strong>
            </div>
          </div>
          <div style="margin-top: 0.5rem;">
            <a href="{{ route('contact') }}" class="btn btn-primary">
              Send us a message →
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
