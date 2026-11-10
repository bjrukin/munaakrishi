<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Farm\StoreRequest;
use App\Models\Farm;
use App\Services\Admin\FarmService;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function __construct(protected FarmService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'business';
        $data['sub_nav'] = 'farm';
        $data['page_title'] = 'Partner Farms';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Farm::count();
        return view('admin.farm.list', $data);
    }

    public function order(Request $request)
    {
        return $this->service->order($request);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = $request->id ?? 0;
        $data['nav'] = 'business';
        $data['sub_nav'] = 'farm';
        $data['page_title'] = ($id == 0) ? 'Add Partner Farm' : 'Edit Partner Farm';
        $data['action'] = route('admin.farm.store');
        $data['row'] = Farm::where('id', $id)->first();
        return view('admin.farm.form', $data);
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
