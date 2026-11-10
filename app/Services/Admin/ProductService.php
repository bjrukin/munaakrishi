<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    use StoreImageTrait;

    public function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Product::select('*');
            if ($q) {
                $query->where(function ($sq) use ($q) {
                    $sq->where('name', 'LIKE', '%' . $q . '%')
                       ->orWhere('nepali_name', 'LIKE', '%' . $q . '%')
                       ->orWhere('district', 'LIKE', '%' . $q . '%')
                       ->orWhere('category', 'LIKE', '%' . $q . '%');
                });
            }
            $data['products'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Product::where('id', $request->id)->update([
                $request->field_name => $request->val,
            ]);
            $msg = ($request->val == 1) ? 'Product enabled successfully.' : 'Product disabled successfully.';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request)
    {
        try {
            Product::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            return response()->json(['message' => 'Order updated successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if (!empty($request['id'])) {
                $product = Product::findOrFail($request['id']);
                $response['message'] = 'Product updated successfully.';
                $response['status'] = 202;
            } else {
                $product = new Product();
                $product->order = getMax('products', 'order') ?: (Product::count() + 1);
                $response['message'] = 'Product created successfully.';
                $response['status'] = 201;
            }

            if (isset($request['image']) && !empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/product/', Str::slug($request['name']) . '-' . time());
            } else {
                $image = $request['image'] ?? ($product->image ?? null);
            }

            $slug = !empty($request['slug']) ? Str::slug($request['slug']) : Str::slug($request['name']);
            // Ensure unique slug
            $existing = Product::where('slug', $slug)->where('id', '!=', $product->id ?? 0)->exists();
            if ($existing) {
                $slug .= '-' . time();
            }

            $product->name = $request['name'];
            $product->nepali_name = $request['nepali_name'] ?? null;
            $product->slug = $slug;
            $product->category = $request['category'] ?? 'grains';
            $product->district = $request['district'] ?? null;
            $product->tag = $request['tag'] ?? null;
            $product->description = $request['description'] ?? null;
            $product->price = !empty($request['price']) ? $request['price'] : null;
            $product->unit = $request['unit'] ?? 'kg';
            $product->image = $image;
            $product->save();

            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $product = Product::find($request->id);
            if ($product) {
                if ($product->image && Storage::disk('public')->exists('/product/' . $product->image)) {
                    Storage::disk('public')->delete('/product/' . $product->image);
                }
                $product->delete();
            }
            return response()->json(['message' => 'Product deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request)
    {
        try {
            $product = Product::find($request->id);
            if ($product) {
                $field = $request->field_name ?? 'image';
                if ($product->$field && Storage::disk('public')->exists('/product/' . $product->$field)) {
                    Storage::disk('public')->delete('/product/' . $product->$field);
                }
                $product->$field = null;
                $product->save();
            }
            return response()->json(['message' => 'Image deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
