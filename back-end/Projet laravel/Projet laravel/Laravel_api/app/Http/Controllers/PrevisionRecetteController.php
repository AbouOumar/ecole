<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrevisionRecetteRequest;
use App\Models\PrevisionRecette;
use Illuminate\Http\Request;

class PrevisionRecetteController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des prevision_recettes
        $prevision_recette = PrevisionRecette::all();
        return response()->json( $prevision_recette );
    }

    
    public function create(PrevisionRecetteRequest $request)
    {
        //methode pour enregistrer une absence
        $prevision_recette = PrevisionRecette::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir une prevision_recette par id
        $prevision_recette = PrevisionRecette::find($id);
        if(is_null($prevision_recette)){
            return response()->json(['message'=>'cette prevision_recette n existe pas'],404);
        }
        return response()->json($prevision_recette);
    }
    public function update(PrevisionRecetteRequest $request, string $id)
    {
           //methode pour modifier une prevision_recette
        $prevision_recette = PrevisionRecette::find($id);
        
        if (!$prevision_recette) {
            return response()->json(['message' => 'Cette prevision_recette n\'existe pas'], 404);
        }
        $prevision_recette->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un prevision_recette
        $prevision_recette = PrevisionRecette::find($id);
    
        if (!$prevision_recette) {
            return response()->json(['message' => 'Cette prevision_recette n\'existe pas'], 404);
        }
    
        $prevision_recette->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
