<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreRequest;
use App\Models\Banner;
use App\Services\Admin\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function __construct(protected BannerService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'media';
        $data['sub_nav'] = 'banner';
        $data['page_title'] = 'Banner';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.banner.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'media';
        $data['sub_nav'] = 'banner';
        $data['page_title'] =  ($id == 0) ? "Add Banner" : "Edit Banner";
        $data['action'] = route('admin.banner.store');
        $data['row'] = Banner::where('id', $id)->first();
        return view('admin.banner.form', $data);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request);
    }

    public function imageDelete(Request $request)
    {
        return $this->service->imageDelete($request);
    }
}
