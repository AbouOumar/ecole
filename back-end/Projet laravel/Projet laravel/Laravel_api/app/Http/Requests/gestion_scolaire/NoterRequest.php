<?php

namespace App\Http\Requests\gestion_scolaire;

use Illuminate\Foundation\Http\FormRequest;

class NoterRequest extends FormRequest
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
            'matiere_id'=>'required|integer',
            'note_cours'=>'nullable|numeric',
            'note_composition'=>'nullable|numeric',
            'type_note'=>'required|string',
            'note_orale'=>'nullable|integer'
            //
        ];
    }
}
