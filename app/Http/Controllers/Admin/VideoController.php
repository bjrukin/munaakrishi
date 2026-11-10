<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Models\Video;
use App\Services\Admin\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct(protected VideoService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'media';
        $data['sub_nav'] = 'video';
        $data['page_title'] = 'Videos';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Video::count();
        return view('admin.video.list', $data);
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
        $data['nav'] = 'media';
        $data['sub_nav'] = 'video';
        $data['page_title'] = ($id == 0) ? 'Add Video' : 'Edit Video';
        $data['action'] = route('admin.video.store');
        $data['row'] = Video::where('id', $id)->first();
        return view('admin.video.form', $data);
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
