@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    <div style="background: var(--color-leaf-soft); border-bottom: 1px solid var(--color-line); padding: 1.25rem 0;">
      <div class="container">
        <nav class="breadcrumbs breadcrumbs--light" aria-label="Breadcrumb">
          <a href="{{ route('home') }}">Home</a>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
          <a href="{{ route('products') }}">Products</a>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
          <span aria-current="page">{{ $product['name'] }}</span>
        </nav>
      </div>
    </div>

    <!-- Product Main Info -->
    <section class="section-padding">
      <div class="container">
        <div style="display: grid; gap: 3rem;" class="product-detail-layout">
          <!-- Image Column -->
          <div style="position: relative;">
            <div style="aspect-ratio: 4/3; overflow: hidden; background: var(--color-cream-deep); box-shadow: var(--shadow-sm); border: 1px solid var(--color-line);">
              <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" style="width: 100%; height: 100%; object-fit: cover;" loading="eager" decoding="async" fetchpriority="high">
            </div>
            @if(!empty($product['tag']))
              <span class="product-season-badge" style="top: 1rem; left: 1rem; font-size: 0.85rem; padding: 0.35rem 0.85rem;">{{ $product['tag'] }}</span>
            @endif
          </div>

          <!-- Product Overview Column -->
          <div>
            <p style="font-size: 0.95rem; font-weight: 600; color: var(--color-muted);">{{ $product['category_label'] }}</p>
            <h1 style="margin-top: 0.35rem; font-size: clamp(2rem, 3.5vw, 2.75rem); font-weight: 900; color: var(--color-forest); line-height: 1.15;">
              {{ $product['name'] }}
            </h1>
            <p style="margin-top: 0.35rem; font-family: 'Mukta', sans-serif; font-size: 1.35rem; font-weight: 700; color: var(--color-sindoor);">
              {{ $product['nepali'] }}
            </p>
            <p style="margin-top: 1rem; font-size: 1.15rem; line-height: 1.65; color: var(--color-ink);">
              {{ $product['description'] }}
            </p>

            <!-- Specification List -->
            <dl style="margin-top: 1.75rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); font-size: 0.98rem;">
              <div style="display: flex; gap: 1rem; padding: 0.85rem 0; border-bottom: 1px solid var(--color-line);">
                <dt style="width: 130px; flex-shrink: 0; color: var(--color-muted); display: flex; align-items: center; gap: 0.4rem;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-sindoor);"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                  Origin
                </dt>
                <dd style="font-weight: 700; color: var(--color-ink);">{{ $product['district'] }}</dd>
              </div>

              @if(!empty($product['producer']))
                <div style="display: flex; gap: 1rem; padding: 0.85rem 0; border-bottom: 1px solid var(--color-line);">
                  <dt style="width: 130px; flex-shrink: 0; color: var(--color-muted); display: flex; align-items: center; gap: 0.4rem;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-forest);"><path d="M7 20h10"></path><path d="M10 20c0-3 1-5 2-7"></path><path d="M12 13c-2.5-3-2-6 0-8 2 2 2.5 5 0 8z"></path></svg>
                    Grown by
                  </dt>
                  <dd>
                    <a href="{{ $product['producer_link'] ?? '#' }}" style="font-weight: 700; color: var(--color-forest); text-decoration: underline;">
                      {{ $product['producer'] }}
                    </a>
                  </dd>
                </div>
              @endif

              <div style="display: flex; gap: 1rem; padding: 0.85rem 0; border-bottom: 1px solid var(--color-line);">
                <dt style="width: 130px; flex-shrink: 0; color: var(--color-muted); display: flex; align-items: center; gap: 0.4rem;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-forest);"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                  Pack sizes
                </dt>
                <dd style="color: var(--color-ink);">{{ $product['pack_sizes'] ?? ($product['unit'] ? 'Per ' . $product['unit'] : 'Standard retail packs') }}</dd>
              </div>

              <div style="display: flex; gap: 1rem; padding: 0.85rem 0;">
                <dt style="width: 130px; flex-shrink: 0; color: var(--color-muted); display: flex; align-items: center; gap: 0.4rem;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--color-forest);"><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line><path d="m20 16-4-4 4-4"></path><path d="m4 8 4 4-4 4"></path><path d="m16 4-4 4-4-4"></path><path d="m8 20 4-4 4 4"></path></svg>
                  Storage
                </dt>
                <dd style="color: var(--color-ink);">{{ $product['storage'] ?? 'Store in a cool, dry place. Seal tightly after opening.' }}</dd>
              </div>
            </dl>

            <!-- Actions -->
            <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 1rem;">
              <button type="button" class="btn btn-forest btn-lg open-inquiry-modal" data-product="{{ $product['name'] }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                Ask about this product
              </button>
              <a href="tel:+9779803165605" class="btn btn-outline-forest btn-lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                +977-98031 65605
              </a>
            </div>
            <p style="margin-top: 0.85rem; font-size: 0.88rem; color: var(--color-muted);">
              For availability, bulk orders or institutional pricing. Doorstep delivery available across Kathmandu Valley.
            </p>
          </div>
        </div>

        <!-- Description & Where to Find It -->
        <div style="margin-top: 4rem; display: grid; gap: 3rem;" class="detail-split-layout">
          <div>
            <h2 style="font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">About this product</h2>
            <div style="margin-top: 1.25rem; display: flex; flex-direction: column; gap: 1rem; font-size: 1.05rem; line-height: 1.8; color: var(--color-muted);">
              <p>{{ $product['details'] ?? $product['description'] }}</p>
            </div>
          </div>

          <div>
            <h2 style="font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">Where to find it</h2>
            <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted);">Available across Munaa Krishi outlets.</p>
            
            <ul style="margin-top: 1.25rem; background: #ffffff; border: 1px solid var(--color-line); list-style: none; padding: 0;">
              <li style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.25rem; border-bottom: 1px solid var(--color-line);">
                <div>
                  <a href="{{ route('outlets') }}" style="font-weight: 700; color: var(--color-ink);">Sanepa, Lalitpur</a>
                  <p style="font-size: 0.85rem; color: var(--color-muted); margin-top: 0.2rem;">⏱ 7:00 AM to 8:30 PM (7 days)</p>
                </div>
                <a href="tel:+9779803165605" style="font-weight: 700; color: var(--color-forest); font-size: 0.92rem;">+977-98031 65605</a>
              </li>
              <li style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.25rem; border-bottom: 1px solid var(--color-line);">
                <div>
                  <a href="{{ route('outlets') }}" style="font-weight: 700; color: var(--color-ink);">New Baneshwor, Kathmandu</a>
                  <p style="font-size: 0.85rem; color: var(--color-muted); margin-top: 0.2rem;">⏱ 7:00 AM to 8:30 PM (7 days)</p>
                </div>
                <a href="tel:+9779803165605" style="font-weight: 700; color: var(--color-forest); font-size: 0.92rem;">+977-98031 65605</a>
              </li>
              <li style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.25rem;">
                <div>
                  <a href="{{ route('outlets') }}" style="font-weight: 700; color: var(--color-ink);">Pokhara, Srijana Chowk</a>
                  <p style="font-size: 0.85rem; color: var(--color-muted); margin-top: 0.2rem;">⏱ 7:00 AM to 8:00 PM</p>
                </div>
                <a href="tel:+9779803165605" style="font-weight: 700; color: var(--color-forest); font-size: 0.92rem;">+977-98031 65605</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
