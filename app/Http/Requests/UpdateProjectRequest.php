<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'description' => 'string|max:500',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome del progetto è obbligatorio!',
            'name.max' => 'Il nome del progetto non può contenere più di 50 caratteri',
            'description.max' => 'La descrizione del progetto non può contenere più di 500 caratteri',
            'type_id.exists' => 'La categoria non esiste',
            'technologies.exists' => 'La tecnologia non esiste',

        ];
    }
}
