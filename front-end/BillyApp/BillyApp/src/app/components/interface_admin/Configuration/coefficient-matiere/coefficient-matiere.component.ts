import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FraisScolarite } from '../../../../Classes/LesClasses/frais-scolarite';
import { CoefficientService } from '../../../../Service/Coefficient/coefficient.service';
declare var bootstrap: any;
@Component({
  selector: 'app-coefficient-matiere',

  templateUrl: './coefficient-matiere.component.html',
  styleUrl: './coefficient-matiere.component.css'
})
export class CoefficientMatiereComponent implements OnInit {
   constructor(private fb: FormBuilder,private coefficientService: CoefficientService){}
    UpdateCoefficientForm!: FormGroup
    coefficients: any[]=[]
  messaged:string=''
    idSelected: number=0;
    selectedCoefficient: number=0;
     messageUpdate:string=''
    editModal: any;
  ngOnInit(): void {
      this.chargeListeCoefficient();
          this.UpdateCoefficientForm = this.fb.group({
            valeur: ['', Validators.required],
           //Fin Enregistrment type depense
          });

          if(typeof bootstrap !== 'undefined'){
            this.editModal = new bootstrap.Modal(document.getElementById('modal_ModifierNouvelleFrais')!);
         }



    }

    chargeListeCoefficient() {
      this.coefficientService.getListCoefficient().subscribe(
        (response:any[])=>{
          this.coefficients= response
        },
        (error)=>{
          console.error('Erreur lors du chargement des classes')
        }
      )
    }

    ouvreModal(id: number){
      const coefficient= this.coefficients.find(el => el.id == id);
          if(coefficient){
            this.selectedCoefficient=coefficient;
            this.UpdateCoefficientForm.patchValue({
              valeur:coefficient.valeur,
            })
          }
          this.idSelected=id;
          this.messaged=""
    }

    onSubmitUpdate(){
      if(this.UpdateCoefficientForm.valid){
            const dataUpdate={
              valeur: this.UpdateCoefficientForm.value.valeur,
            }
            this.coefficientService.UpdateCoefficient(dataUpdate,this.idSelected).subscribe(
              (response)=>{
                this.chargeListeCoefficient();
                this.messageUpdate= response.message;
                this.messaged= response.messaged;
                setTimeout(() => {
                  this.messageUpdate= '';
                  this.messaged= '';
                }, 4000);

              },
              (error)=>{
                this.messaged="Erreur lors de la modification";
                console.error(error);
              }
            );
        }
        else{
          this.UpdateCoefficientForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
          return;
        }
  }

}
