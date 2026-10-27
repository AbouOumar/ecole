<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class AnneeScolaire extends Model
{
    use HasFactory;
    protected $fillable =[
        'dateDebut',
        'DateFin',
    ];

    public function getMoisDansIntervalle()
    {
        App::setlocale('fr');
        Carbon::setLocale('fr');
        $dateDebut = Carbon::parse($this->dateDebut);
        $dateFin = Carbon::parse($this->dateFin);

        $moisListe = [];
        while ($dateDebut <= $dateFin) {
            $moisListe[] = [
                'date' => $dateDebut->format('Y-m-d'),
                'mois_numero' => $dateDebut->format('m'), // "01" pour janvier
                'mois_nom' => $dateDebut->translatedFormat('F') // "Janvier"
            ];
            $dateDebut->addMonth();
        }

        return $moisListe;
    }
}
