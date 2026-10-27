<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComptabiliteRequest;
use App\Models\Comptabilite;
use Illuminate\Http\Request;

class ComptabiliteController extends Controller
{
 
    public function liste()
    {
        //methode pour voir la liste des comptabitites
        $comptabitites = Comptabilite::all();
        return response()->json( $comptabitites );
    }

    
    public function create(ComptabiliteRequest $request)
    {
        //methode pour enregistrer un comptabitite
        $comptabitite = Comptabilite::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un comptabitite par id
        $comptabitite = Comptabilite::find($id);
        if(is_null($comptabitite)){
            return response()->json(['message'=>'cette comptabitite n existe pas'],404);
        }
        return response()->json($comptabitite);
    }
    public function update(ComptabiliteRequest $request, string $id)
    {
           //methode pour modifier un comptabitite
        $comptabitite = Comptabilite::find($id);
        
        if (!$comptabitite) {
            return response()->json(['message' => 'Cette comptabitite n\'existe pas'], 404);
        }
        $comptabitite->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un comptabitite
        $comptabitite = Comptabilite::find($id);
    
        if (!$comptabitite) {
            return response()->json(['message' => 'Cette comptabitite n\'existe pas'], 404);
        }
    
        $comptabitite->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
