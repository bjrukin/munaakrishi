<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Career\StoreRequest;
use App\Models\Career;
use App\Services\Admin\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function __construct(protected CareerService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'career';
        $data['sub_nav'] = 'career';
        $data['page_title'] = 'Career';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.career.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'career';
        $data['sub_nav'] = 'career';
        $data['page_title'] =  ($id == 0) ? "Add Career" : "Edit Career";
        $data['action'] = route('admin.career.store');
        $data['row'] = Career::where('id', $id)->first();
        return view('admin.career.form', $data);
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
