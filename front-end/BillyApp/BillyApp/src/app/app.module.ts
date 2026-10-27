import { EmploiParentsEnfantComponent } from './components/interface_eleves/Liste_item_eleves/emploi-parents-enfant/emploi-parents-enfant.component';
import { HistoriquePayementEleveComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/historique-payement-eleve/historique-payement-eleve.component';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { NgxPrintModule } from 'ngx-print'
import { AppComponent } from './app.component';
import { RouterModule } from '@angular/router';  // Importer RouterModule pour le routage
import { CommonModule } from '@angular/common';
import { routes } from './app.routes';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';  // Ajouter FormsModule ici
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
//Import interface enseignant
import { EnseignantComponent } from './components/interface_enseignant/enseignant/enseignant.component';
import { NavbarEnseignantComponent } from './components/interface_enseignant/header_enseignant/navbar-enseignant.component';
import { FooterComponent } from './components/interface_enseignant/footer/footer.component';
import { EmploiDuTempsComponent } from './components/interface_enseignant/Listes_de_items/emploi-du-temps/emploi-du-temps.component';
import { NoterLesElevesComponent } from './components/interface_enseignant/Listes_de_items/noter-les-eleves/noter-les-eleves.component';
import { ListeElevesComponent } from './components/interface_enseignant/Listes_de_items/liste-eleves/liste-eleves.component';
import { EtatSalaireComponent } from './components/interface_enseignant/Listes_de_items/etat-salaire/etat-salaire.component';
// import { AsideNavComponent } from './components/aside-nav/aside-nav.component';
import { AsideNavComponent } from './components/sidbar_enseignant_eleve/aside-nav/aside-nav.component';
//Import interface élèves
import { EleveComponent } from './components/interface_eleves/eleve/eleve.component';
import { HeaderElevesComponent } from './components/interface_eleves/header-eleves/header-eleves.component';
import { FooterElevesComponent } from './components/interface_eleves/footer-eleves/footer-eleves.component';
// Les élément items de header
import { HistoriquePaiementsComponent } from './components/interface_eleves/Liste_item_eleves/historique-paiements/historique-paiements.component';
import { PaiementParentsEnfantComponent } from './components/interface_eleves/Liste_item_eleves/paiement-parents-enfant/paiement-parents-enfant.component';
import { PaimentElevePComponent } from './components/interface_eleves/Liste_item_eleves/paiment-eleve-p/paiment-eleve-p.component';
import { EmploiDuTempsElevesComponent } from './components/interface_eleves/Liste_item_eleves/emploi-du-temps-eleves/emploi-du-temps-eleves.component';
import { RelevesDeNotesComponent } from './components/interface_eleves/Liste_item_eleves/releves-de-notes/releves-de-notes.component';
import { RenseignementsComponent } from './components/interface_eleves/Liste_item_eleves/renseignements/renseignements.component';
import { RenseignementsEleveComponent } from './components/interface_eleves/Liste_item_eleves/renseignements-eleve/renseignements-eleve.component';
import { RenseignementsParentsComponent } from './components/interface_eleves/Liste_item_eleves/renseignements-parents/renseignements-parents.component';
import { AsidBarEleveComponent } from './components/asid-bar-mobile/asid-bar-eleve/asid-bar-eleve.component';

//  Page generale pour Admin
import { AdminComponent } from './components/interface_admin/admin/admin.component';

//Import interface Admin
import { HeaderComponent } from './components/interface_admin/header/header.component';
import { ContainerComponent } from './components/interface_admin/container/container.component';
import { AsideComponent } from './components/interface_admin/aside/aside.component';
import { TableauDeBordComponent } from './components/interface_admin/tableau-de-bord/tableau-de-bord.component';

// Submenu Admin parent/eleve
import { ListeDesElevesCComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-eleves-c/liste-des-eleves-c.component';
import { ListeDesElevesParentsComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-eleves-parents/liste-des-eleves-parents.component';
import { ListeDesParentsAvecSesEnfantsComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/liste-des-parents-avec-ses-enfants/liste-des-parents-avec-ses-enfants.component';
import { TableauDeRapprochementComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/tableau-de-rapprochement/tableau-de-rapprochement.component';
import { PaimentsDeScolariteComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/paiments-de-scolarite/paiments-de-scolarite.component';
import { ReinsInscriptionComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/reins-inscription/reins-inscription.component';
// Item submenu Admin eleve
import { ListeDesActionsElevesComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/liste-des-actions-eleves/liste-des-actions-eleves.component';
// onglet reinscription et inscription
import { EnregistrementInscriptionComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/onglet_reins_inscription/enregistrement-inscription/enregistrement-inscription.component';
import { ReinscriptionComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/onglet_reins_inscription/reinscription/reinscription.component';
import { ParentsDelevesComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/onglet_reins_inscription/parents-deleves/parents-deleves.component';
// Onglet paiement de la scolarité
import { PayementScoComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/payement-sco/payement-sco.component';
import { ListeDesPayementScolariteComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/liste-des-payement-scolarite/liste-des-payement-scolarite.component';
import { StatistiquesSoclariteComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/statistiques-soclarite/statistiques-soclarite.component';
import { ListeDesImpayeComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/ongle_scolarite/liste-des-impaye/liste-des-impaye.component';
// Submenu Admin Gestion personnels
import { EtatSalairePersComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/etat-salaire-pers/etat-salaire-pers.component';
import { LesSalairesComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/les-salaires/les-salaires.component';
import { PayementDesSalairesComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/payement-des-salaires/payement-des-salaires.component';
import { ListeDesPersonnelsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-des-personnels/liste-des-personnels.component';
import { ListeDesEnseignantsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-des-enseignants/liste-des-enseignants.component';
import { VolumeHoraireComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/volume-horaire/volume-horaire.component';
import { PayementSalairePersAnnuleComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/payement-salaire-pers-annule/payement-salaire-pers-annule.component';
// DG
import { GestionEnseignantsComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/gestion-enseignants/gestion-enseignants.component';
import { EtatSalaireDGComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/etat-salaire-dg/etat-salaire-dg.component';
import { DetailsInfoPersComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/DG/details-info-pers/details-info-pers.component';

// Onglet Gestion Enseignant Coté DG
import { EnregistrementEnseignantComponent } from './components/interface_admin/Gestion_Personnels/onglet_G_enseignants/enregistrement-enseignant/enregistrement-enseignant.component';
import { AffectionEnseiComponent } from './components/interface_admin/Gestion_Personnels/onglet_G_enseignants/affection-ensei/affection-ensei.component';
import { EnseignantParClasseComponent } from './components/interface_admin/Gestion_Personnels/onglet_G_enseignants/enseignant-par-classe/enseignant-par-classe.component';
// Onglet etat de salaire personnels
import { EtatDeSalaireEnseignantComponent } from './components/interface_admin/Gestion_Personnels/onglets_etat_salaire/etat-de-salaire-enseignant/etat-de-salaire-enseignant.component';
import { EtatDeSalaireResponsableComponent } from './components/interface_admin/Gestion_Personnels/onglets_etat_salaire/etat-de-salaire-responsable/etat-de-salaire-responsable.component';
import { EtatSalaireMasseSalarialeComponent } from './components/interface_admin/Gestion_Personnels/onglets_etat_salaire/etat-salaire-masse-salariale/etat-salaire-masse-salariale.component';
 // Onglet des salaires
import { SalairesDesEnseignantsComponent } from './components/interface_admin/Gestion_Personnels/onglets_les_salaires/salaires-des-enseignants/salaires-des-enseignants.component';
import { SalairesDesResponsablesComponent } from './components/interface_admin/Gestion_Personnels/onglets_les_salaires/salaires-des-responsables/salaires-des-responsables.component';
 // Submenu Admin Gestion Recettes
import { RecetteEtCasReductionComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/recette-et-cas-reduction/recette-et-cas-reduction.component';
import { RecetteHorsScolariteComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/recette-hors-scolarite/recette-hors-scolarite.component';
import { SituationPrevisionnelleComponent } from './components/interface_admin/Gestion_Recettes/submenu_recettes/situation-previsionnelle/situation-previsionnelle.component';
 // Submenu Admin Gestion Depenses
import { ListesDesDepensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/listes-des-depenses/listes-des-depenses.component';
import { TypeDePensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/type-de-penses/type-de-penses.component';
import { SituationPrevisionnelleDepensesComponent } from './components/interface_admin/Gestion_Depenses/submenu_depenses/situation-previsionnelle-depenses/situation-previsionnelle-depenses.component';
 // Submenu Admin Gestion Tresories
import { ListeDeComptesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/liste-de-comptes/liste-de-comptes.component';
import { LesBalancesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/les-balances/les-balances.component';
import { LesJournalesComponent } from './components/interface_admin/Gestion_Tresories/submenu_tresories/les-journales/les-journales.component';
// Gestion des rapport
import { GestionRapportsComponent } from './components/interface_admin/gestion-rapports/gestion-rapports.component';

//Gestion des classe
import { LesClassesComponent } from './components/interface_admin/Configuration/les-classes/les-classes.component'

// Autre methode interface admin à été supprimé



// Recherche
import { FiltreSituationPreNiveauPipe } from './Filtre/Recettes/filtre-situation-pre-niveau.pipe';
import { FiltreElevePipe } from './Filtre/Eleve/filtre-eleve.pipe';
import { FiltreInsReinsPipe } from './Filtre/Ins_Reins/filtre-ins-reins.pipe';
import { StatistiqueRapprochePipe } from './Filtre/Eleve/statistique-rapproche.pipe';
import { SideBarsMobileComponent } from './components/interface_admin/Aside_bars_mobile/side-bars-mobile/side-bars-mobile.component';
import { FiltrePayementPipe } from './Filtre/Payement/filtre-payement.pipe';
import { ParentPipe } from './Filtre/Parent/parent.pipe';
import { PersonnelPipePipe } from './Filtre/Personnel/personnel-pipe.pipe';
import { FiltreActionParentPipe } from './Filtre/Parent/filtre-action-parent.pipe';
import { FiltreResponsablePipe } from './Filtre/Personnel/filtre-responsable.pipe';
import { FiltreRecetteCasReductonPipe } from './Filtre/Recettes/filtre-recette-cas-reducton.pipe';
import { FiltreRecetteHorsScolaritePipe } from './Filtre/Recettes/filtre-recette-hors-scolarite.pipe';
import { FiltreListeDepensePipe } from './Filtre/Depenses/filtre-liste-depense.pipe';
import { FiltreSituationPrevisionnelPipe } from './Filtre/Recettes/filtre-situation-previsionnel.pipe';
import { FiltreSituationPreDepensePipe } from './Filtre/Recettes/filtre-situation-pre-depense.pipe';
import { FiltreImpayesPipe } from './Filtre/Payement/filtre-impayes.pipe';
import { FiltreJournalPipe } from './Filtre/Compte/filtre-journal.pipe';
import { FiltreRapportPipe } from './Filtre/Rapports/filtre-rapport.pipe';
import { FiltreBalancePipe } from './Filtre/Compte/filtre-balance.pipe';
// Gestion supervision
import { StatistiqueSuperComponent } from './components/interface_admin/Supervision_Generale/statistique-super/statistique-super.component';
import { PrevisionSuperComponent } from './components/interface_admin/Supervision_Generale/prevision-super/prevision-super.component';
import { StatistiqueComptabiliteComponent } from './components/interface_admin/Supervision_Generale/Statistique_super/onglet_super/statistique-comptabilite/statistique-comptabilite.component';
import { StatistiqueDEComponent } from './components/interface_admin/Supervision_Generale/Statistique_super/onglet_super/statistique-de/statistique-de.component';
import { StatistiqueCenseurComponent } from './components/interface_admin/Supervision_Generale/Statistique_super/onglet_super/statistique-censeur/statistique-censeur.component';
import { VolumeHorairePipePipe } from './Filtre/Personnel/volume-horaire-pipe.pipe';

// Gestion notes
import { GestionNoteCenComponent } from './components/interface_admin/Gestion_Notes/gestion-note-cen/gestion-note-cen.component';
import { OrganiserEvaSenceurComponent } from './components/interface_admin/Gestion_Notes/organiser-eva-senceur/organiser-eva-senceur.component';
import { ResultatFinDanneeCenComponent } from './components/interface_admin/Gestion_Notes/resultat-fin-dannee-cen/resultat-fin-dannee-cen.component';
import { ResultatTrimestrielCenseurComponent } from './components/interface_admin/Gestion_Notes/resultat-trimestriel-censeur/resultat-trimestriel-censeur.component';
import { NoterEleveCenComponent } from './components/interface_admin/Gestion_Notes/noter-eleve-cen/noter-eleve-cen.component';
// Gestion emploi
import { AffectationEmploiCenComponent } from './components/interface_admin/Gestion_Emplois/affectation-emploi-cen/affectation-emploi-cen.component';
import { EmploiCollegeLyceeComponent } from './components/interface_admin/Gestion_Emplois/emploi-college-lycee/emploi-college-lycee.component';
import { GestionEmploiComponent } from './components/interface_admin/Gestion_Emplois/gestion-emploi/gestion-emploi.component';
import { PayementPipePipe } from './Filtre/Personnel/payement-pipe.pipe';
import { PayementSalairePipePipe } from './Filtre/Personnel/payement-salaire-pipe.pipe';

import {ToastrModule} from 'ngx-toastr';



// Authentification
import { AutConnexionComponent } from './components/Authentification/aut-connexion/aut-connexion.component';
import { AutCreationComponent } from './components/Authentification/aut-creation/aut-creation.component';

// Page visiteurs
import { HeaderVisiteurComponent } from './components/interface_Page_visiteur/header-visiteur/header-visiteur.component';
import { SliderComponent } from './components/interface_Page_visiteur/slider/slider.component';

import { FooterVisiteurComponent } from './components/interface_Page_visiteur/footer-visiteur/footer-visiteur.component';
import { VisiteurComponent } from './components/interface_Page_visiteur/visiteur/visiteur.component';
import { HistoriqueBillyComponent } from './components/interface_Page_visiteur/historique-billy/historique-billy.component';
import { NosMatiereCoursComponent } from './components/interface_Page_visiteur/nos-matiere-cours/nos-matiere-cours.component';
import { AffectationPipe } from './Filtre/Personnel/affectation.pipe';
import { AffectationClassePipe } from './Filtre/Personnel/affectation-classe.pipe';
import { FiltreClassePipe } from './Filtre/Configuration/filtre-classe.pipe';
import { NgChartsModule} from 'ng2-charts'

// Directives
import { NoSpecialCharsDirective } from './Directives/no-special-chars.directive';
import { LesMatieresComponent } from './components/interface_admin/Configuration/les-matieres/les-matieres.component';
import { MatierePipe } from './Filtre/Matieres/matiere.pipe';
import { LesFraisDeScolariteComponent } from './components/interface_admin/Configuration/les-frais-de-scolarite/les-frais-de-scolarite.component';
import { EmploiElevePComponent } from './components/interface_eleves/Liste_item_eleves/emploi-eleve-p/emploi-eleve-p.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FiltreNotePipe } from './Filtre/Notes/filtre-note.pipe';
import { CoefficientMatiereComponent } from './components/interface_admin/Configuration/coefficient-matiere/coefficient-matiere.component';
import { AnneeScolaireComponent } from './components/interface_admin/Configuration/annee-scolaire/annee-scolaire.component';
import { FonctionPersonnelComponent } from './components/interface_admin/Configuration/fonction-personnel/fonction-personnel.component';
import { ScrollSpyActiveDirective } from './Directives/scroll-spy-active.directive';

// Users Profils
import { ProfilsComponent } from './components/Users/profils/profils.component';
import { ListeEleveParDroitComponent } from './components/interface_admin/Gestion_eleves_parents/submenu/item_submenu/liste-eleve-par-droit/liste-eleve-par-droit.component';
import { ListePersonnelsParDroitComponent } from './components/interface_admin/Gestion_Personnels/submenu_pers/liste-personnels-par-droit/liste-personnels-par-droit.component';
import { ReleveNoteEleveComponent } from './components/interface_eleves/Liste_item_eleves/releve-note-eleve/releve-note-eleve.component';
import { ReleveNoteParentComponent } from './components/interface_eleves/Liste_item_eleves/releve-note-parent/releve-note-parent.component';
import { EnteteEtatImpComponent } from './components/interface_admin/Gestion_Notes/entete-etat-imp/entete-etat-imp.component';

 // aside bare par droit
import { AsideDGComponent } from './components/interface_admin/aside/aside-dg/aside-dg.component';
import { AsideCenseurDEComponent } from './components/interface_admin/aside/aside-censeur-de/aside-censeur-de.component';
import { AsideComptableComponent } from './components/interface_admin/aside/aside-comptable/aside-comptable.component';
import { LoadingComponent } from './components/Chargements_HD/loading/loading.component';
import { AccesNonAutoriserComponent } from './components/acces-non-autoriser/acces-non-autoriser.component';
import { ListeUsersComponent } from './components/interface_admin/Configuration/liste-users/liste-users.component';
import { AuthInterceptorService } from './Service/Aut/auth-interceptor.service';
import { FooterSignationComponent } from './components/interface_admin/Gestion_Notes/footer-signation/footer-signation.component';
import { ContainerVisiteurComponent } from './components/interface_Page_visiteur/container-visiteur/container-visiteur.component';
import { PhoneGuineaFormatDirective } from './Directives/phone-guinea-format.directive';



@NgModule({
  declarations: [
    AppComponent,
    //declaction interface enseignant(liste des items)
    EnseignantComponent,
    NavbarEnseignantComponent,
    FooterComponent,
    EmploiDuTempsComponent,
    ListeElevesComponent,
    EtatSalaireComponent,
    AsideNavComponent,
     //declaction interface élèves(liste des items)
     EleveComponent,
     HeaderElevesComponent,
     FooterElevesComponent,
     // Les élément items de header
     HistoriquePaiementsComponent,
     PaiementParentsEnfantComponent,
     PaimentElevePComponent,
     EmploiDuTempsElevesComponent,
     EmploiParentsEnfantComponent,
     EmploiElevePComponent,
     RelevesDeNotesComponent,
     RenseignementsComponent,
     RenseignementsEleveComponent,
     ReleveNoteEleveComponent,
     ReleveNoteParentComponent,
     RenseignementsParentsComponent,
     AsidBarEleveComponent,

    //  Page generale pour Admin
      AdminComponent,
      //declaction interface admin
      HeaderComponent,
      AsideComponent,
      ContainerComponent,
      TableauDeBordComponent,
      // Submenu eleve/parent
      ListeDesElevesCComponent,
      ListeEleveParDroitComponent,
      ReinsInscriptionComponent,
      ListeDesElevesParentsComponent,
      ListeDesParentsAvecSesEnfantsComponent,
      TableauDeRapprochementComponent,
      PaimentsDeScolariteComponent,
      // Item submenu Admin eleve
      ListeDesActionsElevesComponent,
      // ongle de la reinscription et inscription
      EnregistrementInscriptionComponent,
      ReinscriptionComponent,
      ParentsDelevesComponent,
      // Onglet paiement de la scolarité
      PayementScoComponent,
      ListeDesPayementScolariteComponent,
      StatistiquesSoclariteComponent,
      ListeDesImpayeComponent,
      HistoriquePayementEleveComponent,


      // Submenu Admin Gestion personnels
      EtatSalairePersComponent,
      LesSalairesComponent,
      ListeDesPersonnelsComponent,
      PayementDesSalairesComponent,
      ListeDesEnseignantsComponent,
      ListePersonnelsParDroitComponent,
      VolumeHoraireComponent,
      PayementSalairePersAnnuleComponent,
       // Submenu Admin Gestion personnels DG
       GestionEnseignantsComponent,
       EtatSalaireDGComponent,
       DetailsInfoPersComponent,
      // Onglet Gestion Enseignant Coté DG
      EnregistrementEnseignantComponent,
      AffectionEnseiComponent,
      EnseignantParClasseComponent,
      // Onglet etat de salaire personnels
      EtatDeSalaireEnseignantComponent,
      EtatSalaireMasseSalarialeComponent,
      EtatDeSalaireResponsableComponent,
      // Onglet des salaires
      SalairesDesEnseignantsComponent,
      SalairesDesResponsablesComponent,

       // Submenu Admin Gestion Recettes
       RecetteEtCasReductionComponent,
       RecetteHorsScolariteComponent,
       SituationPrevisionnelleComponent,

       // Submenu Admin Gestion Depenses
       ListesDesDepensesComponent,
       TypeDePensesComponent,
       SituationPrevisionnelleDepensesComponent,

       // Submenu Admin Gestion Tresories
       ListeDeComptesComponent,
       LesBalancesComponent,
       LesJournalesComponent,
      //  Gestion rapports
      GestionRapportsComponent,

      //Gestion des classes
      LesClassesComponent,
      CoefficientMatiereComponent,
      AnneeScolaireComponent,
      FonctionPersonnelComponent,
      FiltreClassePipe,
      ListeUsersComponent,
      // Gestion Supervision
      StatistiqueSuperComponent,
      PrevisionSuperComponent,
      // Onglet Supervision
      StatistiqueComptabiliteComponent,
      StatistiqueDEComponent,
      StatistiqueCenseurComponent,
      // Gestion notes
      GestionNoteCenComponent,
      OrganiserEvaSenceurComponent,
      ResultatFinDanneeCenComponent,
      ResultatTrimestrielCenseurComponent,
      NoterEleveCenComponent,
      NoterLesElevesComponent,
      // gestion emplois
      GestionEmploiComponent,
      AffectationEmploiCenComponent,
      EmploiCollegeLyceeComponent,

      //  Mobile
      SideBarsMobileComponent,
      // aside bare par droit
      AsideComptableComponent,
      AsideDGComponent,
      AsideCenseurDEComponent,





      // Rechercher de filtrage
      FiltreElevePipe,
      FiltreInsReinsPipe,
      StatistiqueRapprochePipe,
      FiltrePayementPipe,
      ParentPipe,
      PersonnelPipePipe,
      FiltreActionParentPipe,
      FiltreResponsablePipe,
      FiltreRecetteCasReductonPipe,
      FiltreRecetteHorsScolaritePipe,
      FiltreListeDepensePipe,
      FiltreSituationPrevisionnelPipe,
      FiltreSituationPreDepensePipe,
      FiltreSituationPreNiveauPipe,
      FiltreImpayesPipe,
      FiltreJournalPipe,
      FiltreRapportPipe,
      FiltreBalancePipe,
      FiltreNotePipe,
      VolumeHorairePipePipe,
      PayementPipePipe,
      PayementSalairePipePipe,
      // Page visiteurs
      VisiteurComponent,
      HeaderVisiteurComponent,
      ContainerVisiteurComponent,
      SliderComponent,
      FooterVisiteurComponent,
      HistoriqueBillyComponent,
      NosMatiereCoursComponent,
      // Authentification
      AutConnexionComponent,
      AutCreationComponent,
      AffectationPipe,
      AffectationClassePipe,
      LesMatieresComponent,
      MatierePipe,
      // Directives
      NoSpecialCharsDirective ,
      ScrollSpyActiveDirective,
      LesFraisDeScolariteComponent,
      PhoneGuineaFormatDirective,
      // Users Profils
      ProfilsComponent,
      //acces non autoriser
      AccesNonAutoriserComponent,

      // En tête etat impression
      EnteteEtatImpComponent,
      FooterSignationComponent,

      // loading
      LoadingComponent,

  ],
  imports: [
    NgxPrintModule,
    CommonModule,

    BrowserModule,

    RouterModule.forRoot(routes),

    HttpClientModule ,

    FormsModule , // Ajouter FormsModule dans la section imports

    ReactiveFormsModule,
    NgChartsModule,
    //afficher le toastr après l'enregistrement
    BrowserAnimationsModule,
    ToastrModule.forRoot()


  ],

  exports: [
    NoterLesElevesComponent
  ],

  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass:AuthInterceptorService,
      multi:true
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
