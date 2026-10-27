<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class InsReinsRequest extends FormRequest
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
            'type'=>'required',
            'eleve_id'=>'required|integer',
            'classe_id'=>'required|integer',
            'annee_scolaire_id'=>'required|integer',
            'montant'=>'required|numeric',
            'moyentPayement'=>'required|string'
        ];
    }
}
