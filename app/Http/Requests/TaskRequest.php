<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        if ($this->isMethod('put') && $this->has('status') && !$this->has('title') && !$this->has('description')) {
            return [
                'status' => ['required', 'in:pending,completed'],
            ];
        }

        return [
            'title' => ['required', 'string', 'max:160'],
            'description' => ['required', 'string'],
            'status' => ['nullable', 'in:pending,completed'],
        ];
    }

    public function messages() : array
    {
        return [
            'title' => 'El titulo es requerido',
            'title.max' => 'Debe agregar máximo 160 caracteres',
            'description' => 'La descripción es requerida',
            'status' => 'El estado es requerido',
            'status.in' => 'El estado debe ser "Pendiente" o "Completado"',
        ];
    }
}
