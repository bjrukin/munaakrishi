<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Farm;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Office;
use App\Models\Product;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index()
    {
        $data['nav'] = 'dashboard';
        $data['sub_nav'] = '';
        $data['page_title'] = 'Dashboard';
        $data['total_products'] = Product::count();
        $data['total_farms'] = Farm::count();
        $data['total_offices'] = Office::count();
        $data['total_notices'] = Notice::count();
        $data['total_teams'] = Team::count();
        $data['total_galleries'] = Gallery::count();
        $data['recent_products'] = Product::orderBy('id', 'desc')->take(5)->get();
        $data['recent_notices'] = Notice::orderBy('date', 'desc')->take(5)->get();
        return view('admin.dashboard.index', $data);
    }
}
