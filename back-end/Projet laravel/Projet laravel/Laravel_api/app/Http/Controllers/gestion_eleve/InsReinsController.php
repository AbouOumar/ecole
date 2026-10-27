<?php

namespace App\Http\Controllers\gestion_eleve;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\InsReinsRequest;
use App\Http\Requests\gestion_personnel\PersonnelRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Compte;
use App\Models\Eleve;
use App\Models\Fonction_personnel;
use App\Models\Ins_reins;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsReinsController extends Controller
{

    public function liste()
    {
        //methode pour voir la liste des inscription et reinscription
        $idAnneeScolaire=AnneeScolaire::latest('id')->get('id')->first()->id;
            $ins_reins= Ins_reins::with('eleve','classe')->get();
            return response()->json(['liste'=>$ins_reins,'anneEncours'=>$idAnneeScolaire]);
    }


    public function create(InsReinsRequest $request)
    {
        //methode pour enregistrer une inscription ou reinscription

        $ins_reins = $request->validated();
            $rechercheInsReins = Ins_reins::where('eleve_id',$ins_reins['eleve_id'])
            ->where('classe_id',$ins_reins['classe_id'])
            ->where('annee_scolaire_id',$ins_reins['annee_scolaire_id'])
            ->where('type',$ins_reins['type'])->get();
            if(count($rechercheInsReins)>0 ){
                return response()->json(['message'=>'Cet eleve est deja inscrit dans cette classe']);
            }

        DB::beginTransaction();
        try{         
            //enregistrer les données dans la table inscription reinscrition
            $eleve =Eleve::find($ins_reins['eleve_id']);
            // 🔹 Mise à jour de la classe l'élève 
            $classe = Classe::find($ins_reins['classe_id']);

            if($eleve['classe_id']){
                $classe2 = Classe::find($eleve['classe_id']);
        
                $classe2['effectif_total']-=1;
        
                if($eleve['genre_eleve']=="Masculin"){
                    $classe2['effectif_garcon']-=1;
                }else{
                    $classe2['effectif_fille']-=1;
                }
                $classe2->update([$classe2]);
            }

            $classe['effectif_total']+=1;
            if($eleve['genre_eleve']=="Masculin"){
                $classe['effectif_garcon']+=1;
            }else{
                $classe['effectif_fille']+=1;
            }
            $ins_reins = Ins_reins::create($ins_reins);

            $compte =Compte::where('nomCompte','Caisse')->first();
            if($compte){
                $compte['solde']+=$ins_reins['montant'];
            }

            $eleve['classe_id']=$ins_reins['classe_id'];
            $eleve->update([$eleve]);
            $classe->update([$classe]);
            $classe->update([$classe]);
            $compte->update([$compte]);
            DB::commit();
            return response()->json(['message'=>'Inscription effectuer avec succès']);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'erreur lors de l\'ors de l\'enregistrement','error'=>$e->getMessage()], 500);
        }
    }

    public function createPersonnel(PersonnelRequest $requestPersonnel){
        //methode pour enregistrer un eleve avec les information de son parent
        //Génération du matricule automatique pour les personnels
            $dernier=Personnel::latest('id')->get('id')->first();
            if(!$dernier){
                $dernierID=0;
            }else{
                $dernierID=$dernier->id;
            }
            $dernierID++;
            $matriculeP="BE-P".now()->month.$dernierID.now()->year;

        //validation des données 
            $personnel = Personnel::where( 'tel_personnel',$requestPersonnel['tel_personnel'])->first();
            if($personnel && $requestPersonnel['tel_personnel'] != ""){
                return response()->json(['message'=>'cet personnel existe déjà','header'=>201],201);
            }

            //verification de la recuperation de l'image
            if($requestPersonnel->hasFile('photo')){
                // Stocker la nouvelle photo
                $file = $requestPersonnel->file('photo');
                $nomFichier = time() . '_' . $file->getClientOriginalName();
                $uploadPath = $file->storeAs('public/images/profile',$nomFichier); 
            }else{
                $nomFichier='avatar.png';
            }

            //verification de la recuperation de l'image
            if($requestPersonnel->hasFile('cv')){
                // Stocker la nouvelle cv
                $file1 = $requestPersonnel->file('cv');
                $nomFichierCV = time() . '_' . $file1->getClientOriginalName();
                $uploadPathCV = $file1->storeAs('public/images/pieceJointe',$nomFichierCV); 
            }

            //verification de la recuperation de l'image
            if($requestPersonnel->hasFile('peice_jointe')){
                // Stocker la nouvelle peice_jointe
                $file2 = $requestPersonnel->file('peice_jointe');
                $nomFichierPJ = time() . '_' . $file2->getClientOriginalName();
                $uploadPathPJ = $file2->storeAs('public/images/pieceJointe',$nomFichierPJ); 
            }

            $personnelvalide =  $requestPersonnel->validated();

            DB::beginTransaction();
            try{

                //enregistrer les données dans la table eleve
                $personnel = Personnel::create([
                    'matricule_personnel'=>$matriculeP,
                    'nom_personnel'=> $personnelvalide['nom_personnel'],
                    'prenom_personnel'=> $personnelvalide['prenom_personnel'],
                    'genre_personnel'=> $personnelvalide['genre_personnel'],
                    'date_nais_personnel'=> $personnelvalide['date_nais_personnel'],
                    'mail_personnel'=> $personnelvalide['mail_personnel'],
                    'tel_personnel'=> $personnelvalide['tel_personnel'],
                    'adresse_personnel'=> $personnelvalide['adresse_personnel'],
                    'photo'=> $nomFichier,
                    'cv'=> $nomFichierCV,
                    'peice_jointe'=> $nomFichierPJ,
                    'lien_parente'=> $personnelvalide['lien_parente'],
                    'contact_urgence'=> $personnelvalide['contact_urgence'],
                    'taux_horaire'=> $personnelvalide['taux_horaire'],
                    'salaire_base'=> $personnelvalide['salaire_base'],
                ]);

                Fonction_personnel::create([
                    'personnel_id'=> $personnel->id,
                    'fonction_id'=> $personnelvalide['fonction']
                ]);
                $infoPersonnel='Bienvenu à M. '.$personnel['prenom_personnel'].' '.$personnel['nom_personnel'].' '.'matricule '.$personnel['matricule_personnel'];
                DB::commit();
                return response()->json(['message'=>'Enregistrement effectuer avec succes','bienvenue'=>$infoPersonnel,'header'=>200]);
            }catch(\Exception $e){
                DB::rollBack();
                return response()->json(['message'=>'erreur lors de l\'ors de l\'enregistrement','header'=>201,'error'=>$e->getMessage()], 500);
            }


    }

    public function tousPersonnel(){
        return response()->json(Personnel::all());
    }


    public function show(string $id)
    {
        //methode pour voir les inscription ou reinscription par id
        $ins_reins = Ins_reins::find($id);
        if(is_null($ins_reins)){
            return response()->json(['message'=>'cet inscription ou reinscription n existe pas'],404);
        }
        return response()->json($ins_reins);
    }


    public function update(InsReinsRequest $request, string $id)
    {
        $ins_reins = Ins_reins::find($id);
        //methode pour modifier l'inscription ou reinscription
        if (!$ins_reins) {
            return response()->json(['message' => 'Cet inscriptin ou reinscription n\'existe pas'], 404);
        }

        $compteN =Compte::where('nomCompte','Caisse')->first();
        if($compteN){
            $compteN['solde']+=$request['montant']-$ins_reins['montant'];
        }

        $rechercheInsReins = Ins_reins::where('eleve_id',$request['eleve_id'])
        ->where('classe_id',$request['classe_id'])
        ->where('id','!=',$ins_reins['id'])
        ->where('annee_scolaire_id',$request['annee_scolaire_id'])
        ->where('type',$request['type'])->get();
        if(count($rechercheInsReins)>0 ){
            return response()->json(['message'=>'Cet eleve a été deja inscrit dans cette classe'.$ins_reins]);
        }

        $eleve =Eleve::find($ins_reins['eleve_id']);
        

        $classe = Classe::find($ins_reins['classe_id']);
        $classe2 = Classe::find($request['classe_id']);

        $eleve['classe_id']=$classe2['id'];

        $classe2['effectif_total']+=1;
        $classe['effectif_total']-=1;

        if($eleve['genre_eleve']=="Masculin"){
            $classe2['effectif_garcon']+=1;
            $classe['effectif_garcon']-=1;
        }else{
            $classe2['effectif_fille']+=1;
            $classe['effectif_fille']-=1;
        }
        $classe->update([$classe]);
        $eleve->update([$eleve]);
        $classe2->update([$classe2]);
        $compteN->update([$compteN]);
        $ins_reins->update($request->validated());
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer une inscription ou reinscritions
        $ins_reins = Ins_reins::find($id);
    
        if (!$ins_reins) {
            return response()->json(['message' => 'Cet inscription ou reinscription n\'existe pas'], 201);
        }
        $classe = Classe::find($ins_reins['classe_id']);
        $eleve =Eleve::find($ins_reins['eleve_id']);
        $classe['effectif_total']-=1;
        $eleve['classe_id']=0;
        if($eleve['genre_eleve']=="Masculin"){
            $classe['effectif_garcon']-=1;
        }else{
            $classe['effectif_fille']-=1;
        }
        $classe->update([$classe]);
        $eleve->update([$eleve]);
        $ins_reins->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }
}
