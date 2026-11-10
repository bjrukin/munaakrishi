<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\History\StoreRequest;
use App\Models\History;
use App\Services\Admin\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function __construct(protected HistoryService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'about';
        $data['sub_nav'] = 'history';
        $data['page_title'] = 'History';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.history.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'about';
        $data['sub_nav'] = 'history';
        $data['page_title'] =  ($id == 0) ? "Add History" : "Edit History";
        $data['action'] = route('admin.history.store');
        $data['row'] = History::where('id', $id)->first();
        return view('admin.history.form', $data);
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
