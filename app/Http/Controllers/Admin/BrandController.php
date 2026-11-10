<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct(protected BrandService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'brand';
        $data['page_title'] = 'Brand';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.brand.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'brand';
        $data['page_title'] =  ($id == 0) ? "Add Brand" : "Edit Brand";
        $data['action'] = route('admin.brand.store');
        $data['row'] = Brand::where('id', $id)->first();
        return view('admin.brand.form', $data);
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
