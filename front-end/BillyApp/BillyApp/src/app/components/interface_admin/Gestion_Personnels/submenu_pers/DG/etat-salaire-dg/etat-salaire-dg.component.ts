import { Component, Input } from '@angular/core';
import { Salaire } from '../../../../../../Classes/Salaire/salaire';
import { Personnel } from '../../../../../../Classes/Personnel/personnel';
import { Actions } from '../../../../../../Classes/Personnel/actions';
import { SalaireService } from '../../../../../../Service/Salaire/salaire.service';
import { PersonnelService } from '../../../../../../Service/Personnel/personnel.service';
import { ActionService } from '../../../../../../Service/Actions/action.service';
import { AnneeScolaireService } from '../../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { User } from '../../../../../../Classes/Users/user';
import { Router } from '@angular/router';
import { UserService } from '../../../../../../Service/User/user.service';
import { environment } from '../../../../../../../environments/environment';

@Component({
  selector: 'app-etat-salaire-dg',
   templateUrl: './etat-salaire-dg.component.html',
  styleUrl: './etat-salaire-dg.component.css'
})
export class EtatSalaireDGComponent {
 constructor(private router: Router, private userService: UserService,private serviceSalaire: SalaireService,private servicePersonnel: PersonnelService,private serviceAction: ActionService,  private anneeService: AnneeScolaireService){}
    salaire_responsable: any[]=[]
    actionMois: any []=[]
    moisEncours: string='';
    mois: string ='';
    annees: any []=[];
    enfants: any []=[];
    annee_scolaire!: number
    idSelected!: number
    textRechercheAnnee: string = "";
    anneEncoursId: string = '';
    personnel: any=null
    salaire: Salaire| null = null;
    salaireE: Salaire| null = null;
    salaireSave: Salaire| null = null;
    message: string = '';
    responsable: Personnel| null=null
    compte: any[]=[];
    action: Actions = new Actions(0,'',0,0,'','',0);
    moisRecherche: string=""
    fonctionRecherche: string=""
    matricule: string=""
    anneeRecherche: any
    messageAction: string=''
    messagesup: string=''
    messageAction2: string=''
    massageSalaire: string=''
    paiement_scolariteTranche: any;
    salaire_enseignant: any[]=[]
    user: User |null=null
    adresseIp: string = environment.ip

        ngOnInit(): void {
          this.user = this.userService.getUser()

          this.getPersonnelDetailSalaire();
          this.getListeResponsaleInfo();
          this.chargeAnneeScolaire();
          this.rechercheSalaire()
          this.chargeSalaire()
        }

    chargeSalaire() {
      this.servicePersonnel.getSalaireEnseignants().subscribe(
        (response:any) =>{
          this.salaire_enseignant=response.liste
        },
        (error) =>{
          console.error("Erreur lors du chargement salaires des responsables")
        }
      )
    }

    rechercheSalaire() {
      this.salaire = null;
      this.salaireE = null;
      this.actionMois=[]
      //recuperer les informations du responsable
      const moisRecherche = this.mois || this.moisEncours;
      const anneeRecherche = this.annee_scolaire || this.anneEncoursId;
      this.moisRecherche=this.mois || this.moisEncours;
      this.anneeRecherche= anneeRecherche;
      if(this.responsable){
        
        //recuperer la liste des actions de l'enseignant par mois et par année
        const data ={
            personnel_id: this.responsable.id,
            mois: moisRecherche,
            annee_scolaire_id: anneeRecherche,
            fonction: this.fonctionRecherche || "Autre"
        }
        this.getActions(data)
        //recuperer le salaire de l'enseignant par mois et par année
        if(this.fonctionRecherche=="" || this.fonctionRecherche=="Autre"){
          const resultat = this.salaire_responsable.find((salaire) =>
            salaire.matricule === this.responsable?.matricule_personnel &&
            salaire.mois.toLowerCase() == moisRecherche.toLowerCase() &&
            salaire.annee_scolaire_id == anneeRecherche
          );
          if (resultat) {
            this.salaire = resultat;
            this.salaireE = null;
            this.message = '';

          }else {
            this.salaire = null;
            this.actionMois=[]
            this.message = 'Pas encore de salaire';
          }
        }else if(this.fonctionRecherche=="Enseignant"){
          const resultatA = this.salaire_enseignant.find((salaire) =>
            salaire.matricule === this.responsable?.matricule_personnel &&
            salaire.mois.toLowerCase() == moisRecherche.toLowerCase() &&
            salaire.annee_scolaire_id == anneeRecherche
          );
          if (resultatA) {
            this.salaireE = resultatA;
            this.message = '';

          }else {
            this.salaireE = null;
            this.actionMois=[]
            this.message = 'Pas encore de salaire';
          }
        }







      }

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

getListeResponsaleInfo() {
  if(this.user){
    this.matricule=this.user?.matricule
  }else{
    return
  }

    this.servicePersonnel.getListeResponsaleInfo(this.matricule).subscribe(
      (response:any)=>{
        this.responsable=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des responsables par matiere',error)
      }
    )
  }

  getActions(data: any) {
    this.servicePersonnel.getListeActionMois(data).subscribe(
      (response:any[])=>{
        this.actionMois = response
      },
      (error)=>{
        this.actionMois=[]
        console.error('Erreur lors du chargement des actions de responsable',error)
      }
    )
  }

  getPersonnelDetailSalaire() {
    this.servicePersonnel.getPersonnelDetailSalaire().subscribe(
      (response:any) =>{
        this.salaire_responsable=response.liste
        this.anneEncoursId=response.anneeEncours
        this.moisEncours=response.moisEncours
      },
      (error) =>{}


  )}
  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }

}
