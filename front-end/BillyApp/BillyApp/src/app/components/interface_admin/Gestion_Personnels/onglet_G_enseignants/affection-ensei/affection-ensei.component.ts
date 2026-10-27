import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { Personnel } from '../../../../../Classes/Personnel/personnel';
import { ClasseService } from '../../../../../Service/Classes/classe.service';
import { response } from 'express';

@Component({
  selector: 'app-affection-ensei',

  templateUrl: './affection-ensei.component.html',
  styleUrl: './affection-ensei.component.css'
})
export class AffectionEnseiComponent implements OnInit {
  enseignantSelectionne: Personnel| null=null
  personnels: any[]=[]
  matiereEnseignes: any[]=[]
  classeSelectionne: number[]=[]
  matiereSelectionne: any| null=null
  messageErreurAnnee: string=""
  messageAffecter: string=""
  anneScolaireId: string=""
  textRecherche: string=""
  classes: any []=[];
  annees: any []=[];
    constructor(private classeService: ClasseService,private fb: FormBuilder,private servicePersonnel: PersonnelService,  private anneeService: AnneeScolaireService){}
  ngOnInit(): void {
    this.chargeEnseignants();
    this.chargeAnneeScolaire();
    this.chargeClasse();

  }
  selectionnerEnseignant(enseignant: any): void{
    this.enseignantSelectionne=enseignant
    this.matiereEnseignes=enseignant.matieres

  }

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

  chargeClasse():void{
    this.classeService.getClasse().subscribe(
      (response:any[])=>{
        this.classes=response;
      },
      (error)=>{
        console.error('Erreur lors du chargement des classes',error);
      }
    )
  }

  chargeEnseignants() {
    this.servicePersonnel.getListeEnseignantMatiere().subscribe(
      (response:any[])=>{
        this.personnels=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des enseignants par matiere',error)
      }
    )
  }

  selectionnerMatiere(matiere: any){
    this.matiereSelectionne=matiere
  }

  onSubmit(){
    this.messageErreurAnnee=""
    if(this.anneScolaireId==""){
          this.messageErreurAnnee="L'année scolaire est obligatoire."
    }else if(this.classeSelectionne.length <= 0){
      this.messageErreurAnnee="Selection au moin une classe."
    }else if(this.enseignantSelectionne==null){
      this.messageErreurAnnee="Selectionner l'enseignant est obligatoire."
    }else if(this.matiereSelectionne==null){
      this.messageErreurAnnee="Selectionner la matiere est obligatoire."
    }else{
      const data={
        personnel_id: this.enseignantSelectionne?.id,
        matiere_id: this.matiereSelectionne?.id,
        classes: this.classeSelectionne
      }
      this.servicePersonnel.EnregistrerAffecter(data).subscribe(
        
        (response)=>{
          this.messageAffecter = response.message

        },
        (error)=>{
          console.error("Error lors de l'enregistrement")
        }
      )


    }
  }

  selectionnerClasse(matiereId: number, event:any){
    if(event.target.checked){
      this.classeSelectionne.push(matiereId);
    }else{
      this.classeSelectionne=this.classeSelectionne.filter(id=>id != matiereId);
    }
  }





}
