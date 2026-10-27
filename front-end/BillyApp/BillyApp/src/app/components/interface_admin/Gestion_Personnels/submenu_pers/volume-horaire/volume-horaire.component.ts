import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { VolumeHoraireService } from '../../../../../Service/Volume_horaire/volume-horaire.service';
import { Personnel } from '../../../../../Classes/Personnel/personnel';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { VolumeHoraire } from '../../../../../Classes/VolumeHoraire/volumeHoraire';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
declare var bootstrap: any;
@Component({
  selector: 'app-volume-horaire',
  templateUrl: './volume-horaire.component.html',
  styleUrl: './volume-horaire.component.css'
})
export class VolumeHoraireComponent implements OnInit {

   constructor(private fb: FormBuilder,private serviceVolumeHoraire: VolumeHoraireService, private servicePersonnel:PersonnelService, private anneeService: AnneeScolaireService){}




    volumeHoraires: any[]=[]
    volumeHoraireForm!: FormGroup
    message:string=''
    messageErreur:string=''
    messaged:string=''
    selectedvolumeHoraire: VolumeHoraire=new VolumeHoraire()
    idSelected: number=0;
     messageUpdate:string=''
    editModal: any;
    personnels: any[]=[]
    annees: any []=[];
    anneeEncours: string=""
    textRecherche: string=""
    textRechercheAnnee: string=""
    UpdateVolumeHoraireForm!: FormGroup
    matricule: string|undefined ='';
      enseignant: Personnel| null=null
    ngOnInit(): void {
      this.chargeAnneeScolaire();
      this.chargeEnseignants()
      this.chargeListevolumeHoraire();
      // this.chargeListevolumeHoraire();
          this.volumeHoraireForm = this.fb.group({
            mois: ['', Validators.required],
            nombreHeure: ['', Validators.required],
            annee_scolaire_id: ['', Validators.required],
           //Fin Enregistrment volume horaire
          });
          this.UpdateVolumeHoraireForm = this.volumeHoraireForm


          if(typeof bootstrap !== 'undefined'){
            this.editModal = new bootstrap.Modal(document.getElementById('modifierVolumeHoraire')!);
         }
    }

    chargeEnseignants() {
      this.servicePersonnel.getListeEnseignants().subscribe(
        (response:any[])=>{
          this.personnels=response
        },
        (error)=>{
          console.error('Erreur lors du chargement des enseignants par matiere',error)
        }
      )
    }

    rechercheEnseignant(){
      if(this.matricule!=''){
        const resultatP = this.personnels.find((enseignant) =>
          enseignant.matricule_personnel === this.matricule
        );

        if(resultatP){
          this.enseignant=resultatP
          this.message=''
        }else{
          this.enseignant=null
            this.message="Ce matricule n'existe pas sur la liste des enseignants."
        }
      }else{
        this.message="veillez entrer le matricule"
      }
    }


    chargeListevolumeHoraire() {
      this.serviceVolumeHoraire.getListVolumeHoraire().subscribe(
        (response:any)=>{
          this.volumeHoraires= response.liste
          this.anneeEncours=response.anneeEncours
        },
        (error)=>{
          console.error('Erreur lors du chargement de la liste du volume horaire.')
        }
      )
    }

    videMessage(){
      setTimeout(() => {
        this.message= '';
        this.messaged= '';
        this.messageUpdate= '';
        this.messageErreur= '';
      }, 4000);
    }

    onSubmit() {

    if(this.volumeHoraireForm.valid){
      const resultatP = this.volumeHoraires.find((volumeHoraire) =>
        volumeHoraire.mois == this.volumeHoraireForm.value.mois &&
        volumeHoraire.annee_scolaire_id == this.volumeHoraireForm.value.annee_scolaire_id &&
        volumeHoraire.personnel_id == this.enseignant?.id
      );

      if(resultatP){
        this.messageErreur="Ce enseignant à déja un volume horaire pour ce mois."
        this.videMessage()
      }else{
        const data={
          personnel_id :this.enseignant?.id,
          mois: this.volumeHoraireForm.value.mois,
          nombreHeure :this.volumeHoraireForm.value.nombreHeure,
          annee_scolaire_id :this.volumeHoraireForm.value.annee_scolaire_id
        }
  
        this.serviceVolumeHoraire.createVolumeHoraire(data).subscribe(
          (response)=>{
            this.chargeListevolumeHoraire();
            this.message= response.message;
            this.volumeHoraireForm.reset();
            this.videMessage()
          },
          (error)=>{
            this.messageErreur="Erreur lors de l'enregistrement";
            console.error(error);
          }
        );
      }
    }else{
      this.volumeHoraireForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;
     }
    }

          // Filtrage par classe et année
chargeAnneeScolaire():void{
  this.anneeService.getAnneeScolaire().subscribe(
    (response:any[])=>{
      this.annees=response;
    },
    (error)=>{
      console.error('Erreur lors du chargement des années',error);
    }
  )
}


    onSubmitUpdate() {
      if(this.UpdateVolumeHoraireForm.valid){
          const resultatP = this.volumeHoraires.find((volumeHoraire) =>
            volumeHoraire.mois == this.volumeHoraireForm.value.mois &&
            volumeHoraire.annee_scolaire_id == this.volumeHoraireForm.value.annee_scolaire_id &&
            volumeHoraire.personnel_id == this.selectedvolumeHoraire.personnel_id &&
            volumeHoraire.id != this.selectedvolumeHoraire.id
          ); 
          
          if(resultatP){
            this.messaged='Ce enseignant a déjà un volume horaire pour ce mois'
            this.videMessage()
          }else{
            const data={
                personnel_id :this.selectedvolumeHoraire.personnel_id,
                mois: this.UpdateVolumeHoraireForm.value.mois,
                nombreHeure :this.UpdateVolumeHoraireForm.value.nombreHeure,
                annee_scolaire_id :this.UpdateVolumeHoraireForm.value.annee_scolaire_id
              }

              this.serviceVolumeHoraire.UpdateVolumeHoraire(data,this.idSelected).subscribe(
                (response)=>{
                  this.chargeListevolumeHoraire();
                  this.messageUpdate= response.message;
                  this.videMessage()

                },
                (error)=>{
                  this.messageUpdate="Erreur lors de la modification";
                  console.error(error);
                }
              );

          }
         }else{
          this.UpdateVolumeHoraireForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
          return;
         }
      }


    ouvreModal(id: number){
      const volume_horaire= this.volumeHoraires.find(el => el.id === id);
          if(volume_horaire){
            this.selectedvolumeHoraire=volume_horaire;
            this.UpdateVolumeHoraireForm.patchValue({
              annee_scolaire_id :volume_horaire.annee_scolaire_id,
              mois: volume_horaire.mois,
              nombreHeure :volume_horaire.nombreHeure,
            })
          }
          this.idSelected=id;
          this.message=""
    }


}
