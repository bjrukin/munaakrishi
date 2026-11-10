<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Page;

class PageController extends Controller {

    public function faq() {
        $data['nav'] = 'support';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Frequently Asked Questions';
        $data['faqs'] = Faq::where('status', 1)->orderBy('order', 'asc')->get();
        return view('site.faq.index', $data);
    }

    public function privacyPolicy() {
        $data['nav'] = 'privacy-policy';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Privacy Policy';
        return view('site.page.privacy', $data);
    }

    public function cookiePolicy() {
        $data['nav'] = 'cookie-policy';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Cookie Policy';
        return view('site.page.cookie', $data);
    }

    public function termsConditions() {
        $data['nav'] = 'terms-of-condition';
        $data['metahead'] = 'page';
        $data['row'] = Page::where(['id' => 8, 'status' => 1])->first();
        $data['banner'] = Banner::where(['name' => 'Leadership', 'status' => 1])->first();
        if ($data['row']) {
            $data['page_title'] = $data['row']->name;
            return view('site.page.detail', $data);
        } else {
            return redirect()->route('privacy-policy');
        }
    }

}