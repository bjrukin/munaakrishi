@extends('layout.site')

@section('body_class', 'farms-directory-page')

@section('content')
  @php
    $farms = $farms ?? [];
  @endphp
  @include('site._partial.ticker')

  <main class="farms-directory-page">
    @include('site._partial.breadcrumb', [
      'title' => 'The farms behind your food',
      'nepali_title' => 'उत्पादन स्रोत',
      'subtitle' => 'The cooperatives and smallholder farms behind Munaa produce.',
      'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => ['Farmer Origin' => '']
    ])

    <section class="section-padding" style="background: #fafbf7;">
      <div class="container">
        <!-- Search & Filter Controls -->
        <div class="farm-filter-bar">
          <div class="farm-search-wrap">
            <svg class="farm-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="search" id="farm-search-input" class="farm-search-input" placeholder="Search by farm, district or practice, for example vermicomposting">
          </div>
          <div class="farm-province-wrap">
            <select id="farm-province-select" class="farm-province-select">
              <option value="all">All provinces</option>
              <option value="Bagmati Province">Bagmati Province</option>
              <option value="Gandaki Province">Gandaki Province</option>
              <option value="Karnali Province">Karnali Province</option>
              <option value="Koshi Province">Koshi Province</option>
              <option value="Lumbini Province">Lumbini Province</option>
              <option value="Sudurpashchim Province">Sudurpashchim Province</option>
              <option value="Madhesh Province">Madhesh Province</option>
            </select>
          </div>
        </div>

        <p id="farm-count-display" class="farm-count-display">
          {{ count($farms) }} partner farms shown
        </p>

        <!-- No Match Message -->
        <div id="farm-no-match" style="display: none; margin-top: 1.5rem; background: #ffffff; border: 1px dashed var(--color-line); padding: 4rem 1.5rem; text-align: center; border-radius: 12px;">
          <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">No farms match your search</h3>
          <p style="margin-top: 0.35rem; color: var(--color-muted);">Try a different keyword like Jumla, Mustang, Ilam, tea, or vermicomposting.</p>
        </div>

        <!-- Farms Grid -->
        <div class="farm-grid" id="farms-container">
          @if(count($farms) > 0)
            @foreach($farms as $farm)
              @php
                $practicesStr = is_array($farm['practices'] ?? null) ? implode(' ', $farm['practices']) : ($farm['practice'] ?? 'Organic');
                $searchText = $farm['name'] . ' ' . ($farm['district'] ?? '') . ' ' . ($farm['province'] ?? '') . ' ' . $practicesStr . ' ' . ($farm['description'] ?? '');
              @endphp
              <div class="farm-card-wrap" data-province="{{ $farm['province'] ?? '' }}" data-search-text="{{ $searchText }}">
                <article class="farm-card">
                  <a href="{{ route('farms.detail', $farm['slug']) }}" class="farm-card-img-wrap" aria-label="{{ $farm['name'] }}">
                    <img src="{{ asset($farm['image']) }}" alt="{{ $farm['name'] }}" class="farm-card-img" loading="lazy">
                  </a>
                  <div class="farm-card-body">
                    <span class="farm-location">{{ strtoupper($farm['district'] ?? 'NEPAL') }}, {{ strtoupper($farm['province'] ?? '') }}</span>
                    <h3 class="farm-title">
                      <a href="{{ route('farms.detail', $farm['slug']) }}">{{ $farm['name'] }}</a>
                    </h3>
                    <p class="farm-meta">Elevation: {{ $farm['elevation'] ?? $farm['altitude'] ?? 'High altitude' }} · {{ $farm['households'] ?? ($farm['farmers'] ?? '50') . ' farmer families' }}</p>
                    <p class="farm-summary">{{ $farm['summary'] ?? $farm['description'] ?? '' }}</p>
                    <div class="farm-card-footer">
                      <a href="{{ route('farms.detail', $farm['slug']) }}" class="farm-link">View farm story & produce →</a>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </section>
  </main>
@endsection
