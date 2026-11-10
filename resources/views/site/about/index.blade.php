@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'About Munaa Krishi',
      'nepali_title' => 'मुना कृषि लिमिटेड',
      'subtitle' => 'A mutual undertaking between NRNA and the Government of Nepal.',
      'bg_image' => 'assets/images/farms/tea-field.jpg',
      'breadcrumbs' => ['About Us' => '']
    ])

    <!-- Who We Are -->
    <section class="section-padding">
      <div class="container">
        <div style="display: grid; gap: 3rem;" class="lg-grid-about">
          <div>
            <p class="section-label">Who we are</p>
            <h2 class="section-title">Building a trusted national agricultural brand</h2>
            <p style="margin-top: 1rem; font-weight: 700; color: var(--color-forest); font-size: 0.95rem;">Registered under the Companies Act of Nepal · Regd. No. 232466/076/077</p>
          </div>
          <div style="display: flex; flex-direction: column; gap: 1.25rem; font-size: 1.05rem; line-height: 1.8; color: var(--color-muted);">
            <p>Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.</p>
            <p>The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, strengthen Nepal’s agricultural economy, and promote high-value agricultural products in national and international markets.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Vision & Mission -->
    <section class="section-padding bg-leaf-soft border-line-y">
      <div class="container">
        <div style="display: grid; gap: 2rem;" class="md-grid-2col">
          <div style="background: #ffffff; padding: 2.25rem; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line);">
            <div style="color: var(--color-sindoor);">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </div>
            <h2 style="margin-top: 1rem; font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">Vision</h2>
            <p style="margin-top: 0.75rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted);">
              To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.
            </p>
          </div>

          <div style="background: #ffffff; padding: 2.25rem; box-shadow: var(--shadow-sm); border: 1px solid var(--color-line);">
            <div style="color: var(--color-sindoor);">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
            </div>
            <h2 style="margin-top: 1rem; font-size: 1.65rem; font-weight: 800; color: var(--color-forest);">Mission</h2>
            <p style="margin-top: 0.75rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted);">
              To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Organizational Structure Chart -->
    <section class="section-padding bg-cream-deep border-line-b" aria-labelledby="org-chart-title">
      <div class="container">
        <p class="section-label" style="text-align: center;">Governance & Team</p>
        <h2 id="org-chart-title" class="section-title" style="text-align: center; margin-left: auto; margin-right: auto;">Organizational structure</h2>
        <p class="section-copy" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2.5rem;">
          From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.
        </p>

        <figure style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; box-shadow: var(--shadow-sm);">
          <div style="overflow-x: auto; padding: 1.5rem;" tabindex="0" aria-label="Scrollable organization chart">
            <img loading="lazy" decoding="async" src="{{ asset('assets/images/about/organization-chart.svg') }}" alt="Munaa Krishi organizational structure chart" width="1442" height="1060" style="min-width: 780px; width: 100%; height: auto;">
          </div>
          <figcaption style="border-top: 1px solid var(--color-line); padding: 0.75rem 1.25rem; font-size: 0.85rem; color: var(--color-muted); text-align: center;">
            Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.
          </figcaption>
        </figure>
      </div>
    </section>

    <!-- Objectives -->
    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">Objectives</p>
          <h2 class="section-title">What Munaa Krishi aims to achieve</h2>
        </div>

        <ol style="margin-top: 2.5rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0;">
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">01</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.</span>
          </li>
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">02</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.</span>
          </li>
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">03</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.</span>
          </li>
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">04</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.</span>
          </li>
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0; border-bottom: 1px solid var(--color-line);">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">05</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.</span>
          </li>
          <li style="display: grid; grid-template-columns: 50px 1fr; gap: 1rem; align-items: baseline; padding: 1.35rem 0;">
            <span style="font-weight: 800; color: var(--color-sindoor); font-size: 1.1rem;">06</span>
            <span style="font-size: 1.08rem; line-height: 1.7; color: var(--color-ink);">Develop a trusted national agricultural brand.</span>
          </li>
        </ol>
      </div>
    </section>

    <!-- Implementation & Investment Opportunities -->
    <section class="section-padding bg-white border-line-y">
      <div class="container">
        <div style="display: grid; gap: 3.5rem;" class="md-grid-2col">
          <div>
            <p class="section-label">Implementation</p>
            <h2 class="section-title">Implementation strategies</h2>
            <ul style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem; font-size: 1.05rem; line-height: 1.75; color: var(--color-muted); list-style: disc; padding-left: 1.25rem;">
              <li>Expand progressively to major cities throughout Nepal.</li>
              <li>Collaborate with relevant government agencies for certification, quality regulation, and branding.</li>
              <li>Coordinate with three tiers of government for land, infrastructure, insurance, and policy support.</li>
            </ul>
          </div>

          <div>
            <p class="section-label">Investment opportunities</p>
            <h2 class="section-title">Who can invest</h2>
            <ul style="margin-top: 1.5rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line); list-style: none; padding: 0;">
              <li style="padding: 0.85rem 0; border-bottom: 1px solid var(--color-line); font-weight: 700; color: var(--color-forest);">Non-Resident Nepalis (NRNs)</li>
              <li style="padding: 0.85rem 0; border-bottom: 1px solid var(--color-line); font-weight: 700; color: var(--color-forest);">Nepali entrepreneurs</li>
              <li style="padding: 0.85rem 0; border-bottom: 1px solid var(--color-line); font-weight: 700; color: var(--color-forest);">Farmers and farmer cooperatives</li>
              <li style="padding: 0.85rem 0; border-bottom: 1px solid var(--color-line); font-weight: 700; color: var(--color-forest);">Financial institutions</li>
              <li style="padding: 0.85rem 0; border-bottom: 1px solid var(--color-line); font-weight: 700; color: var(--color-forest);">Development partners</li>
              <li style="padding: 0.85rem 0; font-weight: 700; color: var(--color-forest);">Other interested institutional and individual investors</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    @if(isset($histories) && $histories->isNotEmpty())
    <!-- Our Journey / History -->
    <section class="section-padding bg-leaf-soft border-line-b">
      <div class="container">
        <div>
          <p class="section-label">Milestones & Progress</p>
          <h2 class="section-title">Our journey through the years</h2>
          <p class="section-copy">Key developments shaping Munaa Krishi into a nationwide agricultural initiative.</p>
        </div>

        <div style="margin-top: 2.5rem; display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
          @foreach($histories as $history)
            <div style="background: #ffffff; border-left: 4px solid var(--color-forest); padding: 1.5rem; box-shadow: var(--shadow-sm); border-radius: 4px;">
              <span style="font-size: 1.25rem; font-weight: 800; color: var(--color-sindoor);">{{ $history->year }}</span>
              <p style="margin-top: 0.5rem; font-size: 1rem; color: var(--color-ink); line-height: 1.6;">
                {{ $history->description }}
              </p>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    @if(isset($achievements) && $achievements->isNotEmpty())
    <!-- Key Achievements -->
    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">Certifications & Impact</p>
          <h2 class="section-title">Achievements & recognitions</h2>
        </div>

        <div style="margin-top: 2.5rem; display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
          @foreach($achievements as $achievement)
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding: 1.5rem; border-radius: 4px;">
              @if($achievement->image)
                <img loading="lazy" decoding="async" src="{{ $achievement->url_image }}" alt="{{ $achievement->name }}" style="max-height: 100px; object-fit: contain; margin: 0 auto 1rem;">
              @endif
              <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-forest);">{{ $achievement->name }}</h3>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    {{-- Dynamic Admin-Configured Components for About Page --}}
    @include('site._partial.dynamic_sections', ['page' => 'about'])
  </main>
@endsection
