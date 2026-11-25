<?php

namespace App\Http\Requests\Admin\ProductCategory;

use App\Http\Requests\RestRequest;
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
        $id = (int) $this->input('id', 0);

        return [
            'id' => ['nullable', 'integer'],
            'name' => [
                'required',
                'string',
                'max:255',
                function (string $attribute, mixed $value, Closure $fail) use ($id): void {
                    $exists = ProductCategory::query()
                        ->whereRaw('LOWER(name) = ?', [mb_strtolower(trim((string) $value))])
                        ->when($id, fn ($query) => $query->whereKeyNot($id))
                        ->exists();
                    if ($exists) {
                        $fail('The category name has already been taken.');
                    }
                },
            ],
            'rank' => ['required', 'integer', 'min:1'],
            'status' => ['sometimes', 'boolean'],
        ];
    }
}
