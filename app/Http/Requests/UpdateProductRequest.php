<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('product')->id ?? null;

        return [
            'category_id' => ['required','exists:categories,id'],
            'name'        => ['required','string','max:255'],
            'sku'         => ['required','string','max:50', Rule::unique('products','sku')->ignore($id)],
            'price'       => ['required','numeric','min:0'],
            'stock'       => ['required','integer','min:0'],
            'description' => ['nullable','string','max:5000'],
        ];
    }
}
