<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Achievement\StoreRequest;
use App\Models\Achievement;
use App\Services\Admin\AchievementService;
use Illuminate\Http\Request;

class AchievementController extends Controller
{

    public function __construct(protected AchievementService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'about';
        $data['sub_nav'] = 'achievement';
        $data['page_title'] = 'Achievement';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.achievement.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'about';
        $data['sub_nav'] = 'achievement';
        $data['page_title'] =  ($id == 0) ? "Add Achievement" : "Edit Achievement";
        $data['action'] = route('admin.achievement.store');
        $data['row'] = Achievement::where('id', $id)->first();
        return view('admin.achievement.form', $data);
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
