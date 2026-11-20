<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\StoreRequest;
use App\Models\About;
use App\Services\Admin\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(protected AboutService $service)
    {
    }

    public function index(Request $request)
    {
        $data['nav'] = 'about';
        $data['sub_nav'] = 'about_entry';
        $data['page_title'] = 'About Us & Company Profile';
        $data['row'] = About::first();
        $data['action'] = route('admin.about.store');

        return view('admin.about.form', $data);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function imageDelete(Request $request)
    {
        return $this->service->imageDelete($request);
    }
}
