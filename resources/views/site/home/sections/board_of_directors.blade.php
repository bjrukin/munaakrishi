<!-- Board of Directors Block (Dynamic from leaderships table) -->
<section class="section-padding bg-white border-line-y" id="board-section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2.5rem;">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Company Governance' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Board of Directors & Governance' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Overseeing strategic transformation across our national agribusiness initiatives.' }}</p>
      </div>
      <a href="{{ route('board.of.directors') }}" class="btn btn-outline-forest">All directors →</a>
    </div>

    @php
      $limit = (int) ($settings['limit'] ?? 4);
      $directors = (isset($boardMembers) && count($boardMembers) > 0) ? $boardMembers : \App\Models\Leadership::where('status', 1)->orderBy('order', 'asc')->take($limit)->get();
    @endphp

    @if(isset($directors) && count($directors) > 0)
      <div style="display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
        @foreach($directors as $director)
          @php
            $dImg = $director->image ? ((str_starts_with($director->image, 'assets/') || str_starts_with($director->image, 'http')) ? asset($director->image) : asset('storage/uploads/leadership/' . $director->image)) : asset('assets/images/team/team-director.jpg');
          @endphp
          <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; border-radius: 4px; box-shadow: var(--shadow-sm);">
            <div style="position: relative; aspect-ratio: 4/5; overflow: hidden; background: #e2e8f0;">
              <img src="{{ $dImg }}" alt="{{ $director->name }}" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
              <span style="position: absolute; bottom: 0; left: 0; background: var(--color-forest); color: #ffffff; font-size: 0.82rem; font-weight: 700; padding: 0.35rem 0.85rem;">
                {{ $director->designation }}
              </span>
            </div>
            <div style="padding: 1.35rem; flex: 1;">
              <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--color-forest);">{{ $director->name }}</h3>
              <p style="margin-top: 0.5rem; font-size: 0.92rem; line-height: 1.6; color: var(--color-muted); margin-bottom: 0;">
                {{ Str::limit($director->summary ?: $director->information, 120) }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
