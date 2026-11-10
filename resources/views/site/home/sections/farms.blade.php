<!-- Partner Farms Showcase -->
<section class="section-padding home-farms-section">
  <div class="container">
    <div class="home-farms-heading sm-flex-row">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Farmer origin' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'The farms behind your food' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'The cooperatives and smallholder farms behind Munaa produce.' }}</p>
      </div>
      <a href="{{ route('farms') }}" class="btn btn-outline-forest">Explore all farms →</a>
    </div>

    @php
      $homeFarms = isset($partner_farms) && $partner_farms->isNotEmpty()
        ? $partner_farms
        : collect([
            ['name' => 'Sinja Valley High Altitude Cooperative', 'slug' => 'sinja-marsi-cooperative', 'district' => 'Jumla', 'province' => 'Karnali Province', 'altitude' => '2,400–2,800m', 'farmers_count' => '140', 'image' => asset('assets/images/farms/nepal-terrace-farm.jpg')],
            ['name' => 'Muktinath Valley Orchard Collective', 'slug' => 'marpha-thakali-orchard', 'district' => 'Mustang', 'province' => 'Gandaki Province', 'altitude' => '2,700m', 'farmers_count' => '85', 'image' => asset('assets/images/farms/tea-field.jpg')],
            ['name' => 'Kanyam Smallholder Bio-Tea Growers', 'slug' => 'kanyam-small-tea-growers', 'district' => 'Ilam', 'province' => 'Koshi Province', 'altitude' => '1,850m', 'farmers_count' => '210', 'image' => asset('assets/images/farms/kanyam-tea.jpg')],
          ]);
    @endphp

    <div class="card-marquee farm-card-marquee" data-card-marquee>
      <div class="card-marquee-track">
      @foreach([false, true] as $isDuplicate)
        <div class="farm-grid home-farm-grid card-marquee-set" @if($isDuplicate) aria-hidden="true" inert @endif>
        @foreach($homeFarms->take(3) as $farm)
        @php
          $farmUrl = route('farms.detail', data_get($farm, 'slug'));
          $farmImage = is_object($farm) ? $farm->url_image : data_get($farm, 'image');
          $location = collect([data_get($farm, 'district'), data_get($farm, 'province')])->filter()->join(', ');
        @endphp
        <a href="{{ $farmUrl }}" class="home-farm-card" aria-label="View {{ data_get($farm, 'name') }}">
          <span class="home-farm-image-wrap">
            <img src="{{ $farmImage }}" alt="{{ data_get($farm, 'name') }}" class="home-farm-image" loading="lazy">
          </span>
          <span class="home-farm-content">
            <span class="home-farm-location">
              <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
              {{ $location ?: 'Nepal' }}
            </span>
            <span class="home-farm-title-row">
              <span class="home-farm-title">{{ data_get($farm, 'name') }}</span>
              <svg class="home-farm-arrow" aria-hidden="true" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></svg>
            </span>
            <span class="home-farm-facts">
              <span><strong>{{ data_get($farm, 'altitude', '2,400m') }}</strong> elevation</span>
              <span><strong>{{ data_get($farm, 'farmers_count', '100+') }}</strong> farmer families</span>
            </span>
          </span>
        </a>
        @endforeach
        </div>
      @endforeach
      </div>
    </div>
  </div>
</section>
