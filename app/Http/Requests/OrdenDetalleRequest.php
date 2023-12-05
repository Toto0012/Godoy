<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenDetalleRequest extends FormRequest
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
            'mesa' => 'required|integer|min:1',
            'platillo' => 'required|integer|max:255',
            'precio_unitario' => 'required|integer|min:1',
            'cantidad' => 'required|integer|min:1',
            'total' => '',
            'descripcion' => 'string|max:255'
        ];
    }
}
