<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comptabilite extends Model
{
    protected $fillable=[
        'annee_scolaire_id',
        'recette_banque',
        'depense_comptable',
        'reboursement_dette',
        'frais_loyer',
        'total_reduction_annuelle',
        'impayer_global',
    ];
}
