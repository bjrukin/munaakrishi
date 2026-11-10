@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => $farm['name'],
      'nepali_title' => $farm['nepali'] ?? '',
      'subtitle' => $farm['summary'] ?? '',
      'bg_image' => $farm['image'] ?? 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => [
        'Farmer Origin' => route('farms'),
        $farm['name'] => ''
      ]
    ])

    <section class="section-padding">
      <div class="container">
        <div style="display: grid; gap: 3.5rem;" class="farm-profile-layout">
          <!-- Story & Practices -->
          <div>
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--color-forest);">Their story</h2>
            <div style="margin-top: 1.25rem; display: flex; flex-direction: column; gap: 1.15rem; font-size: 1.1rem; line-height: 1.85; color: var(--color-muted);">
              @if(isset($farm['story']) && is_array($farm['story']))
                @foreach($farm['story'] as $paragraph)
                  <p>{{ $paragraph }}</p>
                @endforeach
              @else
                <p>{{ $farm['description'] ?? $farm['summary'] ?? '' }}</p>
              @endif
            </div>

            <div style="margin-top: 2rem; overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line);">
              <img src="{{ asset($farm['image']) }}" alt="{{ $farm['name'] }}" style="width: 100%; aspect-ratio: 16/9; object-fit: cover;" loading="eager" decoding="async" fetchpriority="high">
            </div>

            @if(!empty($farm['practices']))
              <h2 style="margin-top: 3rem; font-size: 1.75rem; font-weight: 800; color: var(--color-forest);">Farming practices</h2>
              <ul style="margin-top: 1.25rem; display: grid; gap: 0.85rem; list-style: none; padding: 0;" class="sm-grid-2col">
                @foreach($farm['practices'] as $practice)
                  <li style="display: flex; align-items: center; gap: 0.75rem; font-size: 1.05rem; color: var(--color-ink);">
                    <span style="display: inline-flex; width: 28px; height: 28px; border-radius: 50%; background: var(--color-leaf-soft); color: var(--color-forest); align-items: center; justify-content: center; flex-shrink: 0;">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    {{ $practice }}
                  </li>
                @endforeach
              </ul>
            @endif
          </div>

          <!-- Aside Details Card -->
          <aside style="position: sticky; top: 7rem; align-self: start;">
            <div style="background: #ffffff; border: 1px solid var(--color-line); padding: 1.75rem; box-shadow: var(--shadow-sm);">
              <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-ink); border-bottom: 1px solid var(--color-line); padding-bottom: 0.75rem;">
                Farm details
              </h3>
              <dl style="margin-top: 1rem; display: flex; flex-direction: column; font-size: 0.95rem;">
                <div style="display: flex; justify-content: space-between; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid var(--color-line);">
                  <dt style="color: var(--color-muted);">District</dt>
                  <dd style="font-weight: 700; color: var(--color-ink); text-align: right;">{{ $farm['district'] ?? '' }}, {{ $farm['province'] ?? '' }}</dd>
                </div>
                @if(!empty($farm['village']))
                  <div style="display: flex; justify-content: space-between; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid var(--color-line);">
                    <dt style="color: var(--color-muted);">Village / Municipality</dt>
                    <dd style="font-weight: 700; color: var(--color-ink); text-align: right;">{{ $farm['village'] }}</dd>
                  </div>
                @endif
                <div style="display: flex; justify-content: space-between; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid var(--color-line);">
                  <dt style="color: var(--color-muted);">Elevation</dt>
                  <dd style="font-weight: 700; color: var(--color-ink); text-align: right;">{{ $farm['elevation'] ?? $farm['altitude'] ?? 'High altitude' }}</dd>
                </div>
                <div style="display: flex; justify-content: space-between; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid var(--color-line);">
                  <dt style="color: var(--color-muted);">Farmer Families</dt>
                  <dd style="font-weight: 700; color: var(--color-ink); text-align: right;">{{ $farm['households'] ?? ($farm['farmers'] ?? '50') . ' households' }}</dd>
                </div>
                @if(!empty($farm['partner_since']))
                  <div style="display: flex; justify-content: space-between; gap: 1rem; padding: 0.75rem 0;">
                    <dt style="color: var(--color-muted);">Partner since</dt>
                    <dd style="font-weight: 700; color: var(--color-ink); text-align: right;">{{ $farm['partner_since'] }}</dd>
                  </div>
                @endif
              </dl>
            </div>

            <div style="margin-top: 1.5rem; background: var(--color-haldi-soft); padding: 1.5rem; border: 1px solid #ffd4be;">
              <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--color-ink);">Want to visit or partner?</h4>
              <p style="margin-top: 0.35rem; font-size: 0.92rem; color: #4f6154; line-height: 1.6;">Our field team can arrange farm visits for researchers, chefs, and institutional buyers.</p>
              <a href="{{ route('contact') }}" class="btn btn-forest" style="margin-top: 1rem; width: 100%;">Contact our team</a>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- Products Supplied by this Farm -->
    @if(!empty($farm['products']) && count($farm['products']) > 0)
      <section class="section-padding bg-white border-line-t">
        <div class="container">
          <h2 style="font-size: 1.85rem; font-weight: 800; color: var(--color-forest);">What this farm supplies</h2>
          <div style="margin-top: 2rem;" class="product-grid">
            @foreach($farm['products'] as $prod)
              <div class="product-card-wrap">
                <article class="product-card">
                  <div class="product-card-body">
                    <span class="product-card-origin">{{ $farm['district'] ?? 'Nepal' }}</span>
                    <h3 class="product-card-title">
                      <a href="{{ route('products.detail', $prod['slug']) }}">{{ $prod['name'] }}</a>
                    </h3>
                    <p class="product-card-nepali">{{ $prod['nepali'] ?? '' }}</p>
                    <div class="product-card-footer" style="margin-top: 1rem;">
                      <a href="{{ route('products.detail', $prod['slug']) }}" class="product-view-btn">View details →</a>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
  </main>
@endsection
