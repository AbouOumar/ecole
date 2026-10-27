<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\AccueillitRequest;
use App\Models\Accueillit;
use Illuminate\Http\Request;

class AccueillitController extends Controller
{
    public function liste(){
        $accueillit = Accueillit::with("eleve")->get();
        return response()->json($accueillit);
    }
    public function create(AccueillitRequest $request){
        $accueillit = Accueillit::create($request->validated()) ;
        return response()->json("Enregistrement effectuer avec succes");
    }
    public function show(int $id)
    {
        //methode pour voir un accueillit par id
        $accueillit = Accueillit::with('eleve')->find($id);
        if(is_null($accueillit)){
            return response()->json(['message'=>'cet accueillit n existe pas'],404);
        }
        return response()->json($accueillit);
    }

    public function update(AccueillitRequest $request, string $id)
    {
           //methode pour modifier un accueillit
        $accueillit = Accueillit::find($id);
        
        if (!$accueillit) {
            return response()->json(['message' => 'Cet accueillit n\'existe pas'], 404);
        }
        $accueillit->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

    public function delete(string $id)
    {
        //methode pour supprimer un accueillit
        $accueillit = Accueillit::find($id);
    
        if (!$accueillit) {
            return response()->json(['message' => 'Cet accueillit n\'existe pas'], 404);
        }
    
        $accueillit->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
