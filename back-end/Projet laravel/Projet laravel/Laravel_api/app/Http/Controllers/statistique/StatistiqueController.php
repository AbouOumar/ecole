<?php

namespace App\Http\Controllers\statistique;

use App\Http\Controllers\Controller;
use App\Http\Controllers\gestion_personnel\PersonnelController;
use App\Models\Absence;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Depart;
use App\Models\Depense;
use App\Models\Effectif_classe;
use App\Models\Eleve;
use App\Models\ficheRenseignement;
use App\Models\Ins_reins;
use App\Models\Matiere;
use App\Models\Payement;
use App\Models\PayementSalaire;
use App\Models\Salaire;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function statistique_rapprochement(){
        // $dateFin = Carbon::now()->endOfMonth();
        App::setlocale('fr');
        Carbon::setLocale('fr');
        $moisFr = [
            'janvier' => 1,
            'février' => 2,
            'mars' => 3,
            'avril' => 4,
            'mai' => 5,
            'juin' => 6,
            'juillet' => 7,
            'août' => 8,
            'septembre' => 9,
            'octobre' => 10,
            'novembre' => 11,
            'décembre' => 12
        ];
        $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;

        $effectif_classe= Effectif_classe::with('classe')->get();
        // return response()->json($effectif_classe);


        $anneeScolaires = AnneeScolaire::all();
        $effectif_classe = $anneeScolaires->map(function ($annee) {
            // Déterminer la plage de dates (du début de l'année scolaire jusqu'au mois en cours)
            $lesMois = $annee->getMoisDansIntervalle();
            $dateDebut = Carbon::parse($annee->dateDebut)->startOfMonth();
        
            return collect($lesMois)->map(function ($lesMoi) use ($dateDebut, $annee) {
                // Définir la date de fin comme la fin du mois sélectionné
                $dateFin = Carbon::parse($lesMoi['date'])->endOfMonth();
        
                // Compter les enregistrements pour chaque mois séparément
                $effectif = Ins_reins::with('classe')
                    ->selectRaw('COUNT(id) as total_eleve, classe_id')
                    ->whereBetween('created_at', [$dateDebut, $dateFin]) // Filtre uniquement pour ce mois
                    ->groupBy('classe_id')
                    ->get();
        
                return [
                    'annee_scolaire_id' => $annee->id,
                    'mois' => $lesMoi['mois_nom'],
                    'effectif' => $effectif
                ];
            });
        });

        // Retourner la réponse JSON
        $departs = Depart::selectRaw('mois, classe_id, COUNT(*) as nbDepart')
            ->groupBy('mois', 'classe_id')
            ->orderBy('mois')
            ->orderBy('classe_id')
            ->get()
            ->map(function ($item) use ($moisFr) {
                // Vérifie si le mois existe dans le tableau des mois
                $moisNumber = isset($moisFr[strtolower($item->mois)]) ? $moisFr[strtolower($item->mois)] : null;
                
                return [
                    'mois' => $moisNumber ? Carbon::create()->month($moisNumber)->translatedFormat('F') : $item->mois,
                    'classe_id' => $item->classe_id,
                    'nbDepart' => $item->nbDepart
                ];
            });

        // Étape 1 : Transformer les données en index "mois-classe_id"
        $dataIndex = [];

        foreach ($effectif_classe[0] as $effectifs) {
            
            foreach($effectifs['effectif'] as $effectif){
                
                if(count($effectifs['effectif'])>=0 ){
                    //   return response()->json($effectifs);
                    $key = strtolower($effectifs['mois']) . '-' . $effectif['classe_id']. '-' . $effectifs['annee_scolaire_id'];
                    $dataIndex[$key] = [
                        "mois" => ucfirst($effectifs['mois']),
                        "classe_id" => $effectif['classe_id'],
                        "nom_classe" => $effectif['classe']['nom_classe'],
                        "total_eleveEnClasse" => $effectif['classe']['effectif_total'],
                        "effectif_total" => $effectif['total_eleve'],
                        "annee_scolaire_id" => $effectifs['annee_scolaire_id'],
                        "nbDepart" => 0 // Valeur par défaut (si aucun départ)
                    ];

                }
            }
        }

        // Étape 2 : Fusionner les départs
        foreach ($departs as $depart) {
            $key = strtolower($depart['mois']) . '-' . $depart['classe_id']. '-' . $effectifs['annee_scolaire_id'];
            
            // Si l'entrée existe déjà, on met à jour nbDepart
            if (isset($dataIndex[$key])) {
                $dataIndex[$key]['nbDepart'] = $depart['nbDepart'];
            } else {
                // Si l'entrée n'existe pas, on l'ajoute
                $dataIndex[$key] = [
                    "mois" => ucfirst($depart['mois']),
                    "classe_id" => $depart['classe_id'],
                    "nom_classe" => "Inconnu", // Si on n'a pas d'info sur la classe
                    "total_eleveEnClasse" => 0,
                    "effectif_total" => 0, // Pas d'info sur l'effectif
                    "annee_scolaire_id" => 0,
                    "nbDepart" => $depart['nbDepart'],
                ];
            }
        }

        // Étape 3 : Retourner la réponse en JSON
        return response()->json(['liste'=>array_values($dataIndex),'mois'=>Carbon::now()->translatedFormat('F'),'annee'=>$idAnneeScolaire]);
    }

    public function statistique_rapprochement_annee(int $idAnneeScolaire){
        App::setlocale('fr');
        Carbon::setLocale('fr');
        if($idAnneeScolaire != 0){
            $departs = Depart::selectRaw('COUNT(*) as totalDepartAnnee')
            ->where('annee_scolaire_id',$idAnneeScolaire)
            ->first();

            $Teffectif_classe = Ins_reins::where('annee_scolaire_id',$idAnneeScolaire)->count();
        }else{
            $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;
            $departs = Depart::selectRaw('COUNT(*) as totalDepartAnnee')
            ->where('annee_scolaire_id',$idAnneeScolaire)
            ->first();
            $Teffectif_classe = Ins_reins::where('annee_scolaire_id',$idAnneeScolaire)->count();
        }

        $effectif_classes= Classe::selectRaw('SUM(effectif_total) as effectif_total')->first();
        // return response()->json($effectif_classes);
        $tableau=[
            'totalEleveAnnee'=> (int)$Teffectif_classe,
            'totalDepartAnnee'=> (int)$departs->totalDepartAnnee,
            'totalEleveEnClasseAnnee'=> (int)$effectif_classes['effectif_total']
        ];
        return response()->json(['totaux'=>$tableau]);
    }


    public function statistique_rapprochementMoisAnnee()
    {
        // Appel de la méthode statistique_rapprochement et récupération des données
        $statistiquesResponse = $this->statistique_rapprochement();
        $statistiques = $statistiquesResponse->getData();  // Récupérer les données de la réponse JSON

        // Initialisation des variables pour stocker la somme
        $sommeParMois = [];

        // Parcourir la liste des statistiques
        foreach ($statistiques->liste as $statistique) {
            // Créer une clé unique pour chaque mois et année
            $cle = strtolower($statistique->mois) . '-' . $statistique->annee_scolaire_id;

            // Si cette clé existe déjà, on ajoute les valeurs aux sommes existantes
            if (isset($sommeParMois[$cle])) {
                $sommeParMois[$cle]['total_eleveEnClasse'] += $statistique->total_eleveEnClasse;
                $sommeParMois[$cle]['effectif_total'] += $statistique->effectif_total;
                $sommeParMois[$cle]['nbDepart'] += $statistique->nbDepart;
            } else {
                // Sinon, on initialise les valeurs pour cette clé
                $sommeParMois[$cle] = [
                    'mois' => ucfirst($statistique->mois),
                    'annee_scolaire_id' => $statistique->annee_scolaire_id,
                    'total_eleveEnClasse' => $statistique->total_eleveEnClasse,
                    'effectif_total' => $statistique->effectif_total,
                    'nbDepart' => $statistique->nbDepart
                ];
            }
        }

        // Retourner les résultats sous forme de JSON ou autre format
        return response()->json([
            'liste' => array_values($sommeParMois),
            'mois' => Carbon::now()->translatedFormat('F'),
            'annee' => $statistiques->annee
        ]);
    }


    public function dasbord_comptable(){



        $date=Carbon::today()->toDateString();
        $absence = Absence::whereDate('created_at',$date)->count();

        $idAnneeScolaire=AnneeScolaire::latest()->first();
        $lesMois = $idAnneeScolaire->getMoisDansIntervalle();
        $dateDebut = Carbon::parse($idAnneeScolaire->dateDebut)->startOfMonth();
        $dateFin = Carbon::parse($idAnneeScolaire->DateFin)->endOfMonth();

        $payementAnnee = Payement::where('annee_scolaire_id',$idAnneeScolaire->id)
        ->sum('montant_payement');

        $payementSalaireAnnee = PayementSalaire::whereBetween('created_at', [$dateDebut, $dateFin])
        ->sum('montant');

        $insReinAnnee = Ins_reins::where('annee_scolaire_id',$idAnneeScolaire->id)
        ->sum('montant');

        $recettesAnnee = Depense::where('annee_scolaire_id',$idAnneeScolaire->id)
        ->join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
        ->where('type_depenses.libelle', 'Recette')
        ->sum('montantTransanction');
        $depensesAnnee = Depense::where('annee_scolaire_id',$idAnneeScolaire->id)
            ->join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
            ->where('type_depenses.libelle','!=', 'Recette')
            ->sum('montantTransanction');

        $totaux=[
            'payementAnnee'=>$payementAnnee,
            'payementSalaireAnnee'=>$payementSalaireAnnee,
            'insReinAnnee'=>$insReinAnnee,
            'recettesAnnee'=>$recettesAnnee,
            'depensesAnnee'=>$depensesAnnee,
        ];



        $depenseRecette= collect($lesMois)->map(function ($lesMoi) use ($dateDebut, $idAnneeScolaire) {
            // Définir la date de fin comme la fin du mois sélectionné
            $dateFin = Carbon::parse($lesMoi['date'])->endOfMonth();
            
            // Somme des paiements dans le compte bancaire par année scolaire et mois
            $payements = Payement::whereBetween('created_at', [$dateDebut, $dateFin])
                ->selectRaw('SUM(montant_payement) as montant_payement')
                ->first();

            // Somme des paiements de salaire dans le compte bancaire par année scolaire et mois
            $payementSalaire = PayementSalaire::whereBetween('created_at', [$dateDebut, $dateFin])
            ->selectRaw('SUM(montant) as montant')
            ->first();

            $recettes = Depense::whereBetween('depenses.created_at', [$dateDebut, $dateFin])
                ->join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
                ->where('type_depenses.libelle', 'Recette')
                ->selectRaw('SUM(depenses.montantTransanction) as montant_depense')
                ->first();
            $depenses = Depense::whereBetween('depenses.created_at', [$dateDebut, $dateFin])
                ->join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
                ->where('type_depenses.libelle','!=', 'Recette')
                ->selectRaw('SUM(depenses.montantTransanction) as montant_depense')
                ->first();
                    // Somme des inscriptions/réinscriptions par année scolaire et mois
            $insReins = Ins_reins::whereBetween('ins_reins.created_at', [$dateDebut, $dateFin])
                ->selectRaw('SUM(montant) as montant')
                ->first();


            $payementBanque =0;
            if($payements['montant_payement'] != null){
                $payementBanque = $payements['montant_payement']; 
            }

            $payementSalaireSomme =0;
            if($payementSalaire['montant'] != null){
                $payementSalaireSomme = $payementSalaire['montant']; 
            }

            $depense =0;
            if($depenses['montant_depense'] != null){
                $depense = $depenses['montant_depense']; 
                
            }                

            $recetteEnBanque =0;
            if($recettes['montant_depense'] != null){
                $recetteEnBanque = $recettes['montant_depense']; 
            }
            $insReinsSomme =0;
            if($insReins['montant'] != null){
                $insReinsSomme = $insReins['montant']; 
            }

            return [
                'mois' => $lesMoi['mois_nom'],
                'recettes' => $payementBanque+$recetteEnBanque+$insReinsSomme,
                'depenses' => $payementSalaireSomme+$depense,
            ];
        });
        
        $statistiquesResponseAnnee = $this->statistique_rapprochement_annee(0);
        $statistiquesAnnee = $statistiquesResponseAnnee->getData();
        $statistiquesAnnee = $statistiquesAnnee->totaux;
        $personnelController= new PersonnelController();

        $nbEleve = Eleve::count();
        $Enseignant = $personnelController->listeEnseignant()->getData();
        $Personnel = $personnelController->liste()->getData();
        
        $TeffectifIns = Ins_reins::where('annee_scolaire_id',$idAnneeScolaire->id)->where('type','Inscription')->count();
        $TeffectifREins = Ins_reins::where('annee_scolaire_id',$idAnneeScolaire->id)->where('type','Réinscription')->count();
        return response()->json([
            'effectif'=>$statistiquesAnnee->totalEleveAnnee,
            'effectifEnClasse'=> number_format((($TeffectifIns+$TeffectifREins-$absence)*100)/$statistiquesAnnee->totalEleveAnnee,2),
            'nbEleve'=>Eleve::count(),
            'nbClasse'=>Classe::count(),
            'nbMatiere'=>Matiere::count(),
            'nbEnseignant'=>count($Enseignant),
            'nbPersonnel'=>count($Personnel),
            'inscription'=>$TeffectifIns,
            'reinscription'=>$TeffectifREins,
            'enclasse'=>$TeffectifIns+$TeffectifREins-$absence,
            'recetteDepense'=>$depenseRecette,
            'recetteDepenseTotaux'=>$totaux,
        ]);
    }




}
