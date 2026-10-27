import { Component, OnInit } from '@angular/core';
import { ParentService } from '../../../../../../../Service/Parent/parent.service';
import { response } from 'express';
import { Router } from '@angular/router';
import { Parents } from '../../../../../../../Classes/Parents/parents';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
declare var bootstrap: any;
@Component({
  selector: 'app-parents-deleves',

  templateUrl: './parents-deleves.component.html',
  styleUrl: './parents-deleves.component.css'
})
export class ParentsDelevesComponent implements OnInit{

  isloading: boolean =true
  isMasquer: boolean =false
  textRecherche: string='';
  listeParent: any[]=[];
    id_eleve?: Number;
    selectedParent: Parents = new Parents();
    editModal: any;
    parentForms!: FormGroup ;
    idSelected: number=0;
    message: string="";
  constructor(private fb: FormBuilder,private router: Router,private serviceParent: ParentService){}
  ngOnInit(): void {
    this.chargeListeParent();

    if(typeof bootstrap !== 'undefined'){
      this.editModal = new bootstrap.Modal(document.getElementById('modal_modifier_parent')!);
   }

        //Enregistrment eleve
        this.parentForms = this.fb.group({
          prenom_parent: ['', Validators.required],
          nom_parent: ['', Validators.required],
          telephone_parent: ['', Validators.required],
          adresse_parent: ['', Validators.required],
          Email_parent: ['', Validators.email],
          profession: ['', Validators.required],
          id: [''],
          type: [''],
         //Fin Enregistrment eleve
        });
  }
  chargeListeParent() {
      this.serviceParent.getParentPersonnel().subscribe(
        (response:any[])=>{
            this.listeParent=response
            this.isloading = false
            this.isMasquer = true
        },
        (error)=>{
          console.error('Erreur l\'ors du chargement de la liste des parents',error);
          this.isMasquer = false
        }
      )
  }



  updateParent() {
    if(this.parentForms.valid){
      if(this.parentForms.value.type=='SimpleParent'){
          const data ={
            nom_parent: this.parentForms.value.nom_parent ,
            prenom_parent: this.parentForms.value.prenom_parent ,
            telephone_parent: this.parentForms.value.telephone_parent ,
            Email_parent: this.parentForms.value.Email_parent ,
            adresse_parent: this.parentForms.value.adresse_parent ,
            profession: this.parentForms.value.profession ,
            type: this.parentForms.value.type ,
            id: this.parentForms.value.id ,
          }

        this.serviceParent.modificationParent(this.idSelected,data).subscribe(
          response => {
              this.chargeListeParent();
              this.message=response.message;
          },
          error => console.error('Erreur lors de la mise à jour :', error)
        );
      }else{
        this.message='Vous ne pouvez pas modifier un enseignant contancter la ressource humaine';
        setTimeout(() => {
          this.message=""
        }, 3000);


      }
    }
  }

  ouvreModal(id: number,type: string){

    const parent= this.listeParent.find(pt => pt.id === id && pt.type==type);
        if(parent){
          this.selectedParent=parent;
          this.parentForms.patchValue({
            prenom_parent:this.selectedParent.prenom_parent,
            nom_parent  :this.selectedParent.nom_parent,
            telephone_parent:this.selectedParent.telephone_parent,
            adresse_parent :this.selectedParent.adresse_parent,
            Email_parent :this.selectedParent.Email_parent,
            id:id,
            type:this.selectedParent.type,
            profession:this.selectedParent.profession
          })
        }
        this.idSelected=id;
        this.message=""

  }

  chargeEleveParents(id_parent: Number,type:string):void{
    this.router.navigate(['/dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/379rf0/2ie_8f', id_parent,type]);
  }





}
