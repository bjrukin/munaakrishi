<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Models\Project;
use App\Services\Admin\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct(protected ProjectService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'project';
        $data['page_title'] = 'Project';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.project.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'miscellaneous';
        $data['sub_nav'] = 'project';
        $data['page_title'] =  ($id == 0) ? "Add Project" : "Edit Project";
        $data['action'] = route('admin.project.store');
        $data['row'] = Project::where('id', $id)->first();
        return view('admin.project.form', $data);
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
