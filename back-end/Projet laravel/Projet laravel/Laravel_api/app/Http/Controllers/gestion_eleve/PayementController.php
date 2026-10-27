<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\PayementRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Compte;
use App\Models\Depense;
use App\Models\Eleve;
use App\Models\ficheRenseignement;
use App\Models\Ins_reins;
use App\Models\Payement;
use App\Models\PayementSalaire;
use App\Models\Reduction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayementController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des payements
        $payements = Payement::with('eleve')->with('classe')->with('compte')->orderBy('id','desc')->get();
        return response()->json( $payements );
    }
    public function listePayementDetail()
    {
        $eleves = Eleve::with(['parents', 'reductions', 'payements', 'classe.fraisScolarite'])->get();
    
        $result = $eleves->map(function ($eleve) {
            // Récupérer le premier parent
            $parent = $eleve->parents->first();
            $parentNom = $parent ? $parent->prenom_parent.' '.$parent->nom_parent : "Inconnu";
            $parentContact = $parent ? $parent->telephone_parent : "Inconnu";
    
            // **Récupérer toutes les classes et années où l'élève a payé ou eu une réduction**
            $classesAnnees = collect();
    
            // Ajouter toutes les classes + années des paiements
            foreach ($eleve->payements as $payement) {
                $classesAnnees->push([
                    'classe_id' => $payement->classe_id,
                    'annee_scolaire_id' => $payement->annee_scolaire_id
                ]);
            }
    
            // Ajouter toutes les classes + années des réductions
            foreach ($eleve->reductions as $reduction) {
                $classesAnnees->push([
                    'classe_id' => $reduction->classe_id,
                    'annee_scolaire_id' => $reduction->annee_scolaire_id
                ]);
            }
    
            // Supprimer les doublons
            $classesAnnees = $classesAnnees->unique(function ($item) {
                return $item['classe_id'] . '-' . $item['annee_scolaire_id'];
            });
    
            // Associer chaque classe + année à ses paiements et réductions
            $montantsParClasseAnnee = $classesAnnees->mapWithKeys(function ($item) use ($eleve) {
                $classeId = $item['classe_id'];
                $anneeScolaireId = $item['annee_scolaire_id'];
    
                // Vérifier qu'on a bien une année scolaire non nulle
                if (!$classeId || !$anneeScolaireId) {
                    return [];
                }
    
                // **Correction : Récupération correcte des montants**
                $totalReduction = $eleve->reductions
                    ->where('classe_id', $classeId)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->sum('montant_reduction'); 
    
                $totalPaiement = $eleve->payements
                    ->where('classe_id', $classeId)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->sum('montant_payement');
    
                return [
                    $classeId . '-' . $anneeScolaireId => [
                        'classe_id' => (int) $classeId,
                        'annee_scolaire_id' => (int) $anneeScolaireId,
                        'total_reduction' => $totalReduction, 
                        'total_paiement' => $totalPaiement
                    ]
                ];
            });
    
            // Générer le résultat final
            return $montantsParClasseAnnee->map(function ($montants) use ($eleve, $parentNom, $parentContact) {
                // Récupérer la classe
                $classe = Classe::with('fraisScolarite')->find($montants['classe_id']);
                $nomClasse = $classe ? $classe->nom_classe : "Inconnu";

                $matricule=$eleve->matricule_eleve;
                $nomComplet=$eleve->prenom_eleve.' '.$eleve->nom_eleve;
                // Calcul des frais annuels
                $fraisScolarite = $classe ? $classe->fraisScolarite : null;
                $fraisAnnuel = $fraisScolarite ? ($fraisScolarite->tranche1 + $fraisScolarite->tranche2 + $fraisScolarite->tranche3) : 0;
    
                // Calcul du reste à payer
                $netResteAPayer = $fraisAnnuel - $montants['total_reduction'] - $montants['total_paiement'];

                return [
                    "eleve_id" => $eleve->id,
                    "nom_eleve" => $eleve->nom_eleve,
                    "classe_id" => $montants['classe_id'],
                    "nom_classe" => $nomClasse,
                    "annee_scolaire_id" => $montants['annee_scolaire_id'],
                    "parent_nom" => $parentNom,
                    "parent_contact" => $parentContact,
                    "total_reduction" => $montants['total_reduction'],  
                    "total_paiement" => $montants['total_paiement'],
                    "fraisScolariteAnnuel" => $fraisAnnuel,
                    "netResteAPayer" => $netResteAPayer,
                    "matricule_eleve" => $matricule,
                    "nom_complet_eleve" => $nomComplet
                ];
            })->values();
        })->flatten(1);
        $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;
        return response()->json(['data'=>$result,'anneEncours'=>$idAnneeScolaire]);
    }
    
    public function create(PayementRequest $request)
    {
        //methode pour enregistrer un payement
        $idAnneeScolaire = AnneeScolaire::latest()->first();
                $payement =  $request->validated();
                $payement = Payement::create([
                    'eleve_id'=>$payement['eleve_id'],
                    'classe_id'=>$payement['classe_id'],
                    'annee_scolaire_id'=>$idAnneeScolaire['id'],
                    'compte_id'=>$payement['compte_id'],
                    'tranche'=>$payement['tranche'],
                    'montant_payement'=>$payement['montant_payement'],
                    'id_action_ecolage'=>$payement['id_action_ecolage'],
                ]);
            $compte =Compte::find($payement['compte_id']);
            if($compte){
                $compte['solde']+=$payement['montant_payement'];
            }
            $compte->update([$compte]);
        return response()->json(['message'=>'Enregistrement effectuer avec succès','id'=>$payement->id]);
    }

    public function show(int $id)
    {
        //methode pour voir un payement par id
        $payement = Payement::find($id);
        if(is_null($payement)){
            return response()->json(['message'=>'ce payement n existe pas'],404);
        }
        return response()->json($payement);
    }
    public function update(PayementRequest $request, string $id)
    {
           //methode pour modifier un payement
        $payement = Payement::find($id);
        
        if (!$payement) {
            return response()->json(['message' => 'Ce payement n\'existe pas'], 201);
        }elseif($payement->id_action_ecolage == 1){
            return response()->json(['message' => 'Ce payement est un ecolage veillez supprimez l\'ecolage'], 201);
        }

        $compte =Compte::find($payement['compte_id']);
        $compteN =Compte::find($request['compte_id']);
        if($compte){

            if($payement['compte_id']==$request['compte_id']){
                $compteN['solde']+=$request['montant_payement']-$payement['montant_payement'];
            }else{
                $compteN['solde']+=$request['montant_payement'];
                $compte['solde']-=$payement['montant_payement'];
            }

            $compte->update([$compte]);
            $compteN->update([$compteN]);
        }

        $payement->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un payement
        $payement = Payement::find($id);
    
        if (!$payement) {
            return response()->json(['message' => 'Ce payement n\'existe pas'], 201);
        }elseif($payement->id_action_ecolage == 1){
            return response()->json(['message' => 'Ce payement est un ecolage veillez supprimez l\'ecolage'], 201);
        }

            $compte =Compte::find($payement['compte_id']);
            if($compte){
                $compte['solde']-=$payement['montant_payement'];
            }
            $compte->update([$compte]);
    
        $payement->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }

    public function frais_scolairiteEleve($matricule){
        $eleve = Eleve::where('matricule_eleve',$matricule)
        ->with('classe')->first();
        if(!$eleve){
            return response()->json(['message'=>'Ce matricule n\'existe pas '],201);
        }
        $payementEleveClasses= Payement::where('eleve_id',$eleve['id'])
        ->where('classe_id',$eleve['classe_id'])
        ->get();

        $reductionEleveClasses= Reduction::where('eleve_id',$eleve['id'])
        ->where('classe_id',$eleve['classe_id'])
        ->get();

        $classe = Classe::where('id',$eleve['classe_id'])->first();
        if(!$classe){
            return response()->json(['message'=>'Ce matricule n\'est pas affectee à une classe '],201);
        }
        $fraisApayerParClasse = ficheRenseignement::where('niveau',$classe['niveau'])->first();
        $tableau=[];
        $tableau=[
             'tranche1'=>0,      
             'tranche2'=>0,    
             'tranche3'=>0,  
            'apayerTranche1'=>0,
            'apayerTranche2'=>0,       
            'apayerTranche3'=>0 ,      
            'resteTranche1'=>0,
            'resteTranche2'=>0,
            'resteTranche3'=>0,
            'totalRecuction'=>0,
        ];
        
        foreach($payementEleveClasses as $payementEleveClasse){
            if($payementEleveClasse['tranche']=='1ère Tranche'){
                $tableau['tranche1']=($payementEleveClasse['montant_payement']+$tableau['tranche1']);
            }elseif($payementEleveClasse['tranche']=='2ème Tranche'){
                $tableau['tranche2']=($payementEleveClasse['montant_payement']+$tableau['tranche2']);
            }elseif($payementEleveClasse['tranche']=='3ème Tranche'){
                $tableau['tranche3']=($payementEleveClasse['montant_payement']+$tableau['tranche3']);
            }
        }
        $tableau['apayerTranche1']=(int)$fraisApayerParClasse['tranche1'];
        $tableau['apayerTranche2']=(int)$fraisApayerParClasse['tranche2'];
        $tableau['apayerTranche3']=(int)$fraisApayerParClasse['tranche3'];
        foreach($reductionEleveClasses as $reductionEleveClasse){
            if($reductionEleveClasse['tranche']=='1ère Tranche'){
                $tableau['apayerTranche1']=($tableau['apayerTranche1']-$reductionEleveClasse['montant_reduction']);
            }elseif($reductionEleveClasse['tranche']=='2ème Tranche'){
                $tableau['apayerTranche2']=($tableau['apayerTranche2']-$reductionEleveClasse['montant_reduction']);
                
            }elseif($reductionEleveClasse['tranche']=='3ème Tranche'){
                $tableau['apayerTranche3']=($tableau['apayerTranche3']-$reductionEleveClasse['montant_reduction']);
            }
            $tableau['totalRecuction']=$tableau['totalRecuction']+$reductionEleveClasse['montant_reduction'];
        }
        $tableau['resteTranche1']=$tableau['apayerTranche1']-$tableau['tranche1'];
        $tableau['resteTranche2']=$tableau['apayerTranche2']-$tableau['tranche2'];
        $tableau['resteTranche3']=$tableau['apayerTranche3']-$tableau['tranche3'];
        return response()->json(['tableauTranche'=>[$tableau],'eleve'=>$eleve],200);
    }



    public function listeDesImpayes()
    {
        $eleves = Eleve::with(['classe', 'parents', 'ins_reins'])->get()->flatMap(function ($eleve) {
            // Vérifier s'il a des inscriptions
            if ($eleve->ins_reins->isEmpty()) return collect(); // Pas d'inscription, on ignore
    
            // Récupérer toutes les années où il a été inscrit
            return $eleve->ins_reins->map(function ($inscription) use ($eleve) {
                $anneeScolaireId = $inscription->annee_scolaire_id;
                $classeId = $inscription->classe_id;
                
                // Récupérer le niveau de la classe (via l'inscription)
                $niveau = Classe::where('id', $classeId)->value('niveau');
                
                // Récupérer les frais de scolarité en fonction du niveau
                $fraisScolarite = ficheRenseignement::where('niveau', $niveau)->first();
                if (!$fraisScolarite) return null;
    
                // Récupérer les réductions et paiements pour cette année
                $reductions = Reduction::where('eleve_id', $eleve->id)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->where('classe_id', $classeId)
                    ->get()
                    ->groupBy(function($paiement)
                        { return (int) filter_var($paiement->tranche, FILTER_SANITIZE_NUMBER_INT);
                    });

                $paiements = Payement::where('eleve_id', $eleve->id)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->where('classe_id', $classeId)
                    ->get()
                    ->groupBy(function($paiement)
                        { return (int) filter_var($paiement->tranche, FILTER_SANITIZE_NUMBER_INT);
                    });
                
                // Calcul des sommes par tranche (évite erreurs si vide)
                $sommeReductionT1 = $reductions->get(1, collect())->sum('montant_reduction');
                $sommeReductionT2 = $reductions->get(2, collect())->sum('montant_reduction');
                $sommeReductionT3 = $reductions->get(3, collect())->sum('montant_reduction');
    
                $sommePayerT1 = $paiements->get(1, collect())->sum('montant_payement');
                $sommePayerT2 = $paiements->get(2, collect())->sum('montant_payement');
                $sommePayerT3 = $paiements->get(3, collect())->sum('montant_payement');
                $netPayerTotal = $sommePayerT1 + $sommePayerT2 + $sommePayerT3;
                // Frais de scolarité
                $fraisT1 = $fraisScolarite->tranche1 ?? 0;
                $fraisT2 = $fraisScolarite->tranche2 ?? 0;
                $fraisT3 = $fraisScolarite->tranche3 ?? 0;
    
                // Calcul du net restant à payer
                $netResteT1 = max($fraisT1 - $sommePayerT1 - $sommeReductionT1, 0);
                $netResteT2 = max($fraisT2 - $sommePayerT2 - $sommeReductionT2, 0);
                $netResteT3 = max($fraisT3 - $sommePayerT3 - $sommeReductionT3, 0);
                $netResteTotal = $netResteT1 + $netResteT2 + $netResteT3;
                
                // Exclure les élèves sans impayés
                if ($netResteTotal == 0) return null;
    
                return [
                    'eleve_id' => $eleve->id,
                    'classe_id' => $classeId,
                    'nom_classe' => Classe::where('id', $classeId)->value('nom_classe'),
                    'annee_scolaire_id' => $anneeScolaireId,
                    'matricule_eleve' => $eleve->matricule_eleve,
                    'nom_complet_eleve' => $eleve->prenom_eleve.' '.$eleve->nom_eleve,
                    'parent_contact' => $eleve->parents->first()->telephone_parent ?? null,
                    'impayerTranche1' => $netResteT1,
                    'impayerTranche2' => $netResteT2,
                    'impayerTranche3' => $netResteT3,
                    'netResteAPayer' => $netResteTotal,
                    'dateInsReins' => $inscription->created_at,
                    'niveau' => $niveau,
                ];
            })->filter(); // Supprime les élèves sans impayés
        })->values(); // Réindexe la collection
    
        //calcul des totaux par annee
        $totalPaiementAnnee = Payement::selectRaw('annee_scolaire_id, SUM(montant_payement) as total_payement')
        ->groupBy('annee_scolaire_id')
        ->get();

        $totalReductionAnnee = Reduction::selectRaw('annee_scolaire_id, SUM(montant_reduction) as total_reduction')
        ->groupBy('annee_scolaire_id')
        ->get();
        $totalInsReinsAnnee = Ins_reins::selectRaw('annee_scolaire_id, SUM(montant) as total_inscription')
        ->groupBy('annee_scolaire_id')
        ->get();

        $totalImpayerAnnee = $eleves->groupBy('annee_scolaire_id')->map(function($elevesParAnnee){
            return $elevesParAnnee->sum('netResteAPayer');
        });

        return response()->json([
            'impayes'=>$eleves,
            'totaux'=>[
                'payements'=> $totalPaiementAnnee,
                'totalInscription'=> $totalInsReinsAnnee,
                'reductions'=> $totalReductionAnnee,
                'impayes'=> $totalImpayerAnnee,
            ]
        ]);
    }
    
    public function statistique_rapport()
    {
        // Récupérer la dernière année scolaire
        $idAnneeScolaire = AnneeScolaire::latest()->first();
        $ficheRenseignements = ficheRenseignement::all();
    
        // Initialisation des statistiques sous forme de Collection
        $statistiques = collect();
    
        foreach ($ficheRenseignements as $ficheRenseignement) {
            // Déterminer la plage de dates de l'année scolaire
            $lesMois = $idAnneeScolaire->getMoisDansIntervalle();
            $dateDebut = Carbon::parse($idAnneeScolaire->dateDebut)->startOfMonth();
    
            foreach ($lesMois as $lesMoi) {
                $dateFin = Carbon::parse($lesMoi['date'])->endOfMonth();
                $mois = $lesMoi['mois_nom'];
    
                // Vérifier si le mois existe déjà, sinon initialiser
                if (!$statistiques->has($mois)) {
                    $statistiques->put($mois, [
                        'mois' => $mois,
                        'recettePrevisionnelTotal' => 0,
                        'recetteComptable' => 0,
                        'impayeNetMois' => 0,
                        'tauxImpayeNette' => 0,
                        'depenseFonctionnementGlobal' => 0,
                        'epargneNetteMois' => 0,
                        'epargneDeficitaire' => 0,
                    ]);
                }
    
                // Récupérer les données nécessaires
                $niveau = $ficheRenseignement['niveau'];
                $fraisScolariteAnnuel = $ficheRenseignement['tranche1'] + $ficheRenseignement['tranche2'] + $ficheRenseignement['tranche3'];
                    // Compter les enregistrements pour chaque mois séparément
                    $nomBreInsReins = Ins_reins::with('classe')
                    ->whereBetween('created_at', [$dateDebut, $dateFin]) // Filtre uniquement pour ce mois
                    ->whereHas('classe', function($query) use ($niveau) {
                        $query->where('niveau',$niveau);
                    })
                    ->count();
                    $fraisScolariteAnnuel= $nomBreInsReins * $fraisScolariteAnnuel;
                // Récupérer les paiements effectués
                $payements = Payement::whereBetween('created_at', [$dateDebut, $dateFin])
                    ->whereHas('classe', function ($query) use ($niveau) {
                        $query->where('niveau', $niveau);
                    })
                    ->sum('montant_payement');
                // Récupérer les réductions pour cette année
                $reductions = Reduction::whereBetween('created_at', [$dateDebut, $dateFin])
                ->sum('montant_reduction');

                // Récupération des dépenses
                $depenseSalaire = PayementSalaire::whereBetween('created_at', [$dateDebut, $dateFin])->sum('montant');
                $depenseAutres = Depense::whereBetween('depenses.created_at', [$dateDebut, $dateFin])
                    ->join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
                    ->where('type_depenses.libelle', '!=', 'Recette')
                    ->sum('depenses.montantTransanction');
                // Somme des inscriptions/réinscriptions par année scolaire et mois
                $insReins = Ins_reins::whereBetween('created_at', [$dateDebut, $dateFin])
                ->sum('montant');
    
                $depenseTotale = $depenseSalaire + $depenseAutres;
    
                // Calcul de l'impayé net du mois
                $impayeNetMois = max(0, $fraisScolariteAnnuel - $payements -$reductions);
    
                // Récupérer les valeurs actuelles du mois
                $currentStats = $statistiques->get($mois);
                $epargneDeficitaire = max(0, $depenseTotale - ($currentStats['recetteComptable'] + $payements+ $insReins));


                                // Calcul du taux d’épargne et taux d’épargne déficitaire
                $tauxEpargne = 0;
                $tauxEpargneDeficitaire = 0;

                if ($currentStats['recetteComptable'] + $payements > 0) {
                    if ( $currentStats['epargneNetteMois'] + max(0, $payements+ $insReins - $depenseTotale) > 0) {
                        $tauxEpargne = ( ($currentStats['epargneNetteMois'] + max(0, $payements+ $insReins - $depenseTotale)) / ($currentStats['recetteComptable'] + $payements)) * 100;
                    } elseif ( $currentStats['epargneNetteMois'] + max(0, $payements+ $insReins - $depenseTotale) < 0) {
                        $tauxEpargneDeficitaire = (abs( $currentStats['epargneNetteMois'] + max(0, $payements+ $insReins - $depenseTotale)) / ($currentStats['recetteComptable'] + $payements)) * 100;
                    }
                }
                // Mettre à jour les statistiques du mois
                $statistiques->put($mois, [
                    'mois' => $mois,
                    'recettePrevisionnelTotal' => $currentStats['recettePrevisionnelTotal'] + $fraisScolariteAnnuel,
                    'recetteComptable' => $currentStats['recetteComptable'] + $payements+ $insReins,
                    'impayeNetMois' => $currentStats['impayeNetMois'] + $impayeNetMois,
                    'epargneDeficitaire' => $epargneDeficitaire,
                    'depenseFonctionnementGlobal' => $depenseTotale,
                    'epargneNetteMois' => $currentStats['epargneNetteMois'] + max(0, $payements+ $insReins - $depenseTotale),
                    'tauxImpayeNette' =>round(($currentStats['recettePrevisionnelTotal'] + $fraisScolariteAnnuel) > 0
                    ? (($currentStats['impayeNetMois'] + $impayeNetMois)  * 100/ ($currentStats['recettePrevisionnelTotal'] + $fraisScolariteAnnuel))
                    : 0,2) ,
                    'tauxEpargne' => round($tauxEpargne,2) ,
                    'tauxEpargneDeficitaire' =>round($tauxEpargneDeficitaire,2),
                ]);
            }
        }
    
        // Retourner les statistiques sous format JSON
        return response()->json($statistiques->values());
    }






    public function ImpayesEleve($id)
    {
        $eleve = Eleve::with(['classe', 'parents', 'ins_reins'])->find($id);

        if(!$eleve){
            return response()->json("Cet élève n'existe pas");
        }
            // Récupérer toutes les années où il a été inscrit
            return $eleve->ins_reins->map(function ($inscription) use ($eleve) {
                $anneeScolaireId = $inscription->annee_scolaire_id;
                $classeId = $inscription->classe_id;
                
                // Récupérer le niveau de la classe (via l'inscription)
                $niveau = Classe::where('id', $classeId)->value('niveau');
                
                // Récupérer les frais de scolarité en fonction du niveau
                $fraisScolarite = ficheRenseignement::where('niveau', $niveau)->first();
                if (!$fraisScolarite) return null;
    
                // Récupérer les réductions et paiements pour cette année
                $reductions = Reduction::where('eleve_id', $eleve->id)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->where('classe_id', $classeId)
                    ->get()
                    ->groupBy(function($paiement)
                        { return (int) filter_var($paiement->tranche, FILTER_SANITIZE_NUMBER_INT);
                    });

                $paiements = Payement::where('eleve_id', $eleve->id)
                    ->where('annee_scolaire_id', $anneeScolaireId)
                    ->where('classe_id', $classeId)
                    ->get()
                    ->groupBy(function($paiement)
                        { return (int) filter_var($paiement->tranche, FILTER_SANITIZE_NUMBER_INT);
                    });
                
                // Calcul des sommes par tranche (évite erreurs si vide)
                $sommeReductionT1 = $reductions->get(1, collect())->sum('montant_reduction');
                $sommeReductionT2 = $reductions->get(2, collect())->sum('montant_reduction');
                $sommeReductionT3 = $reductions->get(3, collect())->sum('montant_reduction');
    
                $sommePayerT1 = $paiements->get(1, collect())->sum('montant_payement');
                $sommePayerT2 = $paiements->get(2, collect())->sum('montant_payement');
                $sommePayerT3 = $paiements->get(3, collect())->sum('montant_payement');
                // Frais de scolarité
                $fraisT1 = $fraisScolarite->tranche1 ?? 0;
                $fraisT2 = $fraisScolarite->tranche2 ?? 0;
                $fraisT3 = $fraisScolarite->tranche3 ?? 0;
    
                // Calcul du net restant à payer
                $netResteT1 = max($fraisT1 - $sommePayerT1 - $sommeReductionT1, 0);
                $netResteT2 = max($fraisT2 - $sommePayerT2 - $sommeReductionT2, 0);
                $netResteT3 = max($fraisT3 - $sommePayerT3 - $sommeReductionT3, 0);
                $netResteTotal = $netResteT1 + $netResteT2 + $netResteT3;
    
                return $netResteTotal;
            })->filter(); // Supprime les élèves sans impayés

        return response()->json(array_values($eleve) );
    }
    }
