import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Depense } from '../../../../Classes/Depense/depense';
import { ServiceCompteService } from '../../../../Service/Compte/service-compte.service';
import { AnneeScolaireService } from '../../../../Service/Annee_scolaire/annee-scolaire.service';
import { DepenseService } from '../../../../Service/Depense/depense.service';
import { TypeDepenseService } from '../../../../Service/TypeDepense/type-depense.service';
import { FonctionService } from '../../../../Service/Fonction/fonction.service';
declare var bootstrap: any;
@Component({
  selector: 'app-fonction-personnel',

  templateUrl: './fonction-personnel.component.html',
  styleUrl: './fonction-personnel.component.css'
})
export class FonctionPersonnelComponent implements OnInit{
  fonctionPersonnels: any[]=[]
    ajouterFpForm!: FormGroup
    formData={}
    updateFpForm!: FormGroup
    textRechercheAnnee: string = "";
    message:string=''
    messageUpdate:string=''
    fonctions: any []=[];
    idSelected: number=0;
    idPersonnel: number=0;
    editModal: any;
    textRechercheFp: string = ''
    id_fonction: number=0;
    messageFonction: string = '';
    constructor(private serviceCompte: ServiceCompteService,private anneeService: AnneeScolaireService,private fb: FormBuilder,private fonctionService: FonctionService,private serviceTypeDepense: TypeDepenseService){}
    ngOnInit(): void {
      this.chargeFonctionPersonnel();
      this.chargeListefonction();
      if(typeof bootstrap !== 'undefined'){
        this.editModal = new bootstrap.Modal(document.getElementById('modifierNouvelleDepense')!);
     }
          this.ajouterFpForm = this.fb.group({
            personnel_id: [''],
            fonction_id: ['', Validators.required],
            statut_fonction: ['', Validators.required],
            salaire_base: [''],
            taux_horaire: ['']
           //Fin Enregistrment fonction personnel
          });

          this.updateFpForm = this.fb.group({
            personnel_id: [''],
            fonction_id: ['', Validators.required],
            statut_fonction: ['', Validators.required],
            salaire_base: [''],
            taux_horaire: ['']
           //Fin modification fonction personnel
          });
    }
    chargeFonctionPersonnel() {
      this.fonctionService.getFonctionPersonnel().subscribe(
        (response:any[])=>{
          this.fonctionPersonnels= response
        },
        (error)=>{
          console.error('Erreur lors du chargement des fonctions personnels')
        }
      )
    }

    chargeListefonction() {
      this.fonctionService.getFonction().subscribe(
        (response:any[])=>{
          this.fonctions= response
        },
        (error)=>{
          console.error('Erreur lors du chargement des fonctions')
        }
      )
    }

    onSubmit() {

      if(this.ajouterFpForm.valid){
        if(this.ajouterFpForm.value.fonction_id != 1){
          if(!this.ajouterFpForm.value.salaire_base){
            this.messageFonction="Le salaire de base est obligatoire pour un responsable."
            return;
          }else{
            this.formData={
              personnel_id: this.idPersonnel,
              fonction_id: this.ajouterFpForm.value.fonction_id,
              statut_fonction: this.ajouterFpForm.value.statut_fonction,
              salaire_base: this.ajouterFpForm.value.salaire_base,
              taux_horaire: this.ajouterFpForm.value.taux_horaire
            }
          }
        }else if(this.ajouterFpForm.value.fonction_id == 1){
          if(!this.ajouterFpForm.value.taux_horaire){
            this.messageFonction="Le taux horaire est obligatoire pour un enseignant."
            return;
          }else{
            this.formData={
              personnel_id: this.idPersonnel,
              fonction_id: this.ajouterFpForm.value.fonction_id,
              statut_fonction: this.ajouterFpForm.value.statut_fonction,
              salaire_base: this.ajouterFpForm.value.salaire_base,
              taux_horaire: this.ajouterFpForm.value.taux_horaire 
            }
          }
        }
        this.fonctionService.enregistrerFonctionPersonnel(this.formData).subscribe(
          (response:any)=>{
            this.chargeFonctionPersonnel();
            this.message= response.message;
            setTimeout(() => {
              this.message= '';
            }, 4000);
            this.chargeFonctionPersonnel();
            this.ajouterFpForm.reset();
            this.messageFonction=""
          },
          (error)=>{
            this.message="Erreur lors de l'enregistrement";
            console.error(error);
          }
        );
      }else{
        window.scrollTo(0,0);
        this.ajouterFpForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
        return;
      }
      }

      onSubmitUpdate() {

        if(this.updateFpForm.valid){
          if(this.updateFpForm.value.fonction_id != 1){
            if(!this.updateFpForm.value.salaire_base){
              this.messageFonction="Le salaire de base est obligatoire pour un responsable."
              return;
            }else{
              this.formData={
                personnel_id: this.idPersonnel,
                fonction_id: this.updateFpForm.value.fonction_id,
                statut_fonction: this.updateFpForm.value.statut_fonction,
                salaire_base: this.updateFpForm.value.salaire_base,
                taux_horaire: this.updateFpForm.value.taux_horaire
              }
            }
          }else if(this.updateFpForm.value.fonction_id == 1){
            if(!this.updateFpForm.value.taux_horaire){
              this.messageFonction="Le taux horaire est obligatoire pour un enseignant."
              return;
            }else{
              this.formData={
                personnel_id: this.idPersonnel,
                fonction_id: this.updateFpForm.value.fonction_id,
                statut_fonction: this.updateFpForm.value.statut_fonction,
                salaire_base: this.updateFpForm.value.salaire_base,
                taux_horaire: this.updateFpForm.value.taux_horaire 
              }
            }
          }

          this.fonctionService.modifierFonctionPersonnel(this.formData,this.idSelected).subscribe(
            (response:any)=>{
              this.chargeFonctionPersonnel();
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
          window.scrollTo(0,0);
          this.updateFpForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
          return;
        }
      }

      ouvreModal(id: number,idPersonnel:number){
        this.messageFonction=""
        const fonctionPersonnels= this.fonctionPersonnels.find(el => el.id == id);
            if(fonctionPersonnels){
              this.updateFpForm.patchValue({
                fonction_id: fonctionPersonnels.fonction_id,
                statut_fonction: fonctionPersonnels.statut_fonction,
                salaire_base: fonctionPersonnels.personnel.salaire_base,
                taux_horaire: fonctionPersonnels.personnel.taux_horaire
              })
              this.ajouterFpForm.patchValue({
                salaire_base: fonctionPersonnels.personnel.salaire_base,
                taux_horaire: fonctionPersonnels.personnel.taux_horaire
              })
            }
            this.idPersonnel=idPersonnel;
            this.idSelected=id;
            this.id_fonction= fonctionPersonnels.fonction_id
            this.message=""
      }

      affiche(form:number){
        this.messageFonction=""
        if(form==1){
          this.id_fonction= this.ajouterFpForm.value.fonction_id
        }else{
          this.id_fonction= this.updateFpForm.value.fonction_id
        }
        
      }

}
