<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_fonction',
        'description_fonction'
    ];

    public function fonction_personnel(){
        return $this -> hasOne(Fonction_personnel::class);
    }
    public function personnels(){
        return $this -> belongsToMany(Personnel::class, 'fonction_personnels','fonction_id','personnel_id');
    }
}
