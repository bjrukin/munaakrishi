<?php

namespace App\Http\Requests\Admin\Gallery;
use App\Http\Requests\RestRequest;

class ImageRequest extends RestRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gallery_id' => 'required|integer',
            'image' => 'required',
        ];
    }
}
