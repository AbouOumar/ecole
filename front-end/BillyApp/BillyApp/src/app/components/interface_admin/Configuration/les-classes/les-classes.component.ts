import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { Classe } from '../../../../Classes/LesClasses/classe';
declare var bootstrap: any;
@Component({
  selector: 'app-les-classes',
  templateUrl: './les-classes.component.html',
  styleUrl: './les-classes.component.css'
})
export class LesClassesComponent implements OnInit {
  constructor(private fb: FormBuilder,private classesService: ClassesService){}



  classes: any[]=[]
  niveaux: any[]=[]
  classeForm!: FormGroup
  message:string=''
  opClasseSelect:string|null=''
  messaged:string=''
  textRecherche:string=''
  messageOption:string=''
  lycee!:number|null
  selectedClasse: Classe=new Classe()
  idSelected: number=0;
   messageUpdate:string=''
  editModal: any;
  UpdateClasseForm!: FormGroup

  ngOnInit(): void {
    this.chargeListeClasse();
    this.chargeListeNiveau();
        this.classeForm = this.fb.group({
          nom_classe: ['', Validators.required],
          niveau: ['', Validators.required],
          nom_place: ['', Validators.required],
          option: [''],
         //Fin Enregistrment type depense
        });
        this.UpdateClasseForm = this.fb.group({
          nom_classe: ['', Validators.required],
          niveau: ['', Validators.required],
          nom_place: ['', Validators.required],
          option: [''],
         //Fin Enregistrment type depense
        });


        if(typeof bootstrap !== 'undefined'){
          this.editModal = new bootstrap.Modal(document.getElementById('modal_ModifierNouvelleClasse')!);
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

  chargeListeNiveau() {
    this.classesService.getListNiveau().subscribe(
      (response:any[])=>{
        this.niveaux= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des classes')
      }
    )
  }

  affiche(num: number){
    if(num==1){
       this.classeForm.value.option=""
       if(this.classeForm.value.niveau && this.classeForm.value.niveau>4){
        this.lycee= this.classeForm.value.niveau
      }else{
        this.lycee= null
      }
    }

    if(num==2){
      this.UpdateClasseForm.value.option=""
      if(this.UpdateClasseForm.value.niveau && this.UpdateClasseForm.value.niveau>4){
        this.lycee= this.UpdateClasseForm.value.niveau
      }else{
        this.lycee= null
      }
    }
   

    

  }

  onSubmit() {

  if(this.classeForm.valid){
    if(this.lycee && this.classeForm.value.option==""){
      this.messageOption="L'option est obligatoire pour le lycée"
    }else{
      const data={
        nom_classe: this.classeForm.value.nom_classe,
        niveau: this.classeForm.value.niveau,
        nom_place:this.classeForm.value.nom_place, 
        option: this.classeForm.value.option
      }
      this.classesService.createClasse(data).subscribe(
        (response)=>{
          this.chargeListeClasse();
          this.message= response.message;
          this.messaged= response.messaged;
          setTimeout(() => {
            this.message= '';
            this.messaged= '';
          }, 4000);
  
  
          // this.classeForm.reset();
        },
        (error)=>{
          this.messaged="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }
  }else{
    this.classeForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

  onSubmitUpdate() {
    if(this.UpdateClasseForm.valid){
      if(this.lycee && this.UpdateClasseForm.value.option==""){

        this.messageOption="L'option est obligatoire pour le lycée"
      }else{
          const dataUpdate={
            nom_classe: this.UpdateClasseForm.value.nom_classe,
            niveau: this.UpdateClasseForm.value.niveau,
            nom_place:this.UpdateClasseForm.value.nom_place, 
            option: this.UpdateClasseForm.value.option
          }
          this.classesService.UpdateClasse(dataUpdate,this.idSelected).subscribe(
            (response)=>{
              this.chargeListeClasse();
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
      }        
       }else{
        this.UpdateClasseForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
    }

    deleteClasse(idSelected:number){
      this.classesService.deleteClasse(idSelected).subscribe(
        (response)=>{
          this.chargeListeClasse();
          this.messaged= response.message;
          setTimeout(() => {
            this.messaged= '';
          }, 4000);
        },
        (error)=>{
          this.messaged="Cette classe est déjà utilisé";
          console.error(error);
        }
      );
    }


  ouvreModal(id: number){
    this.opClasseSelect=""
    this.lycee= null
    const classe= this.classes.find(el => el.classe.id === id);
        if(classe){
          this.selectedClasse=classe;
          const idniveau= this.niveaux.find(el => el.niveau == classe.classe.niveau);

          if(classe.option){
            this.opClasseSelect=classe.option.nom_option
            this.lycee= idniveau.niveau
            this.UpdateClasseForm.patchValue({
              option:classe.option.nom_option ||'',
            })
          }
          

          this.UpdateClasseForm.patchValue({
            nom_classe:classe.classe.nom_classe,
            niveau:idniveau.id ||0,
            nom_place:classe.classe.nom_place,
          })


        }
        this.idSelected=id;
        this.message=""
  }


}

