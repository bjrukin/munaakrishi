<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\StoreRequest;
use App\Models\ProductCategory;
use App\Services\Admin\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(protected ProductCategoryService $service) {}

    public function list(Request $request)
    {
        return view('admin.product-category.list', [
            'nav' => 'business',
            'sub_nav' => 'product_category',
            'page_title' => 'Product Categories',
            'q' => $request->string('q')->toString(),
            'result' => $this->service->list($request->string('q')->toString()),
        ]);
    }

    public function addEdit(Request $request)
    {
        $row = ProductCategory::find($request->integer('id'));

        return view('admin.product-category.form', [
            'nav' => 'business',
            'sub_nav' => 'product_category',
            'page_title' => $row ? 'Edit Product Category' : 'Add Product Category',
            'action' => route('admin.product-category.store'),
            'row' => $row,
        ]);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request);
    }

    public function status(Request $request)
    {
        return $this->service->status($request);
    }

    public function rank(Request $request)
    {
        return $this->service->rank($request);
    }
}
