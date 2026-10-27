<?php

namespace App\Models;

use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction_personnel extends Model
{
    use HasFactory;

    protected $fillable =[
        'personnel_id',
        'fonction_id',
        'statut_fonction',
    ];
    public function fonction(){
        return $this -> belongsTo(Fonction::class,'fonction_id');
    }
    public function salaire(){
        return $this -> belongsTo(Salaire::class,'salaire_id');
    }
    public function personnel(){
        return $this -> belongsTo(Personnel::class,'personnel_id');
    }
    //
}
