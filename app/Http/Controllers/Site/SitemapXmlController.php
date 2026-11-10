<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('status', '1')->get();
        $data['offers'] = Offer::where('status', 1)->where('start_date', '<=', now()->format('Y-m-d'))->where('end_date', '>=', now()->format('Y-m-d'))->orderBy('order', 'asc')->get();
        $data['products'] = Product::where('status', '1')->get();
        return response()->view('site.sitemapxml.index', $data)->header('Content-Type', 'text/xml');
    }
}
