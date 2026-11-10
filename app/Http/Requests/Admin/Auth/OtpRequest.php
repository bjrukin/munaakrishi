<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\RestRequest;

class OtpRequest extends RestRequest
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
            'email' => 'required|email|exists:admins,email',
        ];
    }
}
