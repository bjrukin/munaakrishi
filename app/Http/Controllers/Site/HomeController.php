<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Farm;
use App\Models\GeneralSetting;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller {
    public function index() {
        $data['nav'] = 'home';
        $data['metahead'] = 'default';
        $data['general_setting'] = GeneralSetting::first();
        $established_year = $data['general_setting']->established_year ?? 2020;
        $data['years'] = date('Y') - $established_year;

        $page = Page::where('slug', 'home')->first();
        $data['page'] = $page;
        $data['page_title'] = $page->meta_title ?? 'Munaa Krishi Limited';

        // Preload dynamic records
        $data['banners'] = Banner::where('status', 1)->get();
        $data['featured_products'] = Product::where('status', 1)->orderBy('order', 'asc')->take(8)->get();
        $data['partner_farms'] = Farm::where('status', 1)->orderBy('order', 'asc')->take(6)->get();
        $data['testimonials'] = Testimonial::published()->limit(6)->get();
        $data['latest_notices'] = Notice::where('status', 1)->orderBy('date', 'desc')->take(3)->get();
        $data['notice'] = Notice::where('status', 1)->orderBy('date', 'desc')->first();
        $data['featured_notice'] = Notice::activeFeatured()->first();

        return view('site.home.index', $data);
    }
}
