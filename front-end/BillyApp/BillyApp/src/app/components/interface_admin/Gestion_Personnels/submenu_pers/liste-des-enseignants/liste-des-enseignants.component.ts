import { Component, OnInit } from '@angular/core';
import { MatiereService } from '../../../../../Service/Matiere/matiere.service';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { environment } from '../../../../../../environments/environment';

@Component({
  selector: 'app-liste-des-enseignants',

  templateUrl: './liste-des-enseignants.component.html',
  styleUrl: './liste-des-enseignants.component.css'
})
export class ListeDesEnseignantsComponent implements OnInit{
  matieres: any[]=[]
  personnels: any[]=[]
  personelsMatieres: any=null
  matiereChoisi: number=0
  annees: any []=[];
  textRecherche:string=''
  classes: any []=[];
  matieresSelectionnees: number[] = []
  adresseIp: string = environment.ip
constructor(private matiereService: MatiereService, private personnelService: PersonnelService,private anneeService: AnneeScolaireService){}
  ngOnInit(): void {
    this.chargeMatieres();
    this.chargeEnseignants();
    this.chargeMatieres()
      //Enregistrment enseignant et parents 
  }
  personnelsMatiere() {
    if(this.matiereChoisi !=0){
      this.personnelService.getListeEnseignantParMatiere(this.matiereChoisi).subscribe(
        (response:any)=>{
          this.personelsMatieres=response[0].personnels
        },
        (error)=>{
          console.error('Erreur lors du chargement des enseignants',error)
        }
      )
    }else{
      this.personelsMatieres=null
    }
  }
  chargeEnseignants() {
    this.personnelService.getListeEnseignants().subscribe(
      (response:any[])=>{
        this.personnels=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des enseignants par matiere',error)
      }
    )
  }
  chargeMatieres() {
    this.matiereService.getMatiere().subscribe(
      (response:any[])=>{
        this.matieres=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des matieres',error)
      }
    )
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

}
