<?php

namespace Tests\Feature;

use App\Models\Payement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class PayementControllerTest extends TestCase
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
            'classe_id' => $this->ids['classe'],
            'compte_id' => $this->ids['compte'],
            'tranche' => '1ère Tranche',
            'montant_payement' => 50000,
            'id_action_ecolage' => 0,
        ], $override);
    }

    private function creerPayement(array $override = []): Payement
    {
        return Payement::create(array_merge($this->payload(), [
            'annee_scolaire_id' => $this->ids['annee'],
        ], $override));
    }

    public function test_create_enregistre_un_payement_sur_la_derniere_annee(): void
    {
        $response = $this->postJson('/api/create-payement', $this->payload())
            ->assertOk()
            ->assertJsonStructure(['message', 'id']);

        $this->assertDatabaseHas('payements', [
            'id' => $response->json('id'),
            'eleve_id' => $this->ids['eleve'],
            'annee_scolaire_id' => $this->ids['annee'],
            'montant_payement' => 50000,
        ]);
    }

    public function test_create_valide_les_champs_obligatoires(): void
    {
        $this->postJson('/api/create-payement', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['eleve_id', 'classe_id', 'compte_id', 'tranche', 'montant_payement']);
    }

    public function test_liste_retourne_les_payements(): void
    {
        $this->creerPayement();

        $this->getJson('/api/list-payement')
            ->assertOk()
            ->assertJsonCount(1);
    }

    public function test_show_retourne_le_payement_ou_404(): void
    {
        $payement = $this->creerPayement();

        $this->getJson("/api/payementId/{$payement->id}")
            ->assertOk()
            ->assertJsonFragment(['id' => $payement->id]);

        $this->getJson('/api/payementId/9999')->assertStatus(404);
    }

    public function test_update_modifie_le_montant(): void
    {
        $payement = $this->creerPayement();

        $this->postJson("/api/update-payement/{$payement->id}", $this->payload(['montant_payement' => 75000]))
            ->assertOk()
            ->assertJson(['message' => 'Modification effectué avec succès']);

        $this->assertSame(75000.0, (float) $payement->fresh()->montant_payement);
    }

    public function test_update_refuse_un_payement_ecolage(): void
    {
        $payement = $this->creerPayement(['id_action_ecolage' => 1]);

        $this->postJson("/api/update-payement/{$payement->id}", $this->payload(['montant_payement' => 1]))
            ->assertJsonFragment(['message' => 'Ce payement est un ecolage veillez supprimez l\'ecolage']);

        $this->assertSame(50000.0, (float) $payement->fresh()->montant_payement);
    }

    public function test_delete_supprime_le_payement(): void
    {
        $payement = $this->creerPayement();

        $this->deleteJson("/api/delete-payement/{$payement->id}")
            ->assertOk()
            ->assertJson(['message' => 'Suppression effectué avec succès']);

        $this->assertDatabaseMissing('payements', ['id' => $payement->id]);
    }

    public function test_delete_refuse_un_payement_ecolage(): void
    {
        $payement = $this->creerPayement(['id_action_ecolage' => 1]);

        $this->deleteJson("/api/delete-payement/{$payement->id}")
            ->assertJsonFragment(['message' => 'Ce payement est un ecolage veillez supprimez l\'ecolage']);

        $this->assertDatabaseHas('payements', ['id' => $payement->id]);
    }
}
