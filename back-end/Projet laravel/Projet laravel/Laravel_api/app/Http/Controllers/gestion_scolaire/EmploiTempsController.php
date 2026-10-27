<?php

namespace App\Http\Controllers\gestion_scolaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_scolaire\EmploiTempsRequest;
use App\Models\Affecter;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Emploi_temps;
use Illuminate\Http\Request;

class EmploiTempsController extends Controller
{
    public function liste(){
        $emploi_temps = Emploi_temps::all();
        return response()->json($emploi_temps);
    }

    public function create(EmploiTempsRequest $request){
        $ligne = $request->input('emplois')[0];
        Emploi_temps::where('classe_id',$ligne['classe_id'])->delete();

        foreach ($request['emplois'] as $emploi) {
            Emploi_temps::create([
                'classe_id' => $emploi['classe_id'],
                'jour' => $emploi['jour'],
                'heure_debut' => $emploi['debut'],
                'heure_fin' => $emploi['fin'],
                'matiere_id' => $emploi['matiere_id'],
                'personnel_id' => $emploi['personnel_id'],
            ]);
        }

        return response()->json(['message' => 'Emploi du temps enregistré avec succès.']);
    }

    public function showEnploiClasse(int $id)
    {
        $emploi_temp = Emploi_temps::with(['personnel','classe','matiere'])->where('classe_id',$id)->get();
        if(is_null($emploi_temp)){
            return response()->json(['message'=>'cet emploi n\'existe pas'],404);
        }
        return response()->json($emploi_temp);
    }

    public function showEnploiPerson(int $id)
    {
        $emploi_temp = Emploi_temps::with(['personnel','classe','matiere'])->where('personnel_id',$id)->get();
        if(is_null($emploi_temp)){
            return response()->json(['message'=>'cet emploi n\'existe pas'],404);
        }
        return response()->json($emploi_temp);
    }
    public function listeEmploiPerson()
    {
        $emploi= Emploi_temps::join('personnels','emploi_temps.personnel_id','=','personnels.id')
        ->select('emploi_temps.personnel_id')
        ->groupBy('emploi_temps.personnel_id')
        ->with('personnel')
        ->get();
        return response()->json($emploi);
    }

    public function matprof($tableau){
        $anneeEnCours = AnneeScolaire::latest('id')->first()->id;
        $classes = Classe::whereBetween('niveau', $tableau)->get();

        $resultats = $classes->map(function ($classe) use ($anneeEnCours) {
            // Récupérer les lignes d'affectation pour cette classe
            $affectations = Affecter::with(['enseigner.personnel', 'enseigner.matiere'])
                ->where('classe_id', $classe->id)
                ->where('annee_scolaire_id', $anneeEnCours)
                ->get();

            // Grouper par matière
            $matieres = $affectations->groupBy('enseigner.matiere.id')->map(function ($group) {
                $matiere = $group->first()->enseigner->matiere;

                $enseignants = $group->map(function ($affectation) {
                    $personnel = $affectation->enseigner->personnel;
                    return [
                        'personnel_id' => $personnel->id,
                        'matricule_personnel' => $personnel->matricule_personnel,
                        'nom_personnel' => $personnel->nom_personnel,
                        'prenom_personnel' => $personnel->prenom_personnel,
                    ];
                });

                return [
                    'matiere_id' => $matiere->id,
                    'libelle_matiere' => $matiere->libelle_matiere,
                    'enseignants' => $enseignants->unique('personnel_id')->values()
                ];
            })->values();

            return [
                'classe_id' => $classe->id,
                'nom_classe' => $classe->nom_classe,
                'matiereEnseigner' => $matieres
            ];
        });
        return $resultats;

    }

    public function matiereProf_droit(string $droit)
    {

        if($droit=="DE"){
            //collège
            $resultats=$this->matprof([7, 10]);
            $emploi= Emploi_temps::join('classes','emploi_temps.classe_id','=','classes.id')
            ->whereBetween('classes.niveau', [7, 10])
            ->select('emploi_temps.classe_id')
            ->groupBy('emploi_temps.classe_id')
            ->with('classe')
            ->get();
            return response()->json(['matProf'=>$resultats, 'emplois'=>$emploi]);
        }else if($droit=="Cenceur"){
            //Lycée
            $emploi= Emploi_temps::join('classes','emploi_temps.classe_id','=','classes.id')
            ->whereBetween('classes.niveau', [11, 13])
            ->select('emploi_temps.classe_id')
            ->groupBy('emploi_temps.classe_id')
            ->with('classe')
            ->get();
            $resultats=$this->matprof([11, 13]);
            return response()->json(['matProf'=>$resultats, 'emplois'=>$emploi]);
        }else{

        }
    }

    public function update(EmploiTempsRequest $request,int $id){
        $emploi_temp = Emploi_temps::find($id);
        if(is_null($emploi_temp)){
            return response()->json(['message'=>'cet emploi n\'existe pas'],404);
        }
        $emploi_temp::update($request->validated());
        return response()->json($emploi_temp);
    }

    public function delete($id){
        $deleted=Emploi_temps::where('classe_id',$id)->delete();
        if($deleted){
           return response()->json("Suppression effectuer avec succes");
        }else{
            return response()->json("Déjà supprimer");
        }


    }

    //
}
