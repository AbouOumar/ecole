<?php

namespace Tests\Feature;

use App\Models\Noter;
use App\Services\NoterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesSchoolData;
use Tests\TestCase;

class NoterServiceTest extends TestCase
{
    use CreatesSchoolData, RefreshDatabase;

    private array $ids;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ids = $this->seedSchool();
    }

    private function donnees(array $surcharge = []): array
    {
        return array_merge([
            'eleve_id' => $this->ids['eleve'], 'classe_id' => $this->ids['classe'],
            'matiere_id' => $this->ids['matiere'], 'annee_scolaire_id' => $this->ids['annee'],
            'semestre' => 1, 'mois' => '10', 'type_note' => 'mensuelle',
            'note_orale' => 9, 'note_cours' => 11, 'note_composition' => 13,
        ], $surcharge);
    }

    public function test_cree_la_note_quand_elle_n_existe_pas(): void
    {
        $this->assertNull((new NoterService)->enregistrer($this->donnees()));
        $this->assertSame(1, Noter::count());
    }

    public function test_met_a_jour_seulement_les_notes_fournies(): void
    {
        $service = new NoterService;
        $service->enregistrer($this->donnees());

        $existante = $service->enregistrer($this->donnees(['note_cours' => 17, 'note_orale' => null, 'note_composition' => null]));

        $this->assertNotNull($existante);
        $this->assertSame(1, Noter::count());
        $note = Noter::first();
        $this->assertSame(17.0, (float) $note->note_cours);
        $this->assertSame(9.0, (float) $note->note_orale);
        $this->assertSame(13.0, (float) $note->note_composition);
    }

    public function test_un_autre_mois_cree_une_nouvelle_note(): void
    {
        $service = new NoterService;
        $service->enregistrer($this->donnees());
        $service->enregistrer($this->donnees(['mois' => '11']));

        $this->assertSame(2, Noter::count());
    }
}
