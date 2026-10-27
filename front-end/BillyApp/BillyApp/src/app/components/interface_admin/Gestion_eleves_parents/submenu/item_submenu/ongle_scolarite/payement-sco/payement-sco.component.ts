import { Paiement } from './../../../../../../../Classes/Payements/paiement';
import { PayementService } from './../../../../../../../Service/Payements/payement.service';
import { Component, OnInit} from '@angular/core';
import { ServiceEleveService } from '../../../../../../../Service/Eleves/service-eleve.service';
import { ServiceCompteService } from '../../../../../../../Service/Compte/service-compte.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Reduction } from '../../../../../../../Classes/Reduction/reduction';
import { environment } from '../../../../../../../../environments/environment';


@Component({
  selector: 'app-payement-sco',

  templateUrl: './payement-sco.component.html',
  styleUrl: './payement-sco.component.css'
})
export class PayementScoComponent implements OnInit {

  constructor(private fb: FormBuilder, private servicePaiement_sco: ServiceEleveService, private serviceCompte: ServiceCompteService,private servicePayement:PayementService){}

 isloading: boolean = true
  paiement_scolariteTranche: any;
 paiement_eleve_sco: any;
 matricule: string ='';
 message: string ='';
 compte: any[]=[];
 reductionList: any[]=[];
 payementForm!: FormGroup;
 reductionForm!: FormGroup;
 messagePayement:string="";
 messageReduction:string="";
 adresseIp:string=environment.ip;
 payement: Paiement = new Paiement(0,0,0,0,'',0);
 reduction: Reduction = new Reduction();




ngOnInit(): void {
  this.chargeCompte();
      //Enregistrment de payement
      this.payementForm = this.fb.group({
        compte_id: ['', Validators.required],
        tranche: ['', Validators.required],
        montant_payement: ['', Validators.required],
      });

      //Enregistrment de reduction
      this.reductionForm = this.fb.group({
        tranche: ['', Validators.required],
        montant_reduction: ['', Validators.required],
      });

}

 // Impression

imprimer() {
  setTimeout(() => {
    const printContents = document.getElementById('section-a-imprimerPsco')?.innerHTML;
    const originalContents = document.body.innerHTML;

    if (printContents) {
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.location.reload(); // pour restaurer le DOM après impression
    }
  }, 500); // délai pour que le DOM se stabilise
}
  chargeListeReduction() {
      this.servicePayement.getListeReduction(this.paiement_eleve_sco.id).subscribe(
        (response) =>{
          this.reductionList = response
        },
        (error) =>{
          console.error("Erreur lors du chargement de la liste de reduction")
        }
      )
  }

chargePaiementScolarite(matricule:string){
  if(matricule !=''){
    this.servicePaiement_sco.getPaiementScolariteEleve(matricule).subscribe(
      (response) =>{
        if(response.tableauTranche){
           this.paiement_scolariteTranche=response.tableauTranche[0]
          this.paiement_eleve_sco=response.eleve
          this.chargeListeReduction();
          this.message=''
          this.isloading = false
        }else{
          this.message=response.message
          this.paiement_scolariteTranche=[]
          this.paiement_eleve_sco=null

        }
      },
      (error) =>{
        console.error("Erreur lors du chargment du paiement de la scolaritée.",error)
        this.isloading = true
      }
    );

  }else{
    this.message = 'Veuillez entrez un matricule';
    this.isloading = true
  }

}

onSubmitReduction(){
  if(this.reductionForm.valid){
    const resultat = this.reductionList.find((reduction) =>
      reduction.tranche == this.reductionForm.value.tranche
    );
    if(resultat){
      this.messageReduction = "Vous aviez déjà effectuer une reduction pour cette tranche";
    }else{
      if((this.reductionForm.value.tranche == '1ère Tranche') && (this.reductionForm.value.montant_reduction > this.paiement_scolariteTranche?.resteTranche1)){
        this.messageReduction = "Vous ne pouvez effectuer une redution de ce montant pour cette tranche 1";
      }else if((this.reductionForm.value.tranche == '2ème Tranche') && (this.reductionForm.value.montant_reduction > this.paiement_scolariteTranche?.resteTranche2)){
        this.messageReduction = "Vous ne pouvez effectuer une redution de ce montant pour cette tranche 2";
      } else if((this.reductionForm.value.tranche == '3ème Tranche') && (this.reductionForm.value.montant_reduction > this.paiement_scolariteTranche?.resteTranche3)){
        this.messageReduction = "Vous ne pouvez effectuer une redution de ce montant pour cette tranche 3";
      }else{
          this.reduction.eleve_id=this.paiement_eleve_sco.id;
          this.reduction.classe_id=this.paiement_eleve_sco.classe_id;
          this.reduction.annee_scolaire_id=this.paiement_eleve_sco.classe?.annee_scolaire_id;
          this.reduction.tranche=this.reductionForm.value.tranche;
          this.reduction.montant_reduction=this.reductionForm.value.montant_reduction;

        this.servicePayement.enregistrerReduction(this.reduction).subscribe(
          (response)=>{
            this.messageReduction= response.message;
            this.chargePaiementScolarite(this.matricule);
            this.reductionForm.reset();
          },
          (error)=>{
            this.messageReduction="Erreur lors de l'enregistrement de payement";
            console.error(error);
          }
        );
      }
    }
}
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

  if(this.payementForm.valid){
    if((this.payementForm.value.tranche == '1ère Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche1)){
      this.messagePayement = "Vous ne pouvez effectuer un paiement de ce montant pour cette tranche 1";
    }else if((this.payementForm.value.tranche == '2ème Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche2)){
      this.messagePayement = "Vous ne pouvez effectuer un paiement de ce montant pour cette tranche 2";
    } else if((this.payementForm.value.tranche == '3ème Tranche') && (this.payementForm.value.montant_payement > this.paiement_scolariteTranche?.resteTranche3)){
      this.messagePayement = "Vous ne pouvez effectuer un paiement de ce montant pour cette tranche 3";
    }else{
      this.payement.eleve_id=this.paiement_eleve_sco.id;
      this.payement.classe_id=this.paiement_eleve_sco.classe_id;
      this.payement.annee_scolaire_id=this.paiement_eleve_sco.classe?.annee_scolaire_id;
      this.payement.compte_id=this.payementForm.value.compte_id;
      this.payement.tranche=this.payementForm.value.tranche;
      this.payement.montant_payement=this.payementForm.value.montant_payement;

    this.servicePayement.enregistrerPayement(this.payement).subscribe(
      (response)=>{
        this.messagePayement=response.message;
        this.chargePaiementScolarite(this.matricule);
        this.payementForm.reset();
      },
      (error)=>{
        this.messagePayement="Erreur lors de l'enregistrement de payement";
        console.error(error);
      }
    );
    }
  }
}

  suppressionReduction(id: number){
    this.servicePayement.suppressionReduction(id).subscribe(
      (response) => {
        this.messageReduction = "Suppression effecuter avec succès";
        this.chargePaiementScolarite(this.matricule);
        this.chargeListeReduction();
      },
      (error) => {
        console.error("Erreur de suppression", error);
      }
    )
  }

}
