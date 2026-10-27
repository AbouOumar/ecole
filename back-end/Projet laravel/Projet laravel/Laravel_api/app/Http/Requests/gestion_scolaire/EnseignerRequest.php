<?php

namespace App\Http\Requests\gestion_scolaire;

use Illuminate\Foundation\Http\FormRequest;

class EnseignerRequest extends FormRequest
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
            'personnel_id'=>'required|exists:personnels,id',
            'matieres'=>'required|array',
            'matieres.*'=>'exists:matieres,id',
        ];
    }
}
