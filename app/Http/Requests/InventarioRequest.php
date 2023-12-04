<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
        return [
            'nombre' => 'required|string|max:255|min:4',
            'habia' => 'required|decimal|min:0',
            'entro' => 'required|decimal|min:0',
            'quedo' => 'required|decimal|min:0',
            'gasto' => 'required|decimal|min:0',
            'precio' => 'required|decimal|min:0',
            'fecha' => 'required',
        ];
    }
}
