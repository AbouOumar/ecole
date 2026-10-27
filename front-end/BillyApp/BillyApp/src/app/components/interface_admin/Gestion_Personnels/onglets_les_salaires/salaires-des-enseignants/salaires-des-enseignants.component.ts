import { Component } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { SalaireService } from '../../../../../Service/Salaire/salaire.service';

@Component({
  selector: 'app-salaires-des-enseignants',
 
  templateUrl: './salaires-des-enseignants.component.html',
  styleUrl: './salaires-des-enseignants.component.css'
})
export class SalairesDesEnseignantsComponent {
  constructor(private serviceSalaire: PersonnelService,  private anneeService: AnneeScolaireService,private salService: SalaireService){}
  salaire_enseignant: any[]=[]
  textRecherche: string ='';
  moisEncours: string='';
  classes: any []=[];
  annees: any []=[];
  textRechercheAnnee: string = "";
  textRechercheMois: string = "";
  messaged: string = "";
  anneEncoursId: string = '';
  idSelected!: number

  ngOnInit(): void {
    this.chargeSalaire();
    this.chargeAnneeScolaire();
  }
  chargeSalaire() {
    this.serviceSalaire.getSalaireEnseignants().subscribe(
      (response:any) =>{
        this.salaire_enseignant=response.liste
        this.anneEncoursId=response.anneeEncours
        this.moisEncours=response.moisEncours
      },
      (error) =>{
        console.error("Erreur lors du chargement salaires des responsables")
      }
    )
  }

  ouvreModal(id:number){
    this.idSelected=id
  }

  // Filtrage par classe et année
chargeAnneeScolaire():void{
  this.anneeService.getAnneeScolaire().subscribe(
    (response:any)=>{
      this.annees=response;
    },
    (error)=>{
      console.error('Erreur lors du chargement des années',error);
    }
  )
}

annulerSalaire():void{
  this.salService.AnnulerSalaire(this.idSelected).subscribe(
    (response:any)=>{
      this.messaged=response.message
      this.chargeSalaire()
      setTimeout(()=>{
        this.messaged=""
      },3000)
    },
    (error)=>{
      console.error('Erreur lors du chargement des salaires',error);
    }
  )
}
}
