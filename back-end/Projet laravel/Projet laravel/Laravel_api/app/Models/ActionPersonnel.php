<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionPersonnel extends Model
{
    protected $fillable=[
        'personnel_id',
        'mois',
        'annee_scolaire_id',
        'type',
        'montant',
        'compte_id',
        'fonction',
        'id_action_ecolage',

    ];

    public function personnel(){
        return $this->belongsTo(Personnel::class,'personnel_id');
    }
    public function annee_soclaire(){
        return $this->belongsTo(AnneeScolaire::class,'annee_soclaire_id');
    }
}
