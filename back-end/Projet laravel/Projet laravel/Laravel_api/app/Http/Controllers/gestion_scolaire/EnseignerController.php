<?php

namespace App\Http\Controllers\gestion_scolaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_scolaire\EnseignerRequest;
use App\Models\Enseigner;
use App\Models\Personnel;
use Illuminate\Http\Request;

class EnseignerController extends Controller
{
    public function liste()
    {
        $enseigners = Enseigner::with(['matiere','personnel'])->get();
        return response()->json($enseigners);
    }

    public function create(EnseignerRequest $request)
    {
        $personnel = Personnel::find($request->personnel_id);
        $personnel->matieres()->sync($request->matieres);
        return response()->json(['message'=>'Enregistrement effectuez avec succès']);
    }
    public function show(int $id)
    {
        $enseigner = Enseigner::find($id);
        if (is_null($enseigner)) {
            return response()->json(['message' => 'cette enseigner n\'existe pas'], 404);
        }
        return response()->json($enseigner);
    }

    public function update(EnseignerRequest $request,int $id){
        $enseigner = Enseigner::find($id);
        if(!$enseigner){
            return response() ->json(['message'=>'cet enseigner n\'existe pas']);
        }
        $enseigner->update($request->validated());
        return response()->json(['message'=>'cet enseigner modifié avec succès']);
    }

    public function delete(int $id)
    {
        $enseigner = Enseigner::find($id);
        if(!$enseigner){
            return response()->json(['message'=>'cet enseigner n\'existe pas']);
        }
        $enseigner->delete();
        return response()->json(['message'=>'suppression effectuée avec succés']);
    }
    //
}
