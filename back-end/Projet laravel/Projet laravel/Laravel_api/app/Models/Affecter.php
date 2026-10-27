<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affecter extends Model
{
    protected $fillable = [
        'enseigner_id',
        'classe_id',
        'annee_scolaire_id',
    ];
    public function enseigner()
    {
        return $this -> belongsTo(Enseigner::class,'enseigner_id');
    }
    public function classe()
    {
        return $this -> belongsTo(Classe::class,'classe_id');
    }
}
