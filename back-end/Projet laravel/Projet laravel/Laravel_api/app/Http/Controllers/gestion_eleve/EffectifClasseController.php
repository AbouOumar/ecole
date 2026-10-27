<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\EffectifClasseRequest;
use App\Models\Effectif_classe;
use Illuminate\Http\Request;

class EffectifClasseController extends Controller
{
    
    public function liste()
    {
        //methode pour voir la liste des effectifClasses
        $effectifClasses = Effectif_classe::all();
        return response()->json( $effectifClasses );
    }

  
    public function create(EffectifClasseRequest $request)
    {
        //methode pour enregistrer un effectifClasse
        $effectifClasse = Effectif_classe::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un effectifClasse par id
        $effectifClasse = Effectif_classe::find($id);
        if(is_null($effectifClasse)){
            return response()->json(['message'=>'cet effectif n existe pas'],404);
        }
        return response()->json($effectifClasse);
    }


    public function update(EffectifClasseRequest $request, string $id)
    {
           //methode pour modifier un effectifClasse
        $effectifClasse = Effectif_classe::find($id);
        
        if (!$effectifClasse) {
            return response()->json(['message' => 'Cet effectif n\'existe pas'], 404);
        }
        $effectifClasse->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un effectif
        $effectif = Effectif_classe::find($id);
    
        if (!$effectif) {
            return response()->json(['message' => 'Cet effectif n\'existe pas'], 404);
        }
    
        $effectif->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
