<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreRequest;
use App\Models\Team;
use App\Services\Admin\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function __construct(protected TeamService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'about';
        $data['sub_nav'] = 'team';
        $data['page_title'] = 'Team';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Team::count();
        return view('admin.team.list', $data);
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
        $data['sub_nav'] = 'team';
        $data['page_title'] =  ($id == 0) ? "Add Team" : "Edit Team";
        $data['action'] = route('admin.team.store');
        $data['row'] = Team::where('id', $id)->first();
        return view('admin.team.form', $data);
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
