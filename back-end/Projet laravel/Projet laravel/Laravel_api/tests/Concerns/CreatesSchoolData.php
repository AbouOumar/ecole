<?php

namespace Tests\Concerns;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\Sanctum;

/**
 * Jeu de données minimal (année, classe, élève, matière, compte) pour les tests.
 */
trait CreatesSchoolData
{
    protected function authenticate(string $droit = 'DG', int $id = 1): void
    {
        Sanctum::actingAs((new User())->forceFill(['id' => $id, 'Droit' => $droit]));
    }

    /** @return array{annee:int, classe:int, eleve:int, matiere:int, compte:int} */
    protected function seedSchool(): array
    {
        $now = now();

        $annee = DB::table('annee_scolaires')->insertGetId([
            'dateDebut' => '2024-10-01', 'DateFin' => '2025-07-31',
            'created_at' => $now, 'updated_at' => $now,
        ]);
        $classe = DB::table('classes')->insertGetId([
            'nom_classe' => '7ème A', 'niveau' => 7, 'nom_place' => 40,
            'annee_scolaire_id' => $annee, 'created_at' => $now, 'updated_at' => $now,
        ]);
        $eleve = DB::table('eleves')->insertGetId([
            'matricule_eleve' => 'MAT001', 'nom_eleve' => 'Diallo', 'prenom_eleve' => 'Mariam',
            'genre_eleve' => 'Féminin', 'Date_naiss' => '2012-05-10', 'classe_id' => $classe,
            'created_at' => $now, 'updated_at' => $now,
        ]);
        $matiere = DB::table('matieres')->insertGetId([
            'libelle_matiere' => 'Mathématiques', 'coefficient' => 4, 'heures_enseigner' => 5,
            'description' => 'Maths', 'type' => 'principale',
            'created_at' => $now, 'updated_at' => $now,
        ]);
        $compte = DB::table('comptes')->insertGetId([
            'nomCompte' => 'Caisse', 'numeroCompte' => 1, 'description' => 'Caisse principale',
            'solde' => 0, 'statut' => 'actif', 'created_at' => $now, 'updated_at' => $now,
        ]);

        return compact('annee', 'classe', 'eleve', 'matiere', 'compte');
    }
}
