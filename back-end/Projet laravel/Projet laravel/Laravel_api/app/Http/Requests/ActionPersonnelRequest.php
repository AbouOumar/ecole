<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionPersonnelRequest extends FormRequest
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
            'personnel_id'=>'required|integer',
            'mois'=>'required|string',
            'annee_scolaire_id'=>'required|integer',
            'montant'=>'required|integer',
            'type'=>'required|string',
            'compte_id'=>'required|integer',
            'fonction'=>'required|string',
            'id_action_ecolage'=>'nullable|integer'
            //
        ];
    }
}
