@extends('layout.site')

@section('body_class', 'news-detail-page')

@section('content')
  @include('site._partial.ticker')

  <main>
    <article class="article-container">
      <a href="{{ route('news') }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        All stories
      </a>

      <p class="article-meta-top">
        <span class="news-category">{{ $article['category'] ?? 'Harvest Stories' }}</span> · <span>{{ $article['date'] ?? '' }}</span>
      </p>

      <h1 style="margin-top: 0.65rem; font-size: clamp(2rem, 4vw, 2.85rem); font-weight: 900; line-height: 1.15; color: var(--color-forest);">
        {{ $article['title'] }}
      </h1>

      @if(!empty($article['summary']))
        <p style="margin-top: 1rem; font-size: 1.2rem; line-height: 1.7; color: var(--color-muted);">
          {{ $article['summary'] }}
        </p>
      @endif

      <!-- Share & Meta Bar -->
      <div style="margin-top: 1.75rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); padding: 0.85rem 0; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem; font-size: 0.88rem;">
        <span style="color: var(--color-muted);">
          By <strong style="color: var(--color-ink);">{{ $article['author'] ?? 'Munaa Krishi Team' }}</strong> · <span>{{ $article['read_time'] ?? '3 min read' }}</span>
        </span>

        <div style="display: flex; gap: 0.5rem; align-items: center;">
          <a href="#" class="btn btn-outline-forest share-facebook" style="padding: 0.35rem 0.8rem; font-size: 0.85rem;">
            Share on Facebook
          </a>
          <button type="button" class="btn btn-outline-forest copy-link-btn" style="padding: 0.35rem 0.8rem; font-size: 0.85rem;">
            Copy link
          </button>
        </div>
      </div>

      <!-- Feature Image -->
      <div style="margin-top: 2rem; overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line);">
        <img loading="lazy" decoding="async" src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" style="width: 100%; aspect-ratio: 16/9; object-fit: cover;">
      </div>

      <!-- Article Body -->
      <div class="article-body" style="margin-top: 2.25rem; font-size: 1.12rem; line-height: 1.85; color: #354f40;">
        {!! $article['content'] ?? '' !!}
        @if(!empty($article['contact_note']))
          <p>{{ $article['contact_note'] }}</p>
        @endif
      </div>
    </article>

    <!-- More Stories Section -->
    @if(!empty($related) && count($related) > 0)
      <section class="section-padding bg-white border-line-t">
        <div class="container">
          <h2 style="font-size: 1.85rem; font-weight: 800; color: var(--color-forest);">More stories</h2>
          <div style="margin-top: 2rem;" class="news-grid">
            @foreach(array_slice($related, 0, 3) as $rel)
              <article class="news-card news-item-wrap">
                <a href="{{ route('news.detail', $rel['slug']) }}" class="news-card-img-wrap">
                  <img src="{{ asset($rel['image'] ?? 'assets/images/gallery/farmer-cutting-millet.jpg') }}" alt="{{ $rel['title'] }}" class="news-card-img" loading="lazy">
                </a>
                <div class="news-card-body">
                  <p class="news-meta"><span class="news-category">{{ $rel['category'] ?? 'Stories' }}</span> · {{ $rel['date'] ?? '' }}</p>
                  <h3 class="news-card-title">
                    <a href="{{ route('news.detail', $rel['slug']) }}">{{ $rel['title'] }}</a>
                  </h3>
                  <p style="margin-top: 0.5rem; font-size: 0.95rem; color: var(--color-muted); line-height: 1.6;">{{ $rel['summary'] ?? '' }}</p>
                </div>
              </article>
            @endforeach
          </div>
        </div>
      </section>
    @endif
  </main>
@endsection
