<?php

namespace App\Http\Controllers\gestion_eleve;

use App\ClassesTransfereData\Journal;
use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\CompteRequest;
use App\Models\AnneeScolaire;
use App\Models\Compte;
use App\Models\Depense;
use App\Models\Ins_reins;
use App\Models\Payement;
use App\Models\PayementSalaire;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des comptes
        $comptes = Compte::all();
        return response()->json( $comptes );
    }

  
    public function create(CompteRequest $request)
    {
        //methode pour enregistrer un Compte
        $compte = Compte::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un Compte par id
        $compte = Compte::find($id);
        if(is_null($compte)){
            return response()->json(['message'=>'ce Compte n existe pas'],404);
        }
        return response()->json($compte);
    }
    public function update(CompteRequest $request, string $id)
    {
           //methode pour modifier un compte
        $compte = Compte::find($id);
        if (!$compte) {
            return response()->json(['message' => 'Ce Compte n\'existe pas'], 404);
        }
        $compte->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un Compte
        $compte = Compte::find($id);
    
        if (!$compte) {
            return response()->json(['message' => 'Ce Compte n\'existe pas'], 404);
        }
    
        $compte->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }


    public function liste_journal()
    {
        //afficher les journals 

        $payementSalaires = PayementSalaire::with(['salaire.personnel'])
        ->with('compte')
        ->get();
        
        $payementScolarites = Payement::with('eleve')
        ->with('compte')
        ->get();

        $fraisInscriptions = Ins_reins::with('eleve')
        ->get();
        $compteInsReins=Compte::where('nomCompte','Caisse')->first();

        $depenseRecettes = Depense::with('compte')
        ->with('typeDepense')
        ->get();

        $journal = new Collection();
        
        foreach ($payementSalaires as $payementSalaire) {
            $date=Carbon::parse($payementSalaire->updated_at)->format('d-m-Y H:i:s');
            $evenement='Payement de salaire de M.'.$payementSalaire->salaire->personnel->nom_personnel.' '.$payementSalaire->salaire->personnel->prenom_personnel.'matricule '.$payementSalaire->salaire->personnel->matricule_personnel;
            $journal->push(new Journal($payementSalaire->id, $evenement, $payementSalaire->montant, $date, $payementSalaire->compte_id, $payementSalaire->compte->nomCompte,'Crédit',$payementSalaire->updated_at,$payementSalaire->compte->numeroCompte));
        }
        
        foreach ($payementScolarites as $payementScolarite) {
            $date=Carbon::parse($payementScolarite->updated_at)->format('d-m-Y H:i:s');
            $evenement='Payement de scolarité pour l\'eleve '.$payementScolarite->eleve->nom_eleve.' '.$payementScolarite->eleve->prenom_eleve.' matricule '.$payementScolarite->eleve->matricule_eleve;
            $journal->push(new Journal($payementScolarite->id, $evenement, $payementScolarite->montant_payement, $date, $payementScolarite->compte_id, $payementScolarite->compte->nomCompte,'Débit',$payementScolarite->updated_at,$payementScolarite->compte->numeroCompte));
        }
        foreach ($fraisInscriptions as $fraisInscription) {
            $date=Carbon::parse($fraisInscription->updated_at)->format('d-m-Y H:i:s');
            $evenement=$fraisInscription->type.' de l\'eleve '.$fraisInscription->eleve->nom_eleve.' '.$fraisInscription->eleve->prenom_eleve.' matricule '.$fraisInscription->eleve->matricule_eleve;
            $journal->push(new Journal($fraisInscription->id, $evenement, $fraisInscription->montant, $date, $compteInsReins->id, $compteInsReins->nomCompte,'Débit',$compteInsReins->updated_at,$compteInsReins->numeroCompte));
        }
        foreach ($depenseRecettes as $depenseRecette) {
            $date=Carbon::parse($depenseRecette->updated_at)->format('d-m-Y H:i:s');
            if($depenseRecette->typeTransaction=="depôt"){
                $evenement=$depenseRecette->description;
                $type='Débit';
            }else{
                $type='Crédit';
                $evenement=$depenseRecette->typeDepense->libelle;           
             }
            $journal->push(new Journal($depenseRecette->id, $evenement, $depenseRecette->montantTransanction, $date, $depenseRecette->compte_id, $depenseRecette->compte->nomCompte,$type,$depenseRecette->updated_at,$depenseRecette->compte->numeroCompte));
        }
        $journal= $journal->sortByDesc(fn($item)=>$item->updated_at)->values();
        if(!$journal){
            return response()->json(['message' => 'Erreur lors du chargement des actions']);
        }
        return response()->json($journal);
    }

    public function liste_balance()
    {
        // Appeler la méthode qui retourne les transactions
        $transactionsJson = $this->liste_journal();
        $AnneeScolaire="";
        $idAnneeScolaire=AnneeScolaire::latest('id')->get('DateFin')->first();
        // Convertir la réponse JSON en tableau PHP
        $transactions = json_decode($transactionsJson->getContent(), true);

        // Grouper par compte_id, type et année en sommant les montants
        $resultats = [];
        foreach ($transactions as $transaction) {
            $compte_id = $transaction['compte_id'];
            $type = $transaction['type'];
            $nomCompte = $transaction['nomCompte'];
            $numeroCompte = $transaction['numeroCompte'];
            $annee = date('Y', strtotime($transaction['date']));

            $AnneeScolaire=Carbon::parse($idAnneeScolaire->DateFin)->format('d-m-Y H:i:s');
            $AnneeScolaire=date('Y', strtotime($AnneeScolaire));


            $key = $compte_id . '_' . $annee;

            if (!isset($resultats[$key])) {
                $resultats[$key] = [
                    'compte_id' => $compte_id,
                    'nomCompte' => $nomCompte,
                    'numeroCompte' => $numeroCompte,
                    'annee' => $annee,
                    'credit' => 0,
                    'debit' => 0
                ];
            }
            if($type=='Débit'){
                $resultats[$key]['debit'] += $transaction['montant'];
            }else{
                $resultats[$key]['credit'] += $transaction['montant'];
            }
            
        }

        return response()->json(['liste'=>array_values($resultats),'annee'=>$AnneeScolaire]);
    }
}
