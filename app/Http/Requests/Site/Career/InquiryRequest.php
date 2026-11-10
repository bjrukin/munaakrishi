<?php

namespace App\Http\Requests\Site\Career;

use App\Http\Requests\RestRequest;

class InquiryRequest extends RestRequest
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
            'job_name' => 'required',
            'job_slug' => 'required',
            'name' => 'required',
            'email' => 'required|email:filter', 
            'phone_number' => 'required',  
            'inquiry' => 'nullable',  
            'cv' => ['required', function ($attribute, $value, $fail) {
                // Check if it's a valid base64 string
                if (!preg_match('/^data:application\/pdf;base64,/', $value)) {
                    $fail('The file must be a valid PDF (base64 encoded).');
                } else {
                    // Decode and check if valid
                    $data = explode(',', $value)[1];
                    $decoded = base64_decode($data, true);
        
                    if ($decoded === false) {
                        $fail('Invalid base64 PDF data.');
                    }
                }
            }],
        ];
    }

   
}