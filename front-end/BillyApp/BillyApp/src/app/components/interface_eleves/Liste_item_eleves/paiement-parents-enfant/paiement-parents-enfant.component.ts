import { Component, Input, OnInit } from '@angular/core';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { ActivatedRoute } from '@angular/router';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { User } from '../../../../Classes/Users/user';
import { environment } from '../../../../../environments/environment';

@Component({
  selector: 'app-paiement-parents-enfant',

  templateUrl: './paiement-parents-enfant.component.html',
  styleUrl: './paiement-parents-enfant.component.css'
})
export class PaiementParentsEnfantComponent implements OnInit{

  constructor(private parentService: ParentService,private router: ActivatedRoute, private servicePaiement_sco: ServiceEleveService) {}


  actions: any[] = [];
  paiement_eleve_sco: any;
  textRechercheEnfant: string ='';
  matricule: string ='';
  eleves:any[] = [] ; // Stocke les informations de l'élève
  parent: any = null;
  data: any
  paiement_scolariteTranche: any;
  message: string ='';
  adresseIp: string ='';
  droit: string ='';
  @Input() user:User|null=null

  ngOnInit(): void {
    this.adresseIp=environment.ip
    if(this.user?.Droit!="parent"){
      this.droit="personnel"
    }else{
      this.droit="parent"
    }
    const id = this.user?.idDroit;  // Récupérer l'ID depuis l'URL
    const type = this.router.snapshot.paramMap.get(this.droit);  // Récupérer le type depuis l'URL
    if (id ) {
      //recuperationd des informations de l'evele et ses parents
      if(type=="PersonnelParent"){
        this.data= {
          id: id,
          type: "personnel"
        }
        this.parentService.getPersonelEleve(+id).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.parent = response[0]; // Le parent est le premier élément du tableau
              this.eleves = this.parent.eleves || [];
            } else {
              console.error("Aucun élève trouvé pour cet parent.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
      }else{
        this.data= {
          id: id,
          type: "parent"
        }
        this.parentService.getParentsEleve(+id).subscribe(

          (response: any[]) => {
            if (response.length > 0) {
              this.parent = response[0]; // Le parent est le premier élément du tableau
              this.eleves = this.parent.eleves || [];
            } else {
              console.error("Aucun élève trouvé pour cet parent.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
      }



    }

    //recuperation de la liste des actions de l'eleve
        this.parentService.getParentActions(this.data).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.actions = Array.isArray(response) ? response : [];
            } else {
              console.error("Aucune action trouvé pour cet parent.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
  }


  rechercheSco(textRechercheEnfant:string){
    const eleveMatricule= this.eleves.find((eleve)=>
      eleve.id==textRechercheEnfant
    )
    if(eleveMatricule){
      console.log(eleveMatricule.matricule_eleve)
      this.chargePaiementScolarite(eleveMatricule.matricule_eleve)
    }else{
      this.paiement_eleve_sco=[]
      this.paiement_scolariteTranche=[]
    }

  }

  chargePaiementScolarite(matricule:string){
    if(matricule !=''){
      this.servicePaiement_sco.getPaiementScolariteEleve(matricule).subscribe(
        (response) =>{
          if(response.tableauTranche){
             this.paiement_scolariteTranche=response.tableauTranche[0]
            this.paiement_eleve_sco=response.eleve
            this.message=''
          }else{
            this.message=response.message
            this.paiement_scolariteTranche=[]
            this.paiement_eleve_sco=null

          }
        },
        (error) =>{
          console.error("Erreur lors du chargment du paiement de la scolaritée.",error)
        }
      );

    }else{
      this.message = 'Veuillez entrez un matricule';
    }

  }


}
