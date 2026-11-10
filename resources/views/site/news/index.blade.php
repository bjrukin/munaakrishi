@extends('layout.site')

@section('body_class', 'news-archive-page')

@section('content')
  @php
    $articles = $articles ?? [];
    $lead_article = $lead_article ?? (count($articles) > 0 ? $articles[0] : null);
    $remaining_articles = count($articles) > 1 ? array_slice($articles, 1) : [];
  @endphp
  @include('site._partial.ticker')

  <main class="news-archive-page">
    @include('site._partial.breadcrumb', [
      'title' => 'News & Activities',
      'nepali_title' => 'समाचार तथा गतिविधि',
      'subtitle' => 'Harvest updates, stories from our partner farms, seasonal produce alerts and community notices.',
      'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => ['News' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-bar">
          <button type="button" class="filter-pill news-filter-btn active" data-category="all">All</button>
          <button type="button" class="filter-pill news-filter-btn" data-category="Harvest Stories">Harvest Stories</button>
          <button type="button" class="filter-pill news-filter-btn" data-category="Farmer Spotlight">Farmer Spotlight</button>
          <button type="button" class="filter-pill news-filter-btn" data-category="Farming Tips">Farming Tips</button>
          <button type="button" class="filter-pill news-filter-btn" data-category="Community">Community</button>
          <button type="button" class="filter-pill news-filter-btn" data-category="Announcements">Announcements</button>
        </div>

        <!-- Lead Story -->
        @if($lead_article)
          <article class="news-lead news-item-wrap" data-category="{{ $lead_article['category'] ?? 'Harvest Stories' }}">
            <a href="{{ route('news.detail', $lead_article['slug']) }}" class="news-lead-img-wrap">
              <img src="{{ asset($lead_article['image']) }}" alt="{{ $lead_article['title'] }}" class="news-lead-img" loading="eager" decoding="async" fetchpriority="high">
            </a>
            <div class="news-lead-body">
              <p class="news-meta">
                <span class="news-category">{{ $lead_article['category'] ?? 'Harvest Stories' }}</span> · {{ $lead_article['date'] }}
              </p>
              <h2 class="news-lead-title">
                <a href="{{ route('news.detail', $lead_article['slug']) }}">{{ $lead_article['title'] }}</a>
              </h2>
              <p class="news-excerpt">
                {{ $lead_article['summary'] }}
              </p>
              <p style="margin-top: 1.25rem; font-size: 0.88rem; color: var(--color-muted);">
                By <strong>{{ $lead_article['author'] ?? 'Munaa Team' }}</strong> · {{ $lead_article['read_time'] ?? '3 min read' }}
              </p>
            </div>
          </article>
        @endif

        <!-- More Stories Grid -->
        <div class="news-grid" id="news-grid-container">
          @foreach($remaining_articles as $art)
            <article class="news-card news-item-wrap" data-category="{{ $art['category'] ?? 'Harvest Stories' }}">
              <a href="{{ route('news.detail', $art['slug']) }}" class="news-card-img-wrap">
                <img src="{{ asset($art['image']) }}" alt="{{ $art['title'] }}" class="news-card-img" loading="lazy">
              </a>
              <div class="news-card-body">
                <p class="news-meta"><span class="news-category">{{ $art['category'] ?? 'Harvest Stories' }}</span> · {{ $art['date'] }}</p>
                <h3 class="news-card-title">
                  <a href="{{ route('news.detail', $art['slug']) }}">{{ $art['title'] }}</a>
                </h3>
                <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">{{ $art['summary'] }}</p>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  </main>
@endsection
