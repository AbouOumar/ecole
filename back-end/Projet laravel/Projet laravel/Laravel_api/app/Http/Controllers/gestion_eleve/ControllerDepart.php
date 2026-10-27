<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\DepartRequest;
use App\Models\Depart;
use Illuminate\Http\Request;

class ControllerDepart extends Controller
{
    public function liste(){
        $depart = Depart::with("eleve")->get();
        return response()->json($depart);
    }
    public function create(DepartRequest $request){
        $depart = Depart::create($request->validated()) ;
        return response()->json("Enregistrement effectuer avec succes");
    }
    public function show(int $id)
    {
        //methode pour voir un depart par id
        $depart = Depart::with('eleve')->find($id);
        if(is_null($depart)){
            return response()->json(['message'=>'cet accueillit n existe pas'],404);
        }
        return response()->json($depart);
    }

    public function update(DepartRequest $request, string $id)
    {
           //methode pour modifier un depart
        $depart = Depart::find($id);
        
        if (!$depart) {
            return response()->json(['message' => 'Ce depart n\'existe pas'], 404);
        }
        $depart->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

    public function delete(string $id)
    {
        //methode pour supprimer un depart
        $depart = Depart::find($id);
    
        if (!$depart) {
            return response()->json(['message' => 'Ce depart n\'existe pas'], 404);
        }
    
        $depart->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
