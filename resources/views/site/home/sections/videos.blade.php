<!-- Videos Block (Dynamic from videos table) -->
<section class="section-padding bg-cream-deep border-line-y" id="videos-section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2.5rem;">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Video Highlights' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Field Dispatches & Harvest Stories' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Watch real field stories, processing techniques and farmer testimonials across Nepal.' }}</p>
      </div>
      <a href="{{ route('videos') }}" class="btn btn-outline-forest">Watch all videos →</a>
    </div>

    @php
      $limit = (int) ($settings['limit'] ?? 3);
      $videoItems = (isset($videos) && count($videos) > 0) ? $videos : \App\Models\Video::where('status', 1)->orderBy('order', 'asc')->take($limit)->get();
    @endphp

    @if(isset($videoItems) && count($videoItems) > 0)
      <div style="display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
        @foreach($videoItems as $vid)
          @php
            $vTitle = is_array($vid) ? ($vid['title'] ?? '') : $vid->title;
            $vDesc = is_array($vid) ? ($vid['description'] ?? '') : ($vid->description ?? '');
            $vUrl = is_array($vid) ? ($vid['video_url'] ?? '') : $vid->video_url;
            $vImg = is_array($vid) ? ($vid['image'] ?? '') : $vid->url_image;
          @endphp
          <article style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; border-radius: 4px; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
            <div style="position: relative; aspect-ratio: 16/9; overflow: hidden; background: #000000; cursor: pointer;" onclick="window.open('{{ $vUrl }}', '_blank')">
              <img src="{{ $vImg }}" alt="{{ $vTitle }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.9;" loading="lazy">
              <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.25);">
                <span style="width: 52px; height: 52px; border-radius: 50%; background: var(--color-sindoor); color: #ffffff; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(0,0,0,0.3);">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                </span>
              </div>
            </div>
            <div style="padding: 1.25rem; flex: 1;">
              <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--color-forest);"><a href="{{ $vUrl }}" target="_blank" rel="noreferrer">{{ $vTitle }}</a></h3>
              <p style="margin-top: 0.4rem; font-size: 0.92rem; color: var(--color-muted); line-height: 1.5;">{{ Str::limit($vDesc, 110) }}</p>
            </div>
          </article>
        @endforeach
      </div>
    @endif
  </div>
</section>
