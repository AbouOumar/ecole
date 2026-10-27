<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\AnneeScolaireRequest;
use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des annee scolaire
        
        return response()->json(AnneeScolaire::all());
    }

    public function semestreAnnee()
    {
        App::setlocale('fr');
        Carbon::setLocale('fr');
        
        //methode pour voir la liste des mois de semestre de chaque année

        $annescolaires = AnneeScolaire::all();
        $tableau=[];
        foreach($annescolaires as $annescolaire){
            $mois=[];
            $dateDebut = Carbon::parse($annescolaire->dateDebut);
            $dateFin = Carbon::parse($annescolaire->DateFin);

            while($dateDebut <= $dateFin){
                $mois[]= [
                    'numeroMois' =>$dateDebut->format('m'),
                    'nomMois' =>$dateDebut->translatedFormat('F'),
                ];

                $dateDebut->addMonth();
            }

            $semestre1 = array_slice($mois, 0,4); //premiers 4 mois
            $semestre2 = array_slice($mois, 4,4); //les 4 mois suivants

            $tableau[]=[
                'annee_scolaire_id'=>$annescolaire->id,
                'semestre1'=>$semestre1,
                'semestre2'=>$semestre2
            ];
            
        }
        
        return response()->json($tableau);
    }

  
    public function create(AnneeScolaireRequest $request)
    {
        //methode pour enregistrer une annee scolare
        // 2. Vérifier s'il y a une année en cours (non écoulée)
        $exist = AnneeScolaire::where('dateFin', '>=', now())->exists();
        if ($exist) {
            return response()->json(['message' => 'Impossible d’ajouter une nouvelle année tant qu’une autre est en cours.'], 200);
        }

        // 3. Vérifier s’il n’y a pas d’année avec des dates qui se chevauchent
        $overlap = AnneeScolaire::where(function ($query) use ($request) {
            $query->whereBetween('dateDebut', [$request->dateDebut, $request->DateFin])
                ->orWhereBetween('DateFin', [$request->dateDebut, $request->DateFin])
                ->orWhere(function ($q) use ($request) {
                    $q->where('dateDebut', '<=', $request->dateDebut)
                        ->where('DateFin', '>=', $request->DateFin);
                });
        })->exists();

        if ($overlap) {
            return response()->json(['message' => 'Les dates se chevauchent avec une autre année scolaire existante.'], 200);
        }
        $annescolare = AnneeScolaire::create($request->validated());

        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(string $id)
    {
        //methode pour voir une annee scolaire par id
        $annescolaire = AnneeScolaire::find($id);
        if(is_null($annescolaire)){
            return response()->json(['message'=>'cette annee scolaire n existe pas'],200);
        }
        return response()->json($annescolaire);
    }

    public function update(AnneeScolaireRequest $request, $id)
    {
           //methode pour modifier une annee scolaire
                   // 2. Vérifier s'il y a une année en cours (non écoulée)
        $exist = AnneeScolaire::where('id','!=',$id)->where('dateFin', '>=', now())->exists();
        if ($exist) {
            return response()->json(['message' => 'Impossible d’ajouter une nouvelle année tant qu’une autre est en cours.'], 200);
        }

        // 3. Vérifier s’il n’y a pas d’année avec des dates qui se chevauchent
        $overlap = AnneeScolaire::where('id','!=',$id)->where(function ($query) use ($request) {
            $query->whereBetween('dateDebut', [$request->dateDebut, $request->DateFin])
                ->orWhereBetween('DateFin', [$request->dateDebut, $request->DateFin])
                ->orWhere(function ($q) use ($request) {
                    $q->where('dateDebut', '<=', $request->dateDebut)
                        ->where('DateFin', '>=', $request->DateFin);
                });
        })->exists();

        if ($overlap) {
            return response()->json(['message' => 'Les dates se chevauchent avec une autre année scolaire existante.'], 200);
        }
        $annescolaire = AnneeScolaire::find($id);
        
        if (!$annescolaire) {
            return response()->json(['message' => 'Cette annee scolaire n\'existe pas'], 200);
        }
        $annescolaire->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer une annee scolaire
        $annescolaire = AnneeScolaire::find($id);
    
        if (!$annescolaire) {
            return response()->json(['message' => 'Cette annee scolaire n\'existe pas'], 200);
        }
    
        $annescolaire->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
