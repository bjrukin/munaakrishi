<?php

namespace App\Http\Requests\Admin\Video;

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
            'title' => 'required|string|max:255',
            'nepali_title' => 'nullable|string|max:255',
            'video_url' => 'required|string|max:500',
            'duration' => 'nullable|string|max:50',
            'image' => 'nullable',
        ];
    }
}
