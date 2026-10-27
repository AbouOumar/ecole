<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelEleve extends Model
{
    
    protected $fillable =[
        'personnel_id',
        'eleve_id',
        'lien_parente'
    ];

}
