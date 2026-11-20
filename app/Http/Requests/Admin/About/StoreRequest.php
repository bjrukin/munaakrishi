<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'who_we_are_label' => 'nullable|string|max:255',
            'who_we_are_title' => 'nullable|string|max:255',
            'who_we_are_reg_info' => 'nullable|string|max:255',
            'who_we_are_content' => 'nullable|string',
            'who_we_are_image' => 'nullable|string',

            'vision_title' => 'nullable|string|max:255',
            'vision_content' => 'nullable|string',

            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',

            'org_structure_label' => 'nullable|string|max:255',
            'org_structure_title' => 'nullable|string|max:255',
            'org_structure_subtitle' => 'nullable|string',
            'org_structure_image' => 'nullable|string',
            'org_structure_caption' => 'nullable|string|max:255',

            'aims_label' => 'nullable|string|max:255',
            'aims_title' => 'nullable|string|max:255',
            'aims_content' => 'nullable',

            'implementation_label' => 'nullable|string|max:255',
            'implementation_title' => 'nullable|string|max:255',
            'implementation_content' => 'nullable',

            'investment_label' => 'nullable|string|max:255',
            'investment_title' => 'nullable|string|max:255',
            'investment_content' => 'nullable',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ];
    }
}
