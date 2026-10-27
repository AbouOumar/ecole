<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ficheRenseignementRequest extends FormRequest
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
            'niveau'=> 'nullable|integer',
            'frais_inscription'=> 'nullable|integer',
            'frais_reinscription'=> 'nullable|integer',
            'frais_scolariteTrimestrielle'=> 'nullable|integer',
            'tranche1'=> 'nullable|integer',
            'tranche2'=> 'nullable|integer',
            'tranche3'=> 'nullable|integer'
        ];
    }
}
