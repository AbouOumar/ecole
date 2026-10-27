<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    protected $fillable = ['eleve_id', 'mois','motif','annee_scolaire_id','classe_id'];

    public function eleve(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }
}
