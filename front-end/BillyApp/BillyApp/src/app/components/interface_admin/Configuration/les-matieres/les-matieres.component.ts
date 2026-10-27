import { Component } from '@angular/core';
import { MatiereService } from '../../../../Service/Matiere/matiere.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Matiere } from '../../../../Classes/Matieres/matiere';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
declare var bootstrap: any;

@Component({
  selector: 'app-les-matieres',
   templateUrl: './les-matieres.component.html',
  styleUrl: './les-matieres.component.css'
})
export class LesMatieresComponent {
constructor(private fb: FormBuilder,private matieresService: MatiereService,private classesService: ClassesService){}



  matieres: any[]=[]
  classes: any[]=[]
  matiereForm!: FormGroup
  message:string=''
  messaged:string=''
  textRecherche:string=''
  selectedMatiere: Matiere=new Matiere()
  idSelected: number=0;
   messageUpdate:string=''
  editModal: any;
  UpdateMatiereForm!: FormGroup
  classesSelectionnees: number[] = []


  ngOnInit(): void {
    this.chargeListeClasse()
    this.chargeListeMatiere();
        this.matiereForm = this.fb.group({
          libelle_matiere: ['', Validators.required],
          description: ['', Validators.required],
          type: ['', Validators.required],
         //Fin Enregistrment type depense
        });
        this.UpdateMatiereForm = this.fb.group({
          libelle_matiere: ['', Validators.required],
          description: ['', Validators.required],
          type: ['', Validators.required],
         //Fin Enregistrment type depense
        });


        if(typeof bootstrap !== 'undefined'){
          this.editModal = new bootstrap.Modal(document.getElementById('modal_ModifierNouvelleMatiere')!);
       }



  }
  chargeListeMatiere() {
    this.matieresService.getMatiere().subscribe(
      (response:any[])=>{
        this.matieres= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des matieres')
      }
    )
  }




  onSubmit() {
    if(this.classesSelectionnees.length<=0){
      this.messaged="Veillez selection les classes"
      setTimeout(() => {
        this.messaged= '';
      }, 4000);
      return
    }
  if(this.matiereForm.valid){
      const data={
        libelle_matiere: this.matiereForm.value.libelle_matiere,
        description: this.matiereForm.value.description,
        type: this.matiereForm.value.type,
        classes: this.classesSelectionnees,
      }

      
      this.matieresService.createMatiere(data).subscribe(
        (response)=>{
          this.chargeListeMatiere();
          this.message= response.message;
          this.messaged= response.messaged;
          setTimeout(() => {
            this.message= '';
            this.messaged= '';
          }, 4000);
  
  
          // this.matiereForm.reset();
        },
        (error)=>{
          this.messaged="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
  }else{
    this.matiereForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

  chargeListeClasse() {
    this.classesService.getListClasse().subscribe(
      (response:any[])=>{
        this.classes= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des classes')
      }
    )
  }

  onSubmitUpdate() {
    if(this.classesSelectionnees.length<=0){
      this.messaged="Veillez selection les classes"
      return
    }
    if(this.UpdateMatiereForm.valid){
          const dataUpdate={
            libelle_matiere: this.UpdateMatiereForm.value.libelle_matiere,
            description: this.UpdateMatiereForm.value.description,
            type: this.UpdateMatiereForm.value.type,
            classes: this.classesSelectionnees,
          }
          this.matieresService.UpdateMatiere(dataUpdate,this.idSelected).subscribe(
            (response)=>{
              this.chargeListeMatiere();
              this.messageUpdate= response.message;
              this.messaged= response.messaged;
              setTimeout(() => {
                this.messageUpdate= '';
                this.messaged= '';
              }, 4000);
              setTimeout(() => {
                this.messageUpdate= '';
              }, 4000);

            },
            (error)=>{
              this.messaged="Erreur lors de la modification";
              console.error(error);
            }
          );       
       }else{
        this.UpdateMatiereForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
    }

    deleteMatiere(idSelected:number){
      this.matieresService.deleteMatiere(idSelected).subscribe(
        (response)=>{
          this.chargeListeMatiere();
          this.messaged= response.message;
          setTimeout(() => {
            this.messaged= '';
          }, 4000);
        },
        (error)=>{
          this.messaged="Cette matiere est déjà utilisé";
          console.error(error);
        }
      );
    }


  ouvreModal(id: number){
    this.classesSelectionnees=[]
    const matiere= this.matieres.find(el => el.id == id);
        if(matiere){
          this.selectedMatiere=matiere;

          this.UpdateMatiereForm.patchValue({
            libelle_matiere:matiere.libelle_matiere,
            description:matiere.description,
            type:matiere.type,
          })


        }
        this.idSelected=id;
        this.message=""
  }

  selectionnerClasse(matiereId: number, event: any){

    if(event.target.checked){
      this.classesSelectionnees.push(matiereId)
    }else{
      this.classesSelectionnees= this.classesSelectionnees.filter(id=> id !== matiereId);

    }
  }
}
