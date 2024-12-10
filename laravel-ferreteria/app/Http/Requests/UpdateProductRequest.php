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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categories' => 'required|array', // Asegurarse de que es un array
            'categories.*' => 'exists:categories,id', // Cada categoría debe existir en la tabla de categorías
        ];
    }

    public function messages()
    {
        return [
            'categories.required' => 'Debe seleccionar al menos una categoría.',
            'categories.*.exists' => 'Alguna de las categorías seleccionadas no es válida.',
        ];
    }
}
