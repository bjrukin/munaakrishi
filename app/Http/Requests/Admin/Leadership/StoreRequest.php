<?php

namespace App\Http\Requests\Admin\Leadership;
use App\Http\Requests\RestRequest;

class StoreRequest extends RestRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'integer|nullable',
            'name' => 'required',
            'designation' => 'required',
            'summary' => 'required',
            'information' => 'required',
            'image' => 'required',
            'mobile_image' => 'required',
        ];
    }
}
