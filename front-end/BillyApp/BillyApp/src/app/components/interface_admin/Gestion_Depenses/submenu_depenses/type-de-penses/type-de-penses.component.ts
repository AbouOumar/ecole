import { Component, OnInit } from '@angular/core';
import { TypeDepenseService } from '../../../../../Service/TypeDepense/type-depense.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { TypeDepense } from '../../../../../Classes/Type depense/typeDepense';
declare var bootstrap: any;

@Component({
  selector: 'app-type-de-penses',

  templateUrl: './type-de-penses.component.html',
  styleUrl: './type-de-penses.component.css'
})
export class TypeDePensesComponent implements OnInit {
  constructor(private fb: FormBuilder,private serviceTypeDepense: TypeDepenseService){}



  typeDepenses: any[]=[]
  typeDepenseForm!: FormGroup
  message:string=''
  messaged:string=''
  selectedTypeDepense: TypeDepense=new TypeDepense()
  idSelected: number=0;
   messageUpdate:string=''
  editModal: any;
  UpdateTypeForm!: FormGroup

  ngOnInit(): void {
    this.chargeListeTypeDepense();
        this.typeDepenseForm = this.fb.group({
          libelle: ['', Validators.required],
          description: [''],
         //Fin Enregistrment type depense
        });
        this.UpdateTypeForm = this.fb.group({
          libelle: ['', Validators.required],
          description: [''],
         //Fin Enregistrment type depense
        });


        if(typeof bootstrap !== 'undefined'){
          this.editModal = new bootstrap.Modal(document.getElementById('modifierTypeDepence')!);
       }



  }
  chargeListeTypeDepense() {
    this.serviceTypeDepense.getListTypeDepense().subscribe(
      (response:any[])=>{
        this.typeDepenses= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des type de depenses')
      }
    )
  }

  onSubmit() {

  if(this.typeDepenseForm.valid){
      var formData = new FormData();
      formData.append("libelle",this.typeDepenseForm.value.libelle);
      formData.append("description",this.typeDepenseForm.value.description);

    this.serviceTypeDepense.createTypeDepense(formData).subscribe(
      (response)=>{
        this.chargeListeTypeDepense();
        this.message= response.message;
        setTimeout(() => {
          this.message= '';
        }, 4000);


        this.typeDepenseForm.reset();
      },
      (error)=>{
        this.message="Erreur lors de l'enregistrement";
        console.error(error);
      }
    );
  }else{
    this.typeDepenseForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

  onSubmitUpdate() {
    if(this.UpdateTypeForm.valid){
          var formData = new FormData();
          formData.append("libelle",this.typeDepenseForm.value.libelle);
          if(this.typeDepenseForm.value.description == ''){
            formData.append("description"," ");
          }else{
            formData.append("description",this.typeDepenseForm.value.description);
          }

          this.serviceTypeDepense.UpdateTypeDepense(formData,this.idSelected).subscribe(
            (response)=>{
              this.chargeListeTypeDepense();
              this.messageUpdate= response.message;


              setTimeout(() => {
                this.messageUpdate= '';
              }, 4000);

            },
            (error)=>{
              this.messageUpdate="Erreur lors de la modification";
              console.error(error);
            }
          );

       }else{
        this.UpdateTypeForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
    }

    deleteTypeDepense(idSelected:number){
      this.serviceTypeDepense.deleteTypeDepense(idSelected).subscribe(
        (response)=>{
          this.chargeListeTypeDepense();
          this.messaged= response.message;
          setTimeout(() => {
            this.messaged= '';
          }, 4000);
        },
        (error)=>{
          this.messaged="Ce type de depense est déjà utilisé";
          console.error(error);
        }
      );
    }


  ouvreModal(id: number){
    const type_depense= this.typeDepenses.find(el => el.id === id);
        if(type_depense){
          this.selectedTypeDepense=type_depense;
          this.UpdateTypeForm.patchValue({
            libelle :type_depense.libelle,
            description: type_depense.description,
          })
          

        }
        this.idSelected=id;
        this.message=""
  }


}
