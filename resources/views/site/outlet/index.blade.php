@extends('layout.site')

@section('content')
  @php
    $outlets = $outlets ?? [];
  @endphp
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'Outlets directory',
      'nepali_title' => 'हाम्रा शाखाहरू',
      'subtitle' => 'Munaabazar Mart locations, customer counters and regional collection hubs.',
      'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
      'breadcrumbs' => ['Outlets' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <!-- Outlets Table -->
        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th style="width: 60px;">S.N.</th>
                <th>Address & Location</th>
                <th>Contact Numbers</th>
                <th>Directions & Call</th>
              </tr>
            </thead>
            <tbody>
              @foreach($outlets as $outlet)
                <tr>
                  <td style="font-weight: 800; color: var(--color-sindoor);">{{ $outlet['sn'] }}</td>
                  <td>
                    <strong style="font-size: 1.1rem; color: var(--color-forest);">{{ $outlet['name'] }}</strong>
                    <p style="color: var(--color-muted); font-size: 0.88rem; margin-top: 0.2rem;">{{ $outlet['description'] }}</p>
                  </td>
                  <td>
                    <div style="font-weight: 600;">{{ $outlet['phone'] }}</div>
                  </td>
                  <td>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                      <a href="tel:{{ preg_replace('/[^0-9+]/', '', $outlet['phone']) }}" class="btn btn-forest" style="padding: 0.4rem 0.85rem; font-size: 0.88rem;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        Call
                      </a>
                      <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($outlet['map_query']) }}" target="_blank" rel="noreferrer" class="btn btn-outline-forest" style="padding: 0.4rem 0.85rem; font-size: 0.88rem;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        Maps
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
@endsection
