<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Production\StoreRequest;
use App\Models\Production;
use App\Services\Admin\ProductionService;
use Illuminate\Http\Request;

class ProductionController extends Controller
{

    public function __construct(protected ProductionService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'production';
        $data['sub_nav'] = 'production';
        $data['page_title'] = 'Production';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Production::count();
        return view('admin.production.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }
    

    public function order(Request $request)
    {
        return $this->service->order($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'production';
        $data['sub_nav'] = 'production';
        $data['page_title'] =  ($id == 0) ? "Add Production" : "Edit Production";
        $data['action'] = route('admin.production.store');
        $data['row'] = Production::where('id', $id)->first();
        return view('admin.production.form', $data);
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
