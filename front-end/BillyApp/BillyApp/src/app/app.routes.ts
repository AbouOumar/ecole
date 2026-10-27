import { RouterModule, Routes } from '@angular/router';
import { HistoriquePayementEleveComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/historique-payement-eleve/historique-payement-eleve.component';
import { EmploiDuTempsComponent } from './components/interface_enseignant/Listes_de_items/emploi-du-temps/emploi-du-temps.component';
import { NoterLesElevesComponent } from './components/interface_enseignant/Listes_de_items/noter-les-eleves/noter-les-eleves.component';
import { ListeElevesComponent } from './components/interface_enseignant/Listes_de_items/liste-eleves/liste-eleves.component';
import { EtatSalaireComponent } from './components/interface_enseignant/Listes_de_items/etat-salaire/etat-salaire.component';
import { HistoriquePaiementsComponent } from './components/interface_eleves/Liste_item_eleves/historique-paiements/historique-paiements.component';
import { EmploiDuTempsElevesComponent } from './components/interface_eleves/Liste_item_eleves/emploi-du-temps-eleves/emploi-du-temps-eleves.component';
import { RelevesDeNotesComponent } from './components/interface_eleves/Liste_item_eleves/releves-de-notes/releves-de-notes.component';
import { RenseignementsComponent } from './components/interface_eleves/Liste_item_eleves/renseignements/renseignements.component';
import { ListeDesElevesParentsComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-eleves-parents/liste-des-eleves-parents.component';
import { TableauDeRapprochementComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/tableau-de-rapprochement/tableau-de-rapprochement.component';
import { PaimentsDeScolariteComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/paiments-de-scolarite/paiments-de-scolarite.component';
import { ListeDesParentsAvecSesEnfantsComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-parents-avec-ses-enfants/liste-des-parents-avec-ses-enfants.component';
import { ReinsInscriptionComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/reins-inscription/reins-inscription.component';
import { ListeDesElevesCComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-eleves-c/liste-des-eleves-c.component';
import { ListeDesPersonnelsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-des-personnels/liste-des-personnels.component';
import { ListeDesEnseignantsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-des-enseignants/liste-des-enseignants.component';
import { LesSalairesComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/les-salaires/les-salaires.component';
import { PayementDesSalairesComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/payement-des-salaires/payement-des-salaires.component';
import { EtatSalairePersComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/etat-salaire-pers/etat-salaire-pers.component';
import { RecetteEtCasReductionComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/recette-et-cas-reduction/recette-et-cas-reduction.component';
import { RecetteHorsScolariteComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/recette-hors-scolarite/recette-hors-scolarite.component';
import { SituationPrevisionnelleComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/situation-previsionnelle/situation-previsionnelle.component';
import { ListesDesDepensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/listes-des-depenses/listes-des-depenses.component';
import { TypeDePensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/type-de-penses/type-de-penses.component';
import { SituationPrevisionnelleDepensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/situation-previsionnelle-depenses/situation-previsionnelle-depenses.component';
import { ListeDeComptesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/liste-de-comptes/liste-de-comptes.component';
import { LesBalancesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/les-balances/les-balances.component';
import { LesJournalesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/les-journales/les-journales.component';
import { GestionRapportsComponent } from './components/interface_admin/gestion-rapports/gestion-rapports.component';
import { TableauDeBordComponent } from './components/interface_admin/tableau-de-bord/tableau-de-bord.component';
import { GestionEnseignantsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/gestion-enseignants/gestion-enseignants.component';
import { EtatSalaireDGComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/etat-salaire-dg/etat-salaire-dg.component';
import { DetailsInfoPersComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/details-info-pers/details-info-pers.component';
import { LesClassesComponent } from './components/interface_admin/Configuration/les-classes/les-classes.component';
import { LesMatieresComponent } from './components/interface_admin/Configuration/les-matieres/les-matieres.component';
import { LesFraisDeScolariteComponent } from './components/interface_admin/Configuration/les-frais-de-scolarite/les-frais-de-scolarite.component';
import { VolumeHoraireComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/volume-horaire/volume-horaire.component';
import { StatistiqueSuperComponent } from './components/interface_admin/Supervision_Generale/statistique-super/statistique-super.component';
import { PrevisionSuperComponent } from './components/interface_admin/Supervision_Generale/prevision-super/prevision-super.component';
import { GestionNoteCenComponent } from './components/interface_admin/Gestion_Notes/gestion-note-cen/gestion-note-cen.component';
import { NoterEleveCenComponent } from './components/interface_admin/Gestion_Notes/noter-eleve-cen/noter-eleve-cen.component';
import { OrganiserEvaSenceurComponent } from './components/interface_admin/Gestion_Notes/organiser-eva-senceur/organiser-eva-senceur.component';
import { ResultatTrimestrielCenseurComponent } from './components/interface_admin/Gestion_Notes/resultat-trimestriel-censeur/resultat-trimestriel-censeur.component';
import { ResultatFinDanneeCenComponent } from './components/interface_admin/Gestion_Notes/resultat-fin-dannee-cen/resultat-fin-dannee-cen.component';
import { GestionEmploiComponent } from './components/interface_admin/Gestion_Emplois/gestion-emploi/gestion-emploi.component';
import { PayementSalairePersAnnuleComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/payement-salaire-pers-annule/payement-salaire-pers-annule.component';
import { AutCreationComponent } from './components/Authentification/aut-creation/aut-creation.component';
import { AutConnexionComponent } from './components/Authentification/aut-connexion/aut-connexion.component';
import { AdminComponent } from './components/interface_admin/admin/admin.component';
import { VisiteurComponent } from './components/interface_Page_visiteur/visiteur/visiteur.component';
import { EleveComponent } from './components/interface_eleves/eleve/eleve.component';
import { EnseignantComponent } from './components/interface_enseignant/enseignant/enseignant.component';
import { HistoriqueBillyComponent } from './components/interface_Page_visiteur/historique-billy/historique-billy.component';
import { NosMatiereCoursComponent } from './components/interface_Page_visiteur/nos-matiere-cours/nos-matiere-cours.component';
import { CoefficientMatiereComponent } from './components/interface_admin/Configuration/coefficient-matiere/coefficient-matiere.component';
import { AnneeScolaireComponent } from './components/interface_admin/Configuration/annee-scolaire/annee-scolaire.component';
import { FonctionPersonnelComponent } from './components/interface_admin/Configuration/fonction-personnel/fonction-personnel.component';
import { ProfilsComponent } from './components/Users/profils/profils.component';
import { ListeEleveParDroitComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/liste-eleve-par-droit/liste-eleve-par-droit.component';
import { ListePersonnelsParDroitComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-personnels-par-droit/liste-personnels-par-droit.component';
import { AuthGuardService } from './Service/User/auth-guard.service';
import { AccesNonAutoriserComponent } from './components/acces-non-autoriser/acces-non-autoriser.component';
import { ListeUsersComponent } from './components/interface_admin/Configuration/liste-users/liste-users.component';

export const routes: Routes = [

  { path: '', component: VisiteurComponent },

  { path: 'signUp', component: AutCreationComponent},
  { path: 'signIn', component: AutConnexionComponent },
  { path: 'historiqueBilly', component: HistoriqueBillyComponent },
  { path: 'nosCours', component: NosMatiereCoursComponent },
  { path: '404', component: AccesNonAutoriserComponent },
  { path: 'dc9_ahaf/453rf3/4ie_6f',
    component: AdminComponent,
    children:[
      {
        path: "dc9\ahaf/453rf3/4ie_6f",  redirectTo: "dc3\ahaf/037rf9/0ie_7f", pathMatch: "prefix",
      },

// /dc9_ahaf/453rf3/4ie_6f/profil


      { path: 'profil',
        component: ProfilsComponent
      },
      { path: 'dc3_ahaf/037rf9/0ie_7f',
        component: TableauDeBordComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG','DE','Censeur']}
      },
      // Routes gestion eleves parents
     { path: 'dc9_ahaf/424rf2/5ie_8f',
      component: ListeEleveParDroitComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG','DE','Censeur']}
      },
     { path: 'dc3_ahaf/285rf7/0ie_5f',

      component: ListeDesElevesCComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG','Censeur']}
      },
      { path: 'dc0_ahaf/194rf7/6ie_5f',
      component: ReinsInscriptionComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      },
      { path: 'dc5_ahaf/366rf4/0ie_1f/:id',
      component: ListeDesElevesParentsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      },
      { path: 'dc3_ahaf/379rf0/2ie_8f/:id/:type',
      component: ListeDesParentsAvecSesEnfantsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      }
      ,
      { path: 'dc7_ahaf/804rf0/6ie_9f',
      component: TableauDeRapprochementComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      },

      { path: 'dc1_ahaf/274rf4/4ie_4f',
      component: PaimentsDeScolariteComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      },
      { path: 'dc8_ahaf/953rf2/1ie_3f',
      component: HistoriquePayementEleveComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
      },
      // Fin gestion eleves parents


       // Routes gestion Personnels

       { path: 'dc5_ahaf/720rf1/3ie_6f',
          component: ListePersonnelsParDroitComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG','DE','Censeur']}
        },
       { path: 'dc7_ahaf/306rf3/1ie_8f',
          component: ListeDesPersonnelsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc4_ahaf/684rf0/2ie_9f',
          component: ListeDesEnseignantsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DE','Censeur']}
        },
        { path: 'dc5_ahaf/054rf1/6ie_6f',
          component: VolumeHoraireComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG']}
        },
        { path: 'dc2_ahaf/791rf7/9ie_0f',
          component: LesSalairesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc4_ahaf/431rf8/3ie_5f',
          component: EtatSalairePersComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc4_ahaf/660rf4/1ie_3f',
          component: PayementDesSalairesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc3_ahaf/673rf8/6ie_5f',
          component: PayementSalairePersAnnuleComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG']}
        },
        { path: 'dc6_ahaf/339rf1/9ie_5f',
          component: GestionEnseignantsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc5_ahaf/422rf2/2ie_9f',
          component: EtatSalaireDGComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG','DE','Censeur','Enseignant']}
        },
        { path: 'dc9_ahaf/575rf9/9ie_6f',
          component: DetailsInfoPersComponent
        },
        // Fin gestion Personnels

         // Routes gestion Recettes
        { path: 'dc8_ahaf/350rf9/7ie_7f',
          component: RecetteHorsScolariteComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc7_ahaf/508rf4/9ie_7f',
          component: RecetteEtCasReductionComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc5_ahaf/334rf6/2ie_8f',
          component: SituationPrevisionnelleComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        // Fin gestion Recettes

        // Routes gestion Depenses

        { path: 'dc4_ahaf/264rf1/8ie_7f',
          component: ListesDesDepensesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc4_ahaf/726rf2/5ie_1f',
          component: TypeDePensesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc1_ahaf/264rf8/4ie_5f',
          component: SituationPrevisionnelleDepensesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        // Fin gestion Depenses

         // Routes gestion des emploi coté censeur
        { path: 'dc4_ahaf/405rf8/1ie_4f',
          component: GestionEmploiComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },
        // Routes gestion des notes coté censeur
        { path: 'dc5_ahaf/746rf3/8ie_6f',
          component: GestionNoteCenComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },
        { path: 'dc0_ahaf/759rf9/1ie_3f',
          component: NoterEleveCenComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },
        { path: 'dc0_ahaf/728rf7/5ie_4f',
          component: OrganiserEvaSenceurComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },
        { path: 'dc4_ahaf/590rf1/6ie_5f',
          component: ResultatTrimestrielCenseurComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },
        { path: 'dc4_ahaf/976rf1/8ie_1f',
          component: ResultatFinDanneeCenComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DE','Censeur']}
        },


        // Routes Supervision
        { path: 'dc3_ahaf/397rf3/6ie_1f',
          component: StatistiqueSuperComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc4_ahaf/909rf4/9ie_2f',
          component: PrevisionSuperComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        // Routes Configuration

        { path: 'dc4_ahaf/724rf1/7ie_0f',
          component: LesClassesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc3_ahaf/990rf7/6ie_0f',
          component: LesMatieresComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc7_ahaf/139rf6/6ie_1f',
          component: LesFraisDeScolariteComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc5_ahaf/804rf2/5ie_8f',
          component: CoefficientMatiereComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc8_ahaf/675rf9/1ie_6f',
          component: AnneeScolaireComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc7_ahaf/671rf7/3ie_1f',
          component: FonctionPersonnelComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        { path: 'dc9_ahaf/453rf3/4ie_6f3',
          component: ListeUsersComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','DG']}
        },
        // Routes gestion Rapports

        { path: 'dc8_ahaf/678rf0/1ie_4f',
          component: GestionRapportsComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable','DG']}
        },

        // Fin Routes gestion Rapports

        // Routes gestion Trésories

        { path: 'dc4_ahaf/197rf2/9ie_6f',
          component: ListeDeComptesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc3_ahaf/030rf8/0ie_9f',
          component: LesBalancesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        { path: 'dc4_ahaf/270rf9/2ie_7f',
          component: LesJournalesComponent,canActivate: [AuthGuardService],data:{expectedRole:['admin','Comptable']}
        },
        // Fin gestion Trésories

    // Fin Routes Admin
    ]

  },


  { path: 'dc4_ahaf/026rf6/7ie_9f', component: EleveComponent,canActivate: [AuthGuardService],data:{expectedRole:['eleve','parent']},
    children: [
      {
        path: "dc4\ahaf/026rf6/7ie_9f",  redirectTo: "dc0\ahaf/227rf8/4ie_7f", pathMatch: "prefix"
      },



    {
        path: 'dc0_ahaf/121rf6/7ie_4f',
        component: HistoriquePaiementsComponent,canActivate: [AuthGuardService],data:{expectedRole:['eleve','parent']},
        pathMatch: 'full'
    },
    {
        path: 'dc6_ahaf/816rf0/2ie_1f',
        component: EmploiDuTempsElevesComponent,canActivate: [AuthGuardService],data:{expectedRole:['eleve','parent']},
        pathMatch: 'full'
    },
    {
        path: 'dc4_ahaf/066rf7/4ie_0f',
        component: RelevesDeNotesComponent,canActivate: [AuthGuardService],data:{expectedRole:['eleve','parent']},
        pathMatch: 'full'
    },
    {
        path: 'dc0_ahaf/227rf8/4ie_7f',
        component: RenseignementsComponent,canActivate: [AuthGuardService],data:{expectedRole:['eleve','parent']},
        pathMatch: 'full'
    },
    ]

   },

  { path: 'dc7_ahaf/648rf2/0ie_5f', component: EnseignantComponent,
    children:[
      {
        path: "dc7\ahaf/648rf2/0ie_5f",  redirectTo: "dc6\ahaf/196rf6/4ie_4f", pathMatch: "prefix"
      },
      { path: 'profil',
        component: ProfilsComponent
      },
      {

        path: 'dc3_ahaf/649rf3/2ie_1f',
        component: EmploiDuTempsComponent,canActivate: [AuthGuardService],data:{expectedRole:['Enseignant']},
        pathMatch: 'full'
    },
    {
        path: 'dc5_ahaf/272rf4/3ie_3f',
        component: NoterLesElevesComponent,canActivate: [AuthGuardService],data:{expectedRole:['Enseignant']},
        // pathMatch: 'full'
    },
    {
        path: 'dc6_ahaf/196rf6/4ie_4f',
        component: ListeElevesComponent,canActivate: [AuthGuardService],data:{expectedRole:['Enseignant']},
        pathMatch: 'full'
    },
    {
        path: 'dc9_ahaf/502rf5/2ie_8f',
        component: EtatSalaireComponent,canActivate: [AuthGuardService],data:{expectedRole:['Enseignant']},
        pathMatch: 'full'
    },

    ]
  },


  { path: '**', redirectTo: '' },
    // se rediriger à une page quelconque et ne signifie qu'on va se rediriger sur lui plus tot apres la racine
];



