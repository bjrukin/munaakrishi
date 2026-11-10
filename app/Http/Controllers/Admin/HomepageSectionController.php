<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use App\Services\Admin\HomepageSectionService;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    public function __construct(protected HomepageSectionService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav']        = 'homepage';
        $data['sub_nav']    = 'homepage';
        $data['page_title'] = 'Page & Component Builder';
        $data['selected_page'] = $request->get('page', 'all');
        $data['result']     = $this->service->list($data['selected_page']);
        return view('admin.homepage.list', $data);
    }

    public function addEdit(Request $request)
    {
        $id = (int) ($request->id ?? 0);
        $data['nav']        = 'homepage';
        $data['sub_nav']    = 'homepage';
        $data['page_title'] = ($id > 0) ? 'Edit Component' : 'Add New Component';
        $data['action']     = route('admin.homepage.store');
        $data['row']        = ($id > 0) ? HomepageSection::findOrFail($id) : new HomepageSection(['page' => $request->get('page', 'home'), 'is_enabled' => true]);
        $data['pages']      = HomepageSection::availablePages();
        $data['types']      = HomepageSection::availableTypes();
        return view('admin.homepage.form', $data);
    }

    public function store(Request $request)
    {
        return $this->service->store($request->all());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request->id);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function order(Request $request)
    {
        return $this->service->updateOrder($request);
    }
}
