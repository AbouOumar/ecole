<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu_payement extends Model
{
    use HasFactory;
    protected $fillable = [
        'payement_id',
        'date_recu',
        'montant_paye'
    ] ;
    public function payement(){
        return $this->belongsTo(Payement::class) ;
    }
}
