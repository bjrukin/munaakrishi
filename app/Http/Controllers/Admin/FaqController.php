<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\StoreRequest;
use App\Models\Faq;
use App\Services\Admin\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct(protected FaqService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'support';
        $data['sub_nav'] = 'faq';
        $data['page_title'] = 'Frequently Asked Questions';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Faq::count();
        return view('admin.faq.list', $data);
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
        $data['nav'] = 'support';
        $data['sub_nav'] = 'faq';
        $data['page_title'] = ($id == 0) ? 'Add FAQ' : 'Edit FAQ';
        $data['action'] = route('admin.faq.store');
        $data['row'] = Faq::where('id', $id)->first();
        return view('admin.faq.form', $data);
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
