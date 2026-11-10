<?php

namespace App\Http\Requests\Admin\Auth;
use App\Http\Requests\RestRequest;

class SavePasswordRequest extends RestRequest
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
            'otp' => 'required|integer|exists:password_reset_tokens,token',
            'new_password' => 'required',
            'password_confirmation' => 'same:new_password',
        ];
    }
}
