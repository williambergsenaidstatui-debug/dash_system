<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage-products') ?? false;
    }

    protected function prepareForValidation(): void
    {
        if (is_string($this->input('price'))) {
            $this->merge(['price' => str_replace(',', '.', trim($this->input('price')))]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'price' => ['required', 'numeric', 'decimal:0,2', 'min:5', 'max:99999999.99'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Informe o nome do produto.',
            'price.required' => 'Informe o preço do produto.',
            'price.numeric' => 'Informe um preço válido, como 49,90.',
            'price.decimal' => 'Use no máximo duas casas decimais no preço.',
            'price.min' => 'O preço mínimo é R$ 5,00.',
            'price.max' => 'O preço máximo é R$ 99.999.999,99.',
        ];
    }
}
