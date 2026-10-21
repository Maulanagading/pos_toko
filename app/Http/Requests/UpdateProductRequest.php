<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        $productId = $product instanceof Product ? $product->id : ($this->product?->id ?? $product);

        return [
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|max:20|unique:products,code,'.$productId,
            'name' => 'required|string|max:150',
            'unit' => 'required|string|max:20',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.unique' => 'Kode produk sudah digunakan, gunakan kode lain.',
        ];
    }
}
