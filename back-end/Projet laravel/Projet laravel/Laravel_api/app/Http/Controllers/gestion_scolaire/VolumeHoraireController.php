<?php

namespace App\Http\Controllers\gestion_scolaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_scolaire\VolumeHoraireRequest;
use App\Models\AnneeScolaire;
use App\Models\Taux_horaire;
use App\Models\Volume_horaire;
use Illuminate\Http\Request;

class VolumeHoraireController extends Controller
{
    public function liste(){
        $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;

        $volume_horaires = Volume_horaire::with('personnel')
        ->orderBy('id','desc')
        ->get();
        return response()->json(['liste'=>$volume_horaires,'anneeEncours'=> $idAnneeScolaire]);
    }
    public function create(VolumeHoraireRequest $request){
        $Volume_horaire = Volume_horaire::create($request->validated());
        return response()-> json(['message'=>'Enregistrement effectué avec succés'],);
    }

    public function show(int $id){
        $Volume_horaire = Volume_horaire::find($id);
        if(is_null($Volume_horaire))
        {
            return response()->json(['message'=>'ce Volume horaire n\'existe pas'],404);

        }

        return response()->json($Volume_horaire);
    }

    public function update(VolumeHoraireRequest $request,int $id){
        $Volume_horaire = Volume_horaire::find($id);
        if(!$Volume_horaire){
            return response()->json(['message'=>'ce Volume horaire n\'existe pas'],404);
        }
        $Volume_horaire->update($request->validated());
        return response()->json(['message'=>'Modification effectuée avec succès']);
    }

    public function delete(int $id){
        $Volume_horaire = Volume_horaire::find($id);
        if(!$Volume_horaire){
            return response()->json(['message'=>'ce Volume horaire n\'exite pas'],404);
        }
        $Volume_horaire->delete();
        return response()->json(['message'=>'Suppression effectuée avec succès']);
    }
    //
}
