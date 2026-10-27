<?php

namespace App\Http\Controllers;

use App\Http\Requests\RapportFinancierRequest;
use App\Models\RapportFinancier;
use Illuminate\Http\Request;

class RapportFinancierController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des rapport_financiers
        $rapport_financiers = RapportFinancier::all();
        return response()->json( $rapport_financiers );
    }

    
    public function create(RapportFinancierRequest $request)
    {
        //methode pour enregistrer un rapport_financier
        $rapport_financier = RapportFinancier::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un rapport_financier par id
        $rapport_financier = RapportFinancier::find($id);
        if(is_null($rapport_financier)){
            return response()->json(['message'=>'ce rapport_financier n existe pas'],404);
        }
        return response()->json($rapport_financier);
    }
    public function update(RapportFinancierRequest $request, string $id)
    {
           //methode pour modifier un rapport_financier
        $rapport_financier = RapportFinancier::find($id);
        
        if (!$rapport_financier) {
            return response()->json(['message' => 'Ce rapport_financier n\'existe pas'], 404);
        }
        $rapport_financier->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un rapport_financier
        $rapport_financier = RapportFinancier::find($id);
    
        if (!$rapport_financier) {
            return response()->json(['message' => 'Ce rapport_financier n\'existe pas'], 404);
        }
    
        $rapport_financier->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
