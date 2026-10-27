<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
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
            'nom_classe'=>'required|string',
            'niveau'=>'required|integer',
            'nom_place'=>'required|integer',
            'option'=>'nullable|string'
        ];
        // 'effectif_total' => 'sometimes|nullable|integer',
        // 'effectif_garcon' => 'sometimes|nullable|integer',
        // 'effectif_fille' => 'sometimes|nullable|integer',
    }
}
