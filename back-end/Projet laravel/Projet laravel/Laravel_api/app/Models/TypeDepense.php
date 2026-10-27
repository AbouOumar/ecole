<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeDepense extends Model
{
    protected $fillable=[
        'libelle',
        'description'
    ];

    public function depenses(){
        return $this->hasMany(Depense::class);
    }
}
