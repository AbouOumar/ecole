<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payement extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id',
        'classe_id',
        'annee_scolaire_id',
        'compte_id',
        'tranche',
        'montant_payement',
        'id_action_ecolage'
    ] ;
    public function compte(){
        return $this->belongsTo(Compte::class,'compte_id');
    }
    public function recu_payement(){
        return $this->hasMany(Payement::class);
    }

    public function eleve(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }

}