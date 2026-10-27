<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispenserDans extends Model
{
    protected $fillable=[
        'matiere_id',
        'classe_id'
    ];

    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function matiere(){
        return $this->belongsTo(matiere::class, 'matiere_id');
    }
}
