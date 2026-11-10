<?php

namespace App\Http\Requests\Admin\Generalsetting;

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
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'established_year' => 'required|digits:4|integer',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'og_image' => 'required',
        ];
    }
}
