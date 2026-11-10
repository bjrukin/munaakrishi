<!-- Ways to Shop -->
<section class="section-padding bg-leaf-soft border-line-t">
  <div class="container">
    <div>
      <p class="section-label">{{ $settings['subtitle'] ?? 'Shop Munaa products from' }}</p>
      <h2 class="section-title">{{ $settings['title'] ?? 'Ways to shop' }}</h2>
      @if(!empty($settings['copy']))
        <p class="section-copy">{{ $settings['copy'] }}</p>
      @endif
    </div>

    <div style="margin-top: 2.5rem; display: grid; gap: 1.5rem;" class="shopping-grid">
      <div style="background: #ffffff; border-top: 4px solid var(--color-haldi); padding: 1.75rem; box-shadow: var(--shadow-sm); border-radius: var(--radius-md);">
        <span style="font-size: 0.95rem; font-weight: 800; color: var(--color-sindoor);">01</span>
        <h3 style="margin-top: 0.75rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Munaabazar Mart / Outlets</h3>
        <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">Visit our five supermarket outlets across Kathmandu, Lalitpur, Bhaktapur, Pokhara and Chitwan.</p>
      </div>

      <div style="background: #ffffff; border-top: 4px solid var(--color-haldi); padding: 1.75rem; box-shadow: var(--shadow-sm); border-radius: var(--radius-md);">
        <span style="font-size: 0.95rem; font-weight: 800; color: var(--color-sindoor);">02</span>
        <h3 style="margin-top: 0.75rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Online Shopping</h3>
        <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">Browse products and book orders for doorstep delivery right across the valley.</p>
      </div>

      <div style="background: #ffffff; border-top: 4px solid var(--color-haldi); padding: 1.75rem; box-shadow: var(--shadow-sm); border-radius: var(--radius-md);">
        <span style="font-size: 0.95rem; font-weight: 800; color: var(--color-sindoor);">03</span>
        <h3 style="margin-top: 0.75rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Call on Delivery</h3>
        <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">Call or WhatsApp our hotline at +977-98031 65605 for fast home or office dispatch.</p>
      </div>

      <div style="background: #ffffff; border-top: 4px solid var(--color-haldi); padding: 1.75rem; box-shadow: var(--shadow-sm); border-radius: var(--radius-md);">
        <span style="font-size: 0.95rem; font-weight: 800; color: var(--color-sindoor);">04</span>
        <h3 style="margin-top: 0.75rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">International Export</h3>
        <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">Connecting NRN communities and overseas specialty food distributors with Himalayan agricultural goods.</p>
      </div>
    </div>

    <div style="margin-top: 2.5rem;">
      <a href="{{ route('outlets') }}" class="btn btn-forest btn-lg">View outlet locations & hours →</a>
    </div>
  </div>
</section>
