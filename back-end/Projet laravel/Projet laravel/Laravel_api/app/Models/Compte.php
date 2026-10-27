<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomCompte',
        'numeroCompte',
        'description',
        'solde',
        'statut'
    ] ;
    public function payement(){
        return $this->hasMany(Payement::class);
    }

    public function depenses(){
        return $this->hasMany(Depense::class);
    }




}
