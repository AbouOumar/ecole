<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ActionPersonnelController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\CoefficientController;
use App\Http\Controllers\Controllers\Auth\LoginController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ficheRenseignementController;
use App\Http\Controllers\gestion_eleve\AnneeScolaireController;
use App\Http\Controllers\gestion_eleve\ClasseController;
use App\Http\Controllers\gestion_eleve\AccueillitController;
use App\Http\Controllers\gestion_eleve\CompteController;
use App\Http\Controllers\gestion_eleve\ControllerDepart;
use App\Http\Controllers\gestion_eleve\EffectifClasseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gestion_eleve\EleveController;
use App\Http\Controllers\gestion_eleve\InsReinsController;
use App\Http\Controllers\gestion_eleve\ParentController;
use App\Http\Controllers\gestion_eleve\ParentEleveController;
use App\Http\Controllers\gestion_eleve\PayementController;
use App\Http\Controllers\gestion_eleve\RecuPayementController;
use App\Http\Controllers\gestion_eleve\ReductionController;
use App\Http\Controllers\gestion_personnel\FonctionController;
use App\Http\Controllers\gestion_personnel\FonctionPersonnelController;
use App\Http\Controllers\gestion_personnel\PersonnelController;
use App\Http\Controllers\gestion_personnel\SalaireController;
use App\Http\Controllers\gestion_scolaire\EmploiTempsController;
use App\Http\Controllers\gestion_scolaire\EnseignerController;
use App\Http\Controllers\gestion_scolaire\MatiereController;
use App\Http\Controllers\gestion_scolaire\NoterController;
use App\Http\Controllers\gestion_scolaire\TauxHoraireController;
use App\Http\Controllers\gestion_scolaire\VolumeHoraireController;
use App\Http\Controllers\PayementSalaireController;
use App\Http\Controllers\PersonnelEleveController;
use App\Http\Controllers\statistique\StatistiqueController;
use App\Http\Controllers\TypeDepenseController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(LoginController::class)->group(function(){
    Route::post('/login','login_store')->middleware('throttle:5,1')->name('login');
});
Route::middleware('auth:sanctum')->post('/logout',[LoginController::class,'logout'])->name('logout');
Route::middleware(['auth:sanctum','droit:tout,admin,DG'])->post('/createUser',[LoginController::class,'inscription_store'])->name('createUser');
Route::middleware(['auth:sanctum','droit:tout,admin,DG'])->get('/updateUserStatut/{id}',[LoginController::class,'updateUserStatut'])->name('updateUserStatut');
Route::middleware('auth:sanctum')->post('/updateUser/{id}',[LoginController::class,'updateUser'])->name('updateUser');

Route::middleware(['auth:sanctum','droit:tout,admin,DG'])->get('/listeUser',[LoginController::class,'listeUser'])->name('listeUser');

Route::middleware('auth:sanctum')->get('/voir-fichier/{filename}',[LoginController::class,'showFile'])
->where('filename','.*')
->name('showFile');
//Routes proteger par sanctum
Route::middleware([
    EnsureFrontendRequestsAreStateful::class,
    'auth:sanctum'])->group(function(){
    Route::controller(EleveController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-eleve','liste')->name('list-eleve');
        Route::get('eleveId/{id}','show')->name('eleveId');
        Route::get('showMatricule/{matricule}','showMatricule')->name('showMatricule');
        Route::post('create-eleve',  'create')->name('create-eleve');
        Route::post('update-eleve/{id}','update')->name('update-eleve');
        Route::delete('delete-eleve/{id}','delete')->name('delete-eleve');
        Route::get('eleve_droit/{droit}','EleveClasse')->name('eleve_droit');
        Route::get('eleve_droitEnsei/{droit}','EleveEnseiClasse')->name('eleve_droitEnsei');

        Route::post('enregistrer_eleve','enregistrer')->name('enregistrer_eleve');
        Route::get('parent_eleveId/{id}','getParentEleveId')->name('parent_eleveId');
        Route::get('actionEleveId/{id}','getactionEleveId')->name('actionEleveId');
    });

    Route::controller(InsReinsController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-ins_reins','liste')->name('list-ins_reins');
        Route::get('ins_reinsId/{id}','show')->name('ins_reinsId');
        Route::post('create-ins_reins',  'create')->name('create-ins_reins');
        Route::post('update-ins_reins/{id}','update')->name('update-ins_reins');
        Route::delete('delete-ins_reins/{id}','delete')->name('delete-ins_reins');

        Route::post('create-personnel',  'createPersonnel')->name('create-personnel');
        Route::get('list-tousPersonnel',  'tousPersonnel')->name('list-tousPersonnel');

    });

    Route::controller(AnneeScolaireController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-anneeScolaire','liste')->name('list-anneeScolaire');
        Route::get('list-semestreAnnee','semestreAnnee')->name('list-semestreAnnee');
        Route::get('anneeScolaireId/{id}','show')->name('anneeScolaireId');
        Route::post('create-anneeScolaire', 'create')->name('create-anneeScolaire');
        Route::post('update-anneeScolaire/{id}','update')->name('update-anneeScolaire');
        Route::delete('delete-anneeScolaire/{id}','delete')->name('delete-anneeScolaire');
    });

    Route::controller(AbsenceController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable,Enseignant')->group(function(){
        Route::get('list-absence','liste')->name('list-absence');
        Route::post('create-absence','create')->name('create-absence');
        Route::delete('delete-absence/{id}','delete')->name('delete-absence');
    });

    Route::controller(CoefficientController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-coefficient','liste')->name('list-coefficient');
        Route::get('list-semestreAnnee','semestreAnnee')->name('list-semestreAnnee');
        Route::get('coefficientId/{id}','show')->name('coefficientId');
        Route::post('create-coefficient', 'create')->name('create-coefficient');
        Route::post('update-coefficient/{id}','update')->name('update-coefficient');
        Route::delete('delete-coefficient/{id}','delete')->name('delete-coefficient');
    });

    Route::controller(ClasseController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-classe','liste')->name('list-classe');
        Route::get('list-classeDroit/{droit}','classeDroit')->name('list-classeDroit');
        Route::get('personnel/{id}/classes','getClasseParPersonnelId')->name('personnel/{id}/classes');
        Route::get('list-desclasse','liste_classe')->name('list-desclasse');
        Route::get('classeId/{id}','show')->name('classeId');
        Route::post('create-classe', 'create')->name('create-classe');
        Route::post('update-classe/{id}','update')->name('update-classe');
        Route::delete('delete-classe/{id}','delete')->name('delete-classe');

        Route::get('fraisParClasseId/{id}','fraisParClasse')->name('fraisParClasseId');
    });

    Route::controller(ParentController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-parent','liste')->name('list-parent');
        Route::get('parentId/{id}','show')->name('parentId');
        Route::get('parentTelephone/{telephone}','showTelephone')->name('parentTelephone');
        Route::post('create-parent/{id}',  'create')->name('create-parent');
        Route::put('update-parent/{id}','update')->name('update-parent');
        Route::delete('delete-parent/{id}','delete')->name('delete-parent');

        Route::get('eleve_parentId/{id}','getEleveParentId')->name('eleve_parentId');
        Route::get('eleve_PersonnelId/{id}','getElevePersonnelId')->name('eleve_PersonnelId');
        Route::post('actionParentId','getactionParentId')->name('actionParentId');
        Route::get('getListeParentPersonnel','getListeParentPersonnelEleve')->name('getListeParentPersonnel');
        Route::get('showTelephoneP/{telephone}','showTelephoneP')->name('showTelephoneP');
    });

    Route::controller(ParentEleveController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-parentEleve','liste')->name('list-parentEleve');
        Route::get('parentEleveId/{id}','show')->name('parentEleveId');
        Route::post('create-parentEleve',  'create')->name('create-parentEleve');
        Route::put('update-parentEleve/{id}','update')->name('update-parentEleve');
        Route::delete('delete-parentEleve/{id}','delete')->name('delete-parentEleve');
    });

    Route::controller(PersonnelEleveController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-personnelEleve','liste')->name('list-personnelEleve');
        Route::get('personnelEleveId/{id}','show')->name('personnelEleveId');
        Route::post('create-personnelEleve',  'create')->name('create-personnelEleve');
        Route::put('update-personnelEleve/{id}','update')->name('update-personnelEleve');
        Route::delete('delete-personnelEleve/{id}','delete')->name('delete-personnelEleve');
    });

    Route::controller(AccueillitController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-accueillit','liste')->name('list-accueillit');
        Route::get('accueillitId/{id}','show')->name('accueillitId');
        Route::post('create-accueillit',  'create')->name('create-accueillit');
        Route::put('update-accueillit/{id}','update')->name('update-accueillit');
        Route::delete('delete-accueillit/{id}','delete')->name('delete-accueillit');
    });

    Route::controller(ControllerDepart::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-depart','liste')->name('list-depart');
        Route::get('departId/{id}','show')->name('departId');
        Route::post('create-depart',  'create')->name('create-depart');
        Route::put('update-depart/{id}','update')->name('update-depart');
        Route::delete('delete-depart/{id}','delete')->name('delete-depart');
    });

    Route::controller(CompteController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-compte','liste')->name('list-compte');
        Route::get('compteId/{id}','show')->name('compteId');
        Route::post('create-compte',  'create')->name('create-compte');
        Route::post('update-compte/{id}','update')->name('update-compte');
        Route::delete('delete-compte/{id}','delete')->name('delete-compte');

        Route::get('liste-journal','liste_journal')->name('list-journal');
        Route::get('liste-balance','liste_balance')->name('list-balance');
    });

    Route::controller(PayementController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-payement','liste')->name('list-payement');
        Route::get('payementId/{id}','show')->name('payementId');
        Route::post('create-payement',  'create')->name('create-payement');
        Route::post('update-payement/{id}','update')->name('update-payement');
        Route::delete('delete-payement/{id}','delete')->name('delete-payement');

        Route::get('frais_scolariteEleve/{matricule}','frais_scolairiteEleve')->name('frais_scolairiteEleve');
        Route::get('listePayementDetail','listePayementDetail')->name('listePayementDetail');
        Route::get('listeDesImpayes','listeDesImpayes')->name('listeDesImpayes');
        Route::get('ImpayesEleve/{id}','ImpayesEleve')->name('ImpayesEleve');
        Route::get('statistique_rapport','statistique_rapport')->name('list-statistique_rapport');

    });

    Route::controller(RecuPayementController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-recu_payement','liste')->name('list-recu_payement');
        Route::get('recu_payementId/{id}','show')->name('recu_payementId');
        Route::post('create-recu_payement',  'create')->name('create-recu_payement');
        Route::put('update-recu_payement/{id}','update')->name('update-recu_payement');
        Route::delete('delete-recu_payement/{id}','delete')->name('delete-recu_payement');
    });

    Route::controller(ReductionController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-reduction','liste')->name('list-reduction');
        Route::get('reductionId/{id}','show')->name('reductionId');
        Route::post('create-reduction',  'create')->name('create-reduction');
        Route::put('update-reduction/{id}','update')->name('update-reduction');
        Route::delete('delete-reduction/{id}','delete')->name('delete-reduction');

        Route::get('reductionEleveId/{id}','reductionEleveId')->name('reductionEleveId');
    });

    Route::controller(EffectifClasseController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-effectifClasse','liste')->name('list-effectifClasse');
        Route::get('effectifClasseId/{id}','show')->name('effectifClasseId');
        Route::post('create-effectifClasse',  'create')->name('create-effectifClasse');
        Route::put('update-effectifClasse/{id}','update')->name('update-effectifClasse');
        Route::delete('delete-effectifClasse/{id}','delete')->name('delete-effectifClasse');
    });
    Route::controller(PayementSalaireController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-payement_salaire','liste')->name('list-payement_salaire');
        Route::get('payement_salaireId/{id}','show')->name('payement_salaireId');
        Route::post('create-payement_salaire',  'create')->name('create-payement_salaire');
        Route::put('update-payement_salaire/{id}','update')->name('update-payement_salaire');
        Route::delete('delete-payement_salaire/{id}','delete')->name('delete-payement_salaire');

    });
    //--------------------
    Route::controller(PersonnelController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('personnel/{id}/matieres','getMatiereParPersonnelId')->name('personnel/{id}/matieres');
        Route::get('personnel/matieres','getMatiereParPersonnel')->name('personnel/matieres');
        Route::get('list-personnel','liste')->name('list-personnel');
        Route::get('list-enseignant','listeEnseignant')->name('list-enseignant');
        Route::get('personnelId/{id}','show')->name('personnelId');
        Route::post('update-personnel/{id}','update')->name('update-personnel');
        Route::delete('delete-personnel/{id}','delete')->name('delete-personnel');
        Route::get('showMatriculePersonnel/{matricule}','showMatricule')->name('showMatriculePersonnel');

        Route::post('getactionPersonnelId','getactionPersonnelId')->name('getactionPersonnelId');
        Route::get('getPersonnel-salaireDetail','getPersonnelDetail')->name('getPersonnel-salaireDetail');
        Route::get('getEnseignant-salaireDetail','getEnseignantDetail')->name('getEnseignant-salaireDetail');
        Route::get('eleve_personnelId/{id}','getElevePersonnelId')->name('eleve_personnelId');
    });

    Route::controller(VolumeHoraireController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-volume_horaire','liste')->name('list-volume_horaire');
        Route::get('volume_horaireId/{id}','show')->name('volume_horaireId');
        Route::post('create-volume_horaire','create')->name('create-volume_horaire');
        Route::post('update-volume_horaire/{id}','update')->name('update-volume_horaire');
        Route::delete('delete-volume_horaire/{id}','delete')->name('delete-volume_horaire');
    });

    Route::controller(ActionPersonnelController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-action','liste')->name('list-action');
        Route::get('actionId/{id}','show')->name('actionId');
        Route::post('create-action','create')->name('create-action');
        Route::put('update-action/{id}','update')->name('update-action');
        Route::delete('delete-action/{id}','delete')->name('delete-action');
    });

    Route::controller(MatiereController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-matiere','liste')->name('list-matiere');
        Route::get('matiereDroit/{droit}','matiereDroit')->name('matiereDroit');
        Route::get('matiereId/{id}','show')->name('matiereId');
        Route::post('create-matiere','create')->name('create-matiere');
        Route::post('update-matiere/{id}','update')->name('update-matiere');
        Route::delete('delete-matiere/{id}','delete')->name('delete-matiere');

        Route::get('getPersonnelMatiere/{id}','getPersonnelMatiere')->name('getPersonnelMatiere');
    });
    Route::controller(EnseignerController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-enseigner','liste')->name('list-enseigner');
        Route::get('enseignerId/{id}','show')->name('enseignerId');
        Route::post('create-enseigner','create')->name('create-enseigner');
        Route::put('update-enseigner/{id}','update')->name('update-enseigner');
        Route::delete('delete-enseigner/{id}','delete')->name('delete-enseigner');
    });

    Route::controller(AffectationController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-affecter','liste')->name('list-affecter');
        Route::get('affecterId/{id}','show')->name('affecterId');
        Route::post('create-affecter','create')->name('create-affecter');
        Route::put('update-affecter/{id}','update')->name('update-affecter');
        Route::delete('delete-affecter/{id}','delete')->name('delete-affecter');
    });
    Route::controller(NoterController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable,Enseignant')->group(function(){
        Route::get('list-noter','liste')->name('list-noter');
        Route::get('list-bulletinsDisponibles','bulletinsDisponibles')->name('list-bulletinsDisponibles');
        Route::get('list-bulletinsDisoEleve/{id}','bulletinsDisoEleve')->name('list-bulletinsDisoEleve');
        Route::post('list-notation','notesParClasseSemestre')->name('list-notation');
        Route::post('list-resultatAnnuel','resultatAnnuel')->name('list-resultatAnnuel');
        Route::post('list-resultatSemestriel','resultatSemestriel')->name('list-resultatSemestriel');
        Route::post('bulletin_eleve','bulletinEleve')->name('bulletin_eleve');
        Route::post('MgEleve','MgEleve')->name('MgEleve');
        Route::get('noterId/{id}','show')->name('noterId');
        Route::post('create-noter','create')->name('create-noter');
        Route::post('enregistrer-note','enregistrerNote')->name('enregistrer-note');
        Route::put('update-noter/{id}','update')->name('update-noter');
        Route::delete('delete-noter/{id}','delete')->name('delete-noter');
    });
    Route::controller(EmploiTempsController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-emploi_temps','liste')->name('list-emploi_temps');
        Route::get('list-emploi_tempsPerson','listeEmploiPerson')->name('list-emploi_tempsPerson');
        Route::get('emploi_tempsId/{id}','showEnploiClasse')->name('emploi_tempsId');
        Route::get('emploi_tempsIdperson/{id}','showEnploiPerson')->name('emploi_tempsIdperson');
        Route::post('create-emploi_temps','create')->name('create-emploi_temps');
        Route::put('update-emploi_temps/{id}','update')->name('update-emploi_temps');
        Route::delete('delete-emploi_temps/{id}','delete')->name('delete-emploi_temps');
        Route::get('showEmploiPersonnel/{personnel_id}','showEmploiPersonnel')->name('showEmploiPersonnel');
        Route::get('showEmploiClasse/{classe_id}','showEmploiClasse')->name('showEmploiClasse');
        Route::get('showEmploiJour/{jour}','showEmploiJour')->name('showEmploiJour');

        Route::get('matiereProf_droit/{droit}','matiereProf_droit')->name('matiereProf_droit');
    });

    Route::controller(SalaireController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-salaire','liste')->name('list-salaire');
        Route::get('salaireId/{id}','show')->name('salaireId');
        Route::post('create-salaire','create')->name('create-salaire');
        Route::put('update-salaire/{id}','update')->name('update-salaire');
        Route::delete('delete-salaire/{id}','delete')->name('delete-salaire');


        Route::get('getEtatSalaireGlobal','getEtatSalaireGlobal')->name('getEtatSalaireGlobal');

    });
    Route::controller(FonctionController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-fonction','liste')->name('list-fonction');
        Route::get('fonctionId/{id}','show')->name('fonctionId');
        Route::post('create-fonction','create')->name('create-fonction');
        Route::put('update-fonction/{id}','update')->name('update-fonction');
        Route::delete('delete-fonction/{id}','delete')->name('delete-fonction');
    });
    Route::controller(FonctionPersonnelController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-fonction_personnel','liste')->name('list-fonction_personnel');
        Route::get('show-fonction_personnel/{matricule}','showMatricule')->name('show-fonction_personnel');
        Route::get('fonction_personnelId/{id}','show')->name('fonction_personnelId');
        Route::post('create-fonction_personnel','create')->name('create-fonction_personnel');
        Route::post('update-fonction_personnel/{id}','update')->name('update-fonction_personnel');
        Route::delete('delete-fonction_personnel/{id}','delete')->name('delete-fonction_personnel');
    });
    Route::controller(DepenseController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-depense','liste')->name('list-depense');
        Route::get('list-recette','recette')->name('list-recette');
        Route::get('depenseId/{id}','show')->name('depenseId');
        Route::post('create-depense','create')->name('create-depense');
        Route::post('update-depense/{id}','update')->name('update-depense');
        Route::delete('delete-depense/{id}','delete')->name('delete-depense');

        Route::get('list-recetteCasReduction','recetteCasReduction')->name('list-recetteCasReduction');
        Route::get('list-situationPrevisionnelDepense/{annee}','situationPrevisionnelDepense')->name('list-situationPrevisionnelDepense');
        Route::get('list-comparaisonDepense/{annee}','comparaisonDepense')->name('list-comparaisonDepense');
    });

    Route::controller(TypeDepenseController::class)->middleware('droit:ecriture,admin,DG,Comptable')->group(function(){
        Route::get('list-type_depense','liste')->name('list-type_depense');
        Route::get('list-type_recette','listeTypeRecette')->name('list-type_recette');
        Route::get('type_depenseId/{id}','show')->name('type_depenseId');
        Route::post('create-type_depense','create')->name('create-type_depense');
        Route::post('update-type_depense/{id}','update')->name('update-type_depense');
        Route::delete('delete-type_depense/{id}','delete')->name('delete-type_depense');
    });


    Route::controller(ficheRenseignementController::class)->middleware('droit:ecriture,admin,DG,DE,Censeur,Comptable')->group(function(){
        Route::get('list-ficheRenseignement','liste')->name('list-ficheRenseignement');
        Route::get('ficheRenseignementId/{id}','show')->name('ficheRenseignementId');
        Route::post('create-ficheRenseignement','create')->name('create-ficheRenseignement');
        Route::post('update-ficheRenseignement/{id}','update')->name('update-ficheRenseignement');
        Route::delete('delete-ficheRenseignement/{id}','delete')->name('delete-ficheRenseignement');
    });

    Route::controller(StatistiqueController::class)->group(function(){
        Route::get('list-statistique_rapprochement','statistique_rapprochement')->name('list-statistique_rapprochement');
        Route::get('statistique_rapprochement_annee/{annee}','statistique_rapprochement_annee')->name('list-statistique_rapprochement_annee');
        Route::get('statistique_rapprochementMoisAnnee','statistique_rapprochementMoisAnnee')->name('list-statistique_rapprochementMoisAnnee');
        Route::get('dasbord_comptable','dasbord_comptable')->name('dasbord_comptable');
    });

});
