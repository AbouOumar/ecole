<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coefficient extends Model
{
    protected $fillable=[
        'fiche_renseignement_id',
        'matiere_id',
        'option_id',
        'valeur',
        'clycle',
    ];

    public function fiche_renseignement(){
        return $this->belongsTo(ficheRenseignement::class, 'fiche_renseignement_id');
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    public function option(){
        return $this->belongsTo(Option::class, 'option_id');
    }
}
