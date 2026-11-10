<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Office\StoreRequest;
use App\Models\Office;
use App\Services\Admin\OfficeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    public function __construct(protected OfficeService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'office';
        $data['page_title'] = 'Office';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Office::count();
        return view('admin.office.list', $data);
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
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'office';
        $data['page_title'] =  ($id == 0) ? "Add Office" : "Edit Office";
        $data['action'] = route('admin.office.store');
        $data['row'] = Office::where('id', $id)->first();
        return view('admin.office.form', $data);
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
