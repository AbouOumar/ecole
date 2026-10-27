<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emploi_temps extends Model
{
    protected $fillable =
    [
        'classe_id',
        'jour',
        'heure_debut',
        'heure_fin',
        'matiere_id',
        'personnel_id',
    ];
    public function classe(){
        return $this -> belongsTo(Classe::class);
    }
    public function matiere(){
        return $this -> belongsTo(Matiere::class);
    }
    public function personnel(){
        return $this -> belongsTo(Personnel::class);
    }
    //
}
