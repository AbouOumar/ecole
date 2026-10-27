<?php

namespace App\Http\Controllers;

use App\Http\Requests\ficheRenseignementRequest;
use App\Models\ficheRenseignement;
use Illuminate\Http\Request;

class ficheRenseignementController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des depenses
        $ficheRenseignements = ficheRenseignement::all();
        return response()->json( $ficheRenseignements );
    }

    
    public function create(ficheRenseignementRequest $request)
    {
        //methode pour enregistrer un depense
        $depense = ficheRenseignement::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un ficheRenseignement par id
        $ficheRenseignement = ficheRenseignement::find($id);
        if(is_null($ficheRenseignement)){
            return response()->json(['message'=>'ce ficheRenseignement n existe pas'],404);
        }
        return response()->json($ficheRenseignement);
    }
    public function update(ficheRenseignementRequest $request, string $id)
    {
           //methode pour modifier un ficheRenseignement
        $ficheRenseignement = ficheRenseignement::find($id);
        
        if (!$ficheRenseignement) {
            return response()->json(['message' => 'Ce ficheRenseignement n\'existe pas'], 404);
        }
        $ficheRenseignement->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un ficheRenseignement
        $ficheRenseignement = ficheRenseignement::find($id);
    
        if (!$ficheRenseignement) {
            return response()->json(['message' => 'Ce ficheRenseignement n\'existe pas'], 404);
        }
    
        $ficheRenseignement->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
