import { Component, OnInit } from '@angular/core';
import { ServiceCompteService } from '../../../../../Service/Compte/service-compte.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Compte } from '../../../../../Classes/Compte/compte';
declare var bootstrap: any;

@Component({
  selector: 'app-liste-de-comptes',

  templateUrl: './liste-de-comptes.component.html',
  styleUrl: './liste-de-comptes.component.css'
})
export class ListeDeComptesComponent implements OnInit {
    constructor(private serviceCompte: ServiceCompteService, private fb: FormBuilder){}

     comptes: any[]=[];
     soldeTotal: number = 0
     ajouterCompteForm!: FormGroup
     updateCompteForm!: FormGroup
     idSelected: number=0;
      messageUpdate:string=''
      editModal: any;
     message : string = ''
     verifyCompte: Compte=new Compte()
     selectedCompte: Compte=new Compte()

  ngOnInit(): void {
    this.chargeCompte();


    if(typeof bootstrap !== 'undefined'){
      this.editModal = new bootstrap.Modal(document.getElementById('modifierNouveauCompte')!);
   }

    this.ajouterCompteForm = this.fb.group({
    nomCompte: ['', Validators.required],
    numeroCompte: ['', Validators.required],
    typeTransaction: [''],
    solde: ['', Validators.required],
    statut: [''],
    description: [''],
   //Fin Enregistrment compte
  });

    this.updateCompteForm = this.ajouterCompteForm
  }







  chargeCompte(){
    this.serviceCompte.getCompte().subscribe(
      (response)=>{
        this.comptes = response
        this.soldeTotal=0
        this.comptes.forEach(element => {
          this.soldeTotal=this.soldeTotal+element.solde
      });
      },
      (error) =>{
        console.error("Erreur lors du chargment des compte.",error)
      }
    )

  }

  onSubmit() {
    if(this.ajouterCompteForm.valid){
        var formData = new FormData();
        formData.append("nomCompte",this.ajouterCompteForm.value.nomCompte);
        formData.append("numeroCompte",this.ajouterCompteForm.value.numeroCompte);
        formData.append("description",this.ajouterCompteForm.value.description);
        formData.append("statut",'actif');
        formData.append("solde",this.ajouterCompteForm.value.solde);
      this.serviceCompte.createCompte(formData).subscribe(
        (response)=>{
          this.chargeCompte();
          this.message= response.message;
          setTimeout(() => {
            this.message= '';
          }, 4000);
          this.chargeCompte();
          this.ajouterCompteForm.reset();
        },
        (error)=>{
          this.message="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }
    }

    onSubmitUpdate() {

      if(this.updateCompteForm.valid){
          var formData = new FormData();
          formData.append("nomCompte",this.updateCompteForm.value.nomCompte);
        formData.append("numeroCompte",this.updateCompteForm.value.numeroCompte);
        formData.append("description",this.updateCompteForm.value.description);
        formData.append("statut",'actif');
        formData.append("solde",this.updateCompteForm.value.solde);
        this.serviceCompte.UpdateCompte(formData,this.idSelected).subscribe(
          (response)=>{
            this.chargeCompte();
            this.messageUpdate= response.message;

            this.verifyCompte= response.compte;

            setTimeout(() => {
              this.messageUpdate= '';
            }, 4000);

          },
          (error)=>{
            this.messageUpdate="Erreur lors de la modification";
            console.error(error);
          }
        );
      }
    }

    ouvreModal(id: number){
      const compte= this.comptes.find(el => el.id === id);
          if(compte){
            this.selectedCompte=compte;
          }
          this.idSelected=id;
          this.message=""
    }

    changeStatut(id: number){
      const compte= this.comptes.find(el => el.id === id);
          if(compte){
            this.idSelected=id;
            this.selectedCompte=compte;
            if(this.selectedCompte.statut == 'actif'){
              this.selectedCompte.statut = 'bloquer'
            }else{
              this.selectedCompte.statut = 'actif'
            }
            this.serviceCompte.UpdateCompte(this.selectedCompte,this.idSelected).subscribe(
              (response)=>{
                this.chargeCompte();
              })
          }
    }

}
