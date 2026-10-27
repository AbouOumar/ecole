<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrevisionRecette extends Model
{
    protected $fillables = [
        'classe_id',
        'mois',
        'annee_scolaire_id',
        'recette_previsonelle_brute',
        'reduction_annuelle',
        'recette_previsonnelle_nette',
    ] ;
}
