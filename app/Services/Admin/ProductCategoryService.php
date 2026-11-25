<?php

namespace App\Services\Admin;

use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryService
{
    public function list(string $q = ''): array
    {
        $query = ProductCategory::query()->withCount('products');
        if ($q !== '') {
            $query->where('name', 'LIKE', "%{$q}%");
        }

        return [
            'categories' => $query->orderBy('rank')->orderBy('name')->get(),
            'count' => 1,
        ];
    }

    public function store(array $data): JsonResponse
    {
        $category = ! empty($data['id'])
            ? ProductCategory::findOrFail($data['id'])
            : new ProductCategory(['slug' => $this->uniqueSlug($data['name'])]);
        $creating = ! $category->exists;

        $category->fill([
            'name' => trim($data['name']),
            'rank' => $data['rank'],
            'status' => $data['status'] ?? true,
        ])->save();

        return response()->json([
            'message' => $creating ? 'Product category created successfully.' : 'Product category updated successfully.',
            'error' => null,
            'status' => $creating ? 201 : 202,
        ], $creating ? 201 : 202);
    }

    public function delete(Request $request): JsonResponse
    {
        $category = ProductCategory::findOrFail($request->integer('id'));
        if ($category->products()->exists()) {
            return response()->json([
                'message' => 'This category is assigned to products. Move those products to another category before deleting it.',
                'error' => 'category_in_use',
                'status' => 422,
            ], 422);
        }

        $category->delete();

        return response()->json(['message' => 'Product category deleted successfully.', 'error' => null, 'status' => 200]);
    }

    public function status(Request $request): JsonResponse
    {
        ProductCategory::whereKey($request->integer('id'))->update(['status' => $request->boolean('val')]);

        return response()->json(['message' => 'Category status updated successfully.', 'error' => null, 'status' => 200]);
    }

    public function rank(Request $request): JsonResponse
    {
        ProductCategory::whereKey($request->integer('id'))->update(['rank' => max(1, $request->integer('rank'))]);

        return response()->json(['message' => 'Category rank updated successfully.', 'error' => null, 'status' => 200]);
    }

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug($name) ?: 'category';
        $slug = $base;
        $suffix = 2;
        while (ProductCategory::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
