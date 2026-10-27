<?php

namespace App\Http\Controllers\gestion_personnel;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_personnel\PersonnelRequest;
use App\Models\ActionPersonnel;
use App\Models\AnneeScolaire;
use App\Models\ficheRenseignement;
use App\Models\Fonction;
use App\Models\Fonction_personnel;
use App\Models\Payement;
use App\Models\PayementSalaire;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Salaire;
use App\Models\Volume_horaire;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{


    public function getPersonnelDetail() {
        App::setlocale('fr');
        Carbon::setLocale('fr');
    
        $salaires = Salaire::with([
            'fonction',
            'personnel'
        ])
        ->whereHas('fonction', function($query){
            $query->where('libelle_fonction', '!=', 'Enseignant');
        })
        ->get();
            $idAnneeEncours = AnneeScolaire::latest('id')->value('id');
        if ($salaires->isEmpty()) {
            return response()->json([
                'liste' => [],
                'anneeEncours' => $idAnneeEncours,
                'moisEncours' => Carbon::now()->subMonth()->translatedFormat('F')
            ]);
        }
        
        $resultat= $salaires->map(function($salaire){
                $personnel=$salaire->personnel;
                $fonction=$salaire->fonction;
                return[
                    'id' => $personnel['id'],
                    'matricule' => $personnel['matricule_personnel'],
                    'tel_personnel' => $personnel['tel_personnel'],
                    'mail_personnel' => $personnel['mail_personnel'],
                    'adresse_personnel' => $personnel['adresse_personnel'],
                    'photo' => $personnel['photo'],
                    'nomPrenom' => $personnel['prenom_personnel'] . ' ' . $personnel['nom_personnel'],
                    'prenom_personnel' => $personnel['prenom_personnel'],
                    'nom_personnel' => $personnel['nom_personnel'],
                    'idfonction' => $fonction['id'] ?? 0,
                    'fonction' => $fonction['libelle_fonction'] ?? "",
                    'salaire_brut' => $salaire['salaire_brut'],
                    'avance_salaire' => $salaire['avance_salaire'],
                    'salaire_net' => $salaire['salaire_net'],
                    'ecolage' => $salaire['ecolage'],
                    'affaire_sociale' => $salaire['affaire_sociale'],
                    'mois' => $salaire['mois'],
                    'annee_scolaire_id' => $salaire['annee_scolaire_id'],
                    'salaire_id' => $salaire['id'],
                    'salaire_create_at' => $salaire['created_at'],
                    'salaire_base' => $personnel['salaire_base'],
                    'disponibilite' => $salaire['disponibilite'],
                    'prime' => $salaire['prime'],
                    'statut' => $salaire['statut'],
                ];
        });

        return response()->json([
            'liste' => $resultat,
            'anneeEncours' => $idAnneeEncours,
            'moisEncours' => Carbon::now()->subMonth()->translatedFormat('F')
        ]);
    }

    public function getEnseignantDetail() {
        App::setlocale('fr');
        Carbon::setLocale('fr');
    
        $salaires = Salaire::with([
            'fonction',
            'personnel'
        ])
        ->whereHas('fonction', function($query){
            $query->where('libelle_fonction','Enseignant');
        })
        ->get();
    $idAnneeEncours = AnneeScolaire::latest('id')->value('id');
        if ($salaires->isEmpty()) {
            return response()->json([
                'liste' =>[],
                'anneeEncours' => $idAnneeEncours,
                'moisEncours' => Carbon::now()->subMonth()->translatedFormat('F')
        ]);
        }
        
        $resultat= $salaires->map(function($salaire){
                $personnel=$salaire->personnel;
                $fonction=$salaire->fonction;
                $volumeHoraire= Volume_horaire::where('personnel_id',$personnel['id'])
                ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
                ->where('mois',$salaire['mois'])->first();
                $vh=0;
                if($volumeHoraire){
                    $vh=$volumeHoraire['nombreHeure'];
                }
                return[
                    'id' => $personnel['id'],
                    'matricule' => $personnel['matricule_personnel'],
                    'tel_personnel' => $personnel['tel_personnel'],
                    'mail_personnel' => $personnel['mail_personnel'],
                    'adresse_personnel' => $personnel['adresse_personnel'],
                    'photo' => $personnel['photo'],
                    'nomPrenom' => $personnel['prenom_personnel'] . ' ' . $personnel['nom_personnel'],
                    'prenom_personnel' => $personnel['prenom_personnel'],
                    'nom_personnel' => $personnel['nom_personnel'],
                    'idfonction' => $fonction['id'] ?? 0,
                    'fonction' => $fonction['libelle_fonction'] ?? "",
                    'salaire_brut' => $salaire['salaire_brut'],
                    'avance_salaire' => $salaire['avance_salaire'],
                    'salaire_net' => $salaire['salaire_net'],
                    'ecolage' => $salaire['ecolage'],
                    'affaire_sociale' => $salaire['affaire_sociale'],
                    'mois' => $salaire['mois'],
                    'annee_scolaire_id' => $salaire['annee_scolaire_id'],
                    'salaire_id' => $salaire['id'],
                    'salaire_create_at' => $salaire['created_at'],
                    'salaire_base' => $personnel['salaire_base'],
                    'disponibilite' => $salaire['disponibilite'],
                    'volume_horaire' => $vh,
                    'prime' => $salaire['prime'],
                    'statut' => $salaire['statut'],
                ];
        });

        
        return response()->json([
            'liste' => $resultat,
            'anneeEncours' => $idAnneeEncours,
            'moisEncours' => Carbon::now()->subMonth()->translatedFormat('F')
        ]);
    }


    public function getMatiereParPersonnelId($id)
    {
        $personnel = Personnel::find($id);
        if (is_null($personnel)) {
            return response()->json(['message'=>'cet personnel n existe pas'],404);
        }
        $matieres=$personnel->matieres;
        return response()->json($personnel);
    }

    
    public function getMatiereParPersonnel()
    {
        $personnel = Personnel::with('matieres')->whereHas('fonctions', function($query){
            $query->where('libelle_fonction','Enseignant');
        })->get();
        return response()->json($personnel);
    }


    public function liste()
    {
        $personnels = Personnel::with('fonctions')
        ->get()
        ->map(function ($personnel) {
            // Récupérer toutes les fonctions du personnel
            $fonctions = $personnel->fonctions;
    
            // Filtrer les fonctions qui sont différentes de "Enseignant"
            $fonctionAEnvoyer = $fonctions->firstWhere('libelle_fonction', '!=', 'Enseignant');

            if (!$fonctionAEnvoyer) {
                return null;
            }
    
            return [
                'id' => $personnel->id,
                'matricule_personnel' => $personnel->matricule_personnel,
                'nomComplet' => $personnel->nom_personnel.' '.$personnel->prenom_personnel,
                'tel_personnel' => $personnel->tel_personnel,
                'mail_personnel' => $personnel->mail_personnel,
                'adresse_personnel' => $personnel->adresse_personnel,
                'photo' => $personnel->photo,
                'salaire_base' => $personnel->salaire_base,
                'created_at' => $personnel->created_at,
                'fonction' => $fonctionAEnvoyer->libelle_fonction,
                'idfonction' => $fonctionAEnvoyer->id,
            ];
        })
        ->filter() // Supprime les valeurs nulles
        ->values();
        return response()->json($personnels);
    }

    public function listeEnseignant()
    {
        $enseignants = Personnel::whereHas('fonctions', function($query){
            $query->where('libelle_fonction','Enseignant');
        })->get();
        return response()->json($enseignants);
    }

    public function create(PersonnelRequest $request)
    {
        $personnel = Personnel::create($request -> validated());  
        return response()->json(['message'=>'Engeristrer avec succés']);
    }

    public function show(int $id)
    {
        $personnel = Personnel::find($id);
        if (is_null($personnel)) {
            return response()->json(['message'=>'cet personnel n existe pas'],404);
        }
        return response()->json($personnel);
    }

    public function showMatricule(string $matricule)
    {
        $personnel = Personnel::where('matricule_personnel',$matricule)->first();
        if (is_null($personnel)) {
            return response()->json(['message' =>'cet personnel n\' existe pas',404]);
        }
        return response()->json($personnel);
    }

    public function update(PersonnelRequest $requestPersonnel,int $id)
    {
        $personnel = Personnel::find($id);
        if (!$personnel) {
            return response()->json(['message' => 'Cet personnel n\'existe pas'], 404);
        }
         //validation des données 
         $personnelVeri = Personnel::where( 'tel_personnel',$requestPersonnel['tel_personnel'])->first();
         if($personnelVeri && $personnelVeri['id'] != $id && $requestPersonnel['tel_personnel'] != ""){
             return response()->json(['message'=>'cet telephone existe déjà pour une autre personne','header'=>201],201);
         }

         // 🔹 Vérifier si une nouvelle image a été envoyée
        if ($requestPersonnel->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($personnel->photo && $personnel->photo !="avatar.png" && file_exists(public_path('storage/images/profile/' . $personnel->photo))) {
                unlink(public_path('storage/images/profile/' . $personnel->photo));
            }
    
            // Stocker la nouvelle photo
            $file = $requestPersonnel->file('photo');
             $nomFichier = time() . '_' . $file->getClientOriginalName();
            $uploadPath = $file->storeAs('images/profile',$nomFichier, 'public'); 
        }else{
            if ($personnel->photo) {
                $nomFichier=$personnel->photo;
            }else{
                $nomFichier="avatar.png";
            }
        }


            // 🔹 Vérifier si un nouveau cv a été envoyée
        if ($requestPersonnel->hasFile('cv')) {
            // Supprimer l'ancien cv s' il existe
            if ($personnel->cv && file_exists(public_path('storage/images/pieceJointe/' . $personnel->cv))) {
                unlink(public_path('storage/images/pieceJointe/' . $personnel->cv));
            }
    
            // Stocker le nouveau cv
            $file1 = $requestPersonnel->file('cv');
                $nomFichierCV = time() . '_' . $file1->getClientOriginalName();
            $uploadPathCV = $file1->storeAs('public/images/pieceJointe',$nomFichierCV); 
        }else{
            if ($personnel->cv) {
                $nomFichierCV=$personnel->cv;
            }else{
                $nomFichierCV="";
            }
        }
         //verification de la recuperation de l'image
         if($requestPersonnel->hasFile('peice_jointe')){
             // Stocker la nouvelle peice_jointe
             $file2 = $requestPersonnel->file('peice_jointe');
             $nomFichierPJ = time() . '_' . $file2->getClientOriginalName();
             $uploadPathPJ = $file2->storeAs('public/images/pieceJointe',$nomFichierPJ); 
         }

            // 🔹 Vérifier si une nouvelle peice_jointe a été envoyée
        if ($requestPersonnel->hasFile('peice_jointe')) {
            // Supprimer l'ancienne peice_jointe si elle existe
            if ($personnel->peice_jointe && file_exists(public_path('storage/images/pieceJointe/' . $personnel->peice_jointe))) {
                unlink(public_path('storage/images/pieceJointe/' . $personnel->peice_jointe));
            }
    
            // Stocker la nouvelle peice_jointe
            $file2 = $requestPersonnel->file('peice_jointe');
            $nomFichierPJ = time() . '_' . $file2->getClientOriginalName();
            $uploadPathPJ = $file2->storeAs('public/images/pieceJointe',$nomFichierPJ); 
        }else{
            if ($personnel->peice_jointe) {
                $nomFichierPJ=$personnel->peice_jointe;
            }else{
                $nomFichierPJ="";
            }
        }

         $personnelvalide =  $requestPersonnel->validated();

         DB::beginTransaction();
         try{

             //enregistrer les données dans la table eleve
             $personnel->update([
                 'matricule_personnel'=> $personnel['matricule_personnel'],
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
                 'taux_horaire'=> $personnel['taux_horaire'],
                 'salaire_base'=> $personnel['salaire_base'],
             ]);
             DB::commit();
             return response()->json(['message'=>'Modification effectuer avec succes','header'=>200]);
         }catch(\Exception $e){
             DB::rollBack();
             return response()->json(['message'=>'erreur lors de l\'ors de la modification','header'=>201,'error'=>$e->getMessage()], 500);
         }













        $personnel->update($request->validated());

        return response()->json(['message' => 'Personnel modifié avec succès']);
    }
    
    public function delete(int $id)
    {
        $personnel = Personnel::find($id);
        if(!$personnel){
            return response()->json(['message' => 'Cet personnel n\'existe pas'], 404);
        }
        $personnel->delete();
        return response()->json(['message' => 'Suppression effectuée avec succès']);
    }


    public function getactionPersonnelId(Request $request)
    {
        //afficher les actions d'un eleve dans la base de donnée
        $validate = $request->validate([
            'personnel_id'=>'required|integer',
            'mois'=>'required|string',
            'annee_scolaire_id'=>'required|integer',
            'fonction'=>'required|string',
        ]);
        $ActionPersonnels = ActionPersonnel::where('personnel_id',$validate['personnel_id'])
        ->where('mois',$validate['mois'])
        ->where('annee_scolaire_id',$validate['annee_scolaire_id'])
        ->where('fonction',$validate['fonction'])
        ->get();
        if (count($ActionPersonnels)==0 ) {
            return response()->json(['message' => 'Cet personnel  n\'a pas d\'action pour ce mois'], 200);
        }
        return response()->json($ActionPersonnels);
    }

    public function getElevePersonnelId($id)
    {
        //methode pour voir la liste des eleves
        $personnel = Personnel::with('eleves','eleves.classe')->find($id);
        if (is_null($personnel)) {
            return response()->json(['message'=>'cet parent n existe pas'],404);
        }
       
        $eleves=$personnel->eleves;
        $result = $eleves->map(function ($eleve) {
            if($eleve['classe']){
                $fraisScolairite = ficheRenseignement::where('niveau',$eleve['classe']['niveau'])->first();
                $idAnneeEncours=AnneeScolaire::latest('id')->get('id')->first()->id;
                $paiements = Payement::where('eleve_id', $eleve->id)
                ->where('classe_id', $eleve['classe']['id'])
                ->where('annee_scolaire_id', $idAnneeEncours)
                ->groupBy('annee_scolaire_id')
                ->groupBy('classe_id')
                ->sum('montant_payement');
                return[
                    'id'=>$eleve['id'],
                    'matricule_eleve'=>$eleve['matricule_eleve'],
                    'nom_eleve'=>$eleve['nom_eleve'],
                    'prenom_eleve'=>$eleve['prenom_eleve'],
                    'genre_eleve'=>$eleve['genre_eleve'],
                    'Date_naiss'=>$eleve['Date_naiss'],
                    'photo'=>$eleve['photo'],
                    'tel_eleve'=>$eleve['tel_eleve'],
                    'classe_id'=>$eleve['classe_id'],
                    'statut_scolaire'=>$eleve['statut_scolaire'],
                    'nom_classe'=>$eleve['classe']['nom_classe'],
                    'niveau'=>$eleve['classe']['niveau'],
                    'annee_scolaire_id'=>$eleve['classe']['annee_scolaire_id'],
                    'apayer'=>$fraisScolairite['tranche1']+$fraisScolairite['tranche2']+$fraisScolairite['tranche3'],
                    'payer'=>$paiements
                ];
            }else{
                return $eleve;
            }
        });
        
        return response()->json($result);
    }
}









