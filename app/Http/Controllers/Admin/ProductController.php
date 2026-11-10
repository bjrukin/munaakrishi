<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {
    }

    public function list(Request $request)
    {
        $data['nav'] = 'business';
        $data['sub_nav'] = 'product';
        $data['page_title'] = 'Products';
        $data['q'] = $request->q ?? '';
        $data['result'] = $this->service->list($data['q']);
        $data['order'] = Product::count();
        return view('admin.product.list', $data);
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
        $data['nav'] = 'business';
        $data['sub_nav'] = 'product';
        $data['page_title'] = ($id == 0) ? 'Add Product' : 'Edit Product';
        $data['action'] = route('admin.product.store');
        $data['row'] = Product::where('id', $id)->first();
        return view('admin.product.form', $data);
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
