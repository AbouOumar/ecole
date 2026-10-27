<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'matricule_personnel',
        'nom_personnel',
        'prenom_personnel',
        'genre_personnel',
        'date_nais_personnel',
        'mail_personnel',
        'tel_personnel',
        'adresse_personnel',
        'photo',
        'cv',
        'peice_jointe',
        'lien_parente',
        'contact_urgence',
        'taux_horaire',
        'salaire_base',

    ];
    public function fonction_personnel(){
        return $this -> hasMany(Fonction_personnel::class);
    }
    public function matieres(){
        return $this -> belongsToMany(Matiere::class, 'enseigners','personnel_id','matiere_id');
    }

    public function fonctions(){
        return $this -> belongsToMany(Fonction::class, 'fonction_personnels','personnel_id','fonction_id');
    }

    public function salaires(){
        return $this -> hasMany(Salaire::class);
    }

    public function enseigner(){
        return $this -> hasMany(Enseigner::class);
    }

    public function eleves(){
        return $this->belongsToMany(Eleve::class,'personnel_eleves','personnel_id','eleve_id')
        ->withPivot('lien_parente');
    }
    
}
