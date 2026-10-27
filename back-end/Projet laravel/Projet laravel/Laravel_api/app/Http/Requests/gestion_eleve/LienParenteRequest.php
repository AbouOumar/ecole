<?php

namespace App\Http\Requests\gestion_eleve;

use Illuminate\Foundation\Http\FormRequest;

class LienParenteRequest extends FormRequest
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
            'lien_parente'=> 'required|string',
            'parent_id'=> 'nullable|integer'
        ];
    }
}
