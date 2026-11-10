<?php

namespace App\Http\Requests\Admin\Farm;

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
            'province' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'altitude' => 'nullable|string|max:100',
            'practice' => 'nullable|string|max:255',
            'produce' => 'nullable|string|max:255',
            'farmers_count' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable',
        ];
    }
}
