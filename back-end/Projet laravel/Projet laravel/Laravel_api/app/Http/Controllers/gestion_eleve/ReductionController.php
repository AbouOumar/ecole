<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReductionRequest;
use App\Models\AnneeScolaire;
use App\Models\Eleve;
use App\Models\Reduction;
use Illuminate\Http\Request;

class ReductionController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des reductions
        $reductions = Reduction::all();
        return response()->json( $reductions );
    }

    
    public function create(ReductionRequest $request)
    {
        //methode pour enregistrer une reduction
              $idAnneeScolaire = AnneeScolaire::latest()->first();
                $reduction =  $request->validated();
                $reduction = Reduction::create([
                    'eleve_id'=>$reduction['eleve_id'],
                    'montant_reduction'=>$reduction['montant_reduction'],
                    'tranche'=>$reduction['tranche'],
                    'classe_id'=>$reduction['classe_id'],
                    'annee_scolaire_id'=>$idAnneeScolaire['id'],
                ]);
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir une reduction par id
        $reduction = Reduction::find($id);
        if(is_null($reduction)){
            return response()->json(['message'=>'cette reduction n existe pas'],404);
        }
        return response()->json($reduction);
    }

    public function reductionEleveId($id)
    {

        $eleve= Eleve::find($id);
        if(!$eleve){
            return response()->json(['message'=>'cet élève n\'existe pas']);
        }
        //methode pour voir une reduction par id
        $reduction = Reduction::where('eleve_id',$id)->where('classe_id',$eleve->classe_id)->get();
        return response()->json($reduction);
    }
    public function update(ReductionRequest $request, string $id)
    {
           //methode pour modifier un reduction
        $reduction = Reduction::find($id);
        
        if (!$reduction) {
            return response()->json(['message' => 'Cette reduction n\'existe pas'], 404);
        }
        $reduction->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer une reduction
        $reduction = Reduction::find($id);
    
        if (!$reduction) {
            return response()->json(['message' => 'Cette reduction n\'existe pas'], 404);
        }
    
        $reduction->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
