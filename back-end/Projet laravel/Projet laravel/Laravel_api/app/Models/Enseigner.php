<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseigner extends Model
{

    protected $fillable = [
        'matiere_id',
        'personnel_id',
    ];

    public function personnel()
    {
        return $this -> belongsTo(Personnel::class,'personnel_id');
    }
    public function matiere()
    {
        return $this -> belongsTo(Matiere::class,'matiere_id');
    }

    public function classes(){
        return $this -> belongsToMany(Classe::class, 'affecters','enseigner_id','classe_id');
    }
}
