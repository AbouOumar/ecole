<?php

namespace Tests\Feature;

use App\Models\Noter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class NoterControllerTest extends TestCase
{
    use RefreshDatabase, CreatesSchoolData;

    private array $ids;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authenticate();
        $this->ids = $this->seedSchool();
    }

    private function payload(array $override = []): array
    {
        return array_merge([
            'eleve_id' => $this->ids['eleve'],
            'matiere_id' => $this->ids['matiere'],
            'classe_id' => $this->ids['classe'],
            'annee_scolaire_id' => $this->ids['annee'],
            'semestre' => 1,
            'mois' => '10',
            'type_note' => 'mensuelle',
            'note_cours' => 12,
            'note_composition' => 14,
            'note_orale' => 10,
        ], $override);
    }

    public function test_les_routes_exigent_une_authentification(): void
    {
        $this->app['auth']->forgetGuards();
        $this->withHeaders(['Authorization' => ''])->getJson('/api/list-noter')->assertStatus(401);
    }

    public function test_create_enregistre_une_note(): void
    {
        $this->postJson('/api/create-noter', $this->payload())
            ->assertOk()
            ->assertJson(['message' => 'Enregistrement effectué avec succès']);

        $this->assertDatabaseHas('noters', [
            'eleve_id' => $this->ids['eleve'],
            'matiere_id' => $this->ids['matiere'],
            'note_cours' => 12,
        ]);
    }

    public function test_create_refuse_une_note_sans_eleve(): void
    {
        $this->postJson('/api/create-noter', ['matiere_id' => $this->ids['matiere'], 'type_note' => 'x'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['eleve_id']);
    }

    public function test_liste_retourne_les_notes(): void
    {
        Noter::create($this->payload());

        $this->getJson('/api/list-noter')
            ->assertOk()
            ->assertJsonCount(1);
    }

    public function test_show_retourne_la_note_ou_un_message_si_absente(): void
    {
        $note = Noter::create($this->payload());

        $this->getJson("/api/noterId/{$note->id}")
            ->assertOk()
            ->assertJsonFragment(['id' => $note->id]);

        $this->getJson('/api/noterId/9999')
            ->assertJson(['message' => 'cette note n\'existe pas']);
    }

    public function test_update_modifie_la_note(): void
    {
        $note = Noter::create($this->payload());

        $this->putJson("/api/update-noter/{$note->id}", $this->payload(['note_cours' => 18]))
            ->assertOk()
            ->assertJson(['message' => 'Modification effectuée avec succès']);

        $this->assertSame(18.0, (float) $note->fresh()->note_cours);
    }

    public function test_delete_supprime_la_note(): void
    {
        $note = Noter::create($this->payload());

        $this->deleteJson("/api/delete-noter/{$note->id}")
            ->assertOk()
            ->assertJson(['message' => 'Suppression effectuée avec succès']);

        $this->assertDatabaseMissing('noters', ['id' => $note->id]);
    }

    public function test_enregistrer_note_cree_puis_met_a_jour_sans_doublon(): void
    {
        $route = $this->noterEnregistrerRoute();

        $this->postJson($route, $this->payload(['note_cours' => 11]))->assertOk();
        $this->postJson($route, $this->payload(['note_cours' => 16, 'note_orale' => null]))->assertOk();

        $this->assertSame(1, Noter::count());
        $note = Noter::first();
        $this->assertSame(16.0, (float) $note->note_cours);
        // un champ absent de la requête ne doit pas écraser la valeur existante
        $this->assertSame(10.0, (float) $note->note_orale);
    }

    private function noterEnregistrerRoute(): string
    {
        foreach (app('router')->getRoutes() as $route) {
            if (str_ends_with($route->getActionName(), 'NoterController@enregistrerNote')) {
                return '/' . ltrim($route->uri(), '/');
            }
        }
        $this->fail('Route enregistrerNote introuvable');
    }
}
