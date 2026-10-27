<?php

namespace App\Services;

use App\Models\Noter;

class NoterService
{
    private const CLES = [
        'eleve_id', 'classe_id', 'matiere_id', 'annee_scolaire_id', 'semestre', 'mois', 'type_note',
    ];

    private const NOTES = ['note_orale', 'note_cours', 'note_composition'];

    /**
     * Crée la note de l'élève, ou met à jour uniquement les notes fournies si elle existe déjà.
     *
     * @return Noter|null la note existante avant mise à jour, null si elle vient d'être créée
     */
    public function enregistrer(array $donnees): ?Noter
    {
        $cles = array_intersect_key($donnees, array_flip(self::CLES));
        $notes = array_intersect_key($donnees, array_flip(self::NOTES));

        $existante = Noter::where($cles)->first();

        if ($existante) {
            $existante->update(array_filter($notes, fn ($valeur) => ! is_null($valeur)));

            return $existante;
        }

        Noter::create($cles + $notes);

        return null;
    }
}
