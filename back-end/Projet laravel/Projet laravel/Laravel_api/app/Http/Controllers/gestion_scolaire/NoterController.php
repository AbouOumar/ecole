<?php

namespace App\Http\Controllers\gestion_scolaire;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\PaginationOptionnelle;
use App\Http\Requests\gestion_scolaire\NoterRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Coefficient;
use App\Models\DispenserDans;
use App\Models\Eleve;
use App\Models\ficheRenseignement;
use App\Models\Ins_reins;
use App\Models\Noter;
use App\Services\NoterService;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoterController extends Controller
{
    use PaginationOptionnelle;

    public function liste(Request $request){
        return $this->listeOuPage(Noter::with('eleve', 'matiere'), $request);
    }

    public function create(NoterRequest $request){
        $noter = Noter::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectué avec succès']);
    }

    public function enregistrerNote(Request $request, NoterService $service) {
        $note = $service->enregistrer($request->all());

        return response()->json(['message' => 'Note enregistrée avec succès','note'=>$note]);
    }

    public function show(int $id){
        $noter = Noter::with('eleve')->find($id);
        if (is_null($noter)) {
            return response()->json(['message'=>'cette note n\'existe pas']);
        }
        return response()->json($noter);
    }

    public function update(NoterRequest $request,int $id){
        $noter = Noter::find($id);
        if (is_null($noter)) {
            return response()->json(['message'=>'cette note n\'existe pas']);
        }
        $noter->update($request->validated());
        return response()->json(['message'=>'Modification effectuée avec succès']);
    }

    public function delete(int $id){
        $noter = Noter::find($id);
        if(!$noter)
        {
            return response()->json(['message'=>'cette note n\'existe pas']);
        }
        $noter ->delete();
        return response()->json(['message'=>'Suppression effectuée avec succès']);
    }
    //les methodes pour afficher la liste des notes pour passer a la notation des élèves
    public function notesParClasseSemestre(Request $request)
    {
        App::setlocale('fr');
        Carbon::setLocale('fr');

        $classeId = $request->classe_id;
        $matiereId = $request->matiere_id;
        $anneeId = $request->annee_scolaire_id;
        $semestre = $request->semestre; 

        if (!$classeId || !$anneeId || !$semestre || !$matiereId) {
            return response()->json(['message' => 'Paramètres manquants'], 400);
        }
        //recuperer les mois et semestre
        $annescolaire = AnneeScolaire::find($anneeId);

        $mois=[];
        $dateDebut = Carbon::parse($annescolaire->dateDebut);
        $dateFin = Carbon::parse($annescolaire->DateFin);

        while($dateDebut <= $dateFin){
            $mois[]= [
                'numeroMois' =>$dateDebut->format('m'),
                'nomMois' =>$dateDebut->translatedFormat('F'),
            ];

            $dateDebut->addMonth();
        }

        // Les mois du semestre
        $moisSemestre1  = array_slice($mois, 0,4); //premiers 4 mois
        $moisSemestre2 = array_slice($mois, 4,4); //les 4 mois suivants

        $moisSemestre = $semestre == 1 ? $moisSemestre1 : $moisSemestre2;

        $eleves = Eleve::where('classe_id', $classeId)->get();

        $data = [];

        foreach ($eleves as $eleve) {
            $notesEleve = [
                'id' => $eleve->id,
                'matricule_eleve' => $eleve->matricule_eleve,
                'nom_eleve' => $eleve->nom_eleve,
                'prenom_eleve' => $eleve->prenom_eleve,
                'notes' => []
            ];
            $i=0;
            foreach ($moisSemestre as $mois) {
                $i++;
                if($i<4){
                    $noteCours = Noter::where('eleve_id', $eleve->id)
                    ->where('classe_id', $classeId)
                    ->where('matiere_id', $matiereId)
                    ->where('annee_scolaire_id', $anneeId)
                    ->where('semestre', $semestre)
                    ->where('mois', $mois['nomMois'])
                    ->where('type_note', 'Evaluation')
                    ->first();

                    $notesEleve['notes'][] = [
                        'mois' => $mois,
                        'orale' => $noteCours ? $noteCours->note_orale : '',
                        'ecrit' => $noteCours ? $noteCours->note_cours : '',
                        'compo' => '',
                    ];
                }
                if($i==4){
                    $noteCompo = Noter::where('eleve_id', $eleve->id)
                    ->where('classe_id', $classeId)
                    ->where('matiere_id', $matiereId)
                    ->where('annee_scolaire_id', $anneeId)
                    ->where('semestre', $semestre)
                    ->where('mois', $mois['nomMois'])
                    ->where('type_note', 'Composition')
                    ->first();


                    $notesEleve['notes'][] = [
                        'mois' => $mois,
                        'orale' => '',
                        'ecrit' => '',
                        'compo' => $noteCompo ? $noteCompo->note_composition : '',
                    ];
                }
            }

            $data[] = $notesEleve;
        }

        return response()->json($data);
    }


public function resultatAnnuel(Request $request){
    $classe_id = $request->classe_id;
    $annee_id = $request->annee_scolaire_id;

        // On suppose que la méthode resultatsSemestriels existe déjà
        $sem1 = $this->resultatSemestriel(new Request([
            'classe_id' => $classe_id,
            'annee_scolaire_id' => $annee_id,
            'semestre' => 1,
        ]))->getData(true);
        $sem2 = $this->resultatSemestriel(new Request([
            'classe_id' => $classe_id,
            'annee_scolaire_id' => $annee_id,
            'semestre' => 2,
        ]))->getData(true);
    
        // Indexer les résultats par élève
        $eleves = [];
    
        foreach ($sem1 as $res) {
            $eleves[$res['eleve_id']]['sem1'] = $res;
        }
    
        foreach ($sem2 as $res) {
            $eleves[$res['eleve_id']]['sem2'] = $res;
        }
    
        // Construction des résultats annuels
        $resultats = [];
    
        foreach ($eleves as $eleve_id => $data) {
            $s1 = $data['sem1'] ?? null;
            $s2 = $data['sem2'] ?? null;
    
            $moy1 = $s1['MoyenneSemestrielle'] ?? 0;
            $moy2 = $s2['MoyenneSemestrielle'] ?? 0;
            $moyenne = round(($moy1 + $moy2) / 2, 2);
    
            $mention = $this->getMention($moyenne);
            $decision = $moyenne >= 10 ? 'Admis' : 'Non Admis';
    
            $resultats[] = [
                'eleve_id' => $s1['eleve_id'] ?? $s2['eleve_id'],
                'matricule_eleve' => $s1['matricule_eleve'] ?? $s2['matricule_eleve'],
                'nom_eleve' => $s1['nom_eleve'] ?? $s2['nom_eleve'],
                'prenom_eleve' => $s1['prenom_eleve'] ?? $s2['prenom_eleve'],
                'MoyenneSemestre1' => $moy1,
                'MoyenneSemestre2' => $moy2,
                'MoyenneAnnuelle' => $moyenne,
                'Appreciation' => $mention,
                'Decision' => $decision,
            ];
        }
    
        // Classement
        usort($resultats, fn($a, $b) => $b['MoyenneAnnuelle'] <=> $a['MoyenneAnnuelle']);

        $rang = 1;
        $exAequo = 1;
        $precedenteMoyenne = null;
    
        foreach ($resultats as $index => &$res) {
            if ($res['MoyenneAnnuelle'] === $precedenteMoyenne) {
                $res['Rang'] = $rang. (in_array($rang, [1]) ? 'er' : 'ème') . ' ex';
                $exAequo++;
            } else {
                $rang = $index + 1;
                $res['Rang'] = $rang . (in_array($rang, [1]) ? 'er' : 'ème');
                $precedenteMoyenne = $res['MoyenneAnnuelle'];
                $exAequo = 1;
            }
        }
    
        return response()->json($resultats);
}

public function resultatSemestriel(Request $request)
{
    $classeId = $request->classe_id;
    $anneeId = $request->annee_scolaire_id;
    $semestre = $request->semestre;

    if (!$classeId || !$anneeId || !$semestre) {
        return response()->json(['message' => 'Paramètres manquants'], 400);
    }

    $classe = Classe::findOrFail($classeId);
    $niveau = ficheRenseignement::where('niveau', $classe->niveau)->firstOrFail();
    $cycle = ($classe->niveau >= 7 && $classe->niveau <= 10) ? 'Collège' : 'Lycée';

    $matieres = DispenserDans::where('classe_id', $classeId)->pluck('matiere_id');
    $eleves = Eleve::where('classe_id', $classeId)->get();

    $resultats = [];

    foreach ($eleves as $eleve) {
        $totalCours = 0;
        $totalCompo = 0;
        $totalCoef = 0;

        foreach ($matieres as $matiereId) {
            $notes = $this->notesParClasseSemestre(new Request([
                'classe_id' => $classeId,
                'matiere_id' => $matiereId,
                'annee_scolaire_id' => $anneeId,
                'semestre' => $semestre,
            ]));

            $eleveNote = collect(json_decode($notes->getContent()))->firstWhere('id', $eleve->id);
            if (!$eleveNote) continue;

            $notesMois = $eleveNote->notes;
            $sommeOrale = 0;
            $sommeEcrit = 0;
            $count = 0;
            $compo = 0;

            foreach ($notesMois as $i => $note) {
                if ($i < 3) {
                    $sommeOrale += is_numeric($note->orale) ? $note->orale : 0;
                    $sommeEcrit += is_numeric($note->ecrit) ? $note->ecrit : 0;
                    $count++;
                } elseif ($i == 3) {
                    $compo = is_numeric($note->compo) ? $note->compo : 0;
                }
            }

            $moyCours = $count > 0 ? ((($sommeOrale / $count) + ($sommeEcrit / $count)) / 2) : 0;

            $coef = Coefficient::where([
                'fiche_renseignement_id' => $niveau->id,
                'option_id' => $classe->option_id,
                'matiere_id' => $matiereId,
                'clycle' => $cycle
            ])->value('valeur') ?? 1;

            $totalCours += $moyCours * $coef;
            $totalCompo += $compo * $coef;
            $totalCoef += $coef;
        }

        $moyGenCours = $totalCoef ? $totalCours / $totalCoef : 0;
        $moyGenCompo = $totalCoef ? $totalCompo / $totalCoef : 0;
        $moySemestre = ($moyGenCours + 2 * $moyGenCompo) / 3;

        // Appréciation
        $appreciation = match (true) {
            $moySemestre >= 16 => "Très Bien",
            $moySemestre >= 14 => "Bien",
            $moySemestre >= 12 => "Assez Bien",
            $moySemestre >= 10 => "Passable",
            $moySemestre >= 9 => "Insuffisant",
            $moySemestre >= 5 => "Médiocre",
            $moySemestre >= 3 => "Faible",
            default => "Très Faible"
        };

        $decision = $moySemestre >= 10 ? "Admis" : "Non Admis";

        $resultats[] = [
            'eleve_id' => $eleve->id,
            'matricule_eleve' => $eleve->matricule_eleve,
            'nom_eleve' => $eleve->nom_eleve,
            'prenom_eleve' => $eleve->prenom_eleve,
            'MoyenneGeneraleCours' => round($moyGenCours, 2),
            'MoyenneGeneraleComposition' => round($moyGenCompo, 2),
            'MoyenneSemestrielle' => round($moySemestre, 2),
            'Appreciation' => $appreciation,
            'Decision' => $decision,
        ];
    }

    // Calcul du rang avec gestion des ex-æquo
    usort($resultats, fn($a, $b) => $b['MoyenneSemestrielle'] <=> $a['MoyenneSemestrielle']);

    $rang = 1;
    $exAequo = 1;
    $precedenteMoyenne = null;

    foreach ($resultats as $index => &$res) {
        if ($res['MoyenneSemestrielle'] === $precedenteMoyenne) {
            $res['Rang'] = $rang . ' ex';
            $exAequo++;
        } else {
            $rang = $index + 1;
            $res['Rang'] = $rang . (in_array($rang, [1]) ? 'er' : 'ème');
            $precedenteMoyenne = $res['MoyenneSemestrielle'];
            $exAequo = 1;
        }
    }

    return response()->json($resultats);
}


public function bulletinsDisponibles()
{
    $elevesNotés = Noter::select('eleve_id', 'semestre', 'annee_scolaire_id', 'classe_id')
        ->with(['eleve:id,matricule_eleve,nom_eleve,prenom_eleve', 'classe:id,nom_classe,niveau,option_id', 'anneeScolaire:id,dateDebut,DateFin'])
        ->groupBy('eleve_id', 'semestre', 'annee_scolaire_id', 'classe_id')
        ->get();

    return response()->json($elevesNotés);
}

public function bulletinEleve(Request $request)
{
    $request->validate([
        'eleve_id' => 'required|integer',
        'classe_id' => 'required|integer',
        'annee_scolaire_id' => 'required|integer',
        'semestre' => 'required|integer|in:1,2',
    ]);

    $eleve = Eleve::findOrFail($request->eleve_id);
    $classe = Classe::findOrFail($request->classe_id);
    $annee = AnneeScolaire::findOrFail($request->annee_scolaire_id);
    $niveau = ficheRenseignement::where('niveau', $classe->niveau)->firstOrFail();
    $cycle = ($classe->niveau >= 7 && $classe->niveau <= 10) ? 'college' : 'lycee';

    $matieres = DispenserDans::where('classe_id', $classe->id)->with('matiere')->get();
    $mois = $this->moisDuSemestre($annee, $request->semestre);

    $resultats = [];
    $totalCours = 0;
    $totalCompo = 0;
    $totalCoef = 0;

    foreach ($matieres as $dispense) {
        $matiere = $dispense->matiere;
        $coef = Coefficient::where([
            'fiche_renseignement_id' => $niveau->id,
            'option_id' => $classe->option_id,
            'matiere_id' => $matiere->id,
            'clycle' => $cycle
        ])->value('valeur') ?? 1;

        $notes = [];
        $sommeOrale = 0;
        $sommeEcrit = 0;
        $noteCompo = 0;
        $count = 0;

        foreach ($mois as $i => $moisItem) {
            $moisNom = $moisItem['nomMois'];
            if ($i < 3) {
                $noteCours = Noter::where([
                    'eleve_id' => $eleve->id,
                    'classe_id' => $classe->id,
                    'matiere_id' => $matiere->id,
                    'annee_scolaire_id' => $annee->id,
                    'semestre' => $request->semestre,
                    'mois' => $moisNom,
                    'type_note' => 'Evaluation'
                ])->first();

                $orale = $noteCours?->note_orale ?? null;
                $ecrit = $noteCours?->note_cours ?? null;

                $sommeOrale += is_numeric($orale) ? $orale : 0;
                $sommeEcrit += is_numeric($ecrit) ? $ecrit : 0;
                $count++;

                $notes[$moisNom] = ['orale' => $orale, 'ecrit' => $ecrit];
            } else {
                $noteCompo = Noter::where([
                    'eleve_id' => $eleve->id,
                    'classe_id' => $classe->id,
                    'matiere_id' => $matiere->id,
                    'annee_scolaire_id' => $annee->id,
                    'semestre' => $request->semestre,
                    'mois' => $moisNom,
                    'type_note' => 'Composition'
                ])->first()?->note_composition ?? null;

                $notes['composition'] = $noteCompo;
            }
        }

        $moyCours = $count > 0 ? ((($sommeOrale / $count) + ($sommeEcrit / $count)) / 2) : 0;
        $moyenneMatiere = ($moyCours + 2 * ($noteCompo ?? 0)) / 3;

        $resultats[] = [
            'libelle_matiere' => $matiere->libelle_matiere,
            'coefficient' => $coef,
            'notes' => $notes ,
            'moyenne_cours' => round($moyCours, 2),
            'note_composition' => $noteCompo,
            'moyenne_matiere' => round($moyenneMatiere, 2),
        ];

        $totalCours += $moyCours * $coef;
        $totalCompo += $noteCompo * $coef;
        $totalCoef += $coef;
    }

    $moyGenCours = $totalCoef ? $totalCours / $totalCoef : 0;
    $moyGenCompo = $totalCoef ? $totalCompo / $totalCoef : 0;
    $moySemestre = ($moyGenCours + 2 * $moyGenCompo) / 3;

    // Appréciation
    $appreciation = match (true) {
        $moySemestre >= 16 => "Très Bien",
        $moySemestre >= 14 => "Bien",
        $moySemestre >= 12 => "Assez Bien",
        $moySemestre >= 10 => "Passable",
        $moySemestre >= 9  => "Insuffisant",
        $moySemestre >= 5  => "Médiocre",
        $moySemestre >= 3  => "Faible",
        default => "Très Faible"
    };
    
    
    return response()->json([
        'eleve' => [
            'id' => $eleve->id,
            'matricule_eleve' => $eleve->matricule_eleve,
            'nom_eleve' => $eleve->nom_eleve,
            'prenom_eleve' => $eleve->prenom_eleve,
            'genre_eleve' => $eleve->genre_eleve
        ],
        'classe' => [
            'id' => $classe->id,
            'nom_classe' => $classe->nom_classe,
            'effectif_total' => $classe->effectif_total
        ],
        'annee_scolaire' => Carbon::parse($annee->dateDebut)->year ." - ".Carbon::parse($annee->DateFin)->year,
        'semestre' => $request->semestre,
        'matieres' => $resultats,
        'total_coefficient' => $totalCoef,
        'MoyenneGeneraleCours' => round($moyGenCours, 2),
        'MoyenneGeneraleComposition' => round($moyGenCompo, 2),
        'MoyenneSemestrielle' => round($moySemestre, 2),
        'appreciation' => $appreciation,
        'decision' => $moySemestre >= 10 ? "Admis" : "Non Admis"
    ]);
}

public function MgEleve(Request $request)
{
    $request->validate([
        'eleve_id' => 'required|integer',
    ]);

    $eleve = Eleve::findOrFail($request->eleve_id);
    if($eleve->classe_id == 0){
        return response()->json([
            'message'=>"Cet élève n'est pas inscrit",
            'MoyenneSemestrielle' => -1,
        ]);
    }

    $classe = Classe::findOrFail($eleve->classe_id);
    $ins_reins = Ins_reins::where('classe_id',$eleve->classe_id)
    ->where('eleve_id',$eleve->id)
    ->orderByDesc('created_at')->first();
    
    $annee = AnneeScolaire::findOrFail($ins_reins->annee_scolaire_id);
    $niveau = ficheRenseignement::where('niveau', $classe->niveau)->firstOrFail();
    $cycle = ($classe->niveau >= 7 && $classe->niveau <= 10) ? 'college' : 'lycee';

    $matieres = DispenserDans::where('classe_id', $classe->id)->with('matiere')->get();
    $mg=0;
    for($j=1; $j<=2;$j++){

    $mois = $this->moisDuSemestre($annee, $j);

    $resultats = [];
    $totalCours = 0;
    $totalCompo = 0;
    $totalCoef = 0;

    foreach ($matieres as $dispense) {
        $matiere = $dispense->matiere;
        $coef = Coefficient::where([
            'fiche_renseignement_id' => $niveau->id,
            'option_id' => $classe->option_id,
            'matiere_id' => $matiere->id,
            'clycle' => $cycle
        ])->value('valeur') ?? 1;

        $notes = [];
        $sommeOrale = 0;
        $sommeEcrit = 0;
        $noteCompo = 0;
        $count = 0;

        foreach ($mois as $i => $moisItem) {
            $moisNom = $moisItem['nomMois'];
            if ($i < 3) {
                $noteCours = Noter::where([
                    'eleve_id' => $eleve->id,
                    'classe_id' => $classe->id,
                    'matiere_id' => $matiere->id,
                    'annee_scolaire_id' => $annee->id,
                    'semestre' => $j,
                    'mois' => $moisNom,
                    'type_note' => 'Evaluation'
                ])->first();

                $orale = $noteCours?->note_orale ?? null;
                $ecrit = $noteCours?->note_cours ?? null;

                $sommeOrale += is_numeric($orale) ? $orale : 0;
                $sommeEcrit += is_numeric($ecrit) ? $ecrit : 0;
                $count++;

                $notes[$moisNom] = ['orale' => $orale, 'ecrit' => $ecrit];
            } else {
                $noteCompo = Noter::where([
                    'eleve_id' => $eleve->id,
                    'classe_id' => $classe->id,
                    'matiere_id' => $matiere->id,
                    'annee_scolaire_id' => $annee->id,
                    'semestre' => $j,
                    'mois' => $moisNom,
                    'type_note' => 'Composition'
                ])->first()?->note_composition ?? null;

                $notes['composition'] = $noteCompo;
            }
        }

        $moyCours = $count > 0 ? ((($sommeOrale / $count) + ($sommeEcrit / $count)) / 2) : 0;
        $moyenneMatiere = ($moyCours + 2 * ($noteCompo ?? 0)) / 3;

        $resultats[] = [
            'libelle_matiere' => $matiere->libelle_matiere,
            'coefficient' => $coef,
            'notes' => $notes ,
            'moyenne_cours' => round($moyCours, 2),
            'note_composition' => $noteCompo,
            'moyenne_matiere' => round($moyenneMatiere, 2),
        ];

        $totalCours += $moyCours * $coef;
        $totalCompo += $noteCompo * $coef;
        $totalCoef += $coef;
    }

    $moyGenCours = $totalCoef ? $totalCours / $totalCoef : 0;
    $moyGenCompo = $totalCoef ? $totalCompo / $totalCoef : 0;
    $moySemestre = ($moyGenCours + 2 * $moyGenCompo) / 3;

    $mg+=$moySemestre;

    }
    
    return response()->json([
        'annee_scolaire' => Carbon::parse($annee->dateDebut)->year ." - ".Carbon::parse($annee->DateFin)->year,
        'MoyenneSemestrielle' => round($mg/2, 2),
    ]);
}

private function moisDuSemestre($annee, $semestre)
{
    $mois = [];
    $dateDebut = Carbon::parse($annee->dateDebut);
    $dateFin = Carbon::parse($annee->DateFin);
    Carbon::setLocale('fr');

    while ($dateDebut <= $dateFin) {
        $mois[] = [
            'numeroMois' => $dateDebut->format('m'),
            'nomMois' => $dateDebut->translatedFormat('F')
        ];
        $dateDebut->addMonth();
    }

    return $semestre == 1 ? array_slice($mois, 0, 4) : array_slice($mois, 4, 4);
}
private function getMention($moy)
{
    return match (true) {
        $moy >= 16 => 'Très Bien',
        $moy >= 14 => 'Bien',
        $moy >= 12 => 'Assez Bien',
        $moy >= 10 => 'Passable',
        $moy >= 8 => 'Insuffisant',
        default => 'Très Faible',
    };
}

public function bulletinsDisoEleve($id)
{
    $elevesNotés = Noter::select('eleve_id', 'semestre', 'annee_scolaire_id', 'classe_id')
        ->where('eleve_id',$id)
        ->with(['eleve:id,matricule_eleve,nom_eleve,prenom_eleve', 'classe:id,nom_classe,niveau,option_id', 'anneeScolaire:id,dateDebut,DateFin'])
        ->groupBy('eleve_id', 'semestre', 'annee_scolaire_id', 'classe_id')
        ->get();

    return response()->json($elevesNotés);
}
}
