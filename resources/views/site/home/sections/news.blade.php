<!-- Latest News & Harvest Stories -->
<section class="section-padding">
  <div class="container">
    <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; gap: 1rem;" class="sm-flex-row">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Updates & harvest news' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Latest from Munaa Krishi' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Field dispatches, farmer milestones, and fresh crop arrivals.' }}</p>
      </div>
      <a href="{{ route('news') }}" class="btn btn-outline-forest">All news & stories →</a>
    </div>

    <div class="news-grid" style="margin-top: 2.5rem; padding-top: 0; border-top: none;">
      @if(isset($latest_notices) && $latest_notices->isNotEmpty())
        @foreach($latest_notices as $idx => $newsItem)
          @php
            $nImg = $newsItem->display_image;
            $nSlug = \Illuminate\Support\Str::slug($newsItem->name);
          @endphp
          <article class="news-card">
            <a href="{{ route('news.detail', $nSlug) }}" class="news-card-img-wrap">
              <img loading="lazy" decoding="async" src="{{ asset($nImg) }}" alt="{{ $newsItem->name }}" class="news-card-img">
            </a>
            <div class="news-card-body">
              <p class="news-meta"><span class="news-category">Harvest Stories</span> · {{ date('M d, Y', strtotime($newsItem->date ?? now())) }}</p>
              <h3 class="news-card-title"><a href="{{ route('news.detail', $nSlug) }}">{{ $newsItem->name }}</a></h3>
              <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">
                {{ \Illuminate\Support\Str::limit(strip_tags($newsItem->description ?? ''), 110) }}
              </p>
            </div>
          </article>
        @endforeach
      @else
        <!-- Fallback Story 1 -->
        <article class="news-card">
          <a href="{{ route('news.detail', 'marpha-apples-arrive-at-all-outlets') }}" class="news-card-img-wrap">
            <img src="{{ asset('assets/images/gallery/farmer-cutting-millet.jpg') }}" alt="Marpha apple harvest" class="news-card-img" loading="lazy">
          </a>
          <div class="news-card-body">
            <p class="news-meta"><span class="news-category">Harvest Stories</span> · Sep 28, 2026</p>
            <h3 class="news-card-title"><a href="{{ route('news.detail', 'marpha-apples-arrive-at-all-outlets') }}">Marpha apples arrive at all five outlets</a></h3>
            <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">The first 1,200 kg of this year’s crisp Mustang harvest reached Kathmandu this week.</p>
          </div>
        </article>

        <!-- Fallback Story 2 -->
        <article class="news-card">
          <a href="{{ route('news.detail', 'kamala-dahal-chiuri-honey') }}" class="news-card-img-wrap">
            <img src="{{ asset('assets/images/farms/beekeeper-field.jpg') }}" alt="Kamala Dahal" class="news-card-img" loading="lazy">
          </a>
          <div class="news-card-body">
            <p class="news-meta"><span class="news-category">Farmer Spotlight</span> · Sep 15, 2026</p>
            <h3 class="news-card-title"><a href="{{ route('news.detail', 'kamala-dahal-chiuri-honey') }}">Meet Kamala Dahal, the beekeeper behind our Chiuri honey</a></h3>
            <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">Kamala and ten other women in Surkhet turned forest beekeeping into steady household income.</p>
          </div>
        </article>

        <!-- Fallback Story 3 -->
        <article class="news-card">
          <a href="{{ route('news.detail', 'reviving-jumla-marsi-rice') }}" class="news-card-img-wrap">
            <img src="{{ asset('assets/images/products/greens-seasonal.jpg') }}" alt="Teej haat" class="news-card-img" loading="lazy">
          </a>
          <div class="news-card-body">
            <p class="news-meta"><span class="news-category">Community</span> · Sep 12, 2026</p>
            <h3 class="news-card-title"><a href="{{ route('news.detail', 'reviving-jumla-marsi-rice') }}">How Sinja farmers are keeping Jumla’s Marsi rice alive</a></h3>
            <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">A community seed bank in Sinja valley is safeguarding indigenous high-altitude grains.</p>
          </div>
        </article>
      @endif
    </div>
  </div>
</section>
