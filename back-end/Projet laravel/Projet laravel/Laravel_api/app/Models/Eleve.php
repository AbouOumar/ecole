<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $table = 'eleves';
    protected $primaryKey ='id';

    protected $fillable = [
        'id',
        'matricule_eleve',
        'nom_eleve',
        'prenom_eleve',
        'genre_eleve',
        'Date_naiss',
        'tel_eleve',
        'classe_id',
        'statut_scolaire',
        'photo',
    ];
    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }

    public function accueillit(){
        return $this->hasOne(Accueillit::class);
    }
    public function depart(){
        return $this->hasOne(Depart::class);
    }
    public function noter(){
        return $this->hasMany(Noter::class);
    }
    public function ins_reins(){
        return $this->hasMany(Ins_reins::class);
    }

    public function parents(){
        return $this->belongsToMany(Parents::class,'parent_eleves','eleve_id','parent_id')
        ->withPivot('lien_parente');
    }

    public function personnels(){
        return $this->belongsToMany(Personnel::class,'personnel_eleves','eleve_id','personnel_id')
        ->withPivot('lien_parente');
    }

    public function payements(){
        return $this->hasMany(Payement::class);
    }

    public function reductions(){
        return $this->hasMany(Reduction::class);
    }


}


