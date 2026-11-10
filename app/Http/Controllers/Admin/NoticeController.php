<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notice\StoreRequest;
use App\Models\Notice;
use App\Services\Admin\NoticeService;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function __construct(protected NoticeService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'media';
        $data['sub_nav'] = 'notice';
        $data['page_title'] = 'Notice';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.notice.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function feature(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer', 'exists:notices,id'],
        ]);

        return $this->service->feature((int) $validated['id']);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'media';
        $data['sub_nav'] = 'notice';
        $data['page_title'] =  ($id == 0) ? "Add Notice" : "Edit Notice";
        $data['action'] = route('admin.notice.store', [], false);
        $data['row'] = Notice::where('id', $id)->first();
        return view('admin.notice.form', $data);
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
