<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComptabiliteRequest extends FormRequest
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
            'recette_banque'=> 'nullable|integer',
            'depense_comptable'=> 'nullable|integer',
            'reboursement_dette'=> 'nullable|integer',
            'frais_loyer'=> 'nullable|integer',
            'total_reduction_annuelle'=> 'nullable|integer',
            'impayer_global'=> 'nullable|integer',
        ];
    }
}
