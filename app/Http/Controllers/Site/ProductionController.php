<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Production;

class ProductionController extends Controller {
    public function index() {
        $data['nav'] = 'production';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Production Facilities';
        $data['cnt'] = 1;
        $data['banner'] = Banner::where(['name' => 'Production', 'status' => 1])->first();
        $data['productions'] = Production::where('status', '1')->orderBy('order', 'asc')->get();
        return view('site.production.list', $data);

    }

}
