@extends('layout.site')

@section('body_class', 'products-catalog-page')

@section('content')
  @php
    $products = $products ?? [];
  @endphp
  @include('site._partial.ticker')

  <main class="products-catalog-page">
    @include('site._partial.breadcrumb', [
      'title' => 'Munaa Products',
      'nepali_title' => 'उत्पादनहरू',
      'subtitle' => 'Authentic farm products and indigenous agricultural staples available through Munaa Krishi outlets.',
      'bg_image' => 'assets/images/products/greens-seasonal.jpg',
      'breadcrumbs' => ['Products' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">{{ $productBlock['subtitle'] ?? 'Full Catalogue' }}</p>
          <h2 class="section-title">{{ $productBlock['title'] ?? 'Explore Indigenous & Organic Crops' }}</h2>
          @if(!empty($productBlock['copy']))
            <p class="section-copy" style="margin-top: 0.5rem; font-size: 1.05rem; color: var(--color-muted);">{{ $productBlock['copy'] }}</p>
          @endif
          @if(!empty($productBlock['image']))
            <div class="product-block-banner my-3" style="border-radius: 12px; overflow: hidden; max-height: 280px;">
              @php
                $pbImg = $productBlock['image'];
                $pbImgUrl = (str_starts_with($pbImg, 'http') || str_starts_with($pbImg, 'assets/')) ? asset($pbImg) : asset('storage/uploads/page/' . $pbImg);
              @endphp
              <img src="{{ $pbImgUrl }}" alt="{{ $productBlock['title'] ?? 'Products' }}" style="width: 100%; height: 100%; max-height: 280px; object-fit: cover;">
            </div>
          @endif
        </div>

        <!-- Category Filters -->
        <div style="margin-top: 2rem;" class="filter-bar">
          <button type="button" class="filter-pill category-filter-btn active" data-category="all">All products</button>
          @foreach(($categories ?? collect()) as $category)
            <button type="button" class="filter-pill category-filter-btn" data-category="{{ $category->slug }}">{{ $category->name }}</button>
          @endforeach
        </div>

        <!-- Products Grid -->
        <div style="margin-top: 2.5rem;" class="product-grid shopping-grid" id="product-cards-container">
          @if(count($products) > 0)
            @foreach($products as $product)
              <div class="product-card-wrap" data-category="{{ $product['category'] ?? 'grains' }}">
                @php
                  $pImg = $product['image'] ?? 'assets/images/products/rice-marsi.jpg';
                  $imgUrl = str_starts_with($pImg, 'http') ? $pImg : asset($pImg);
                  $category = $product['category'] ?? 'grains';
                  $categoryLabel = $product['category_label'] ?? str($category)->replace(['-', '_'], ' ')->title();
                  $productUrl = route('products.detail', $product['slug']);
                  $outletCount = $product['outlet_count'] ?? 5;
                @endphp
                <article class="product-card home-product-card">
                  <a href="{{ $productUrl }}" class="home-product-image-link" aria-label="View {{ $product['name'] }}">
                    <img src="{{ $imgUrl }}" alt="{{ $product['name'] }}" class="product-card-img" loading="lazy">
                    @if(!empty($product['tag']))
                      <span class="product-season-badge">{{ $product['tag'] }}</span>
                    @endif
                  </a>
                  <div class="home-product-card-body">
                    <p class="home-product-category">{{ $categoryLabel }}</p>
                    <h3 class="home-product-title"><a href="{{ $productUrl }}">{{ $product['name'] }}</a></h3>
                    <div class="home-product-meta">
                      <span>
                        <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                        {{ $product['district'] ?? 'Nepal' }}
                      </span>
                      <span>
                        <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 10v10h16V10M3 10l2-6h14l2 6M3 10c0 2 3 3 4.5 0 0 2 3 3 4.5 0 0 2 3 3 4.5 0 0 2 3 2 4.5 0M9 20v-5h6v5"/></svg>
                        {{ $outletCount }} {{ Str::plural('outlet', $outletCount) }}
                      </span>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          @else
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem 1rem; color: var(--color-muted);">
              No products found in the catalogue.
            </div>
          @endif
        </div>
      </div>
    </section>
  </main>
@endsection
