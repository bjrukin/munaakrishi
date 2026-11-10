<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Testimonial;

class TestimonialController extends Controller {
    public function index() {
        $data['nav'] = 'testimonial';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Testimonials';
        $data['banner'] = Banner::where(['name' => 'Testimonial', 'status' => 1])->first();
        $data['testimonials'] = Testimonial::where('status', '1')->orderBy('id', 'desc')->get();
        return view('site.testimonial.list', $data);

    }

}
