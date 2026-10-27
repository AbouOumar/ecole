<?php

namespace App\Http\Requests\gestion_scolaire;

use Illuminate\Foundation\Http\FormRequest;

class VolumeHoraireRequest extends FormRequest
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
            'nombreHeure'=>'required|integer'
            //
        ];
    }
}
