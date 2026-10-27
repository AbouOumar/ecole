import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { FraisScolarite } from '../../../../Classes/LesClasses/frais-scolarite';
declare var bootstrap: any;

@Component({
  selector: 'app-les-frais-de-scolarite',
  templateUrl: './les-frais-de-scolarite.component.html',
  styleUrl: './les-frais-de-scolarite.component.css'
})
export class LesFraisDeScolariteComponent implements OnInit{
  constructor(private fb: FormBuilder,private classesService: ClassesService){}
  UpdateFraisForm!: FormGroup
  frais: any[]=[]
messaged:string=''
  selectedFrais: FraisScolarite=new FraisScolarite()
  idSelected: number=0;
   messageUpdate:string=''
  editModal: any;
ngOnInit(): void {
    this.chargeListeNiveau();
        this.UpdateFraisForm = this.fb.group({
          frais_inscription: ['', Validators.required],
          frais_reinscription: ['', Validators.required],
          tranche1: ['', Validators.required],
          tranche2: ['', Validators.required],
          tranche3: ['', Validators.required],
         //Fin Enregistrment type depense
        });


        if(typeof bootstrap !== 'undefined'){
          this.editModal = new bootstrap.Modal(document.getElementById('modal_ModifierNouvelleFrais')!);
       }



  }

  chargeListeNiveau() {
    this.classesService.getListNiveau().subscribe(
      (response:any[])=>{
        this.frais= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des classes')
      }
    )
  }

  ouvreModal(id: number){
    const frai= this.frais.find(el => el.id == id);
        if(frai){
          this.selectedFrais=frai;
          this.UpdateFraisForm.patchValue({
            frais_inscription:frai.frais_inscription,
            frais_reinscription:frai.frais_reinscription,
            tranche1:frai.tranche1,
            tranche2:frai.tranche2,
            tranche3:frai.tranche3,
          })
        }
        this.idSelected=id;
        this.messaged=""
  }

  onSubmitUpdate(){
    if(this.UpdateFraisForm.valid){
          const dataUpdate={
            frais_inscription: this.UpdateFraisForm.value.frais_inscription,
            frais_reinscription: this.UpdateFraisForm.value.frais_reinscription,
            tranche1: this.UpdateFraisForm.value.tranche1,
            tranche2: this.UpdateFraisForm.value.tranche2,
            tranche3: this.UpdateFraisForm.value.tranche3,
          }
          this.classesService.UpdateFrais(dataUpdate,this.idSelected).subscribe(
            (response)=>{
              this.chargeListeNiveau();
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
        this.UpdateFraisForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
}
}