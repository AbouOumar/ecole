<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
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
            'nom_parent' => 'required|string|max:255',
            'prenom_parent' => 'required|string|max:255',
            'telephone_parent' => 'required|string|max:255',
            'Email_parent' => 'nullable|string|max:255',
            'adresse_parent' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
        ];
    } 
}
