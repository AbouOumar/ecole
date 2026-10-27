<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [
        'typeAbsence',
        'motif',
        'idpersonne',
    ] ;

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'idpersonne');
    }
}
