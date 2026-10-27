<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable=[
        'compte_id',
        'type_depense_id',
        'typeTransaction',
        'montantTransanction',
        'piece_jointe',
        'description',
        'annee_scolaire_id'
    ];

    public function typeDepense(){
        return $this->belongsTo(TypeDepense::class,'type_depense_id');
    }

    public function compte(){
        return $this->belongsTo(Compte::class,'compte_id');
    }
}
