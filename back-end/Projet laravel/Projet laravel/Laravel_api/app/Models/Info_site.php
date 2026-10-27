<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info_site extends Model
{
    protected $fillable=[
            'id',
            'nom_ecole',
            'logo',
            'telephone_ecole',
            'adresse_ecole',
            'email_ecole',
            'description_ecole',
            'histoire_ecole',
            'slogan',
    ];
}
