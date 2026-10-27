<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noter extends Model
{
    protected $fillable =
    [
        'eleve_id',
        'classe_id',
        'matiere_id',
        'annee_scolaire_id',
        'semestre',
        'mois',
        'type_note',
        'note_orale',
        'note_cours',
        'note_composition',

    ];
    public function eleve(){
        return $this -> belongsTo(Eleve::class);
    }
    public function classe(){
        return $this -> belongsTo(Classe::class,'classe_id');
    }
    public function anneeScolaire(){
        return $this -> belongsTo(anneeScolaire::class,'annee_scolaire_id');
    }
    public function matiere(){
        return $this -> belongsTo(Matiere::class);
    }
    //
}
