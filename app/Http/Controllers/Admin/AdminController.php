<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(protected AdminService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'admin';
        $data['sub_nav'] = '';
        $data['page_title'] = 'System User';
        $per_page = 10;
        $page = ($request->has('page') && !empty($request->page)) ? $request->page : 1;
        $data['q'] = ($request->has('q') && !empty($request->q)) ? $request->q : '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.admin.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'admin';
        $data['sub_nav'] = '';
        $data['page_title'] =  ($id == 0) ? "Add System User" : "Edit System User";
        $data['action'] = route('admin-admin-addaction');
        $data['row'] = Admin::where('id', $id)->first();
        $data['roles'] = Role::where('id', '<>', 1)->get();
        return view('admin.admin.add', $data);
    }

    public function addAction(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request);
    }
}
