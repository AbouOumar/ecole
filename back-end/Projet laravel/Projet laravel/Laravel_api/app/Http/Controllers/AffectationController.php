<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffectationRequest;
use App\Models\Affecter;
use App\Models\AnneeScolaire;
use App\Models\Enseigner;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffectationController extends Controller
{
    public function liste()
    {
        $affecters = Affecter::with(['classe','enseigner','enseigner.matiere','enseigner.personnel'])->get();
        return response()->json($affecters);
    }

    public function create(AffectationRequest $request)
    {
        $request->validated();

        $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;       
        $enseigner = Enseigner::where('personnel_id',$request->personnel_id)->where('matiere_id',$request->matiere_id)->first();

        DB::table('affecters')
            ->where('enseigner_id',$enseigner->id)
            ->where('annee_scolaire_id',$idAnneeScolaire)
            ->delete();

        foreach($request->classes as $classeId){
            DB::table('affecters')->insert([
                'enseigner_id'=>$enseigner->id,
                'annee_scolaire_id'=>$idAnneeScolaire,
                'classe_id'=>$classeId,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        return response()->json(['message'=>'Affectation effectuer avec succès']);
    }
    public function show(int $id)
    {
        $affecter = Affecter::find($id);
        if (is_null($affecter)) {
            return response()->json(['message' => 'cette affecter n\'existe pas'], 404);
        }
        return response()->json($affecter);
    }

    public function update(AffectationRequest $request,int $id){
        $affecter = Affecter::find($id);
        if(!$affecter){
            return response() ->json(['message'=>'cet affecter n\'existe pas']);
        }
        $affecter->update($request->validated());
        return response()->json(['message'=>'cet affecter modifié avec succès']);
    }

    public function delete(int $id)
    {
        $affecter = Affecter::find($id);
        if(!$affecter){
            return response()->json(['message'=>'cet affecter n\'existe pas']);
        }
        $affecter->delete();
        return response()->json(['message'=>'suppression effectuée avec succés']);
    }
}
