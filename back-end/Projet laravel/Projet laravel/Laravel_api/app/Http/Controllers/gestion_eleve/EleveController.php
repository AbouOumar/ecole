<?php

namespace App\Http\Controllers\gestion_eleve;

use App\ClassesTransfereData\ActionsEleves;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Concerns\PaginationOptionnelle;
use App\Http\Requests\gestion_eleve\EleveRequest;
use App\Http\Requests\gestion_eleve\LienParenteRequest;
use App\Http\Requests\gestion_eleve\ParentEleveRequest;
use App\Http\Requests\gestion_eleve\ParentRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;
use App\Models\Eleve;
use App\Models\Ins_reins;
use App\Models\Parent_eleve;
use App\Models\Parents;
use App\Models\Payement;
use App\Models\PersonnelEleve;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class EleveController extends Controller
{
    use PaginationOptionnelle;



    public function enregistrer(EleveRequest $requesteleve,ParentRequest $requestparent,LienParenteRequest $requestlien){
        //methode pour enregistrer un eleve avec les information de son parent
        //Génération du matricule automatique pour les élèves
        $dernier=Eleve::latest('id')->get('id')->first();
        if(!$dernier){
           $dernierID=0;
        }else{
            $dernierID=$dernier->id;
        }
        $dernierID++;
        $matriculeE="BE-E".now()->month.$dernierID.now()->year;

        //validation des données
            $eleve = Eleve::where( 'tel_eleve',$requesteleve['tel_eleve'])->first();
            if($eleve && $requesteleve['tel_eleve'] != ""){
                return response()->json(['message'=>'cet élève existe déjà','header'=>201],201);
            }

            if(!$requestlien->parent_id){
                $parentRecherche = Parents::where( 'telephone_parent',$requesteleve['telephone_parent'])->first();
                if($parentRecherche){
                    return response()->json(['message'=>'ce numero de téléphone existe déjà pour un parent','header'=>201],201);
                }
            }

            //verification de la recuperation de l'image
            if($requesteleve->hasFile('photo')){
                // Stocker la nouvelle photo
                $file = $requesteleve->file('photo');
                $nomFichier = time() . '_' . $file->getClientOriginalName();
                $uploadPath = $file->storeAs('images/profile',$nomFichier, 'public');
            }else{
                $nomFichier='avatar.png';
            }
            $dernierID=Eleve::latest('id')->first();

            $eleve =  $requesteleve->validated();
            $parent = $requestparent->validated();
            $parentEleve = $requestlien->validated();

            DB::beginTransaction();
            try{

                //enregistrer les données dans la table eleve
                $eleve = Eleve::create([
                    'matricule_eleve'=>$matriculeE,
                    'nom_eleve'=>$eleve['nom_eleve'],
                    'prenom_eleve'=>$eleve['prenom_eleve'],
                    'genre_eleve'=>$eleve['genre_eleve'],
                    'Date_naiss'=>$eleve['Date_naiss'],
                    'tel_eleve'=>$eleve['tel_eleve'],
                    'photo'=>$nomFichier,
                ]);

                if($requestlien->parent_id){
                    if($requestlien->typeParent=="personnel"){
                        PersonnelEleve::create([
                            'eleve_id'=>$eleve->id,
                            'personnel_id'=>$requestlien->parent_id,
                            'lien_parente'=> $parentEleve['lien_parente']
                        ]);
                    }else{
                        Parent_eleve::create([
                            'eleve_id'=>$eleve->id,
                            'parent_id'=>$requestlien->parent_id,
                            'lien_parente'=> $parentEleve['lien_parente']
                        ]);
                    }
                }else{
                    $parent = Parents::create([
                        'nom_parent'=>$parent['nom_parent'],
                        'prenom_parent'=>$parent['prenom_parent'],
                        'telephone_parent'=>$parent['telephone_parent'],
                        'Email_parent'=>$parent['Email_parent'],
                        'adresse_parent'=>$parent['adresse_parent'],
                        'profession'=>$parent['profession'],
                    ]);
                    Parent_eleve::create([
                        'eleve_id'=>$eleve->id,
                        'parent_id'=>$parent->id,
                        'lien_parente'=> $parentEleve['lien_parente']
                    ]);
                }
                $infoEleve='Bienvenu à l\'élève '.$eleve['prenom_eleve'].' '.$eleve['nom_eleve'].' '.'matricule '.$eleve['matricule_eleve'].' veillez proceder à l\'inscription ';
                DB::commit();
                return response()->json(['message'=>'Enregistrement effectuer avec succes','bienvenue'=>$infoEleve,'idEleve'=>$eleve->id,'header'=>200]);
            }catch(\Exception $e){
                DB::rollBack();
                return response()->json(['message'=>'erreur lors de l\'ors de l\'enregistrement','header'=>201,'error'=>$e->getMessage()], 500);
            }



    }
    public function getParentEleveId($id)
    {
        //methode pour voir la liste des eleves
        $eleve = Eleve::with('parents','personnels')->with('classe')->find($id);
        if (is_null($eleve)) {
            return response()->json(['message'=>'cet eleve n existe pas'],404);
        }
        return response()->json([$eleve]);
    }

    public function liste(Request $request)
    {
        //methode pour voir la liste des eleves
        return $this->listeOuPage(Eleve::with('classe'), $request);
    }

    public function EleveClasse($droit)
    {
        //methode pour voir la liste des eleves
        if($droit=="Censeur"){
            $interval=[11, 13];
        }elseif($droit=="DE"){
            $interval=[7, 10];
        }elseif($droit=="admin"){
            $interval=[7, 13];
        }
        $eleves=Eleve::join('classes','eleves.classe_id','=','classes.id')
        ->whereBetween('classes.niveau',$interval)
        ->with('classe')
        ->get();
        return response()->json($eleves);
    }

    public function EleveEnseiClasse($idEnseignant)
    {
        //methode pour voir la liste des eleves par enseignant
        $eleves = DB::table('eleves')
        ->join('classes', 'eleves.classe_id', '=', 'classes.id')
        ->join('affecters', 'classes.id', '=', 'affecters.classe_id')
        ->join('enseigners', 'affecters.enseigner_id', '=', 'enseigners.id')
        ->where('enseigners.personnel_id', $idEnseignant)
        ->select(
            'eleves.id as eleve_id',
            'eleves.matricule_eleve',
            'eleves.nom_eleve',
            'eleves.prenom_eleve',
            'eleves.genre_eleve',
            'eleves.tel_eleve',
            'eleves.photo',
            'eleves.classe_id',
            'classes.nom_classe'
        )
        ->distinct()
        ->get();

        return response()->json($eleves);
    }

    public function create(EleveRequest $request)
    {
        //methode pour enregistrer un eleve
               //verifiction du téléphone
        $eleveR = Eleve::where( 'tel_eleve',$request['tel_eleve'])->first();
        if($eleveR){
            return response()->json(['message'=>'ce numero de téléphone appartient a quelqu un d autre'],201);
        }
        $eleve = Eleve::create($request->validated());
        return response()->json(['message'=>'Enregistrement effectuer avec succès']);
    }

    public function show(int $id)
    {
        //methode pour voir un eleve par id
        $eleve = Eleve::with('classe')->find($id);
        if(is_null($eleve)){
            return response()->json(['message'=>'cet élève n existe pas'],404);
        }
        return response()->json($eleve);
    }
    public function showMatricule(string $matricule)
    {
        //methode pour voir un eleve par matricule
        $eleve = Eleve::with('classe')->where( 'matricule_eleve',$matricule)->first();
        if(is_null($eleve)){
            return response()->json(['message'=>'cet élève n existe pas'],404);
        }
        return response()->json($eleve);
    }

    public function update(Request $request, int $id)
    {
        // 🔹 Récupérer les données JSON
        $data = json_decode($request->input('data'), true);
        if (!$data) {
            return response()->json("Données non valides", 400);
        }
        $data = array_merge($data, ['photo'=>$request->file('photo')]);

        // 🔹 Récupérer l'élève par ID
        $eleve = Eleve::find($id);
        if (!$eleve) {
            return response()->json(['message' => 'Cet élève n\'existe pas'], 404);
        }

        // 🔹 Validation des données
        $validated = Validator::make($data, [
            'matricule_eleve' => 'nullable',
            'nom_eleve' => 'required|string|max:255',
            'prenom_eleve' => 'required|string|max:255',
            'genre_eleve' => 'required|string|max:255',
            'Date_naiss' => 'required|date',
            'tel_eleve' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Vérifier si la validation échoue
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 201);
        }

        // 🔹 Vérifier si le numéro de téléphone existe déjà pour un autre élève
        if (isset($data['tel_eleve'])) {
            $eleveR = Eleve::where('tel_eleve', $data['tel_eleve'])->first();
            if ($eleveR && $id != $eleveR->id) {
                return response()->json(['message' => 'Ce numéro de téléphone appartient à quelqu\'un d\'autre'], 400);
            }
        }

        // 🔹 Vérifier si une nouvelle image a été envoyée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($eleve->photo && file_exists(public_path('storage/images/profile/' . $eleve->photo))) {
                unlink(public_path('storage/images/profile/' . $eleve->photo));
            }

            // Stocker la nouvelle photo
            $file = $request->file('photo');
             $nomFichier = time() . '_' . $file->getClientOriginalName();
            $uploadPath = $file->storeAs('images/profile',$nomFichier, 'public');
        }else{
            if ($eleve->photo) {
                $nomFichier=$eleve->photo;
            }else{
                $nomFichier="avatar.png";
            }
        }

        // Mise à jour de l'élève (sauf photo qui est déjà gérée)
        $eleve ->update([
            'matricule_eleve'=>$eleve['matricule_eleve'],
            'nom_eleve'=>$data['nom_eleve'],
            'prenom_eleve'=>$data['prenom_eleve'],
            'genre_eleve'=>$data['genre_eleve'],
            'Date_naiss'=>$data['Date_naiss'],
            'tel_eleve'=>$data['tel_eleve'],
            'photo'=>$nomFichier
        ]);

        return response()->json(['message' => 'Modification effectuée avec succès', 'eleve' => $eleve]);

    }


    public function delete(string $id)
    {
        //methode pour supprimer un eleve
        $eleve = Eleve::find($id);

        if (!$eleve) {
            return response()->json(['message' => 'Cet élève n\'existe pas'], 404);
        }

        $eleve->delete();

        return response()->json(['message' => 'Suppression effectué avec succès']);
    }

    public function getactionEleveId($id)
    {
        //afficher les actions d'un eleve dans la base de donnée

        $eleve = Eleve::find($id)->first();
        if (!$eleve) {
            return response()->json(['message' => 'Cet élève n\'existe pas'], 201);
        }
        $ins_reins = Ins_reins::select('id','updated_at as date','type as evenement','eleve_id','classe_id as classe','annee_scolaire_id as annee_scolaire','montant','moyentPayement')
        ->where('eleve_id', $id)
        ->get();

        $payementScolarites = Payement::select('id','updated_at as date','tranche','eleve_id','classe_id as classe','annee_scolaire_id as annee_scolaire','montant_payement as montant','compte_id as moyentPayement')
        ->where('eleve_id', $id)
        ->get();
        $actionEleve = new Collection();

        foreach ($ins_reins as $ins_rein) {
            $nomClasse = Classe::find($ins_rein->classe);
            $actionEleve->push(new ActionsEleves($ins_rein->id, $ins_rein->evenement,'', $ins_rein->montant, $ins_rein->date, $id, $nomClasse['nom_classe'], $ins_rein->annee_scolaire, $ins_rein->moyentPayement,$eleve->prenom_eleve.' '.$eleve->nom_eleve));
        }

        foreach ($payementScolarites as $payementScolarite) {
            $nomClasse = Classe::find($payementScolarite->classe);
            $actionEleve->push(new ActionsEleves($payementScolarite->id, 'Payement de scolarité', $payementScolarite->tranche, $payementScolarite->montant, $payementScolarite->date, $id, $nomClasse['nom_classe'], $payementScolarite->annee_scolaire, $payementScolarite->moyentPayement,$eleve->prenom_eleve.' '.$eleve->nom_eleve));
        }
        $actionEleve= $actionEleve->sortByDesc('date')->values();
        if(!$actionEleve){
            return response()->json(['message' => 'Erreur lors du chargement des actions']);
        }
        return response()->json($actionEleve);
    }
}
