<?php

namespace App\Http\Requests\gestion_personnel;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
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
            'matricule_personnel' => 'nullable',
            'nom_personnel' => 'required|string|max:255',
            'prenom_personnel' => 'required|string|max:255',
            'genre_personnel' => 'required|string|max:255' ,
            'mail_personnel' => 'required|string|max:255',
            'date_nais_personnel' => 'required|date',
            'tel_personnel' => 'nullable|string',
            'adresse_personnel' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'taux_horaire' => 'nullable|integer',
            'salaire_base' => 'nullable|integer',
            'cv'=>'nullable|file|mimes:pdf',
            'peice_jointe'=>'nullable|file|mimes:pdf',
            'lien_parente'=>'nullable|string',
            'contact_urgence'=>'nullable|string',
            'fonction'=>'nullable|integer',
            //
        ];
    }
}
