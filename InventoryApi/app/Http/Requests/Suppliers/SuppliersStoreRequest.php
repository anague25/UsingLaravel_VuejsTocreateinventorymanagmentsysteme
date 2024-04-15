<?php

namespace App\Http\Requests\Suppliers;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|string|unique:employees,name|max:255",
            'shopName' => "required|string|unique:employees,name|max:255",
            'email' => "required|string|unique:employees,email|max:255",
            'phone' => "required|string|employees:unique,phone",
            'address' => "required|string|max:255",
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
        ];
    }
}
