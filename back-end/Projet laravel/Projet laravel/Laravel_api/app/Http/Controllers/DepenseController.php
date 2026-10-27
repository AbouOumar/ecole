<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepenseRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Depense;
use App\Models\ficheRenseignement;
use App\Models\Ins_reins;
use App\Models\Payement;
use App\Models\Reduction;
use App\Models\Salaire;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DepenseController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des depenses
        $depenses = Depense::with('compte','typeDepense')->where('typeTransaction','retrait')->get();
        return response()->json( $depenses );
    }

    public function recette()
    {
        //methode pour voir la liste des recette
        $depenses = Depense::with('compte','typeDepense')->where('typeTransaction','depôt')->get();
        return response()->json( $depenses );
    }

    
    public function create(DepenseRequest $request)
    {
        $idAnneeEncours=AnneeScolaire::latest('id')->get('id')->first()->id;
        //methode pour enregistrer un depense
        //verification de la recuperation de l'image
        if($request->hasFile('piece_jointe')){
            $file = $request->file('piece_jointe');
            $nomFichier = time() . '_' . $file->getClientOriginalName();
            $uploadPath = $file->storeAs('images/pieceJointe',$nomFichier, 'public');
        }else{
            $nomFichier='';
        }
        
        $depense =  $request->validated();
        $depense = Depense::create([
            'compte_id'=>$depense['compte_id'],
            'type_depense_id'=>$depense['type_depense_id'],
            'typeTransaction'=>$depense['typeTransaction'],
            'montantTransanction'=>$depense['montantTransanction'],
            'description'=>$depense['description'],
            'piece_jointe'=>$nomFichier,
            'annee_scolaire_id'=>$idAnneeEncours
        ]);
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un depense par id
        $depense = Depense::find($id);
        if(is_null($depense)){
            return response()->json(['message'=>'cette depense n existe pas'],404);
        }
        return response()->json($depense);
    }
    public function update(DepenseRequest $request, string $id)
    {
        $idAnneeEncours=AnneeScolaire::latest('id')->get('id')->first()->id;
        $depense = Depense::find($id);
        //methode pour modifier un depense
        if (!$depense) {
            return response()->json(['message' => 'Cette depense n\'existe pas'], 404);
        }
        // 🔹 Vérifier si une nouvelle image a été envoyée
        if ($request->hasFile('piece_jointe')) {
            // Supprimer l'ancienne piece_jointe si elle existe
            if ($depense->piece_jointe && file_exists(public_path('storage/images/pieceJointe/' . $depense->piece_jointe))) {
                unlink(public_path('storage/images/pieceJointe/' . $depense->piece_jointe));
            }
    
            // Stocker la nouvelle piece_jointe
            $file = $request->file('piece_jointe');
             $nomFichier = time() . '_' . $file->getClientOriginalName();
             $uploadPath = $file->storeAs('images/pieceJointe',$nomFichier, 'public'); 
        }else{
            if ($depense->piece_jointe) {
                $nomFichier=$depense->piece_jointe;
            }else{
                $nomFichier="";
            }
        }
        
        $donneeValide =  $request->validated();
        $depense ->update([
            'compte_id'=>$donneeValide['compte_id'],
            'type_depense_id'=>$donneeValide['type_depense_id'],
            'typeTransaction'=>$donneeValide['typeTransaction'],
            'montantTransanction'=>$donneeValide['montantTransanction'],
            'description'=>$donneeValide['description'],
            'piece_jointe'=>$nomFichier,
            'annee_scolaire_id'=>$idAnneeEncours
        ]);
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function recetteCasReduction()
    {
        App::setlocale('fr');
        Carbon::setLocale('fr');
    
        // Somme des paiements par année scolaire et mois
        $payements = Payement::selectRaw('annee_scolaire_id, MONTH(created_at) as mois, SUM(montant_payement) as montant_payement')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(created_at)'))
            ->get();
    
        // Somme des inscriptions/réinscriptions par année scolaire et mois
        $insReins = Ins_reins::selectRaw('annee_scolaire_id, MONTH(created_at) as mois, SUM(montant) as montant')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(created_at)'))
            ->get();
    
        // Somme des dépenses pour le type "Recette" par année scolaire et mois
        $depenses = Depense::join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
            ->where('type_depenses.libelle', 'Recette')
            ->selectRaw('annee_scolaire_id, MONTH(depenses.created_at) as mois, SUM(depenses.montantTransanction) as montant_depense')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(depenses.created_at)'))
            ->get();
    
        // Somme des paiements dans le compte bancaire par année scolaire et mois
        $payementBanques = Payement::join('comptes', 'comptes.id', '=', 'payements.compte_id')
            ->where('comptes.nomCompte', '!=', 'Caisse')
            ->selectRaw('annee_scolaire_id, MONTH(payements.created_at) as mois, SUM(montant_payement) as montant_payement')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(payements.created_at)'))
            ->get();
    
        // Somme des réductions par année scolaire et mois
        $reductions = Reduction::selectRaw('annee_scolaire_id, MONTH(created_at) as mois, SUM(montant_reduction) as montant_reduction')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(created_at)'))
            ->get();
    
        // Somme des dépenses dans le compte bancaire pour le type "Recette" par année scolaire et mois
        $depenseBanques = Depense::join('type_depenses', 'type_depenses.id', '=', 'depenses.type_depense_id')
            ->join('comptes', 'comptes.id', '=', 'depenses.compte_id')
            ->where('type_depenses.libelle', 'Recette')
            ->where('comptes.nomCompte', '!=', 'Caisse')
            ->selectRaw('annee_scolaire_id, MONTH(depenses.created_at) as mois, SUM(depenses.montantTransanction) as montant_depense')
            ->groupBy(DB::raw('annee_scolaire_id, MONTH(depenses.created_at)'))
            ->get();
    
        // Calcul de results1 (paiements + dépenses + inscriptions/réinscriptions)
        $results1 = $payements->map(function ($payement) use ($depenses, $insReins) {
            $depense = $depenses->firstWhere(function ($depense) use ($payement) {
                return $depense->annee_scolaire_id == $payement->annee_scolaire_id && $depense->mois == $payement->mois;
            });
    
            $insRein = $insReins->firstWhere(function ($insRein) use ($payement) {
                return $insRein->annee_scolaire_id == $payement->annee_scolaire_id && $insRein->mois == $payement->mois;
            });
    
            $montantDepense = $depense ? $depense->montant_depense : 0;
            $montantInsReins = $insRein ? $insRein->montant : 0;
    
            return [
                'annee_scolaire_id' => $payement->annee_scolaire_id,
                'mois' => $payement->mois,
                'somme_total' => $payement->montant_payement + $montantDepense + $montantInsReins
            ];
        });
    
        // Calcul de results2 (paiements bancaires + dépenses bancaires)
        $results2 = $payementBanques->map(function ($payement) use ($depenseBanques) {
            $depense = $depenseBanques->firstWhere(function ($depense) use ($payement) {
                return $depense->annee_scolaire_id == $payement->annee_scolaire_id && $depense->mois == $payement->mois;
            });
    
            $montantDepense = $depense ? $depense->montant_depense : 0;
    
            return [
                'annee_scolaire_id' => $payement->annee_scolaire_id,
                'mois' => $payement->mois,
                'somme_total' => $payement->montant_payement + $montantDepense
            ];
        });
  
        // Fusionner les mois de results1 et results2 en supprimant les doublons
        $mergedResults = $results1->merge($results2)->unique(function ($item) {
            return $item['annee_scolaire_id'] . '-' . $item['mois'];
        });
    
        // Initialisation de la somme des réductions annuelles
        $totalReductionAnnee = 0;
    
        // Fusion finale avec l'ajout des réductions et de la recette en banque
        $result = $mergedResults->map(function ($item) use ($results1, $results2, $reductions, &$totalReductionAnnee) {
            $result1 = $results1->firstWhere(function ($result) use ($item) {
                return $result['annee_scolaire_id'] == $item['annee_scolaire_id'] && $result['mois'] == $item['mois'];
            });
    
            $result2 = $results2->firstWhere(function ($result) use ($item) {
                return $result['annee_scolaire_id'] == $item['annee_scolaire_id'] && $result['mois'] == $item['mois'];
            });
    
            $reduction = $reductions->firstWhere(function ($reduction) use ($item) {
                return $reduction['annee_scolaire_id'] == $item['annee_scolaire_id'] && $reduction['mois'] == $item['mois'];
            });
    
            $montantReduction = $reduction ? $reduction->montant_reduction : 0;
            $totalReductionAnnee += $montantReduction;
    
            $moisNom = Carbon::createFromFormat('m', $item['mois'])->translatedFormat('F');
    
            return [
                'annee_scolaire_id' => $item['annee_scolaire_id'],
                'mois' => $moisNom,
                'recetteGlobalApresenter' => $result1 ? $result1['somme_total'] : 0,
                'recetteMensuelEnBanque' => $result2 ? $result2['somme_total'] : 0,
                'totalReductionAnnee' => $totalReductionAnnee,
                'soldeReduction' => $montantReduction
            ];
        });
    
        return response()->json($result);
    }

    public function situationPrevisionnelDepense($annee){
        $tableau=[];
        if($annee ==0){
            $idAnneeScolaire=AnneeScolaire::latest()->first();
        }else{
            $idAnneeScolaire=AnneeScolaire::find($annee) ;
            if(!$idAnneeScolaire){return response()->json(array_values($tableau));}
        }
        
        $ficheRenseignements = ficheRenseignement::all();
        foreach($ficheRenseignements as $ficheRenseignement){
            // Déterminer la plage de dates (du début de l'année scolaire jusqu'au mois en cours)
            $lesMois = $idAnneeScolaire->getMoisDansIntervalle();
            $dateDebut = Carbon::parse($idAnneeScolaire->dateDebut)->startOfMonth();
            $recetteNiveau= collect($lesMois)->map(function ($lesMoi) use ($dateDebut, $idAnneeScolaire,$ficheRenseignement) {
                // Définir la date de fin comme la fin du mois sélectionné
                $dateFin = Carbon::parse($lesMoi['date'])->endOfMonth();
                $niveau=$ficheRenseignement['niveau'];
                $fraisScolariteAnnuel=$ficheRenseignement['tranche1']+$ficheRenseignement['tranche2']+$ficheRenseignement['tranche3'];
                // Compter les enregistrements pour chaque mois séparément
                $nomBreInsReins = Ins_reins::with('classe')
                    ->whereBetween('created_at', [$dateDebut, $dateFin]) // Filtre uniquement pour ce mois
                    ->whereHas('classe', function($query) use ($niveau) {
                        $query->where('niveau',$niveau);
                    })
                    ->count();
                    
                $payements = Payement::whereBetween('created_at', [$dateDebut, $dateFin])
                ->selectRaw('SUM(montant_payement) as montant_payement')
                ->whereHas('classe', function($query) use ($niveau) {
                    $query->where('niveau',$niveau);
                })
                ->first();
                $recetteTotalMois =0;
                if($payements['montant_payement'] != null){
                   $recetteTotalMois = $payements['montant_payement']; 
                }
                
                    return [
                        'mois' => $lesMoi['mois_nom'],
                        'effectifNet' => $nomBreInsReins,
                        'fraisScolariteAnnuel' => $nomBreInsReins * $fraisScolariteAnnuel,
                        'recetteTotalMois' => $recetteTotalMois,
                    ];
            });
            $tableau[$ficheRenseignement['niveau']]=[
                'annee_scolaire_id' => $idAnneeScolaire->id,
                'niveau' => $ficheRenseignement['niveau'], 
                'recetteNiveau'=>$recetteNiveau
            ];
        }
        return response()->json(array_values($tableau));
    }

    public function comparaisonDepense($annee){
        $tableau=[];
        if($annee ==0){
            $idAnneeScolaire=AnneeScolaire::latest()->first();
        }else{
            $idAnneeScolaire=AnneeScolaire::find($annee) ;
            if(!$idAnneeScolaire){return response()->json(array_values($tableau));}
        }


        $lesMois = $idAnneeScolaire->getMoisDansIntervalle();
        $dateDebut = Carbon::parse($idAnneeScolaire->dateDebut)->startOfMonth();

        $depenseSalaire= collect($lesMois)->map(function ($lesMoi) use ($dateDebut, $idAnneeScolaire) {
            // Définir la date de fin comme la fin du mois sélectionné
            $dateFin = Carbon::parse($lesMoi['date'])->endOfMonth();
            
            $salaire = Salaire::where('mois', $lesMoi['mois_nom'])
                ->selectRaw('SUM(salaire_net) as salaire_net')
                ->first();
            // Somme des paiements dans le compte bancaire par année scolaire et mois
            $payements = Payement::whereBetween('created_at', [$dateDebut, $dateFin])
                ->selectRaw('SUM(montant_payement) as montant_payement')
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
                $payementBanque =0;
                if($payements['montant_payement'] != null){
                    $payementBanque = $payements['montant_payement']; 
                }
                $depensePrevisonnelSalaire =0;
                if($salaire['salaire_net'] != null){
                    $depensePrevisonnelSalaire = $salaire['salaire_net']; 
                }
                $depense =0;
                if($depenses['montant_depense'] != null){
                    $depense = $depenses['montant_depense']; 
                    
                }
                

                $recetteEnBanque =0;
                if($recettes['montant_depense'] != null){
                    $recetteEnBanque = $recettes['montant_depense']; 
                }
                
                $recetteEnBanque=$recetteEnBanque-$depense;

                if($recetteEnBanque >= $depensePrevisonnelSalaire){$observation='Positif';}else{$observation='Negatif';}
                return [
                    'mois' => $lesMoi['mois_nom'],
                    'recetteEnBanque' => $payementBanque+$recetteEnBanque,
                    'depensePrevisonnelSalaire' => $depensePrevisonnelSalaire,
                    'observation' => $observation,
                ];
        });
        return response()->json($depenseSalaire);
    }

 
    
    
    public function delete(string $id)
    {
        //methode pour supprimer un depense
        $depense = Depense::find($id);
    
        if (!$depense) {
            return response()->json(['message' => 'Cette depense n\'existe pas'], 404);
        }
    
        $depense->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
