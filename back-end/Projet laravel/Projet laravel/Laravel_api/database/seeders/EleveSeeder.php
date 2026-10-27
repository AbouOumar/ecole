<?php

namespace Database\Seeders;

use App\Models\Eleve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eleve::create([
            'matricule_eleve'=> 'Billy001',
            'nom_eleve'=>'Daffé',
            'prenom_eleve'=>'Sékou Ahmed',
            'genre_eleve'=>'Masculin',
            'Date_naiss'=>'2024-10-11',
            'tel_eleve'=>'625463305',
            'photo'=>'ma_photo.png',
        ]);

        Eleve::create([
            'matricule_eleve'=> 'Billy002',
            'nom_eleve'=>'Bah',
            'prenom_eleve'=>'Fatoumata',
            'genre_eleve'=>'Féminin',
            'Date_naiss'=>'2002-10-11',
        ]);
    }
}
