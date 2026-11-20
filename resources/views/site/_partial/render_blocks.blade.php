@php
  $blocks = $blocks ?? ($page->blocks ?? []);
  if (is_string($blocks)) {
    $blocks = json_decode($blocks, true) ?: [];
  }
@endphp

@if(!empty($blocks) && is_array($blocks))
  @foreach($blocks as $block)
    @php
      $isEnabled = $block['is_enabled'] ?? ($block['status'] ?? true);
      if ($isEnabled === false || $isEnabled === 0 || $isEnabled === '0') {
        continue;
      }

      $rawType = $block['type'] ?? 'rich_content';
      // Normalize aliases
      $typeMap = [
        'banners' => 'hero',
        'farmer_origin' => 'farms',
        'photo_gallery' => 'gallery',
        'news_and_activities' => 'news',
        'team' => 'our_team',
        'leadership' => 'board_of_directors',
        'aims' => 'aims_to_achieve',
        'implementation_strategies' => 'implementation',
        'organizational_structure' => 'org_structure',
      ];
      $type = $typeMap[$rawType] ?? $rawType;
      $settings = $block['data'] ?? ($block['settings'] ?? []);
      $limit = (int) ($settings['limit'] ?? 6);

      // Lazily load data from corresponding database tables for dynamic blocks
      $data = [
        'settings' => $settings,
        'block' => $block,
      ];

      if ($type === 'hero') {
        $data['banners'] = \App\Models\Banner::where('status', 1)->get();
      } elseif ($type === 'products') {
        $data['featured_products'] = \App\Models\Product::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 8)->get();
      } elseif ($type === 'farms') {
        $data['partner_farms'] = \App\Models\Farm::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 6)->get();
      } elseif ($type === 'faqs') {
        $data['faqs'] = \App\Models\Faq::where('status', 1)->orderBy('order', 'asc')->get();
      } elseif ($type === 'outlets') {
        $data['outlets'] = \App\Models\Office::where('status', 1)->orderBy('order', 'asc')->get();
      } elseif ($type === 'videos') {
        $data['videos'] = \App\Models\Video::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 6)->get();
      } elseif ($type === 'gallery') {
        $data['galleryItems'] = \App\Models\Gallery::where('status', 1)->with('images')->orderBy('order', 'asc')->take($limit ?: 6)->get();
      } elseif ($type === 'news') {
        $data['latest_notices'] = \App\Models\Notice::where('status', 1)->orderBy('date', 'desc')->take($limit ?: 3)->get();
      } elseif ($type === 'our_team') {
        $data['teams'] = \App\Models\Team::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 12)->get();
      } elseif ($type === 'board_of_directors') {
        $data['boardMembers'] = \App\Models\Leadership::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 12)->get();
      } elseif ($type === 'testimonials') {
        $data['testimonials'] = \App\Models\Testimonial::where('status', 1)->inRandomOrder()->limit($limit ?: 6)->get();
      } elseif ($type === 'history' || $type === 'our_journey') {
        $data['histories'] = \App\Models\History::where('status', 1)->orderBy('year', 'asc')->get();
      } elseif ($type === 'achievements') {
        $data['achievements'] = \App\Models\Achievement::where('status', 1)->orderBy('id', 'desc')->get();
      }
    @endphp

    @includeIf('site.home.sections.' . $type, $data)
  @endforeach
@endif
