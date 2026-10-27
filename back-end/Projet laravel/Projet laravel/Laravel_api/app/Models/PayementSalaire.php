<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayementSalaire extends Model
{
    protected $fillable=[
        'salaire_id',
        'compte_id',
        'montant',
    ];

    public function salaire(){
        return $this->belongsTo(Salaire::class,'salaire_id');
    }
    public function compte(){
        return $this->belongsTo(Compte::class,'compte_id');
    }
}
