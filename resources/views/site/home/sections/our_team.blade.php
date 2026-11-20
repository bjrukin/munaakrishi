<!-- Our Team Block (Dynamic from teams table) -->
<section class="section-padding bg-leaf-soft border-line-y" id="team-section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2.5rem;">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Management & Coordination' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Our Dedicated Team' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'The agronomists, logistics leaders and operations staff driving Munaa Krishi forward.' }}</p>
      </div>
      <a href="{{ route('our-team') }}" class="btn btn-outline-forest">Meet full team →</a>
    </div>

    @php
      $limit = (int) ($settings['limit'] ?? 4);
      $teamMembers = (isset($teams) && count($teams) > 0) ? $teams : \App\Models\Team::where('status', 1)->orderBy('order', 'asc')->take($limit)->get();
    @endphp

    @if(isset($teamMembers) && count($teamMembers) > 0)
      <div style="display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
        @foreach($teamMembers as $member)
          @php
            $mImg = $member->image ? ((str_starts_with($member->image, 'assets/') || str_starts_with($member->image, 'http')) ? asset($member->image) : asset('storage/uploads/team/' . $member->image)) : asset('assets/images/team/team-director.jpg');
          @endphp
          <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; display: flex; flex-direction: column; border-radius: 4px; box-shadow: var(--shadow-sm);">
            <div style="aspect-ratio: 4/5; overflow: hidden; background: #e2e8f0;">
              <img src="{{ $mImg }}" alt="{{ $member->name }}" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
            </div>
            <div style="padding: 1.25rem; flex: 1;">
              <span style="font-size: 0.8rem; font-weight: 700; color: var(--color-sindoor); text-transform: uppercase;">{{ $member->department ?? 'Team' }}</span>
              <h3 style="margin-top: 0.2rem; font-size: 1.2rem; font-weight: 800; color: var(--color-ink);">{{ $member->name }}</h3>
              <p style="font-size: 0.92rem; font-weight: 600; color: var(--color-forest); margin-bottom: 0.4rem;">{{ $member->designation }}</p>
              @if(!empty($member->summary ?: $member->description))
                <p style="font-size: 0.88rem; color: var(--color-muted); line-height: 1.5; margin-bottom: 0;">{{ Str::limit($member->summary ?: $member->description, 95) }}</p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
