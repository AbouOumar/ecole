import { Component, OnInit } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { SalaireService } from '../../../../../Service/Salaire/salaire.service';

@Component({
  selector: 'app-salaires-des-responsables',

  templateUrl: './salaires-des-responsables.component.html',
  styleUrl: './salaires-des-responsables.component.css'
})
export class SalairesDesResponsablesComponent implements OnInit {
constructor(private serviceSalaireResp: PersonnelService,  private anneeService: AnneeScolaireService,private salService: SalaireService){}

  salaire_responsable: any[]=[]
  textRecherche: string ='';
  moisEncours: string='';
  classes: any []=[];
  annees: any []=[];
  textRechercheAnnee: string = "";
  textRechercheMois: string = "";
  anneEncoursId: string = '';
  messaged: string = "";
  idSelected!: number

  ngOnInit(): void {
    this.chargeSalaireResponsable();
    this.chargeAnneeScolaire();
  }
  chargeSalaireResponsable() {
    this.serviceSalaireResp.getPersonnelDetailSalaire().subscribe(
      (response:any) =>{
        this.salaire_responsable=response.liste
        this.anneEncoursId=response.anneeEncours
        this.moisEncours=response.moisEncours
      },
      (error) =>{
        console.error("Erreur lors du chargement salaires des responsables")
      }
    )

  }

  annulerSalaire():void{
    this.salService.AnnulerSalaire(this.idSelected).subscribe(
      (response:any)=>{
        this.messaged=response.message
        this.chargeSalaireResponsable();
        setTimeout(()=>{
          this.messaged=""
        },3000)
      },
      (error)=>{
        console.error('Erreur lors du chargement des salaires',error);
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

}
