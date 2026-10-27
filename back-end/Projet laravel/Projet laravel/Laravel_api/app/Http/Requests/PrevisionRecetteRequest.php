<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrevisionRecetteRequest extends FormRequest
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
            'mois'=> 'required|string',
            'annee_scolaire_id'=> 'required|integer',
            'recette_previsonelle_brute'=> 'required|numeric',
            'reduction_annuelle'=> 'required|numeric',
            'recette_previsonnelle_nette'=> 'required|numeric',
        ];
    }
}
