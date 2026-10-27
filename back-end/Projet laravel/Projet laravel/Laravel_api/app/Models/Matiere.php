<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable =
    [
        'libelle_matiere',
        'description',
        'type',
    ];
    
    public function personnels(){
        return $this -> belongsToMany(Personnel::class, 'enseigners','matiere_id','personnel_id');
    }
    public function noter(){
        return $this->hasMany(Noter::class);
    }
    public function emploi_temps() 
    {
        return $this->hasOne(Emploi_temps::class);
    }

    public function enseigner() 
    {
        return $this->hasMany(Enseigner::class);
    }
    //
}
