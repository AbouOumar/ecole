<?php

namespace App\Http\Requests\gestion_scolaire;

use Illuminate\Foundation\Http\FormRequest;

class MatiereRequest extends FormRequest
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
            'libelle_matiere'=>'required|string|max:255',
            'description'=>'required',
            'type'=>'required',
            'classes'=>'required|array',
            'classes.*'=>'exists:classes,id',
        ];
    }
}
