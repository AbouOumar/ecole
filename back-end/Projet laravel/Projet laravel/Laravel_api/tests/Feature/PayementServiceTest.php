<?php

namespace Tests\Feature;

use App\Models\Compte;
use App\Models\Payement;
use App\Services\PayementService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class PayementServiceTest extends TestCase
{
    use CreatesSchoolData, RefreshDatabase;

    private array $ids;

    private PayementService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ids = $this->seedSchool();
        $this->service = new PayementService;
    }

    private function donnees(array $surcharge = []): array
    {
        return array_merge([
            'eleve_id' => $this->ids['eleve'], 'classe_id' => $this->ids['classe'],
            'compte_id' => $this->ids['compte'], 'tranche' => '1ère Tranche',
            'montant_payement' => 40000, 'id_action_ecolage' => 0,
        ], $surcharge);
    }

    private function solde(int $compteId): float
    {
        return (float) Compte::find($compteId)->solde;
    }

    private function autreCompte(): int
    {
        return DB::table('comptes')->insertGetId([
            'nomCompte' => 'Banque', 'numeroCompte' => 2, 'description' => 'Banque',
            'solde' => 0, 'statut' => 'actif', 'created_at' => now(), 'updated_at' => now(),
        ]);
    }

    public function test_enregistrer_credite_le_compte_et_utilise_la_derniere_annee(): void
    {
        $payement = $this->service->enregistrer($this->donnees());

        $this->assertSame($this->ids['annee'], (int) $payement->annee_scolaire_id);
        $this->assertSame(40000.0, $this->solde($this->ids['compte']));
    }

    public function test_enregistrer_sans_id_action_ecolage_vaut_zero(): void
    {
        $donnees = $this->donnees();
        unset($donnees['id_action_ecolage']);

        $this->assertSame(0, (int) $this->service->enregistrer($donnees)->id_action_ecolage);
    }

    public function test_modifier_le_montant_ajuste_le_solde_de_la_difference(): void
    {
        $payement = $this->service->enregistrer($this->donnees());

        $this->service->modifier($payement, $this->donnees(['montant_payement' => 25000]));

        $this->assertSame(25000.0, $this->solde($this->ids['compte']));
    }

    public function test_modifier_le_compte_deplace_le_montant(): void
    {
        $banque = $this->autreCompte();
        $payement = $this->service->enregistrer($this->donnees());

        $this->service->modifier($payement, $this->donnees(['compte_id' => $banque, 'montant_payement' => 30000]));

        $this->assertSame(0.0, $this->solde($this->ids['compte']));
        $this->assertSame(30000.0, $this->solde($banque));
    }

    public function test_supprimer_retire_le_montant_du_compte(): void
    {
        $payement = $this->service->enregistrer($this->donnees());

        $this->service->supprimer($payement);

        $this->assertSame(0.0, $this->solde($this->ids['compte']));
        $this->assertDatabaseMissing('payements', ['id' => $payement->id]);
    }

    public function test_une_erreur_annule_tout_la_transaction(): void
    {
        $payement = $this->service->enregistrer($this->donnees());

        try {
            // 'tranche' hors énumération : l'écriture du paiement échoue après l'ajustement des soldes
            $this->service->modifier($payement, $this->donnees(['tranche' => '9ème Tranche', 'montant_payement' => 99000]));
            $this->fail('Une exception était attendue');
        } catch (\Throwable $e) {
            // attendu
        }

        $this->assertSame(40000.0, $this->solde($this->ids['compte']));
    }

    public function test_est_ecolage(): void
    {
        $this->assertTrue($this->service->estEcolage(new Payement(['id_action_ecolage' => 1])));
        $this->assertFalse($this->service->estEcolage(new Payement(['id_action_ecolage' => 0])));
    }
}
