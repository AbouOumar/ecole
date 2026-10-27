<?php

namespace App\Http\Controllers\gestion_eleve;

use App\ClassesTransfereData\ActionsEleves;
use App\ClassesTransfereData\ParentPersonnels;
use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_eleve\ParentRequest;
use App\Models\Classe;
use App\Models\Ins_reins;
use App\Models\Parent_eleve;
use App\Models\Parents;
use App\Models\Payement;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
    public function liste()
    {
        //methode pour voir la liste des parents
        $parents = Parents::all();
        return response()->json( $parents );
    }

    public function getEleveParentId($id)
    {
        //methode pour voir la liste des eleves
        $parent = Parents::with('eleves','eleves.classe')->find($id);
        if (is_null($parent)) {
            return response()->json(['message'=>'cet parent n existe pas'],404);
        }
        return response()->json([$parent]);
    }

    public function getElevePersonnelId($id)
    {
        //methode pour voir la liste des eleves
        $parent = Personnel::with('eleves','eleves.classe','fonction_personnel.fonction')->find($id);
        if (is_null($parent)) {
            return response()->json(['message'=>'cet personnel n existe pas'],404);
        }
        return response()->json([$parent]);
    }
  
    public function create($id,ParentRequest $request)
    {            

        //methode pour enregistrer un parent
                 //verification du numero de téléphone
        $parentR = Parents::where( 'telephone_parent',$request['telephone_parent'])->first();
        if($parentR){
            return response()->json(['message'=>'ce numero de téléphone appartient a quelqu un d autre'],201);
        }
        $parentRequest = $request->validated();
        DB::beginTransaction();
        try{
            $parent = Parents::create([
                'nom_parent'=>$parentRequest['nom_parent'],
                'prenom_parent'=>$parentRequest['prenom_parent'],
                'telephone_parent'=>$parentRequest['telephone_parent'],
                'Email_parent'=>$parentRequest['Email_parent'],
                'adresse_parent'=>$parentRequest['adresse_parent'],
                'profession'=>$parentRequest['profession'],
            ]);
            Parent_eleve::create([
                'eleve_id'=>$id,
                'parent_id'=>$parent->id,
                'lien_parente'=> $parentRequest['type']
            ]);
            DB::commit();
            return response()->json(['message'=>'Enregistrement effectuer avec succès',200]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'erreur lors de l\'ors de l\'enregistrement','header'=>201,'error'=>$e->getMessage()], 500);
        }
    }

    public function show(int $id)
    {
        //methode pour voir un parent par id
        $parent = Parents::find($id);
        if(is_null($parent)){
            return response()->json(['message'=>'ce parent n existe pas'],404);
        }
        return response()->json($parent);
    }
    public function update(ParentRequest $request, string $id)
    {
        //methode pour modifier un parent
        $parent = Parents::find($id);
        if (!$parent) {
            return response()->json(['message' => 'Ce parent n\'existe pas'], 404);
        }
        //verification du numero de téléphone
        $parentR = Parents::where( 'telephone_parent',$request['telephone_parent'])->first();
        if($parentR && $id != $parentR->id){
            return response()->json(['message'=>'ce numero de téléphone appartient a quelqu un d autre'],201);
        }

        $parent->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès: ']);
    }

    public function showTelephone($telephone)
    {
        //methode pour voir un parentEleve par id
        $parentEleve = Parents::where('telephone_parent',$telephone)->first();
        if(is_null($parentEleve)){
            return response()->json(['message'=>'ce parent d\'eleve n\'existe pas','trouver'=>'false'],201);
        }
        return response()->json($parentEleve);
    }

    public function showTelephoneP($matricule)
    {
        //methode pour voir un parentEleve par matricule
        $personnel = Personnel::with('fonction_personnel.fonction') ->where('matricule_personnel',$matricule)->first();
        if(is_null($personnel)){
            return response()->json(['message'=>'ce numero ou matricule n\'existe pas','trouver'=>'false'],201);
        }
        return response()->json($personnel);
    }

 
    public function delete(string $id)
    {
        //methode pour supprimer un parent
        $parent = Parents::find($id);
    
        if (!$parent) {
            return response()->json(['message' => 'Ce parent n\'existe pas'], 404);
        }
    
        $parent->delete();
    
        return response()->json(['message' => 'Suppression effectué avec succès']);
    }

    public function getactionParentId(Request $request)
    {
        //afficher les actions d'un eleve dans la base de donnée
        $validated = $request->validate([
            'id'=>'required',
            'type'=>'required'
        ]);

        if($validated['type']=="personnel"){
            $parent = Personnel::with('eleves')->find($validated['id']);
        }else{
            $parent = Parents::with('eleves')->find($validated['id']);
        }
        if (is_null($parent)) {
            return response()->json(['message'=>'cet parent n existe pas'],404);
        }

        $actionEleve = new Collection();
        foreach ($parent->eleves as $eleve) {
            $id=$eleve['id'].'';
            $ins_reins = Ins_reins::select('id','updated_at as date','type as evenement','eleve_id','classe_id as classe','annee_scolaire_id as annee_scolaire','montant','moyentPayement')
            ->where('eleve_id', $id)
            ->get();
            
            $payementScolarites = Payement::select('id','updated_at as date','tranche','eleve_id','classe_id as classe','annee_scolaire_id as annee_scolaire','montant_payement as montant','compte_id as moyentPayement')
            ->where('eleve_id', $id)
            ->get();
            
            foreach ($ins_reins as $ins_rein) {
                $nomClasse = Classe::find($ins_rein->classe);
                $actionEleve->push(new ActionsEleves($ins_rein->id, $ins_rein->evenement,'', $ins_rein->montant, $ins_rein->date, $id, $nomClasse['nom_classe'], $ins_rein->annee_scolaire, $ins_rein->moyentPayement, $eleve->prenom_eleve.' '.$eleve->nom_eleve));
            }
            
            foreach ($payementScolarites as $payementScolarite) {
                $nomClasse = Classe::find($payementScolarite->classe);
                $actionEleve->push(new ActionsEleves($payementScolarite->id, 'Payement de scolarité', $payementScolarite->tranche, $payementScolarite->montant, $payementScolarite->date, $id, $nomClasse['nom_classe'], $payementScolarite->annee_scolaire, $payementScolarite->moyentPayement, $eleve->prenom_eleve.' '.$eleve->nom_eleve));
            }
            $actionEleve= $actionEleve->sortByDesc('date')->values();
            if(!$actionEleve){
                return response()->json(['message' => 'Erreur lors du chargement des actions']);
            }
        }
        return response()->json($actionEleve);
    }

    public function getListeParentPersonnelEleve()
    {
        //afficher la liste de parent des personnel parent d'un eleve dans la base de donnée 
        $parents = Parents::with('eleves')->get();
        $personnels = Personnel::with('eleves')->with('fonction_personnel.fonction')->get();
        $parentPersonnel = new Collection();
        
        foreach ($parents as $parent) {
            $nbEnfant = $parent->eleves->count('id');
            $parentPersonnel->push(new ParentPersonnels($parent->id, $parent->nom_parent, $parent->prenom_parent, $parent->telephone_parent, $nbEnfant, $parent->adresse_parent, $parent->profession,$parent->created_at,'SimpleParent',$parent->Email_parent));
        }
        
        foreach ($personnels as $personnel) {
            $nbEnfant = $personnel->eleves->count('id');
            if($nbEnfant>0){
                $parentPersonnel->push(new ParentPersonnels($personnel->id, $personnel->nom_personnel, $personnel->prenom_personnel, $personnel->tel_personnel, $nbEnfant, $personnel->adresse_personnel, $personnel->fonction_personnel[0]?->fonction?->libelle_fonction,$personnel->created_at,'PersonnelParent',$parent->Email_parent));
            }
        }
        $parentPersonnel= $parentPersonnel->sortByDesc('create_date')->values();
        if(!$parentPersonnel){
            return response()->json(['message' => 'Erreur lors du chargement des parent et Personnel']);
        }
        return response()->json($parentPersonnel);
    }
}
