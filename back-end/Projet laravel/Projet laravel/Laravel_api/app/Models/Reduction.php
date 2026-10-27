<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id',
        'montant_reduction',
        'tranche',
        'classe_id',
        'annee_scolaire_id'
    ] ;

    public function eleve(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
}
