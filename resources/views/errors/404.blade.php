@extends('layout.site')

@section('body_class', 'notfound-page')

@section('content')
  @include('site._partial.ticker')

  <main class="section-padding bg-cream-soft">
    <div class="container container-narrow" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center; align-items: flex-start;">
      <span class="section-badge" style="margin-bottom: 0.75rem;">Error 404</span>
      <h1 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900; color: var(--color-ink); line-height: 1.15;">
        This page could not be found
      </h1>
      <p style="margin-top: 1rem; font-size: 1.15rem; color: var(--color-muted); max-width: 600px; line-height: 1.7;">
        The link you followed may be old, broken, or the page may have been moved. You can return to our homepage or explore our products catalogue.
      </p>
      <div style="margin-top: 2rem; display: flex; flex-wrap: wrap; gap: 1rem;">
        <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
        <a href="{{ route('products') }}" class="btn btn-outline-forest">Browse Products</a>
      </div>
    </div>
  </main>
@endsection