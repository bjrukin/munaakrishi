<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Career\InquiryRequest;
use App\Models\Banner;
use App\Models\Career;
use App\Services\Site\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller {

    public function __construct(protected CareerService $service) {
    }
    public function list(Request $request) {
        $data['nav'] = 'career';
        $data['sub_nav'] = '';
        $data['page_title'] = 'Career';
        $data['banner'] = Banner::where(['name' => 'Career', 'status' => 1])->first();
        $data['careers'] = Career::where('status', '1')->where('expiry_date', '>=', date('Y-m-d'))->orderBy('id', 'desc')->get();
        return view('site.career.list', $data);
    }

    public function detail($slug) {
        $data['nav'] = 'career';
        $data['sub_nav'] = '';
        $data['page_title'] = 'Career';
        $data['banner'] = Banner::where(['name' => 'Career', 'status' => 1])->first();
        $data['row'] = Career::where(['slug' => $slug, 'status' => 1])->first();
        if ($data['row']) {
            return view('site.career.detail', $data);
        } else {
            abort(404);
        }
    }

    public function submit(InquiryRequest $request) {
        return $this->service->submit($request->validated());
    }
}
