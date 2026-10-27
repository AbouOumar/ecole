<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accueillit extends Model
{
    protected $fillable = ['eleve_id', 'mois'];

    public function eleve(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }
}
