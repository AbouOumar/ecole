<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class EffectifClasseRequest extends FormRequest
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
            'classe_id'=> 'required|integer',
            'total_eleve'=> 'required|integer',
            'mois'=> 'required',
            'annee_scolaire_id'=> 'required|integer'
        ];
    }
}
