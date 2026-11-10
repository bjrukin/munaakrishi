<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Office;

class OutletController extends Controller
{
    public function index()
    {
        $data['nav'] = 'outlets';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Outlets Directory';

        $offices = Office::where('status', 1)->orderBy('order', 'asc')->get();

        $count = 1;
        $data['outlets'] = $offices->map(function ($o) use (&$count) {
            return [
                'sn' => $count++,
                'name' => $o->name,
                'description' => $o->address ?? 'Munaabazar Mart & Collection Point',
                'phone' => $o->phone ?? '+977-98031 65605',
                'map_query' => $o->address ?? $o->name,
            ];
        })->toArray();

        return view('site.outlet.index', $data);
    }
}
