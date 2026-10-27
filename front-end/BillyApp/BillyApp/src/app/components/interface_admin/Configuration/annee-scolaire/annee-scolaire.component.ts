import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AnneeScolaireService } from '../../../../Service/Annee_scolaire/annee-scolaire.service';
import { dureeMinimaleValidator } from '../../../../validators/duree-minimale.validator';

declare var bootstrap: any;
@Component({
  selector: 'app-annee-scolaire',
  templateUrl: './annee-scolaire.component.html',
  styleUrl: './annee-scolaire.component.css'
})
export class AnneeScolaireComponent {
 constructor(private fb: FormBuilder,private serviceAnneeScolaire: AnneeScolaireService){}



  AnneeScolaires: any[]=[]
  AnneeScolaireForm!: FormGroup
  message:string=''
  messaged:string=''
  idSelected: number=0;
   messageUpdate:string=''
  editModal: any;
  UpdateAnneeForm!: FormGroup

  ngOnInit(): void {
    this.chargeListeAnneeScolaire();
        this.AnneeScolaireForm = this.fb.group({
          dateDebut: ['', Validators.required],
          DateFin: ['',Validators.required],
         //Fin Enregistrment annee scolaire
        },
        {
          validators: dureeMinimaleValidator(8)
        });

        this.UpdateAnneeForm = this.fb.group({
          dateDebut: ['', Validators.required],
          DateFin: ['', Validators.required],
         //Fin Enregistrment annee scolaire
        },
        {
          validators: dureeMinimaleValidator(8)
        });


        if(typeof bootstrap !== 'undefined'){
          this.editModal = new bootstrap.Modal(document.getElementById('modifierTypeDepence')!);
       }



  }

  
  chargeListeAnneeScolaire():void{
    this.serviceAnneeScolaire.getAnneeScolaire().subscribe(
      (response:any[])=>{
        this.AnneeScolaires=response;
      },
      (error)=>{
        console.error('Erreur lors du chargement des années',error);
      }
    )
  }

  onSubmit() {

  if(this.AnneeScolaireForm.valid){
      var formData = new FormData();
      formData.append("dateDebut",this.AnneeScolaireForm.value.dateDebut);
      formData.append("DateFin",this.AnneeScolaireForm.value.DateFin);

    this.serviceAnneeScolaire.createAnneeScolaire(formData).subscribe(
      (response)=>{
        this.chargeListeAnneeScolaire();
        this.message= response.message;
        setTimeout(() => {
          this.message= '';
        }, 4000);


        this.AnneeScolaireForm.reset();
      },
      (error)=>{
        this.message="Erreur lors de l'enregistrement";
        console.error(error);
      }
    );
  }else{
    this.AnneeScolaireForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

  onSubmitUpdate() {
    if(this.UpdateAnneeForm.valid){
          var formData = new FormData();
          formData.append("dateDebut",this.UpdateAnneeForm.value.dateDebut);
          formData.append("DateFin",this.UpdateAnneeForm.value.DateFin);

          this.serviceAnneeScolaire.updateAnneeScoalaire(formData,this.idSelected).subscribe(
            (response)=>{
              this.chargeListeAnneeScolaire();
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
        this.UpdateAnneeForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
    }

    deleteAnneeScolaire(idSelected:number){
      this.serviceAnneeScolaire.deleleteAnneeScoalaire(idSelected).subscribe(
        (response)=>{
          this.chargeListeAnneeScolaire();
          this.messaged= response.message;
          setTimeout(() => {
            this.messaged= '';
          }, 4000);
        },
        (error)=>{
          this.messaged="Cette année scolaire est déjà utilisé";
          console.error(error);
        }
      );
    }


  ouvreModal(id: number){
    const anneeScolaire= this.AnneeScolaires.find(el => el.id === id);
        if(anneeScolaire){
          this.UpdateAnneeForm.patchValue({
            dateDebut :anneeScolaire.dateDebut,
            DateFin: anneeScolaire.DateFin,
          })

        }
        this.idSelected=id;
        this.message=""
  }
}
