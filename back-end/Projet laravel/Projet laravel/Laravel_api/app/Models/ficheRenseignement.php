<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ficheRenseignement extends Model
{
    protected $fillable=[
        'niveau',
        'frais_inscription',
        'frais_reinscription',
        'tranche1',
        'tranche2',
        'tranche3',
    ];
}

