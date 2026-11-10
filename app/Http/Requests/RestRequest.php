<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class RestRequest extends FormRequest
{
    /**
     * Determine if user authorized to make this request
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        $message = null;
        $errors_data = json_decode($validator->errors(), true);
        $cnt = 1;
        foreach ($errors_data as $error) {
            if ($cnt == 1) {
                $message = $error[0];
            }
            $cnt++;
        }
        throw new HttpResponseException(response()->json(['error' => $message], 422));

    }
    abstract public function rules();
}
