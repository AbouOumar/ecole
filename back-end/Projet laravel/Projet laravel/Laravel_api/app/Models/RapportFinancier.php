<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportFinancier extends Model
{
    protected $fillable=[
        'annee_scolaire_id',
        'recette_nette_annuelle',
        'impaye_nette',
        'depense_fonctionnement',
        'epargne_comptable',
        'epargne_nette',
        'deficit',
        'taux_impaye'
    ];
}
