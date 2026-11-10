<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seo\StoreRequest;
use App\Models\Seo;
use App\Services\Admin\SeoService;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function __construct(protected SeoService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'settings';
        $data['sub_nav'] = 'seo';
        $data['page_title'] = 'Seo';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        return view('admin.seo.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'settings';
        $data['sub_nav'] = 'seo';
        $data['page_title'] =  ($id == 0) ? "Add Seo" : "Edit Seo";
        $data['action'] = route('admin.seo.store');
        $data['row'] = Seo::where('id', $id)->first();
        return view('admin.seo.form', $data);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request);
    }
}
