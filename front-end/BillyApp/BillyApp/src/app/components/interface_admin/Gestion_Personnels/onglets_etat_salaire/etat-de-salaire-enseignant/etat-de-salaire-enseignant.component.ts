import { Component } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { Salaire } from '../../../../../Classes/Salaire/salaire';
import { Personnel } from '../../../../../Classes/Personnel/personnel';
import { ServiceCompteService } from '../../../../../Service/Compte/service-compte.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Actions } from '../../../../../Classes/Personnel/actions';
import { ActionService } from '../../../../../Service/Actions/action.service';
import { SalaireService } from '../../../../../Service/Salaire/salaire.service';
import { Paiement } from '../../../../../Classes/Payements/paiement';
import { PayementService } from '../../../../../Service/Payements/payement.service';
import { ServiceEleveService } from '../../../../../Service/Eleves/service-eleve.service';
import { ToastrService } from 'ngx-toastr';
import { environment } from '../../../../../../environments/environment';

@Component({
  selector: 'app-etat-de-salaire-enseignant',

  templateUrl: './etat-de-salaire-enseignant.component.html',
  styleUrl: './etat-de-salaire-enseignant.component.css'
})
export class EtatDeSalaireEnseignantComponent {
    constructor(private serviceSalaire: SalaireService,private fb: FormBuilder,
      private servicePersonnel: PersonnelService,
      private serviceAction: ActionService,
       private anneeService: AnneeScolaireService, private serviceCompte: ServiceCompteService,
       private servicePayement:PayementService,
       private servicePaiement_sco: ServiceEleveService,
       private toatr: ToastrService
      ){}
    isloading: boolean = true
    salaire_enseignant: any[]=[]
    actionMois: any []=[]
    matricule: string|undefined ='';
    moisEncours: string='';
    mois: string ='';
    annees: any []=[];
    enfants: any []=[];
    annee_scolaire!: number
    idSelected!: number
    textRechercheAnnee: string = "";
    anneEncoursId: string = '';
    personnels: any[]=[]
    salaire: Salaire| null = null;
    message: string = '';
    enseignant: Personnel| null=null
    compte: any[]=[];
    actionForm!: FormGroup;
    actionForm2!: FormGroup;
    payementSalair!: FormGroup;
    payement: Paiement = new Paiement(0,0,0,0,'',0);
    action: Actions = new Actions(0,'',0,0,'','',0);
    moisRecherche: string=""
    anneeRecherche: any
    messageAction: string=''
    messageAction2: string=''
    massageSalaire: string=''
    messagesup: string=''
    paiement_scolariteTranche: any;
    adresseIp: string =environment.ip


    ngOnInit(): void {
      this.chargeSalaire();
      this.chargeEnseignants();
      this.chargeAnneeScolaire();
      this.chargeCompte();

      //Enregistrment de action
      this.actionForm = this.fb.group({
        compte_id: ['', Validators.required],
        type: ['', Validators.required],
        montant: ['', Validators.required],
      });

      this.payementSalair = this.fb.group({
        compte_id: ['', Validators.required],
      });

      this.actionForm2 = this.fb.group({
        compte_id: ['', Validators.required],
        eleve_id: ['', Validators.required],
        montant: ['', Validators.required],
        tranche: ['', Validators.required],
      });
    }

    // Impression

imprimer() {
  setTimeout(() => {
    const printContents = document.getElementById('section-a-imprimer')?.innerHTML;
    const originalContents = document.body.innerHTML;

    if (printContents) {
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.location.reload(); // pour restaurer le DOM après impression
    }
  }, 500); // délai pour que le DOM se stabilise
}


    rechercheSalaire() {
      this.enfants=[]
      if (!this.matricule) {
        this.message = 'Veuillez renseigner le matricule !';
        this.actionMois=[]
        this.isloading = true

        return;
      }
      //recuperer les informations de l'enseignant
      const moisRecherche = this.mois || this.moisEncours;
      const anneeRecherche = this.annee_scolaire || this.anneEncoursId;
      this.moisRecherche=this.mois || this.moisEncours;
      this.anneeRecherche= anneeRecherche;
      const resultatP = this.personnels.find((enseignant) =>
        enseignant.matricule_personnel === this.matricule
      );

      if(resultatP){
        this.enseignant=resultatP
        //recuperer la liste des enfants du personnels
        this.getListeEnfant(resultatP.id);
        //recuperer la liste des actions de l'enseignant par mois et par année
        const data ={
            personnel_id: resultatP.id,
            mois: moisRecherche,
            annee_scolaire_id: anneeRecherche,
            fonction: "Enseignant"
        }
        this.getActions(data)
        //recuperer le salaire de l'enseignant par mois et par année
        const resultat = this.salaire_enseignant.find((salaire) =>
          salaire.matricule === this.matricule &&
          salaire.mois.toLowerCase() == moisRecherche.toLowerCase() &&
          salaire.annee_scolaire_id == anneeRecherche
        );

        if (resultat) {
          this.salaire = resultat;
          this.message = '';
          this.isloading = false
        } else {
          this.salaire = null;
          this.actionMois=[]
          this.message = 'Pas encore de salaire';
          this.isloading = false

        }


      }else{
        this.enseignant=null
        this.actionMois=[]
        this.salaire = null;
        this.message = 'Ce matricule n\'est pas sur la liste des enseignants ';
        this.isloading = true

      }

    }

  chargeEnseignants() {
    this.servicePersonnel.getListeEnseignants().subscribe(
      (response:any[])=>{
        this.personnels=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des enseignants par matiere',error)
      }
    )
  }

  getActions(data: any) {
    this.servicePersonnel.getListeActionMois(data).subscribe(
      (response:any[])=>{
        this.actionMois=response
      },
      (error)=>{
        this.actionMois=[]
        console.error('Erreur lors du chargement des actions de enseignant',error)
      }
    )
  }
  chargePaiementScolarite(matricule:string){
    this.servicePaiement_sco.getPaiementScolariteEleve(matricule).subscribe(
      (response) =>{
        if(response.tableauTranche){
           this.paiement_scolariteTranche=response.tableauTranche[0]
        }else{
        }
      },
      (error) =>{
        console.error("Erreur lors du chargment du paiement de la scolaritée.",error)
      }
    );

}
  onSubmitEcolage() {
    if(this.actionForm2.valid){

    if(this.enseignant){

      const resultat = this.enfants.find((enfant) =>
        enfant.id == this.actionForm2.value.eleve_id

      );
      if(this.salaire && this.salaire.statut=="payé"){
        this.messageAction2="Vous ne pouvez pas effectuez d'ecolage pour ce mois car le salaire est déjà payé"
    }else if(resultat && (resultat.classe_id == null || resultat.classe_id == 0)){
      this.messageAction2="cet eleve n'est pas affecter a une classe"
    }else{
 //recuperation de la scolarité de l'enfant
 this.servicePaiement_sco.getPaiementScolariteEleve(resultat.matricule_eleve).subscribe(
  (response) =>{
    if(response.tableauTranche){
       this.paiement_scolariteTranche=response.tableauTranche[0]
       this.matricule=this.enseignant?.matricule_personnel
       this.rechercheSalaire()
           //recuperer l eleve

           if((this.actionForm2.value.tranche == '1ère Tranche') && (this.actionForm2.value.montant > this.paiement_scolariteTranche?.resteTranche1)){
            this.messageAction2 = "il reste "+ this.paiement_scolariteTranche?.resteTranche1 +" pour tranche 1";
          }else if((this.actionForm2.value.tranche == '2ème Tranche') && (this.actionForm2.value.montant > this.paiement_scolariteTranche?.resteTranche2)){
            this.messageAction2 ="il reste "+ this.paiement_scolariteTranche?.resteTranche2 +" pour tranche 2";
          } else if((this.actionForm2.value.tranche == '3ème Tranche') && (this.actionForm2.value.montant > this.paiement_scolariteTranche?.resteTranche3)){
            this.messageAction2 = "il reste "+ this.paiement_scolariteTranche?.resteTranche3 +" pour tranche 3";
          }else{
            this.action.personnel_id=this.enseignant?.id;
            this.action.mois=this.moisRecherche
            this.action.annee_scolaire_id=this.anneeRecherche;
            this.action.compte_id=this.actionForm2.value.compte_id;
            this.action.type="Ecolage";
            this.action.fonction="Enseignant";
            this.action.montant=this.actionForm2.value.montant;

            //enregistrement de payement eleve
            this.payement.eleve_id=this.actionForm2.value.eleve_id;
            this.payement.classe_id=resultat.classe_id;
            this.payement.annee_scolaire_id=this.anneeRecherche;
            this.payement.compte_id=this.actionForm2.value.compte_id;
            this.payement.tranche=this.actionForm2.value.tranche;
            this.payement.montant_payement=this.actionForm2.value.montant;
            this.payement.id_action_ecolage=1;

            this.servicePayement.enregistrerPayement(this.payement).subscribe(
              (response)=>{
                this.action.id_action_ecolage=response.id;

                this.serviceAction.enregistrerAction(this.action).subscribe();
                this.messageAction2=response.message;
                //actualisation après enregistrement de l'action
              const data ={
                  personnel_id: this.enseignant?.id,
                  mois: this.moisRecherche,
                  annee_scolaire_id: this.anneeRecherche,
                  fonction: "Enseignant"
              }
              this.getActions(data)
              //fin de l'actualisation
                this.actionForm2.reset();
              },
              (error)=>{
                this.messageAction2="Erreur lors de l'enregistrement de l'ecolage";
                console.error(error);
              }
            );
          }


    }else{
    }
  },
  (error) =>{
    console.error("Erreur lors du chargment du paiement de la scolaritée.",error)
  }
);
//fin de la recuperation
    }
     }

    } else{
    this.actionForm2.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

  chargeSalaire() {
    this.servicePersonnel.getSalaireEnseignants().subscribe(
      (response:any) =>{
        this.salaire_enseignant=response.liste
        this.anneEncoursId=response.anneeEncours
        this.moisEncours=response.moisEncours
      },
      (error) =>{
        console.error("Erreur lors du chargement salaires des Enseignants")
      }
    )

  }

      // Filtrage par classe et année
chargeAnneeScolaire():void{
  this.anneeService.getAnneeScolaire().subscribe(
    (response:any[])=>{
      this.annees=response;
    },
    (error)=>{
      console.error('Erreur lors du chargement des années',error);
    }
  )
}

getListeEnfant(idPersonnel: number):void{
  this.servicePersonnel.getListeEnfant(idPersonnel).subscribe(
    (response:any[])=>{
      if(Array.isArray(response) && response.length >0){
        this.enfants=response;
      }

    },
    (error)=>{
      console.error('Erreur lors du chargement des enfants',error);
    }
  )
}

chargeCompte(){
  this.serviceCompte.getCompte().subscribe(
    (response)=>{
      this.compte = response
    },
    (error) =>{
      console.error("Erreur lors du chargment des compte.",error)
    }
  )

}

onSubmit() {
if(this.enseignant){
  this.matricule=this.enseignant?.matricule_personnel
  this.rechercheSalaire()
  if(this.salaire && this.salaire.statut=="payé"){
      this.messageAction="Vous ne pouvez pas effectuez une action pour ce mois car le salaire est déjà payé"
  }else{
    if(this.actionForm.valid){
    this.action.personnel_id=this.enseignant.id;
    this.action.mois=this.moisRecherche
    this.action.annee_scolaire_id=this.anneeRecherche;
    this.action.compte_id=this.actionForm.value.compte_id;
    this.action.type=this.actionForm.value.type;
    this.action.fonction="Enseignant";
    this.action.montant=this.actionForm.value.montant;

    this.serviceAction.enregistrerAction(this.action).subscribe(
      (response)=>{
        this.messageAction=response.message;

        //actualisation après enregistrement de l'action
      const data ={
          personnel_id: this.enseignant?.id,
          mois: this.moisRecherche,
          annee_scolaire_id: this.anneeRecherche,
          fonction: "Enseignant"
      }
      this.getActions(data)
      //fin de l'actualisation
        this.actionForm.reset();
      },
      (error)=>{
        this.messageAction="Erreur lors de l'enregistrement de payement";
        console.error(error);
      }
    );
  }else{
    this.actionForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
}
}
}

onSubmitSalaire() {
    if(this.salaire){
      // si le salaire existe on modifie
      const data ={
        mois: this.salaire.mois,
        annee_scolaire_id: this.salaire.annee_scolaire_id,
        personnel_id:this.enseignant?.id,
        fonction_id:1,
        id: this.salaire.salaire_id
      }
      this.serviceSalaire.modificationSalaire(this.salaire.salaire_id,data).subscribe(
        (response)=>{
          this.message=response.message
          this.matricule=this.enseignant?.matricule_personnel
          this.chargeSalaire();
          this.rechercheSalaire()
          this.toatr.success('Salaire regénérer avec succès', "success")
        },(error)=>{
          console.error('Erreur lors de la modification du salaire',error)
          this.toatr.error('Salaire regénérer avec succès', "error")

        }
      );


    }else{
      if(this.enseignant){
        const data ={
          mois: this.moisRecherche,
          annee_scolaire_id: this.anneeRecherche,
          personnel_id:this.enseignant?.id,
          fonction_id:1,
          id: 0
        }
        this.serviceSalaire.enregistrementSalaire(data).subscribe(
          (response)=>{
            this.message=response.message
            this.matricule=this.enseignant?.matricule_personnel
            this.chargeSalaire();
            this.rechercheSalaire()
            this.toatr.success('Salaire générer avec succès', "success")

          },(error)=>{
            console.error('Erreur lors de l\'enregistrement du salaire',error)
            this.toatr.success('Salaire générer avec succès', "success")

          }
        );
      }
    }

}

suppressionAction(id: number){
  if(id !=0){
    if(this.salaire && this.salaire.statut=="payé"){
      this.messagesup="Vous ne pouvez pas effectuez une action pour ce mois car le salaire est déjà payé"
    }else{
      const action= this.actionMois.find(at => at.id === id);
      if(action){
        if(action.id_action_ecolage !=0){
          this.servicePayement.suppressionPayement(action.id_action_ecolage).subscribe(
            (response) => {
            },
            (error) => {
            console.error("Erreur de suppression du paiement", error);
          });
        }
          this.servicePersonnel.suppressionAction(id).subscribe(
            (response) => {
              this.messagesup = "Suppression effecuter avec succès";
              this.idSelected=0
              const data ={
                personnel_id: this.enseignant?.id,
                mois: this.moisRecherche,
                annee_scolaire_id: this.anneeRecherche,
                fonction: "Enseignant"
            }
            this.getActions(data)
            //fin de l'actualisation
              this.actionForm.reset();
            },
            (error) => {
              console.error("Erreur de suppression", error);
            }
          )
      }
    }
  }else{
    this.messagesup = "cette action n'existe plus";
  }
}

onSubmitpayementSalaire(){
  if(this.payementSalair.valid){
    const compte= this.compte.find(at =>at.id ==this.payementSalair.value.compte_id)
    if(compte.nomCompte =="Caisse" && this.salaire){
      if(compte.solde < this.salaire.salaire_net){
        this.massageSalaire="Le solde de la caisse est insufisant"
        return
      }
    }
    if(this.salaire?.statut!='payé'){
      const data ={
        salaire_id: this.salaire?.salaire_id,
        compte_id: this.payementSalair.value.compte_id,
        montant: this.salaire?.salaire_net,
      }

      const data2 ={
        mois: this.salaire?.mois,
        annee_scolaire_id: this.salaire?.annee_scolaire_id,
        personnel_id:this.enseignant?.id,
        fonction_id:1,
        id: this.salaire?.salaire_id,
        statut: "payé"
      }
      this.serviceSalaire.modificationSalaire(this.salaire?.salaire_id,data2).subscribe(
        (response)=>{
          this.servicePayement.enregistrerPaiementSalaire(data).subscribe(
            (response)=>{
              this.matricule=this.enseignant?.matricule_personnel
              this.massageSalaire=response.message
              this.chargeEnseignants()
              this.chargeSalaire();
              this.rechercheSalaire()
            },(error)=>{
              console.error('Erreur lors du paiement de salaire',error)
            }
          );
        },(error)=>{
          console.error('Erreur lors de la modification du salaire',error)
        }
      );
    }else{
      this.massageSalaire="Ce salaire est déjà payé"
    }
  }else{
    this.payementSalair.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
}



ouvreModal(id: number){
  const action= this.actionMois.find(at => at.id === id);
 this.messagesup=""
  if(action){
    if(action.id_action_ecolage !=0){
      this.messagesup = "cette action est un ecolage voulez vous annulez le payement de scolarité ? "
    }
  }
      this.idSelected=id;

}


  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }
}
