<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactInquiryRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->has('phone')) {
            $this->merge(['phone' => preg_replace('/[\s-]/', '', (string) $this->input('phone'))]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(['general', 'farmer'])],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(?:\+977)?9[6-8]\d{8}$/'],
            'email' => ['required_if:type,general', 'nullable', 'email:rfc', 'max:255'],
            'subject' => ['required_if:type,general', 'nullable', 'string', 'max:255'],
            'message' => $this->input('type') === 'general'
                ? ['required', 'string', 'min:10', 'max:5000']
                : ['nullable', 'string', 'max:5000'],
            'district' => ['required_if:type,farmer', 'nullable', 'string', 'max:100'],
            'village' => ['nullable', 'string', 'max:255'],
            'group_type' => ['required_if:type,farmer', 'nullable', 'string', 'max:100'],
            'members' => ['nullable', 'integer', 'min:1'],
            'crops' => ['required_if:type,farmer', 'nullable', 'array', 'min:1'],
            'crops.*' => ['string', 'max:100'],
            'land' => ['required_if:type,farmer', 'nullable', 'numeric', 'gt:0'],
            'land_unit' => ['required_if:type,farmer', 'nullable', 'string', 'max:30'],
            'harvest' => ['required_if:type,farmer', 'nullable', 'numeric', 'gt:0'],
            'harvest_unit' => ['required_if:type,farmer', 'nullable', 'string', 'max:30'],
            'month' => ['nullable', 'string', 'max:30'],
            'practice' => ['nullable', 'string', 'max:100'],
            'consent' => ['exclude_unless:type,farmer', 'required', 'accepted'],
        ];
    }
}
