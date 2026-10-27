<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Effectif_classe extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'total_eleve',
        'mois',
        'annee_scolaire_id'
    ] ;

    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
}
