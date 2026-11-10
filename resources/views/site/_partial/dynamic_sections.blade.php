@php
  $pageIdentifier = $page ?? 'home';
  $dynamicSections = \App\Services\Admin\HomepageSectionService::getCached($pageIdentifier);
@endphp

@if(isset($dynamicSections) && $dynamicSections->isNotEmpty())
  @foreach($dynamicSections as $section)
    @if($section->is_enabled)
      @php
        $settings = $section->settings ?? [];
        $type = $section->type;
        $limit = (int) ($settings['limit'] ?? 6);

        // Lazily load data if component requires it and parent view hasn't provided it
        if ($type === 'products' && (!isset($featured_products) || $featured_products->isEmpty())) {
          $featured_products = \App\Models\Product::where('status', 1)->orderBy('order', 'asc')->take(min(4, max(1, $limit)))->get();
        }
        if ($type === 'farms' && (!isset($partner_farms) || $partner_farms->isEmpty())) {
          $partner_farms = \App\Models\Farm::where('status', 1)->orderBy('order', 'asc')->take($limit ?: 4)->get();
        }
        if ($type === 'testimonials' && (!isset($testimonials) || $testimonials->isEmpty())) {
          $testimonials = \App\Models\Testimonial::where('status', 1)->inRandomOrder()->limit($limit ?: 5)->get();
        }
        if ($type === 'news' && (!isset($latest_notices) || $latest_notices->isEmpty())) {
          $latest_notices = \App\Models\Notice::where('status', 1)->orderBy('date', 'desc')->take($limit ?: 3)->get();
        }
        if ($type === 'hero' && (!isset($banners) || $banners->isEmpty())) {
          $banners = \App\Models\Banner::where('status', 1)->get();
        }
      @endphp

      @includeIf('site.home.sections.' . $type, [
        'section' => $section,
        'settings' => $settings,
        'featured_products' => $featured_products ?? collect(),
        'partner_farms' => $partner_farms ?? collect(),
        'testimonials' => $testimonials ?? collect(),
        'latest_notices' => $latest_notices ?? collect(),
        'banners' => $banners ?? collect(),
      ])
    @endif
  @endforeach
@endif
