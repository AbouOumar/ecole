<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volume_horaire extends Model
{
    protected $fillable=[
        'personnel_id',
        'mois',
        'annee_scolaire_id',
        'nombreHeure'
    ];

    public function personnel(){
        return $this->belongsTo(Personnel::class,'personnel_id');
    }
    public function annee_soclaire(){
        return $this->belongsTo(AnneeScolaire::class,'annee_soclaire_id');
    }

}
