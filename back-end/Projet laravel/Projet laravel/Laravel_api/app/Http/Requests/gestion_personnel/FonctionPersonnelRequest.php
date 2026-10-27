<?php

namespace App\Http\Requests\gestion_personnel;

use Illuminate\Foundation\Http\FormRequest;

class FonctionPersonnelRequest extends FormRequest
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
            'personnel_id'=> 'required',
            'fonction_id'=> 'required',
            'statut_fonction'=> 'required|string|max:255'
            //
        ];
        
    }
}
