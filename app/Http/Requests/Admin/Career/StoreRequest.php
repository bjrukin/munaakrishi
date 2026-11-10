<?php

namespace App\Http\Requests\Admin\Career;
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
            'expiry_date' => 'required',
            'name' => 'required',
            'location' => 'required',
            'department' => 'required',
            'employment_type' => 'required',
            'experience' => 'required',
            'summary' => 'required',
            'responsibility' => 'required',
            'requirement' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ];
    }
}
