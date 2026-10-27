<?php

namespace App\Services;

use App\Models\AnneeScolaire;
use App\Models\Compte;
use App\Models\Payement;
use Illuminate\Support\Facades\DB;

/**
 * Règles métier des paiements de scolarité : chaque opération met à jour le
 * paiement ET le solde du compte dans une même transaction.
 */
class PayementService
{
    public function enregistrer(array $donnees): Payement
    {
        return DB::transaction(function () use ($donnees) {
            $payement = Payement::create([
                'eleve_id' => $donnees['eleve_id'],
                'classe_id' => $donnees['classe_id'],
                'annee_scolaire_id' => AnneeScolaire::latest()->value('id'),
                'compte_id' => $donnees['compte_id'],
                'tranche' => $donnees['tranche'],
                'montant_payement' => $donnees['montant_payement'],
                'id_action_ecolage' => $donnees['id_action_ecolage'] ?? 0,
            ]);

            $this->ajusterSolde($payement->compte_id, $payement->montant_payement);

            return $payement;
        });
    }

    public function modifier(Payement $payement, array $donnees): void
    {
        DB::transaction(function () use ($payement, $donnees) {
            // On retire l'ancien montant de l'ancien compte, puis on crédite le nouveau :
            // couvre aussi bien le changement de montant que le changement de compte.
            $this->ajusterSolde($payement->compte_id, -$payement->montant_payement);
            $this->ajusterSolde($donnees['compte_id'], $donnees['montant_payement']);

            $payement->update($donnees);
        });
    }

    public function supprimer(Payement $payement): void
    {
        DB::transaction(function () use ($payement) {
            $this->ajusterSolde($payement->compte_id, -$payement->montant_payement);
            $payement->delete();
        });
    }

    /** Un paiement d'écolage ne se modifie ni ne se supprime directement. */
    public function estEcolage(Payement $payement): bool
    {
        return (int) $payement->id_action_ecolage === 1;
    }

    private function ajusterSolde(?int $compteId, float $montant): void
    {
        $compte = $compteId ? Compte::lockForUpdate()->find($compteId) : null;

        if ($compte) {
            $compte->solde += $montant;
            $compte->save();
        }
    }
}
