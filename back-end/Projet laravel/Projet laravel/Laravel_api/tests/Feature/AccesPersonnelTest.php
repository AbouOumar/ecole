<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\Sanctum;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class AccesPersonnelTest extends TestCase
{
    use CreatesSchoolData, RefreshDatabase;

    private array $ids;

    private int $autreEleve;

    private int $autreClasse;

    private int $parent;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ids = $this->seedSchool();
        $now = now();

        $this->autreClasse = DB::table('classes')->insertGetId([
            'nom_classe' => '8ème B', 'niveau' => 8, 'nom_place' => 40,
            'annee_scolaire_id' => $this->ids['annee'], 'created_at' => $now, 'updated_at' => $now,
        ]);
        $this->autreEleve = DB::table('eleves')->insertGetId([
            'matricule_eleve' => 'MAT002', 'nom_eleve' => 'Camara', 'prenom_eleve' => 'Sekou',
            'genre_eleve' => 'Masculin', 'Date_naiss' => '2011-03-02', 'classe_id' => $this->autreClasse,
            'created_at' => $now, 'updated_at' => $now,
        ]);
        $this->parent = DB::table('parents')->insertGetId([
            'nom_parent' => 'Diallo', 'prenom_parent' => 'Oumar', 'adresse_parent' => 'Conakry',
            'created_at' => $now, 'updated_at' => $now,
        ]);
        DB::table('parent_eleves')->insert([
            'parent_id' => $this->parent, 'eleve_id' => $this->ids['eleve'], 'lien_parente' => 'Père',
            'created_at' => $now, 'updated_at' => $now,
        ]);
    }

    private function connecterEleve(): void
    {
        Sanctum::actingAs((new User)->forceFill(['id' => 10, 'Droit' => 'eleve', 'idDroit' => $this->ids['eleve']]));
    }

    private function connecterParent(): void
    {
        Sanctum::actingAs((new User)->forceFill(['id' => 11, 'Droit' => 'parent', 'idDroit' => $this->parent]));
    }

    public function test_un_eleve_accede_a_ses_donnees_mais_pas_a_celles_d_un_autre(): void
    {
        $this->connecterEleve();

        $this->getJson("/api/eleveId/{$this->ids['eleve']}")->assertOk();
        $this->getJson("/api/actionEleveId/{$this->ids['eleve']}")->assertOk();
        $this->getJson('/api/showMatricule/MAT001')->assertOk();

        $this->getJson("/api/eleveId/{$this->autreEleve}")->assertStatus(403);
        $this->getJson("/api/actionEleveId/{$this->autreEleve}")->assertStatus(403);
        $this->getJson("/api/ImpayesEleve/{$this->autreEleve}")->assertStatus(403);
        $this->getJson("/api/list-bulletinsDisoEleve/{$this->autreEleve}")->assertStatus(403);
        $this->getJson('/api/showMatricule/MAT002')->assertStatus(403);
        $this->getJson('/api/frais_scolariteEleve/MAT002')->assertStatus(403);
    }

    public function test_un_eleve_ne_demande_pas_le_bulletin_d_un_autre(): void
    {
        $this->connecterEleve();

        $this->postJson('/api/bulletin_eleve', ['eleve_id' => $this->autreEleve])->assertStatus(403);
        $this->assertNotSame(403, $this->postJson('/api/bulletin_eleve', ['eleve_id' => $this->ids['eleve']])->getStatusCode());
        $this->postJson('/api/bulletin_eleve', [])->assertStatus(403);
    }

    public function test_un_eleve_ne_peut_pas_lister_les_donnees_de_l_ecole(): void
    {
        $this->connecterEleve();

        foreach (['list-eleve', 'list-parent', 'list-payement', 'listePayementDetail', 'list-noter',
            'list-recu_payement', 'list-payement_salaire', 'list-compte', 'statistique_rapport'] as $route) {
            $this->getJson("/api/{$route}")->assertStatus(403);
        }
    }

    public function test_un_eleve_voit_l_emploi_du_temps_de_sa_classe_seulement(): void
    {
        $this->connecterEleve();

        $this->assertNotSame(403, $this->getJson("/api/emploi_tempsId/{$this->ids['classe']}")->getStatusCode());
        $this->getJson("/api/emploi_tempsId/{$this->autreClasse}")->assertStatus(403);
    }

    public function test_les_listes_de_configuration_restent_ouvertes(): void
    {
        $this->connecterEleve();

        $this->getJson('/api/list-classe')->assertOk();
        $this->getJson('/api/list-anneeScolaire')->assertOk();
    }

    public function test_un_parent_accede_a_ses_enfants_seulement(): void
    {
        $this->connecterParent();

        $this->getJson("/api/eleveId/{$this->ids['eleve']}")->assertOk();
        $this->getJson("/api/eleveId/{$this->autreEleve}")->assertStatus(403);
        $this->getJson("/api/eleve_parentId/{$this->parent}")->assertOk();
        $this->getJson('/api/eleve_parentId/999')->assertStatus(403);
        $this->getJson("/api/emploi_tempsId/{$this->autreClasse}")->assertStatus(403);
    }

    public function test_un_parent_ne_lit_que_ses_propres_actions(): void
    {
        $this->connecterParent();

        $this->assertNotSame(403, $this->postJson('/api/actionParentId', ['id' => $this->parent, 'type' => 'parent'])->getStatusCode());
        $this->postJson('/api/actionParentId', ['id' => 999, 'type' => 'parent'])->assertStatus(403);
        $this->postJson('/api/actionParentId', ['id' => $this->parent, 'type' => 'personnel'])->assertStatus(403);
    }

    public function test_un_eleve_ne_peut_pas_lire_les_donnees_du_personnel(): void
    {
        $this->connecterEleve();

        $this->getJson('/api/eleve_PersonnelId/1')->assertStatus(403);
    }

    public function test_l_administration_et_les_enseignants_ne_sont_pas_restreints(): void
    {
        foreach (['DG', 'Comptable', 'Enseignant'] as $droit) {
            $this->authenticate($droit);
            $this->getJson("/api/eleveId/{$this->autreEleve}")->assertOk();
            $this->getJson('/api/list-eleve')->assertOk();
        }
    }
}
