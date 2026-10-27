<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class AutorisationTest extends TestCase
{
    use CreatesSchoolData, RefreshDatabase;

    private function paiement(array $ids): array
    {
        return [
            'eleve_id' => $ids['eleve'], 'classe_id' => $ids['classe'], 'compte_id' => $ids['compte'],
            'tranche' => '1ère Tranche', 'montant_payement' => 1000, 'id_action_ecolage' => 0,
        ];
    }

    public function test_un_visiteur_non_connecte_recoit_401(): void
    {
        $this->getJson('/api/list-payement')->assertStatus(401);
        $this->postJson('/api/create-payement', [])->assertStatus(401);
    }

    public function test_un_eleve_n_accede_ni_en_lecture_ni_en_ecriture_aux_finances(): void
    {
        $ids = $this->seedSchool();
        $this->authenticate('eleve');

        $this->getJson('/api/list-payement')->assertStatus(403);
        $this->postJson('/api/create-payement', $this->paiement($ids))->assertStatus(403);
        $this->assertDatabaseCount('payements', 0);
    }

    public function test_un_enseignant_peut_noter_mais_pas_encaisser(): void
    {
        $ids = $this->seedSchool();
        $this->authenticate('Enseignant');

        $this->postJson('/api/create-noter', [
            'eleve_id' => $ids['eleve'], 'matiere_id' => $ids['matiere'], 'type_note' => 'mensuelle',
            'note_cours' => 10, 'note_composition' => 12,
        ])->assertOk();

        $this->postJson('/api/create-payement', $this->paiement($ids))->assertStatus(403);
        $this->postJson('/api/create-eleve', [])->assertStatus(403);
    }

    public function test_un_eleve_ne_peut_pas_ecrire_des_notes(): void
    {
        $this->seedSchool();
        $this->authenticate('eleve');

        $this->postJson('/api/create-noter', [])->assertStatus(403);
    }

    public function test_les_lectures_en_post_restent_ouvertes_a_un_eleve(): void
    {
        $ids = $this->seedSchool();
        $this->authenticate('eleve');
        \Laravel\Sanctum\Sanctum::actingAs((new User)->forceFill(['id' => 1, 'Droit' => 'eleve', 'idDroit' => $ids['eleve']]));

        $this->assertNotSame(403, $this->postJson('/api/bulletin_eleve', ['eleve_id' => $ids['eleve']])->getStatusCode());
    }

    public function test_le_comptable_encaisse(): void
    {
        $ids = $this->seedSchool();
        $this->authenticate('Comptable');

        $this->postJson('/api/create-payement', $this->paiement($ids))->assertOk();
    }

    public function test_seuls_admin_et_dg_gerent_les_utilisateurs(): void
    {
        $this->seedSchool();

        foreach (['Comptable', 'Enseignant', 'eleve'] as $droit) {
            $this->authenticate($droit);
            $this->getJson('/api/listeUser')->assertStatus(403);
            $this->postJson('/api/createUser', [])->assertStatus(403);
            $this->getJson('/api/updateUserStatut/1')->assertStatus(403);
        }

        $this->authenticate('DG');
        $this->getJson('/api/listeUser')->assertOk();
    }

    public function test_create_user_refuse_un_droit_inconnu(): void
    {
        $this->authenticate('DG');

        $this->postJson('/api/createUser', [
            'prenomUser' => 'A', 'nomUser' => 'B', 'telephoneUser' => '620000000',
            'Droit' => 'superadmin', 'idDroit' => 1, 'password' => 'secret123',
            'email' => 'a@b.test', 'role' => 'admin', 'photosUser' => 'avatar.png',
        ])->assertStatus(422)->assertJsonValidationErrors(['Droit']);
    }

    private function creerUtilisateur(string $droit, string $email): User
    {
        return User::forceCreate([
            'login' => $email, 'email' => $email, 'password' => bcrypt('motdepasse'),
            'prenomUser' => 'Test', 'nomUser' => $droit, 'telephoneUser' => '620000000',
            'Droit' => $droit, 'idDroit' => 1, 'role' => 'admin', 'photosUser' => 'avatar.png',
            'statut' => 'actif',
        ]);
    }

    public function test_un_utilisateur_ne_modifie_pas_le_compte_d_un_autre(): void
    {
        $enseignant = $this->creerUtilisateur('Enseignant', 'ens@test.dev');
        $autre = $this->creerUtilisateur('eleve', 'eleve@test.dev');
        Sanctum::actingAs($enseignant);

        $donnees = ['prenomUser' => 'Pirate', 'nomUser' => 'X', 'telephoneUser' => '1', 'email' => 'p@test.dev'];

        $this->postJson("/api/updateUser/{$autre->id}", $donnees)->assertStatus(403);
        $this->assertSame('Test', $autre->fresh()->prenomUser);

        // son propre compte reste modifiable
        $this->postJson("/api/updateUser/{$enseignant->id}", $donnees)->assertOk();
    }

    public function test_un_admin_peut_modifier_le_compte_d_un_autre(): void
    {
        $dg = $this->creerUtilisateur('DG', 'dg@test.dev');
        $autre = $this->creerUtilisateur('eleve', 'eleve@test.dev');
        Sanctum::actingAs($dg);

        $this->postJson("/api/updateUser/{$autre->id}", [
            'prenomUser' => 'Nouveau', 'nomUser' => 'Nom', 'telephoneUser' => '1', 'email' => 'n@test.dev',
        ])->assertOk();
        $this->assertSame('Nouveau', $autre->fresh()->prenomUser);
    }

    public function test_le_jeton_cree_a_la_connexion_expire(): void
    {
        $this->creerUtilisateur('DG', 'dg@test.dev');

        $this->postJson('/api/login', ['email' => 'dg@test.dev', 'password' => 'motdepasse'])
            ->assertOk()
            ->assertJsonStructure(['token', 'user']);

        $this->assertNotNull(config('sanctum.expiration'));
        $this->assertGreaterThan(0, (int) config('sanctum.expiration'));
    }

    public function test_le_login_est_limite_a_5_tentatives_par_minute(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->postJson('/api/login', ['email' => 'nobody@test.dev', 'password' => 'x']);
        }

        $this->postJson('/api/login', ['email' => 'nobody@test.dev', 'password' => 'x'])->assertStatus(429);
    }
}
