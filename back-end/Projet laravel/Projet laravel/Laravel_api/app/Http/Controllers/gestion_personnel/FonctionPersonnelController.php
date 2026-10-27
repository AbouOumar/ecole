<?php

namespace App\Http\Controllers\gestion_personnel;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_personnel\FonctionPersonnelRequest;
use App\Http\Requests\gestion_personnel\FonctionRequest;
use App\Models\Fonction;
use App\Models\Fonction_personnel;
use App\Models\Personnel;
use Illuminate\Http\Request;

class FonctionPersonnelController extends Controller
{
    public function liste()
    {       
    
        $fonction_personnels=Fonction_personnel::with(['fonction','personnel'])
        ->get();
        return response()->json($fonction_personnels);   

    }

    public function create(FonctionPersonnelRequest $request)
    {
        //verification du nombre de fonction
        $nbfonction=Fonction_personnel::where('personnel_id',$request->personnel_id)
        ->count();
        if($nbfonction>=2){
            return response()->json(['message'=>'Ce personnel a déjà deux fonctions']);  
        }
        //verification pour eviter les doublons
        $fonctionVeri = Fonction_personnel::where('personnel_id',$request->personnel_id)
        ->where('fonction_id',$request->fonction_id)->first();
        if($fonctionVeri){
            return response()->json(['message'=>'Cette fonction a déjà été attribuer a ce personnel']); 
        }
        //verification pour les fonctions ou une seule personne peut occuper
        $fonction = Fonction::find($request->fonction_id);
        if($fonction->libelle_fonction=="Proviseur" || $fonction->libelle_fonction=="DE" || $fonction->libelle_fonction=="Censeur" ||$fonction->libelle_fonction=="DG"){
            $fonctionPoste = Fonction_personnel::where('statut_fonction',"En cours")
            ->where('fonction_id',$request->fonction_id)->first();
            if($fonctionPoste){
                return response()->json(['message'=>'Il y a un autre '.$fonction->libelle_fonction.' En cours']); 
            }
        }

        $fonction_personnel = Fonction_personnel::create($request -> validated());
        //Modification du salaire ou du taux horaire
        $personnel = Personnel::find($request->personnel_id);
        $personnel->update([
            'taux_horaire'=>$request->taux_horaire,
            'salaire_base'=> $request->salaire_base,
        ]);
        return response()->json(['message'=>'Fonction associée à un personnel avec succès']);
    }

    public function show(int $id)
    {
        $fonction_personnel = Fonction_personnel::with("personnel")->find($id);
        if (is_null($fonction_personnel)) {
            return response()->json(['message'=>'cette fonction n existe pas'],404);
        }
    }

    public function showMatricule($id){
        $fonction_personnels=Fonction_personnel::with(['fonction','personnel'])
            ->where('personnel_id',$id)
            ->get();
        return response()->json($fonction_personnels);
    }       

    public function update(FonctionPersonnelRequest $request,int $id)
    {

        //verification si la fonction_personnel existe
        $fonction_personnel=Fonction_personnel::find($id);
        if (!$fonction_personnel) {
            return response()->json(['message' => 'Cette affectation existe plus n\'existe pas'], 404);
        }
        //verification pour eviter les doubons
        $fonctionVeri = Fonction_personnel::where('personnel_id',$request->personnel_id)
        ->where('fonction_id',$request->fonction_id)->where('id','!=',$id)->first();
        if($fonctionVeri){
            return response()->json(['message'=>'Cette fonction a déjà été attribuer a ce personnel']); 
        }

        //verification pour les fonctions ou une seule personne peut occuper
        $fonction = Fonction::find($request->fonction_id);
        if($fonction->libelle_fonction=="Proviseur" || $fonction->libelle_fonction=="Directeur des études" || $fonction->libelle_fonction=="Censeur" ||$fonction->libelle_fonction=="DG"){
            $fonctionPoste = Fonction_personnel::where('statut_fonction',"En cours")
            ->where('fonction_id',$request->fonction_id)->where('id','!=',$id)->first();
            if($fonctionPoste){
                return response()->json(['message'=>'Il y a un autre '.$fonction->libelle_fonction.' En cours']); 
            }
        }
        
        $fonction_personnel->update($request->validated());

        //Modification du salaire ou du taux horaire
        $personnel = Personnel::find($request->personnel_id);
        $personnel->update([
            'taux_horaire'=>$request->taux_horaire,
            'salaire_base'=> $request->salaire_base,
        ]);
        return response()->json(['message' => 'Fonction du personnel modifiée avec succès']);
    }

    public function delete(int $id)
    {
        $fonction_personnel = Fonction_personnel::find($id);
        if(!$fonction_personnel)
        {
            return response()->json(['message','cette fonction_personnel n\'existe pas'],404);
        }
        $fonction_personnel->delete();
        return response()->json(['message','cette fonction_personnel supprimée avec success']);
    }
    //
}
