<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\ClasseRequest;
use App\Models\Affecter;
use App\Models\Classe;
use App\Models\ficheRenseignement;
use App\Models\Option;
use App\Models\Personnel;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function liste()
    {
        return response()->json(Classe::with('option')->get());
    }


    public function getClasseParPersonnelId($id)
    {
        $personnel = Personnel::find($id);
        if (is_null($personnel)) {
            return response()->json(['message'=>'cet personnel n existe pas'],404);
        }

        $affecters = Affecter::join('enseigners','affecters.enseigner_id','=','enseigners.id')
        ->where('enseigners.personnel_id',$id)
        ->with(['classe'])->get();
        return response()->json($affecters);
    }

    public function classeDroit($droit)
    {
        if($droit=='DE'){
            $classe = Classe::whereBetween('niveau',[7,10])->get();
        }elseif($droit=='Cenceur'){
            $classe = Classe::whereBetween('niveau',[10,13])->get();
        }else{
            $classe = Classe::whereBetween('niveau',[7,13])->get();
        }
        return response()->json($classe);
    }
    public function liste_classe()
    {
        //methode pour voir la liste des classes
        $classes = Classe::all()->map(function($classe){
            $option = Option::find($classe->option_id);
            return [
                'classe' => $classe,
                'option' => $option,
            ];
        });

        return response()->json($classes);
    }

    public function create(ClasseRequest $request)
    {
        //methode pour enregistrer une classe

        $option=Option::where('fiche_renseignement_id',$request->niveau)->where('nom_option',$request->option)->first();
        $niveau=ficheRenseignement::find($request->niveau);
        if($option){
            $option_id=$option->id;
            // return response()->json(['info'=>$option_id]);
        }else{
            $option_id=0;
        }
        $classe = $request->validated();
        //enregistrer les données dans la table eleve
            $classe = Classe::create([
                'nom_classe'=>$classe['nom_classe'],
                'niveau'=>$niveau->niveau,
                'nom_place'=>$classe['nom_place'],
                'option_id'=>$option_id,
                'effectif_total'=>0,
                'effectif_garcon'=>0,
                'effectif_fille'=>0,
            ]);
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(string $id)
    {
        //methode pour voir une classe par id
        $classe = Classe::find($id);
        if(is_null($classe)){
            return response()->json(['message'=>'cette classe n existe pas'],404);
        }
        return response()->json($classe);
    }

    public function update(ClasseRequest $request, string $id)
    {
           //methode pour modifier une classe
           $classe = Classe::find($id);

           if (!$classe) {
               return response()->json(['messaged' => 'Cette classe n\'existe pas'], 200);
           }
           if($request->nom_place < $classe->effectif_total){
            return response()->json(['messaged'=>'Il ya déjà '.$classe->effectif_total.' élève dans cette classe']);
           }

           $option=Option::where('fiche_renseignement_id',$request->niveau)->where('nom_option',$request->option)->first();
           $niveau=ficheRenseignement::find($request->niveau);
           if($option){
               $option_id=$option->id;
               // return response()->json(['info'=>$option_id]);
           }else{
               $option_id=0;
           }
        $classeVeri = $request->validated();
        // return response()->json(['info'=>$classe]);
        //enregistrer les données dans la table eleve

            $classe -> update([
                'nom_classe'=>$classeVeri['nom_classe'],
                'niveau'=>$niveau->niveau,
                'nom_place'=>$classeVeri['nom_place'],
                'option_id'=>$option_id,
            ]);
        return response()->json(['message'=>'Modification effectué avec succès']);
    }

    public function delete(string $id)
    {
        //methode pour supprimer une classe
        $classe = Classe::find($id);

        if (!$classe) {
            return response()->json(['message' => 'Cette classe n\'existe pas'], 404);
        }

        $classe->delete();

        return response()->json(['message' => 'Suppression effectué avec succès']);
    }


    public function fraisParClasse($id)
    {
        $classe = Classe::find($id);
        if (!$classe) {
            return response()->json(['message' => 'Cette classe n\'existe pas'], 404);
        }else{
            $niveau = $classe->niveau."";
        }
        $ficheRenseignant = ficheRenseignement::where( 'niveau',$niveau)->first();
        if(!$ficheRenseignant){
            return response()->json(['message'=>'ce frais n\'existe pas dans la base de donnée'],201);
        }
        return response()->json($ficheRenseignant);

    }
}
