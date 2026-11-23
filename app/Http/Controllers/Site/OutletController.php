<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Page;

class OutletController extends Controller
{
    public function index()
    {
        $data['nav'] = 'outlets';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Outlets Directory';

        $page = Page::where('slug', 'outlets')->first();
        $outletBlock = $page ? $page->getBlock('outlets') : null;
        $contactBlock = $page ? $page->getBlock('contact_box') : null;

        $limit = (int) ($outletBlock['limit'] ?? 50);

        $offices = Office::where('status', 1)->orderBy('order', 'asc')->limit($limit)->get();

        $count = 1;
        $data['outlets'] = $offices->map(function ($o) use (&$count) {
            return [
                'sn' => $count++,
                'name' => $o->name,
                'description' => $o->address ?? 'Munaabazar Mart & Collection Point',
                'phone' => $o->phone ?? '+977-98031 65605',
                'email' => $o->email,
                'map_url' => $o->map_link,
                'map_query' => $o->address ?? $o->name,
            ];
        })->toArray();

        $data['page'] = $page;
        $data['outletBlock'] = $outletBlock;
        $data['contactBlock'] = $contactBlock;

        return view('site.outlet.index', $data);
    }
}
