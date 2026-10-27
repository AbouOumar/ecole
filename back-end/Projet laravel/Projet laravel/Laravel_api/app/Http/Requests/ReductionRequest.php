<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReductionRequest extends FormRequest
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
            'eleve_id' => 'required|integer',
            'montant_reduction' => 'required|integer',
            'tranche' => 'required|string',
            'classe_id' => 'required|integer',
            'annee_scolaire_id' => 'nullable|integer'
        ];
    }
}
