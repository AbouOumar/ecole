import { Component, OnInit } from '@angular/core';
import { PayementService } from '../../../../../../../Service/Payements/payement.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ServiceEleveService } from '../../../../../../../Service/Eleves/service-eleve.service';
import { ServiceCompteService } from '../../../../../../../Service/Compte/service-compte.service';
import { Paiement } from '../../../../../../../Classes/Payements/paiement';
import { ClasseService } from '../../../../../../../Service/Classes/classe.service';

@Component({
  selector: 'app-historique-payement-eleve',
  templateUrl: './historique-payement-eleve.component.html',
  styleUrl: './historique-payement-eleve.component.css'
})
export class HistoriquePayementEleveComponent implements OnInit {
  
    constructor(private fb: FormBuilder, private servicePaiement_sco: ServiceEleveService, private serviceCompte: ServiceCompteService,private servicePayement:PayementService, private classeService: ClasseService){}
   paiement_scolariteTranche: any;
   paiement_eleve_sco: any;
   selectedPaiement: any;
   idSelected!: number;
   matricule: string ='';
   message: string ='';
   compte: any[]=[];
   classes: any []=[];
   reductionList: any[]=[];
   payementForm!: FormGroup;
   reductionForm!: FormGroup;
   messagePayement:string="";
   messageReduction:string="";
   payement: Paiement = new Paiement(0,0,0,0,'',0);
   listPaiement: any[]=[]
   messaged:string=''
   textRechercheClasse: string = "";
   textRecherche: string = "";



  ngOnInit(): void {
    this.chargeListePaiement()

      this.chargeCompte();
      this.chargeClasse();

      //Enregistrment de payement
      this.payementForm = this.fb.group({
        compte_id: ['', Validators.required],
        tranche: ['', Validators.required],
        montant_payement: ['', Validators.required],
      });
    
    }
  chargeListePaiement() {
    this.servicePayement.getListePayement().subscribe(
      (response:any[])=>{
        this.listPaiement=response
      },(error)=>{
        console.error('erreur lors du chargement des paiement',error)
      }
    )
  }

  onSubmit() {
    this.messagePayement="";
    if(this.payementForm.valid){
        if(this.selectedPaiement?.eleve?.matricule_eleve !=''){
          this.servicePaiement_sco.getPaiementScolariteEleve(this.selectedPaiement?.eleve?.matricule_eleve).subscribe(
            (response) =>{
              if(response.tableauTranche){
                 this.paiement_scolariteTranche=response.tableauTranche[0]
                this.paiement_eleve_sco=response.eleve
                if(this.paiement_scolariteTranche){
                  if((this.payementForm.value.tranche == '1ère Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche1+this.selectedPaiement?.montant_payement)){
                    this.messagePayement = "Vous ne reste que "+(this.paiement_scolariteTranche?.resteTranche1+this.selectedPaiement?.montant_payement)+"FG pour cette tranche";
                  }else if((this.payementForm.value.tranche == '2ème Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche2+this.selectedPaiement?.montant_payement)){
                    this.messagePayement = "Vous ne reste que "+(this.paiement_scolariteTranche?.resteTranche2+this.selectedPaiement?.montant_payement)+"FG pour cette tranche";
                  } else if((this.payementForm.value.tranche == '3ème Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche3+this.selectedPaiement?.montant_payement)){
                    this.messagePayement = "Vous ne reste que "+(this.paiement_scolariteTranche?.resteTranche3+this.selectedPaiement?.montant_payement)+"FG pour cette tranche";
                  }else{
                    this.payement.eleve_id=this.paiement_eleve_sco.id;
                    this.payement.classe_id=this.paiement_eleve_sco.classe_id;
                    this.payement.annee_scolaire_id=this.paiement_eleve_sco.classe?.annee_scolaire_id;
                    this.payement.compte_id=this.payementForm.value.compte_id;
                    this.payement.tranche=this.payementForm.value.tranche;
                    this.payement.montant_payement=this.payementForm.value.montant_payement;
                    this.servicePayement.modificationPayement(this.payement,this.idSelected).subscribe(
                      (response)=>{
                        this.messagePayement=response.message;
                        this.chargeListePaiement()
                      },
                      (error)=>{
                        this.messagePayement="Erreur lors de l'enregistrement de payement";
                        console.error(error);
                      }
                    );
                  }
                }else{
                  this.messagePayement="cet eleve n'est pas inscrit";
                }

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

  chargeClasse():void{
    this.classeService.getClasse().subscribe(
      (response:any[])=>{
        this.classes=response;
      },
  
      (error)=>{
        console.error('Erreur lors du chargement des classes',error);
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
  


  ouvreModal(id: number){
    this.messagePayement="";
    const paiement= this.listPaiement.find(el => el.id === id);
        if(paiement){
          this.selectedPaiement=paiement;
          this.payementForm.patchValue({
            compte_id: paiement.compte_id,
            tranche: paiement.tranche,
            montant_payement: paiement.montant_payement
          })
        }
        this.idSelected=id;
        this.message=""
  }

  deletePayement(idSelected:number){
    this.servicePayement.suppressionPayement(idSelected).subscribe(
      (response)=>{
        this.chargeListePaiement();
        this.messaged= response.message;
        setTimeout(() => {
          this.messaged= '';
        }, 4000);
      },
      (error)=>{
        this.messaged="Erreur lors de la suppression";
        console.error(error);
      }
    );
  }

}
