<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeDepenseRequest;
use App\Models\TypeDepense;
use Illuminate\Http\Request;

class TypeDepenseController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des type_depense
        $type_depenses = TypeDepense::where('libelle','!=','recette')->get();
        return response()->json( $type_depenses );
    }

    public function listeTypeRecette()
    {
        //methode pour voir la liste des type_depense
        $type_depenses = TypeDepense::all();
        return response()->json( $type_depenses );
    }

    
    public function create(TypeDepenseRequest $request)
    {
        //methode pour enregistrer un type_depense
        $type_depense = typeDepense::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un typeDepense par id
        $typeDepense = typeDepense::find($id);
        if(is_null($typeDepense)){
            return response()->json(['message'=>'ce typeDepense n existe pas'],404);
        }
        return response()->json($typeDepense);
    }
    public function update(TypeDepenseRequest $request, string $id)
    {
           //methode pour modifier un typeDepense
        $typeDepense = typeDepense::find($id);
        
        if (!$typeDepense) {
            return response()->json(['message' => 'Ce typeDepense n\'existe pas'], 404);
        }
        $typeDepense->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un typeDepense
        $typeDepense = typeDepense::find($id);
    
        if (!$typeDepense) {
            return response()->json(['message' => 'Ce typeDepense n\'existe pas'], 404);
        }
    
        $typeDepense->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
