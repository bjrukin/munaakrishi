<!-- Outlets Block (Dynamic from offices table) -->
<section class="section-padding bg-white border-line-y contact-outlets-section" id="outlets-section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2.5rem;">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Our Outlets' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Munaabazar Marts & Collection Centers' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Visit our retail mart locations or call our customer service hotline for direct orders.' }}</p>
      </div>
      <a href="{{ route('outlets') }}" class="btn btn-outline-forest">All outlets & map →</a>
    </div>

    @php
      $outletList = (isset($outlets) && count($outlets) > 0) ? $outlets : \App\Models\Office::where('status', 1)->orderBy('order', 'asc')->get();
    @endphp

    @if(isset($outletList) && count($outletList) > 0)
      <div class="outlets-grid" style="display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
        @foreach($outletList as $idx => $outlet)
          <div style="background: var(--color-leaf-soft); border: 1px solid var(--color-line); border-left: 4px solid var(--color-forest); padding: 1.5rem; border-radius: 4px; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
              <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">Outlet #{{ $idx + 1 }}</span>
              <h3 style="margin-top: 0.25rem; font-size: 1.25rem; font-weight: 800; color: var(--color-forest);">{{ $outlet->name }}</h3>
              <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-ink); line-height: 1.5;">{{ $outlet->address ?? $outlet->description }}</p>
            </div>
            <div style="margin-top: 1.25rem; pt-2; border-top: 1px solid var(--color-line); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
              <span style="font-weight: 700; color: var(--color-ink); font-size: 0.92rem;">
                <i class="fa fa-phone me-1 text-success"></i> {{ $outlet->phone ?? '9801111111' }}
              </span>
              <a href="tel:{{ preg_replace('/[^0-9+]/', '', $outlet->phone ?? '') }}" class="btn btn-sm btn-forest" style="padding: 0.35rem 0.75rem; font-size: 0.85rem;">Call</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
