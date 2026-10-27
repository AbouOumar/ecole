<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionPersonnelRequest;
use App\Models\ActionPersonnel;
use Illuminate\Http\Request;

class ActionPersonnelController extends Controller
{
    public function list(){
        $actionPersonnels = ActionPersonnel::all();
        return response()->json($actionPersonnels);
    }


    public function create(ActionPersonnelRequest $request){
        $actionPersonnel = ActionPersonnel::create($request->validated());
        return response()-> json(['message'=>'Enregistrement effectué avec succés'],);
    }

    public function show(int $id){
        $actionPersonnel = ActionPersonnel::find($id);
        if(is_null($actionPersonnel))
        {
            return response()->json(['message'=>'cette action personnel n\'existe pas'],404);

        }

        return response()->json($actionPersonnel);
    }

    public function update(ActionPersonnelRequest $request,int $id){
        $actionPersonnel = ActionPersonnel::find($id);
        if(!$actionPersonnel){
            return response()->json(['message'=>'cette action personnel n\'existe pas'],404);
        }
        $actionPersonnel->update($request->validated());
        return response()->json(['message'=>'Modification effectuée avec succès']);
    }

    public function delete(int $id){
        $actionPersonnel = ActionPersonnel::find($id);
        if(!$actionPersonnel){
            return response()->json(['message'=>'cette action personnel n\'exite pas'],404);
        }
        $actionPersonnel->delete();
        return response()->json(['message'=>'Suppression effectuée avec succès']);
    }
}
