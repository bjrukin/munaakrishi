<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Office;

class ContactController extends Controller {

    public function index() {
        $data['nav'] = 'contact';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Contact Us';
        $data['banner'] = Banner::where(['name' => 'Contact', 'status' => 1])->first();
        $data['offices'] = Office::where('status', '1')->orderBy('order', 'asc')->get();
        return view('site.contact.index', $data);
    }

}