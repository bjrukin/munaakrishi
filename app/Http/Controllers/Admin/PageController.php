<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Models\Page;
use App\Services\Admin\PageService;
use Illuminate\Http\Request;

class PageController extends Controller {

    public function __construct(protected PageService $service) {
    }

    public function list(Request $request) {

        $data['nav'] = 'cms';
        $data['sub_nav'] = 'page';
        $data['page_title'] = 'Page';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Page::count();
        return view('admin.page.list', $data);
    }

    public function status(Request $request) {
        return $this->service->status($request);
    }

    public function addEdit(Request $request) {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'cms';
        $data['sub_nav'] = 'page';
        $data['page_title'] = ($id == 0) ? "Add Page" : "Edit Page";
        $data['action'] = route('admin.page.store');
        $data['row'] = Page::where('id', $id)->first();
        return view('admin.page.form', $data);
    }

    public function store(StoreRequest $request) {
        return $this->service->store($request->validated());
    }

    public function imageDelete(Request $request) {
        return $this->service->imageDelete($request);
    }
}
