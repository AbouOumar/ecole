<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
   use HasFactory;

   protected $fillable =[    
    'personnel_id',
    'fonction_id',
    'mois',
    'annee_scolaire_id',
    'salaire_brut',
    'salaire_net',
    'avance_salaire',
    'affaire_sociale',
    'ecolage',
    'prime',
    'disponibilite',
    'statut'

   ];
   
   public function annee_scolaire(){
    return $this -> belongsTo(AnneeScolaire::class,'annee_scolaire_id');
   }
   public function fonction(){
    return $this -> belongsTo(Fonction::class,'fonction_id');
    }

    public function personnel(){
        return $this -> belongsTo(Personnel::class, 'personnel_id');
    }
    
}
