<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayementSalaireRequest;
use App\Models\AnneeScolaire;
use App\Models\Compte;
use App\Models\PayementSalaire;
use App\Models\Salaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayementSalaireController extends Controller
{

    public function liste()
    {
        //methode pour voir la liste des payement_salaires
        $payement_salaires = PayementSalaire::with('salaire.personnel','compte')->get();
        $idAnneeEncours = AnneeScolaire::latest('id')->value('id');

        return response()->json(['liste'=> $payement_salaires, 'anneEncours'=> $idAnneeEncours]);
    }

    
    public function create(PayementSalaireRequest $request)
    {
        //methode pour enregistrer un payement_salaire
        

        
        DB::transaction(function () use ($request) {
            PayementSalaire::create($request->validated());

            $compte=Compte::find($request['compte_id']);
            if($compte){
                $compte['solde']-=$request['montant'];
                $compte->save();
            }
        });
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un payement_salaire par id
        $payement_salaire = PayementSalaire::find($id);
        if(is_null($payement_salaire)){
            return response()->json(['message'=>'ce payement_salaire n existe pas'],404);
        }
        return response()->json($payement_salaire);
    }
    public function update(PayementSalaireRequest $request, string $id)
    {
           //methode pour modifier un payement_salaire
        $payement_salaire = PayementSalaire::find($id);
        
        if (!$payement_salaire) {
            return response()->json(['message' => 'Ce payement_salaire n\'existe pas'], 404);
        }
        $payement_salaire->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un payement_salaire
        $payement_salaire = PayementSalaire::find($id);
    
        if (!$payement_salaire) {
            return response()->json(['message' => 'Ce payement_salaire n\'existe pas'], 201);
        }
        $salaire= Salaire::find($payement_salaire['salaire_id']);
        if($salaire){
            DB::transaction(function () use ($salaire, $payement_salaire) {
                $salaire->statut="non payé";
                $salaire->save();

                $compte=Compte::find($payement_salaire['compte_id']);
                if($compte){
                    $compte['solde']+=$payement_salaire['montant'];
                    $compte->save();
                }
                $payement_salaire->delete();
            });
        }
        return response()->json(['message' => 'Annulation effectué avec succès']);
    }

    
}
