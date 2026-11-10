<!-- Featured Products Showcase -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    <div class="home-products-heading sm-flex-row">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Product catalogue' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Products from farms across Nepal' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Directly sourced from farmer groups with transparent grading and guaranteed quality.' }}</p>
      </div>
      <a href="{{ route('products') }}" class="btn btn-outline-forest">All products →</a>
    </div>

    @php
      $homeProducts = isset($featured_products) && $featured_products->isNotEmpty()
        ? $featured_products
        : collect([
            ['name' => 'Jumla Marsi Red Rice', 'slug' => 'jumla-marsi-rice', 'category' => 'grains-and-flour', 'district' => 'Jumla', 'tag' => 'New harvest', 'image' => asset('assets/images/products/rice-marsi.jpg'), 'outlet_count' => 5],
            ['name' => 'Marpha Apple', 'slug' => 'marpha-apple', 'category' => 'fruits', 'district' => 'Mustang', 'tag' => 'Asoj harvest', 'image' => asset('assets/images/products/apple-mustang.jpg'), 'outlet_count' => 4],
            ['name' => 'Raw Chiuri Honey', 'slug' => 'chiuri-honey', 'category' => 'honey', 'district' => 'Surkhet', 'image' => asset('assets/images/products/honey-chiuri.jpg'), 'outlet_count' => 5],
            ['name' => 'Ilam Orthodox Black Tea', 'slug' => 'ilam-orthodox-tea', 'category' => 'tea-and-spices', 'district' => 'Ilam', 'image' => asset('assets/images/products/tea-ilam.jpg'), 'outlet_count' => 4],
          ]);
    @endphp

    <div class="card-marquee product-card-marquee" data-card-marquee>
      <div class="card-marquee-track">
      @foreach([false, true] as $isDuplicate)
        <div class="product-grid home-product-grid card-marquee-set" @if($isDuplicate) aria-hidden="true" inert @endif>
        @foreach($homeProducts->take(4) as $product)
        @php
          $category = data_get($product, 'category', 'farm-products');
          $categoryLabel = [
            'grains' => 'Grains and Flour',
            'grains-and-flour' => 'Grains and Flour',
            'vegetables' => 'Vegetables',
            'fruits' => 'Fruits',
            'honey' => 'Honey',
            'dairy' => 'Dairy and Cheese',
            'tea-spices' => 'Tea and Spices',
            'tea-and-spices' => 'Tea and Spices',
            'pickles-dried' => 'Pickles and Dried Foods',
          ][$category] ?? str($category)->replace(['-', '_'], ' ')->title();
          $image = is_object($product) ? $product->url_image : data_get($product, 'image');
          $outletCount = data_get($product, 'outlet_count', 5);
          $productUrl = route('products.detail', data_get($product, 'slug'));
        @endphp
        <div class="product-card-wrap">
          <article class="product-card home-product-card">
            <a href="{{ $productUrl }}" class="home-product-image-link" aria-label="View {{ data_get($product, 'name') }}">
              <img src="{{ $image }}" alt="{{ data_get($product, 'name') }}" class="product-card-img" loading="lazy">
              @if(data_get($product, 'tag'))
                <span class="product-season-badge">{{ data_get($product, 'tag') }}</span>
              @endif
            </a>
            <div class="home-product-card-body">
              <p class="home-product-category">{{ $categoryLabel }}</p>
              <h3 class="home-product-title"><a href="{{ $productUrl }}">{{ data_get($product, 'name') }}</a></h3>
              <div class="home-product-meta">
                <span>
                  <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                  {{ data_get($product, 'district', 'Nepal') }}
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
        </div>
      @endforeach
      </div>
    </div>
  </div>
</section>
