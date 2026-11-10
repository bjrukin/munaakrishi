<?php

namespace App\Http\Requests\Admin\Faq;

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
            'question' => 'required|string|max:500',
            'nepali_question' => 'nullable|string|max:500',
            'answer' => 'required|string',
        ];
    }
}
