<?php

namespace Database\Seeders;

use App\Models\Noter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Noter::create([
            "eleve_id"=> 1,
            "matiere_id"=> 1,
            "note_cours"=> 17,
            "type_note"=> "Evaluation",
            "note_orale"=> 19,
            "note_composition"=> 0,
        ]);
        Noter::create([
            "eleve_id"=> 1,
            "matiere_id"=> 1,
            "note_cours"=> 0,
            "type_note"=> "Composition",
            "note_orale"=> 0,
            "note_composition"=> 14,
        ]);
    }
}
