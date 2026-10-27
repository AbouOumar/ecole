<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class PayementRequest extends FormRequest
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
            'eleve_id'=>'required|integer',
            'classe_id'=>'required|integer',
            'annee_scolaire_id'=>'nullable|integer',
            'compte_id'=>'required|integer',
            'tranche'=>'required|string',
            'montant_payement'=>'required|integer',
            'id_action_ecolage'=>'nullable|integer'
        ];
    }
}
