<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Generalsetting\StoreRequest;
use App\Services\Admin\GeneralsettingService;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralsettingController extends Controller
{

    public function __construct(protected GeneralsettingService $service)
    {
    }

    public function index(Request $request)
    {
       
        $data['nav'] = 'settings';
        $data['sub_nav'] = 'general_setting';
        $data['page_title'] = 'General Setting';
        $data['row'] = GeneralSetting::first();
        $data['action'] = route('admin.generalsetting.store');
        return view('admin.generalsetting.form', $data);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function imageDelete(Request $request)
    {
        return $this->service->imageDelete($request);
    }
}
