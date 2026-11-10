<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\StoreRequest;
use App\Models\Testimonial;
use App\Services\Admin\TestimonialService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function __construct(protected TestimonialService $service)
    {
    }

    public function list(Request $request)
    {
        
        $data['nav'] = 'media';
        $data['sub_nav'] = 'testimonial';
        $data['page_title'] = 'Testimonial';
        $per_page = 50;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.testimonial.list', $data);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function addEdit(Request $request)
    {
        $id = ($request->id) ? $request->id : 0;
        $data['nav'] = 'media';
        $data['sub_nav'] = 'testimonial';
        $data['page_title'] =  ($id == 0) ? "Add Testimonial" : "Edit Testimonial";
        $data['action'] = route('admin.testimonial.store');
        $data['row'] = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.form', $data);
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
