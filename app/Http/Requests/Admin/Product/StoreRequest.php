<?php

namespace App\Http\Requests\Admin\Product;

use App\Http\Requests\RestRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Closure;

class StoreRequest extends RestRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'integer|nullable',
            'name' => 'required|string|max:255',
            'nepali_name' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'product_category_id' => [
                'required',
                'integer',
                function (string $attribute, mixed $value, Closure $fail): void {
                    $currentCategoryId = Product::whereKey($this->integer('id'))->value('product_category_id');
                    $valid = ProductCategory::whereKey($value)
                        ->where(fn ($query) => $query->where('status', true)->orWhere('id', $currentCategoryId))
                        ->exists();
                    if (! $valid) {
                        $fail('Please select an active product category.');
                    }
                },
            ],
            'district' => 'nullable|string|max:100',
            'tag' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'detail' => 'nullable|string',
            'grown_by' => 'nullable|string|max:255',
            'storage' => 'nullable|string',
            'pack_size' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'image' => 'nullable',
            'outlet_ids' => 'nullable|array',
            'outlet_ids.*' => 'integer|distinct|exists:offices,id',
        ];
    }
}
