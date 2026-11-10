<?php

namespace App\Http\Requests\Admin\Product;

use App\Http\Requests\RestRequest;

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
            'category' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'tag' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'image' => 'nullable',
        ];
    }
}
