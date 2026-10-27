<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapportFinancierRequest extends FormRequest
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
            'annee_scolaire_id'=> 'required|integer',
            'recette_nette_annuelle'=> 'nullable|numeric',
            'impaye_nette'=>'nullable|numeric',
            'depense_fonctionnement'=>'nullable|numeric',
            'epargne_comptable'=>'nullable|numeric',
            'epargne_nette'=>'nullable|numeric',
            'deficit'=>'nullable|numeric',
            'taux_impaye'=>'nullable|numeric'
        ];
    }
}
