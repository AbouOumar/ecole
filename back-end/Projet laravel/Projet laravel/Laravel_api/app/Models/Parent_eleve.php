<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_eleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'eleve_id',
        'lien_parente'
    ] ;
}
