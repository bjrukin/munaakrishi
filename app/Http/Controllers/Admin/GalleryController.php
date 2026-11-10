<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gallery\ImageRequest;
use App\Http\Requests\Admin\Gallery\StoreRequest;
use App\Models\Gallery;
use App\Services\Admin\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller {

    public function __construct(protected GalleryService $service) {
    }

    public function list(Request $request) {
        $data['nav'] = 'media';
        $data['sub_nav'] = 'gallery';
        $data['page_title'] = 'Gallery';
        $per_page = 10;
        $page = $request->page ?? 1;
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($per_page, $page, $data['q']);
        return view('admin.gallery.list', $data);
    }

    public function status(Request $request) {
        return $this->service->status($request);
    }
    public function addEdit(Request $request) {
        $id = ($request->id) ? $request->id : 0;
        $data['type'] = $request->type ?? 'addEdit';
        $data['nav'] = 'media';
        $data['sub_nav'] = 'gallery.add_edit';
        $data['page_title'] = ($id == 0) ? "Add Gallery" : "Edit Gallery";
        $data['action'] = route('admin.gallery.store');
        $data['row'] = Gallery::where('id', $id)->first();
        return view('admin.gallery.form', $data);
    }

    public function store(StoreRequest $request) {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request) {
        return $this->service->delete($request);
    }

    public function imageDelete(Request $request) {
        return $this->service->imageDelete($request);
    }

    //for images
    public function images(Request $request) {
        $data['cnt'] = 1;
        $data['gallery'] = Gallery::with('images')->where('id', $request->id)->first();
        return view('admin.gallery.image', $data);
    }

    public function saveImages(ImageRequest $request) {
        return $this->service->saveImages($request->validated());
    }

    public function imagesDelete(Request $request) {
        return $this->service->imagesDelete($request);
    }

    public function imageOrder(Request $request) {
        return $this->service->imageOrder($request);
    }

}
