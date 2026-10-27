<?php

namespace App\Http\Controllers\gestion_personnel;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_personnel\SalaireRequest;
use App\Models\ActionPersonnel;
use App\Models\AnneeScolaire;
use App\Models\Fonction;
use App\Models\Personnel;
use App\Models\Salaire;
use App\Models\Volume_horaire;
use Illuminate\Http\Request;
use Mockery\Undefined;

class SalaireController extends Controller
{
    public function liste()
    {
        $salaires = Salaire::with('personnel')->get();
        return response()->json($salaires);
    }

    public function getEtatSalaireGlobal(){

        $salaires=Salaire::selectRaw( 'mois,annee_scolaire_id, SUM(salaire_brut) as salaire_brutTotal, SUM(ecolage) as ecolageTotal ,SUM(prime) as primeTotal, SUM(salaire_net) salaire_netTotal')
        ->groupBy('mois', 'annee_scolaire_id')
        ->orderBy('mois')
        ->get();
        return response()->json($salaires);
    }

    public function create(SalaireRequest $request)
    {
        $salaire =  $request->validated();
        if($salaire){

            $fonction=Fonction::find($salaire['fonction_id']);
            if($fonction['libelle_fonction'] != 'Enseignant'){
                $fn='Autre';
            }else{
                $fn='Enseignant';
            }

            $verifieSalaire = Salaire::where('personnel_id',$salaire['personnel_id'])
            ->where('mois',$salaire['mois'])
            ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
            ->where('fonction_id', $salaire['fonction_id'])
            ->get();
            if(count($verifieSalaire)>0 ){
                return response()->json(['message' =>'ce salaire existe déja'.$verifieSalaire['mois']]);
            }

            $actions=ActionPersonnel::where('personnel_id',$salaire['personnel_id'])
            ->where('mois',$salaire['mois'])
            ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
            ->where('fonction', $fn)
            ->get();
            $personnel= Personnel::find($salaire['personnel_id']);
            $volumeHoraire= Volume_horaire::where('personnel_id',$salaire['personnel_id'])
            ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
            ->where('mois',$salaire['mois'])->first();

            if($fn=='Enseignant' && !$volumeHoraire){
                return response()->json(['message' =>'veillez enregistre le volume horaire pour de mois']);
            }elseif($fn=='Autre' && $personnel['salaire_base']==0){
                return response()->json(['message' =>'ce personnel n\'a pas de salaire de base']);
            }else{
                if($fn=='Enseignant'){
                    $salaireBrut=$personnel['taux_horaire'] * $volumeHoraire['nombreHeure'];
                }else{
                    $salaireBrut=$personnel['salaire_base'];
                }

            }
            $Prime=0;
            $Avancesursalaire=0;
            $Affairesociale=0;
            $Ecolage=0;
            $erreurMontant=0;
            foreach($actions as $action ){
                if($action['type']=='Prime'){
                    $Prime=$Prime+$action['montant'];
                }elseif($action['type']=='Avance sur salaire'){
                    $Avancesursalaire=$Avancesursalaire+$action['montant'];
                }elseif($action['type']=='Affaire sociale'){
                    $Affairesociale=$Affairesociale+$action['montant'];
                }elseif($action['type']=='Ecolage'){
                    $Ecolage=$Ecolage+$action['montant'];
                }else{
                    $erreurMontant=$erreurMontant=$Ecolage+$action['montant'];
                }


            }
            $salaire = Salaire::create([
                'personnel_id'=>$personnel['id'],
                'fonction_id'=>$salaire['fonction_id'],
                'mois'=>$salaire['mois'],
                'annee_scolaire_id'=>$salaire['annee_scolaire_id'],
                'salaire_brut'=>$salaireBrut,
                'salaire_net'=>$salaireBrut+$Prime-$Affairesociale-$Avancesursalaire-$Ecolage,
                'avance_salaire'=>$Avancesursalaire,
                'affaire_sociale'=>$Affairesociale,
                'ecolage'=>$Ecolage,
                'prime'=>$Prime,
                'disponibilite'=>'oui',
                'statut'=>'non payé'
            ]);
            return response()->json(['message' =>'salaire enregistrer avec succès '.'erreur '.$erreurMontant]);
        }
    }

    public function show(int $id)
    {
        $salaire = Salaire::with('personnel')->find($id);
        return response()->json($salaire);
    }

    public function update(SalaireRequest $request,int $id)
    {
        $salaire =  $request->validated();
        $salaire = Salaire::find($id);

        if($salaire){
            if($salaire['statut']=='payé' ){
                return response()->json(['message' =>'ce salaire a été payé ne peut donc pas être modifie']);
            }

            if($request['statut']=="payé"){
                $salaire['statut'] =$request['statut'];
            }

            $fonction=Fonction::find($salaire['fonction_id']);
            if($fonction['libelle_fonction'] != 'Enseignant'){
                $fn='Autre';
            }else{
                $fn='Enseignant';
            }

            $actions=ActionPersonnel::where('personnel_id',$salaire['personnel_id'])
            ->where('mois',$salaire['mois'])
            ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
            ->where('fonction', $fn)
            ->get();
            $personnel= Personnel::find($salaire['personnel_id']);
            $volumeHoraire= Volume_horaire::where('personnel_id',$salaire['personnel_id'])
            ->where('annee_scolaire_id',$salaire['annee_scolaire_id'])
            ->where('mois',$salaire['mois'])->first();

            if($fn=='Enseignant' && !$volumeHoraire){
                return response()->json(['message' =>'veillez enregistre le volume horaire pour de mois']);
            }elseif($fn=='Autre' && $personnel['salaire_base']==0){
                return response()->json(['message' =>'ce personnel n\'a pas de salaire de base']);
            }else{
                if($fn=='Enseignant'){
                    $salaireBrut=$personnel['taux_horaire'] * $volumeHoraire['nombreHeure'];
                }else{
                    $salaireBrut=$personnel['salaire_base'];
                }

            }
            $Prime=0;
            $Avancesursalaire=0;
            $Affairesociale=0;
            $Ecolage=0;
            $erreurMontant=0;
            foreach($actions as $action ){
                if($action['type']=='Prime'){
                    $Prime=$Prime+$action['montant'];
                }elseif($action['type']=='Avance sur salaire'){
                    $Avancesursalaire=$Avancesursalaire+$action['montant'];
                }elseif($action['type']=='Affaire sociale'){
                    $Affairesociale=$Affairesociale+$action['montant'];
                }elseif($action['type']=='Ecolage'){
                    $Ecolage=$Ecolage+$action['montant'];
                }else{
                    $erreurMontant=$erreurMontant=$Ecolage+$action['montant'];
                }


            }
            $salaire ->update([
                'personnel_id'=>$personnel['id'],
                'fonction_id'=>$salaire['fonction_id'],
                'mois'=>$salaire['mois'],
                'annee_scolaire_id'=>$salaire['annee_scolaire_id'],
                'salaire_brut'=>$salaireBrut,
                'salaire_net'=>$salaireBrut+$Prime-$Affairesociale-$Avancesursalaire-$Ecolage,
                'avance_salaire'=>$Avancesursalaire,
                'affaire_sociale'=>$Affairesociale,
                'ecolage'=>$Ecolage,
                'prime'=>$Prime,
                'disponibilite'=>'oui',
                'statut'=> $salaire['statut']
            ]);
            return response()->json(['message' =>'salaire modifié avec succès '.'erreur '.$erreurMontant]);
        }else {
            return response()->json(['message' => 'Ce salaire n\'existe pas'], 404);
        }
    }

    public function delete(int $id)
    {
        $salaire = Salaire::find($id);
        if (!$salaire) {
            return response()->json(['message' => 'Ce salaire n\'existe pas'], 201);
        }elseif($salaire->statut=='payé'){
            return response()->json(['message' => 'Ce salaire est déjà payé'], 201);
        }
        $salaire->delete();

        return response()->json(['message' => 'Salaire supprimé avec succès']);

    }
    //
}
