@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'Our Team',
      'nepali_title' => 'हाम्रो टोली',
      'subtitle' => 'The people behind our partner farms, logistics network and retail counters.',
      'bg_image' => 'assets/images/team/team-field.jpg',
      'breadcrumbs' => [
        'About Us' => route('about'),
        'Our Team' => ''
      ]
    ])

    <!-- Leadership and Key Staff -->
    <section class="section-padding">
      <div class="container">
        <p class="section-label">Management & Coordination</p>
        <h2 class="section-title">Leadership and key staff</h2>
        
        <div style="margin-top: 2.5rem; display: grid; gap: 2rem;" class="leaders-grid">
          @if(isset($teams) && $teams->isNotEmpty())
            @foreach($teams as $teamMember)
              <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column;">
                @php
                  $tImg = $teamMember->image ? ((str_starts_with($teamMember->image, 'assets/') || str_starts_with($teamMember->image, 'http')) ? asset($teamMember->image) : asset('storage/uploads/team/' . $teamMember->image)) : asset('assets/images/team/team-director.jpg');
                @endphp
                <img loading="lazy" decoding="async" src="{{ $tImg }}" alt="{{ $teamMember->name }}" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
                <div style="padding: 1.35rem; flex: 1; display: flex; flex-direction: column;">
                  <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">{{ $teamMember->department ?? 'Team' }}</span>
                  <h3 style="margin-top: 0.2rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">{{ $teamMember->name }}</h3>
                  <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest);">{{ $teamMember->designation }}</p>
                  <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.6; color: var(--color-muted);">
                    {{ $teamMember->summary ?: $teamMember->description }}
                  </p>
                </div>
              </div>
            @endforeach
          @else
            <!-- Member 1 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column;">
              <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-director.jpg') }}" alt="Sabina Shrestha" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
              <div style="padding: 1.35rem; flex: 1; display: flex; flex-direction: column;">
                <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">Management</span>
                <h3 style="margin-top: 0.2rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Sabina Shrestha</h3>
                <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest);">Founder and Managing Director</p>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.6; color: var(--color-muted);">
                  Sabina started Munaa Krishi in 2076 BS and named it after her mother. Before that she spent twelve years working with agricultural cooperatives in Karnali.
                </p>
              </div>
            </div>

            <!-- Member 2 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column;">
              <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-operations.jpg') }}" alt="Bikash Thapa Magar" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
              <div style="padding: 1.35rem; flex: 1; display: flex; flex-direction: column;">
                <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">Operations</span>
                <h3 style="margin-top: 0.2rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Bikash Thapa Magar</h3>
                <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest);">Head of Operations</p>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.6; color: var(--color-muted);">
                  Bikash runs collection, transport and the Balkhu warehouse. He makes sure produce from Panauti reaches the shelves before 7 AM every day.
                </p>
              </div>
            </div>

            <!-- Member 3 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column;">
              <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-field.jpg') }}" alt="Prakash Rokaya" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
              <div style="padding: 1.35rem; flex: 1; display: flex; flex-direction: column;">
                <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">Field Team</span>
                <h3 style="margin-top: 0.2rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Prakash Rokaya</h3>
                <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest);">Field Coordinator, Karnali</p>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.6; color: var(--color-muted);">
                  Born in Sinja, Prakash studied agriculture at Jumla campus and now works closely with partner farms across Jumla, Mugu and Surkhet.
                </p>
              </div>
            </div>

            <!-- Member 4 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column;">
              <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-quality.jpg') }}" alt="Anusha Karki" style="width: 100%; aspect-ratio: 4/5; object-fit: cover;">
              <div style="padding: 1.35rem; flex: 1; display: flex; flex-direction: column;">
                <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">Quality</span>
                <h3 style="margin-top: 0.2rem; font-size: 1.25rem; font-weight: 800; color: var(--color-ink);">Anusha Karki</h3>
                <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest);">Quality and Food Safety Lead</p>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.6; color: var(--color-muted);">
                  Anusha holds a B.Tech in Food Technology from TU. Her team checks every incoming batch and sends periodic samples for laboratory residue tests.
                </p>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

    <!-- Field, Outlet and Office Staff -->
    <section class="section-padding bg-white border-line-t">
      <div class="container">
        <p class="section-label">Field & Outlets</p>
        <h2 class="section-title">Regional team & outlet managers</h2>

        <div style="margin-top: 2rem; border-top: 1px solid var(--color-line); border-bottom: 1px solid var(--color-line);">
          <!-- Staff 1 -->
          <div style="display: grid; gap: 1rem; padding: 1.5rem 0; border-bottom: 1px solid var(--color-line);" class="md-grid-staff">
            <span style="display: inline-flex; width: 56px; height: 56px; border-radius: 50%; background: var(--color-leaf-soft); color: var(--color-forest); font-weight: 800; font-size: 1.2rem; align-items: center; justify-content: center;">
              DT
            </span>
            <div>
              <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-ink);">Dil Bahadur Tamang</h3>
              <p style="font-size: 0.95rem; color: var(--color-forest); font-weight: 600;">Field Officer, Rasuwa & Nuwakot</p>
              <p style="font-size: 0.82rem; color: var(--color-muted); margin-top: 0.2rem;">📍 Dhunche, Rasuwa</p>
            </div>
            <p style="font-size: 0.98rem; line-height: 1.65; color: var(--color-muted);">
              Dil Bahadur coordinates with herders and vegetable cooperatives in the northern hill belts, arranging regular chhurpi pickups from Syabrubesi.
            </p>
          </div>

          <!-- Staff 2 -->
          <div style="display: grid; gap: 1rem; padding: 1.5rem 0; border-bottom: 1px solid var(--color-line);" class="md-grid-staff">
            <span style="display: inline-flex; width: 56px; height: 56px; border-radius: 50%; background: var(--color-leaf-soft); color: var(--color-forest); font-weight: 800; font-size: 1.2rem; align-items: center; justify-content: center;">
              SP
            </span>
            <div>
              <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-ink);">Sarita Poudel</h3>
              <p style="font-size: 0.95rem; color: var(--color-forest); font-weight: 600;">Outlet Manager, Baneshwor</p>
              <p style="font-size: 0.82rem; color: var(--color-muted); margin-top: 0.2rem;">📍 Kathmandu</p>
            </div>
            <p style="font-size: 0.98rem; line-height: 1.65; color: var(--color-muted);">
              Sarita manages our high-volume Baneshwor outlet and its retail team. She ensures regular consumers get fresh morning produce and accurate origin guidance.
            </p>
          </div>

          <!-- Staff 3 -->
          <div style="display: grid; gap: 1rem; padding: 1.5rem 0; border-bottom: 1px solid var(--color-line);" class="md-grid-staff">
            <span style="display: inline-flex; width: 56px; height: 56px; border-radius: 50%; background: var(--color-leaf-soft); color: var(--color-forest); font-weight: 800; font-size: 1.2rem; align-items: center; justify-content: center;">
              PG
            </span>
            <div>
              <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-ink);">Pema Gurung</h3>
              <p style="font-size: 0.95rem; color: var(--color-forest); font-weight: 600;">Outlet Manager, Lakeside</p>
              <p style="font-size: 0.82rem; color: var(--color-muted); margin-top: 0.2rem;">📍 Pokhara</p>
            </div>
            <p style="font-size: 0.98rem; line-height: 1.65; color: var(--color-muted);">
              Pema leads the Pokhara outlet and oversees wholesale supplies to local restaurants, eco-lodges, and regional organic markets in Kaski.
            </p>
          </div>

          <!-- Staff 4 -->
          <div style="display: grid; gap: 1rem; padding: 1.5rem 0;" class="md-grid-staff">
            <span style="display: inline-flex; width: 56px; height: 56px; border-radius: 50%; background: var(--color-leaf-soft); color: var(--color-forest); font-weight: 800; font-size: 1.2rem; align-items: center; justify-content: center;">
              NA
            </span>
            <div>
              <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-ink);">Nabin Adhikari</h3>
              <p style="font-size: 0.95rem; color: var(--color-forest); font-weight: 600;">Accounts & Farmer Payments</p>
              <p style="font-size: 0.82rem; color: var(--color-muted); margin-top: 0.2rem;">📍 Lalitpur</p>
            </div>
            <p style="font-size: 0.98rem; line-height: 1.65; color: var(--color-muted);">
              Nabin oversees payment reconciliations, ensuring partner cooperatives are settled reliably within 15 days of collection and publishing transparent farm gate rates.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
