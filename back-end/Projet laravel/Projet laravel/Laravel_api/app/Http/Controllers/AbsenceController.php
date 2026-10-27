<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des absences
        $absences = Absence::with('eleve')->get();
        return response()->json( $absences );
    }

    
    public function create(AbsenceRequest $request)
    {
        //methode pour enregistrer une absence
         $absence = Absence::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir une absence par id
        $absence = Absence::find($id);
        if(is_null($absence)){
            return response()->json(['message'=>'cette absence n existe pas'],404);
        }
        return response()->json($absence);
    }
    public function update(AbsenceRequest $request, string $id)
    {
           //methode pour modifier une absence
        $absence = absence::find($id);
        
        if (!$absence) {
            return response()->json(['message' => 'Cette absence n\'existe pas'], 404);
        }
        $absence->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un absence
        $absence = Absence::find($id);
    
        if (!$absence) {
            return response()->json(['message' => 'Cet absence n\'existe pas'], 404);
        }
    
        $absence->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
