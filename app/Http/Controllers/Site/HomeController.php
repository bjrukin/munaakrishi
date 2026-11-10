<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Farm;
use App\Models\GeneralSetting;
use App\Models\Notice;
use App\Models\Product;
use App\Models\Testimonial;
use App\Services\Admin\HomepageSectionService;

class HomeController extends Controller {
    public function index() {
        $data['nav'] = 'home';
        $data['metahead'] = 'default';
        $data['general_setting'] = GeneralSetting::first();
        $established_year = $data['general_setting']->established_year ?? 2020;
        $data['years'] = date('Y') - $established_year;

        // Retrieve cached or database homepage sections
        $sections = HomepageSectionService::getCached();
        $data['sections'] = $sections;

        // Settings lookup helper
        $sectionSettings = $sections->keyBy('type');

        $data['banners'] = Banner::where('status', 1)->get();

        $productLimit = min(4, max(1, (int) ($sectionSettings['products']->settings['limit'] ?? 4)));
        $data['featured_products'] = Product::where('status', 1)->orderBy('order', 'asc')->take($productLimit)->get();

        $farmLimit = (int) ($sectionSettings['farms']->settings['limit'] ?? 4);
        $data['partner_farms'] = Farm::where('status', 1)->orderBy('order', 'asc')->take($farmLimit)->get();

        $testimonialLimit = (int) ($sectionSettings['testimonials']->settings['limit'] ?? 5);
        $data['testimonials'] = Testimonial::where('status', 1)->inRandomOrder()->limit($testimonialLimit)->get();

        $data['notice'] = Notice::where('status', 1)->orderBy('date', 'desc')->first();
        $data['featured_notice'] = Notice::activeFeatured()->first();
        $newsLimit = (int) ($sectionSettings['news']->settings['limit'] ?? 3);
        $data['latest_notices'] = Notice::where('status', 1)->orderBy('date', 'desc')->take($newsLimit)->get();

        return view('site.home.index', $data);
    }
}
