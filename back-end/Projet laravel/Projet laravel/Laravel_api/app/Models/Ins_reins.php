<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ins_reins extends Model
{

    use HasFactory;
    protected $fillable=[
        'type',
        'eleve_id',
        'classe_id',
        'annee_scolaire_id',
        'montant',
        'moyentPayement'
    ];

    public function eleve(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
}
