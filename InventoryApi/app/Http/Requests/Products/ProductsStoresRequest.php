<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoresRequest extends FormRequest
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
            'category_id' => "required|array|exists:categories,id",
            'supplier_id' => "nullable|array|exists:suppliers,id",
            'productName' => "required|max:255",
            'productCode' => "nullable|string|unique:products,productCode|max:255",
            'root' => "nullable|string",
            'buyingPrice' => "nullable",
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'sellingPrice' => 'required|string',
            'buyingDate' => 'nullable|date',
            'productQuantity' => 'required|number',
        ];
    }
}
