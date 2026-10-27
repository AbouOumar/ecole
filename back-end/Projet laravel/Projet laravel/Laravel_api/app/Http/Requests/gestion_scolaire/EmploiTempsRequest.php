<?php

namespace App\Http\Requests\gestion_scolaire;

use Illuminate\Foundation\Http\FormRequest;

class EmploiTempsRequest extends FormRequest
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
            'emplois' => 'required|array',
            'emplois.*.classe_id' => 'required|integer',
            'emplois.*.jour' => 'required|string',
            'emplois.*.debut' => 'required|string',
            'emplois.*.fin' => 'required|string',
            'emplois.*.matiere_id' => 'required|integer',
            'emplois.*.personnel_id' => 'required|integer',
        ];
    }
}