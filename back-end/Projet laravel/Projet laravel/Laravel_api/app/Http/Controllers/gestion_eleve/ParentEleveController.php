<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\ParentEleveRequest;
use App\Http\Requests\gestion_eleve\ParentRequest;
use App\Models\Parent_eleve;
use Illuminate\Http\Request;

class ParentEleveController extends Controller
{ 

    public function liste()
    {
        //methode pour voir la liste des parentEleve
        $parentEleves = Parent_eleve::all();
        return response()->json( $parentEleves );
    }

  
    public function create(ParentEleveRequest $request)
    {
        //methode pour enregistrer un parentEleve
        $parentEleve = Parent_eleve::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un parentEleve par id
        $parentEleve = Parent_eleve::find($id);
        if(is_null($parentEleve)){
            return response()->json(['message'=>'ce parentEleve n existe pas'],404);
        }
        return response()->json($parentEleve);
    }

    public function update(ParentEleveRequest $request, string $id)
    {
           //methode pour modifier un parentEleve
        $parentEleve = Parent_eleve::find($id);
        
        if (!$parentEleve) {
            return response()->json(['message' => 'Ce parentEleve n\'existe pas'], 404);
        }
        $parentEleve->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un parentEleve
        $parentEleve = Parent_eleve::find($id);
    
        if (!$parentEleve) {
            return response()->json(['message' => 'Ce parentEleve n\'existe pas'], 404);
        }
    
        $parentEleve->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }

}
