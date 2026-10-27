<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\RecuPayementRequest;
use App\Models\Payement;
use App\Models\Recu_payement;
use Illuminate\Http\Request;

class RecuPayementController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des recu_payements
        $recu_payements = Recu_payement::all();
        return response()->json( $recu_payements );
    }

    
    public function create(RecuPayementRequest $request)
    {
        //methode pour enregistrer un recu_payement
        $recu_payement = Recu_Payement::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un recu_payement par id
        $recu_payement = Recu_payement::find($id);
        if(is_null($recu_payement)){
            return response()->json(['message'=>'ce recu_payement n existe pas'],404);
        }
        return response()->json($recu_payement);
    }
    public function update(RecuPayementRequest $request, string $id)
    {
           //methode pour modifier un recu_payement
        $recu_payement = Recu_payement::find($id);
        
        if (!$recu_payement) {
            return response()->json(['message' => 'Ce recu_payement n\'existe pas'], 404);
        }
        $recu_payement->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un recu_payement
        $recu_payement = Recu_payement::find($id);
    
        if (!$recu_payement) {
            return response()->json(['message' => 'Ce recu_payement n\'existe pas'], 404);
        }
    
        $recu_payement->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
