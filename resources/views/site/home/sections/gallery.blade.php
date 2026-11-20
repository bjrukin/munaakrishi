<!-- Photo Gallery Block (Dynamic from galleries table) -->
<section class="section-padding bg-white border-line-y" id="gallery-section">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2.5rem;">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Visual Archive' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Photo Gallery & Field Moments' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Capturing moments from farmers across rural Nepal, modern collection hubs and distribution centers.' }}</p>
      </div>
      <a href="{{ route('gallery') }}" class="btn btn-outline-forest">View all albums →</a>
    </div>

    @php
      $limit = (int) ($settings['limit'] ?? 4);
      $galleries = (isset($galleryItems) && count($galleryItems) > 0) ? $galleryItems : \App\Models\Gallery::where('status', 1)->with('images')->orderBy('order', 'asc')->take($limit)->get();
    @endphp

    @if(isset($galleries) && count($galleries) > 0)
      <div style="display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
        @foreach($galleries as $album)
          @php
            $albCover = $album->url_image ?: asset('assets/images/farms/nepal-terrace-farm.jpg');
          @endphp
          <a href="{{ route('gallery.photos', $album->slug) }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; background: #ffffff; border: 1px solid var(--color-line); border-radius: 4px; overflow: hidden; box-shadow: var(--shadow-sm);" class="hover-lift">
            <div style="aspect-ratio: 4/3; overflow: hidden; position: relative;">
              <img src="{{ $albCover }}" alt="{{ $album->name }}" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
              <span style="position: absolute; bottom: 8px; right: 8px; background: rgba(0,0,0,0.65); color: #fff; font-size: 0.8rem; font-weight: 700; padding: 3px 8px; border-radius: 3px;">
                <i class="fa fa-camera me-1"></i> {{ $album->images->count() ?? 1 }} photos
              </span>
            </div>
            <div style="padding: 1rem 1.25rem;">
              <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--color-forest); margin-bottom: 0.25rem;">{{ $album->name }}</h3>
              @if(!empty($album->nepali_name))
                <small style="color: var(--color-sindoor); font-weight: 600;">{{ $album->nepali_name }}</small>
              @endif
            </div>
          </a>
        @endforeach
      </div>
    @endif
  </div>
</section>
