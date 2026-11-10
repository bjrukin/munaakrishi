<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['nav'] = 'products';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Products';

        $dbProducts = Product::where('status', 1)->orderBy('order', 'asc')->get();

        $data['products'] = $dbProducts->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'nepali' => $p->nepali_name ?? $p->name,
                'slug' => $p->slug,
                'category' => $p->category,
                'district' => $p->district ?? 'Nepal',
                'tag' => $p->tag ?? '',
                'description' => $p->description ?? '',
                'price' => $p->price,
                'unit' => $p->unit ?? 'kg',
                'image' => $p->url_image,
            ];
        })->toArray();

        return view('site.product.index', $data);
    }

    public function detail($slug)
    {
        $productModel = Product::where('status', 1)->where('slug', $slug)->first();

        if (!$productModel) {
            $productModel = Product::where('status', 1)->first();
            if (!$productModel) {
                abort(404);
            }
        }

        $product = [
            'id' => $productModel->id,
            'slug' => $productModel->slug,
            'name' => $productModel->name,
            'nepali' => $productModel->nepali_name ?? $productModel->name,
            'category' => $productModel->category,
            'category_label' => ucfirst(str_replace('-', ' & ', $productModel->category)),
            'district' => $productModel->district ?? 'Nepal',
            'image' => $productModel->url_image,
            'tag' => $productModel->tag ?? '',
            'price' => $productModel->price,
            'unit' => $productModel->unit ?? 'kg',
            'description' => $productModel->description ?? '',
            'producer' => 'Munaa Krishi Partner Cooperative (' . ($productModel->district ?? 'Nepal') . ')',
            'producer_link' => route('farms'),
            'pack_sizes' => 'Standard packaging in ' . ($productModel->unit ?? 'kg') . ' increments',
            'storage' => 'Store in a cool, dry place away from direct sunlight.',
            'details' => $productModel->description ?? 'Grown and collected adhering to sustainable agricultural standards and tested for quality assurance.',
        ];

        $relatedModels = Product::where('status', 1)
            ->where('id', '!=', $productModel->id)
            ->where('category', $productModel->category)
            ->take(3)
            ->get();

        if ($relatedModels->isEmpty()) {
            $relatedModels = Product::where('status', 1)
                ->where('id', '!=', $productModel->id)
                ->take(3)
                ->get();
        }

        $related_products = $relatedModels->map(function ($p) {
            return [
                'name' => $p->name,
                'nepali' => $p->nepali_name ?? $p->name,
                'slug' => $p->slug,
                'category' => $p->category,
                'district' => $p->district ?? 'Nepal',
                'image' => $p->url_image,
                'description' => $p->description ?? '',
            ];
        })->toArray();

        $data['nav'] = 'products';
        $data['metahead'] = 'seo';
        $data['page_title'] = $product['name'];
        $data['product'] = $product;
        $data['related_products'] = $related_products;

        return view('site.product.detail', $data);
    }
}
