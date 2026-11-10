<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Leadership\StoreRequest;
use App\Models\Leadership;
use App\Services\Admin\LeadershipService;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{

    public function __construct(protected LeadershipService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'about';
        $data['sub_nav'] = 'leadership';
        $data['page_title'] = 'Leadership';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Leadership::count();
        return view('admin.leadership.list', $data);
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
        $data['nav'] = 'about';
        $data['sub_nav'] = 'leadership';
        $data['page_title'] =  ($id == 0) ? "Add Leadership" : "Edit Leadership";
        $data['action'] = route('admin.leadership.store');
        $data['row'] = Leadership::where('id', $id)->first();
        return view('admin.leadership.form', $data);
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
