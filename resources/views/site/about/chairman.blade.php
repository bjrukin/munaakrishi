@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => "Chairman's Message",
      'nepali_title' => 'अध्यक्षको सन्देश',
      'subtitle' => "A message about our responsibility to farmers, customers, and Nepal’s agricultural sector.",
      'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => [
        'About Us' => route('about'),
        "Chairman's Message" => ''
      ]
    ])

    <section class="section-padding">
      <div class="container">
        <div style="display: grid; gap: 3rem; align-items: start;" class="chairman-grid">
          <div>
            <div style="overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid var(--color-line);">
              @php
                $cImg = isset($chairman) && $chairman->image ? $chairman->url_image : asset('assets/images/team/team-director.jpg');
                $cName = isset($chairman) && $chairman->name ? $chairman->name : 'Aarav Shrestha';
                $cDesignation = isset($chairman) && $chairman->designation ? $chairman->designation : 'Chairperson, Munaa Krishi Limited';
              @endphp
              <img loading="lazy" decoding="async" src="{{ $cImg }}" alt="{{ $cName }}" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
              <div style="padding: 1.25rem 1.5rem; background: #ffffff; border-top: 1px solid var(--color-line);">
                <h2 style="font-size: 1.35rem; font-weight: 800; color: var(--color-ink);">{{ $cName }}</h2>
                <p style="color: var(--color-muted); font-size: 0.95rem; margin-top: 0.2rem;">{{ $cDesignation }}</p>
              </div>
            </div>
          </div>

          <article>
            <p class="section-label">Message from leadership</p>
            <h2 class="section-title">Building trust through steady agricultural work</h2>
            
            <div style="margin-top: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem; font-size: 1.1rem; line-height: 1.85; color: var(--color-muted);">
              @if(isset($chairman) && ($chairman->information || $chairman->summary))
                {!! $chairman->information ?: '<p>' . nl2br(e($chairman->summary)) . '</p>' !!}
              @else
                <p style="font-weight: 700; color: var(--color-ink); font-size: 1.15rem;">Dear farmers, consumers, partners and well-wishers,</p>
                <p>
                  Nepal's agriculture is endowed with incredible agro-climatic diversity, pristine mountain soils, and centuries of traditional farming wisdom. Yet, for decades, smallholder farmers have grappled with volatile prices, lack of post-harvest storage, and middlemen who siphon away hard-earned farm profits.
                </p>
                <p>
                  Munaa Krishi Limited was established with a singular, resolute purpose: to bridge this historic divide. As a collaborative initiative between the Non-Resident Nepali Association (NRNA) and the Government of Nepal, we are dedicated to transforming subsistence farming into an empowered, commercially sustainable agribusiness model.
                </p>
                <p>
                  By providing guaranteed buy-back arrangements, transparent weight and quality grading, modern cold-chain transport, and direct retail distribution via our Munaa Bazar supermarket chain, we guarantee fair compensation to farmers while delivering safe, hygienic, and authentic Nepali produce to families across urban centers.
                </p>
                <p>
                  Together, we are not just trading food—we are sowing the seeds for food sovereignty, youth employment, and a proud national brand that can stand tall in global export markets.
                </p>
              @endif
              <p style="margin-top: 1rem; color: var(--color-ink);">
                Sincerely,<br>
                <strong style="color: var(--color-forest); font-size: 1.15rem;">{{ $cName }}</strong><br>
                {{ $cDesignation }}
              </p>
            </div>

            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
              <a href="{{ route('about') }}" class="btn btn-forest">View company profile →</a>
              <a href="{{ route('products') }}" class="btn btn-outline-forest">Explore our produce</a>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>
@endsection
