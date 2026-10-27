<?php

namespace App\Http\Controllers\gestion_scolaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_scolaire\MatiereRequest;
use App\Models\Classe;
use App\Models\Coefficient;
use App\Models\DispenserDans;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class MatiereController extends Controller
{
    public function getPersonnelMatiere($id)
    {
        $matieres = Matiere::with('personnels')->find($id);
        return response()->json([$matieres]);
    }

    public function liste(){
        $matieres = Matiere::all();
        return response()->json($matieres );
    }

    public function create(MatiereRequest $request){
        $verifieMatiere=Matiere::where('libelle_matiere',$request->libelle_matiere)->get();
        if(count($verifieMatiere)>0 ){
            return response()->json(['message' => "cette matiere existe déjà"]);
        }
        $validated=$request->validated();
        DB::beginTransaction();
        try{ 
        $matiere = Matiere::create([
            'libelle_matiere'=>$validated['libelle_matiere'],
            'type'=>$validated['type'],
            'description'=>$validated['description']
        ]);
        $i=0;
        foreach($validated['classes'] as $classeId){
            $classe = Classe::with('option')->with('fraisScolarite')->find($classeId);
            if($i==0 && $classe->niveau >=7 && $classe->niveau <= 10){              
                DB::table('coefficients')->insert([                    
                    'matiere_id'=>$matiere->id,
                    'fiche_renseignement_id'=>$classe->fraisScolarite->id,
                    'option_id'=>0,
                    'valeur'=>0,
                    'clycle'=>'Collège',
                ]);
                $i=1;
            }else{
                if($classe->niveau >=10 && $classe->niveau <= 13){
                    $coefficient =Coefficient::where('clycle','Lycée')
                    ->where('matiere_id',$matiere->id)
                    ->where('option_id',$classe->option_id)->get();
                    if(count($coefficient)<=0){
                        DB::table('coefficients')->insert([                    
                            'matiere_id'=>$matiere->id,
                            'fiche_renseignement_id'=>$classe->fraisScolarite->id,
                            'option_id'=>$classe->option_id,
                            'valeur'=>0,
                            'clycle'=>'Lycée',
                        ]);
                    }
                }
            }
            DB::table('dispenser_dans')->insert([
                'matiere_id'=>$matiere->id,
                'classe_id'=>$classeId,
            ]);
        }
        DB::commit();
        return response()->json(['message' => 'matiere enregistrée']);

    }catch(\Exception $e){
        DB::rollBack();
        return response()->json(['message'=>'erreur lors de l\'ors de l\'enregistrement','error'=>$e->getMessage()], 500);
    }
    }

    public function show(int $id){
        $matiere = Matiere::find($id);
        if(is_null($matiere)){
            return response()->json(['message' => 'cette matiere n\'existe pas'], 201);
        }
        return response()->json($matiere);
    }

    public function update(MatiereRequest $request, int $id){
        $matiere = Matiere::find($id);
        if(!$matiere){
            return response()->json(['message' => 'cette matiere n\'existe pas'], 404);
        }

        $verifieMatiere=Matiere::where('libelle_matiere',$request->libelle_matiere)
        ->where('id','!=',$id)
        ->get();
        if(count($verifieMatiere)>0 ){
            return response()->json(['message' => "cette matiere existe déjà"]);
        }
        $validated=$request->validated();
        DB::beginTransaction();
        try{ 
        $matiere->update([
            'libelle_matiere'=>$validated['libelle_matiere'],
            'type'=>$validated['type'],
            'description'=>$validated['description']
        ]);
        DispenserDans::where('matiere_id',$id)->delete();
        Coefficient::where('matiere_id',$id)->delete();

        foreach($validated['classes'] as $classeId){
            $i=0;

            $classe = Classe::with('option')->with('fraisScolarite')->find($classeId);
            if($i==0 && $classe->niveau >=7 && $classe->niveau <= 10){              
                DB::table('coefficients')->insert([                    
                    'matiere_id'=>$matiere->id,
                    'fiche_renseignement_id'=>$classe->fraisScolarite->id,
                    'option_id'=>0,
                    'valeur'=>0,
                    'clycle'=>'Collège',
                ]);
                $i=1;
            }else{
                $coefficient =Coefficient::where('clycle','Lycée')
                ->where('matiere_id',$matiere->id)
                ->where('option_id',$classe->option_id)->get();
                if(count($coefficient)<=0){
                    DB::table('coefficients')->insert([                    
                        'matiere_id'=>$matiere->id,
                        'fiche_renseignement_id'=>$classe->fraisScolarite->id,
                        'option_id'=>$classe->option_id,
                        'valeur'=>0,
                        'clycle'=>'Lycée',
                    ]);
                }
            }


            DB::table('dispenser_dans')->insert([
                'matiere_id'=>$id,
                'classe_id'=>$classeId,
            ]);
        }
        DB::commit();
        return response()->json(['message' => 'matiere modifiée']);
    }catch(\Exception $e){
        DB::rollBack();
        return response()->json(['message'=>'erreur lors de l\'ors de la modification','error'=>$e->getMessage()], 500);
    }
    }

    public function delete(int $id){
        $matiere = Matiere::find($id);
        if(!$matiere){
            return response()->json(['message' => 'cette matiere n\'existe pas'], 404);
        }
        DispenserDans::where('matiere_id',$id)->delete();
        $matiere->delete();
        return response()->json(['message' => 'matiere supprimée']);
    }
    //

    public function matiereDroit($droit)
    {
        if($droit=='DE'){
            $matiere = DispenserDans::join('classes','dispenser_dans.classe_id','=','classes.id')
            ->whereBetween('classes.niveau',[7,10])
            ->join('matieres','dispenser_dans.matiere_id','=','matieres.id')
            ->select('dispenser_dans.matiere_id as matiere_id', 'matieres.libelle_matiere as libelle_matiere')
            ->groupBy('matiere_id','libelle_matiere')
            ->get();
        }elseif($droit=='Cenceur'){
            $matiere = DispenserDans::join('classes','dispenser_dans.classe_id','=','classes.id')
            ->whereBetween('classes.niveau',[10,13])
            ->join('matieres','dispenser_dans.matiere_id','=','matieres.id')
            ->select('dispenser_dans.matiere_id as matiere_id', 'matieres.libelle_matiere as libelle_matiere')
            ->groupBy('matiere_id','libelle_matiere')
            ->get();
        }else{

        }
        return response()->json($matiere);
    }
}
