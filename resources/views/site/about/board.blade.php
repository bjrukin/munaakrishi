@extends('layout.site')

@section('content')
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'Board of Directors',
      'nepali_title' => 'सञ्चालक समिति',
      'subtitle' => "Leadership and governance across Munaa Krishi Limited's agricultural initiatives.",
      'bg_image' => 'assets/images/farms/tea-field.jpg',
      'breadcrumbs' => [
        'About Us' => route('about'),
        'Board of Directors' => ''
      ]
    ])

    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">Company governance</p>
          <h2 class="section-title">Meet the board</h2>
          <p class="section-copy">The board oversees the company's work on behalf of farmers, customers and shareholders.</p>
        </div>

        <div style="margin-top: 1.5rem; border-left: 4px solid var(--color-haldi); background: var(--color-haldi-soft); padding: 0.85rem 1.25rem; font-size: 0.95rem; font-weight: 600; color: var(--color-ink);">
          Leadership profiles representing social enterprise governance, agronomy, cold chain logistics, and smallholder empowerment.
        </div>

        <!-- Directors Grid -->
        <div style="margin-top: 2.75rem; display: grid; gap: 2rem;" class="directors-grid">
          @if(isset($directors) && $directors->isNotEmpty())
            @foreach($directors as $director)
              <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; transition: transform 200ms ease, box-shadow 200ms ease;" class="hover-lift">
                <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: var(--color-leaf-soft);">
                  @php
                    $img = $director->image ? ((str_starts_with($director->image, 'assets/') || str_starts_with($director->image, 'http')) ? asset($director->image) : asset('storage/uploads/leadership/' . $director->image)) : asset('assets/images/team/team-director.jpg');
                  @endphp
                  <img loading="lazy" decoding="async" src="{{ $img }}" alt="{{ $director->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                  <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.85rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                    {{ $director->designation }}
                  </span>
                </div>
                <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                  <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">{{ $director->name }}</h3>
                  <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.7; color: var(--color-muted);">
                    {{ $director->summary ?: $director->information }}
                  </p>
                </div>
              </div>
            @endforeach
          @else
            <!-- Director 1 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; transition: transform 200ms ease, box-shadow 200ms ease;" class="hover-lift">
              <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: var(--color-leaf-soft);">
                <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-director.jpg') }}" alt="Aarav Shrestha" style="width: 100%; height: 100%; object-fit: cover;">
                <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.85rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                  Chairperson
                </span>
              </div>
              <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Aarav Shrestha</h3>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.7; color: var(--color-muted);">
                  Aarav chairs the board and keeps its discussions focused on the company's responsibilities to farmers, customers and shareholders.
                </p>
              </div>
            </div>

            <!-- Director 2 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; transition: transform 200ms ease, box-shadow 200ms ease;" class="hover-lift">
              <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: var(--color-leaf-soft);">
                <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-quality.jpg') }}" alt="Maya Karki" style="width: 100%; height: 100%; object-fit: cover;">
                <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.85rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                  Director
                </span>
              </div>
              <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Maya Karki</h3>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.7; color: var(--color-muted);">
                  Maya brings extensive experience in food quality and agricultural standards. She advises the board on product safety and consumer trust.
                </p>
              </div>
            </div>

            <!-- Director 3 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; transition: transform 200ms ease, box-shadow 200ms ease;" class="hover-lift">
              <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: var(--color-leaf-soft);">
                <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-operations.jpg') }}" alt="Rajan Gurung" style="width: 100%; height: 100%; object-fit: cover;">
                <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.85rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                  Director
                </span>
              </div>
              <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Rajan Gurung</h3>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.7; color: var(--color-muted);">
                  Rajan works closely with the board on operations, distribution networks, logistics and the practical needs of a growing national agribusiness.
                </p>
              </div>
            </div>

            <!-- Director 4 -->
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; transition: transform 200ms ease, box-shadow 200ms ease;" class="hover-lift">
              <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: var(--color-leaf-soft);">
                <img loading="lazy" decoding="async" src="{{ asset('assets/images/team/team-field.jpg') }}" alt="Sita Adhikari" style="width: 100%; height: 100%; object-fit: cover;">
                <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.85rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                  Director
                </span>
              </div>
              <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Sita Adhikari</h3>
                <p style="margin-top: 0.65rem; font-size: 0.95rem; line-height: 1.7; color: var(--color-muted);">
                  Sita brings a field-based perspective to board discussions, with special attention to rural cooperatives, women farmers, and livelihoods.
                </p>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>
  </main>
@endsection
