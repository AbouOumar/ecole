<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_classe',
        'niveau',
        'effectif_total',
        'effectif_garcon',
        'effectif_fille',
        'nom_place',
        'annee_scolaire_id',
        'option_id'
    ];

    public function eleve(){
        return $this->hasMany(Eleve::class);
    }

    public function effectifClasse(){
        return $this->hasOne(Effectif_classe::class);
    }
    public function ins_reins(){
        return $this->hasOne(Ins_reins::class);
    }

    public function fraisScolarite(){
        return $this->hasOne(ficheRenseignement::class,'niveau','niveau');
    }
    public function option(){
        return $this->hasOne(Option::class,'id','option_id');
    }
    public function enseigners(){
        return $this -> belongsToMany(Enseigner::class, 'affecters','classe_id','enseigner_id');
    }
}
