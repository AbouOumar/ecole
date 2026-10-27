<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parents';
    
    protected $fillable = [
        'nom_parent',
        'prenom_parent',
        'telephone_parent',
        'Email_parent',
        'adresse_parent',
        'profession',
    ];


    public function eleves(){
        return $this->belongsToMany(Eleve::class,'parent_eleves','parent_id','eleve_id')
        ->withPivot('lien_parente');
    }
}