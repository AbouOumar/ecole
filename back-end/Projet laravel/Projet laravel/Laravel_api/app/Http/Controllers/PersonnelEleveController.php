<?php

namespace App\Http\Controllers;

use App\Http\Requests\gestion_personnel\PersonnelRequest;
use App\Http\Requests\PersonnelEleveRequest;
use App\Models\PersonnelEleve;
use Illuminate\Http\Request;

class PersonnelEleveController extends Controller
{ 

    public function liste()
    {
        //methode pour voir la liste des parentEleve
        $personnelEleves = PersonnelEleve::all();
        return response()->json( $personnelEleves );
    }

  
    public function create(PersonnelEleveRequest $request)
    {
        //methode pour enregistrer un personnelEleve
        $personnelEleve = PersonnelEleve::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un personnelEleve par id
        $personnelEleve = PersonnelEleve::find($id);
        if(is_null($personnelEleve)){
            return response()->json(['message'=>'ce personnelEleve n existe pas'],404);
        }
        return response()->json($personnelEleve);
    }
    public function update(PersonnelEleveRequest $request, string $id)
    {
           //methode pour modifier un personnelEleve
        $personnelEleve = PersonnelEleve::find($id);
        
        if (!$personnelEleve) {
            return response()->json(['message' => 'Ce personnelEleve n\'existe pas'], 404);
        }
        $personnelEleve->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un personnelEleve
        $personnelEleve = PersonnelEleve::find($id);
    
        if (!$personnelEleve) {
            return response()->json(['message' => 'Ce personnelEleve n\'existe pas'], 404);
        }
    
        $personnelEleve->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }

}
