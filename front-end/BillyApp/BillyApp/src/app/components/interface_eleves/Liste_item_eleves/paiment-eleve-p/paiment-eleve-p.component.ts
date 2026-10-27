import { Component, Input, OnInit } from '@angular/core';
import { Parents } from '../../../../Classes/Parents/parents';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-paiment-eleve-p',

  templateUrl: './paiment-eleve-p.component.html',
  styleUrl: './paiment-eleve-p.component.css'
})
export class PaimentElevePComponent implements OnInit {
  eleve: any = null; // Stocke les informations de l'élève
      parents: any[] = [];
      personnels: any[] = [];
      classe: any = null;
      actions: any[] = [];
      editModal: any;
      message: string="";
      parent: Parents=new Parents()
      paiement_eleve_sco: any;
      paiement_scolariteTranche: any;

      @Input() user:User|null=null



    constructor(private listEleveService: ServiceEleveService,private serviceParent: ParentService, private servicePaiement_sco: ServiceEleveService) {}
    parentsEleve: any[] = [];

    ngOnInit(): void {
        this.chargeInfo()
        //Enregistrment parent

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

    chargeInfo(){
      const id = this.user?.idDroit;  // Récupérer l'ID depuis l'URL
      if (id) {
        //recuperationd des informations de l'evele et ses parents
        this.listEleveService.getEleveParents(+id).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.eleve = response[0]; // L'élève est le premier élément du tableau
              this.chargePaiementScolarite(this.eleve.matricule_eleve)
              this.parents = this.eleve.parents || [];
              this.personnels = this.eleve.personnels || [];
              this.classe = this.eleve.classe || null;
            } else {
              console.error("Aucun parent trouvé pour cet élève.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );

            //recuperation de la liste des actions de l'eleve
            this.listEleveService.getEleveActions(+id).subscribe(
              (response: any[]) => {
                if (response.length > 0) {
                  this.actions = Array.isArray(response) ? response : [];
                }
              },
              (error) => {
                console.error("Erreur lors du chargement des informations", error);
              }
            );
      }
    }


      onPrint() {
        window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
      }


}
