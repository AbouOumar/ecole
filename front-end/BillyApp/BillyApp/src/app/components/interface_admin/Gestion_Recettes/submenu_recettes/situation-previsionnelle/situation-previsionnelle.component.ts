import { Component, OnInit } from '@angular/core';
import { DepenseService } from '../../../../../Service/Depense/depense.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';

@Component({
  selector: 'app-situation-previsionnelle',
  templateUrl: './situation-previsionnelle.component.html',
  styleUrl: './situation-previsionnelle.component.css'
})
export class SituationPrevisionnelleComponent implements OnInit{
  constructor(private serviceSituationPrevisionnel: DepenseService,private anneeService: AnneeScolaireService) {}

  situationPrevisionnel: any = [];
  anneeFiltreSP : string ='';
  annees: any[] = [];
  textRechercheMois: string = "";
  textRechercheNiveau: string = "";


  ngOnInit(): void {
    this.chargeSituationPrevisionnel();
    this.chargeAnneeScolaire();
  }
  chargeSituationPrevisionnel() {
    if(this.anneeFiltreSP==''){
          this.serviceSituationPrevisionnel.getSituationPrevisionnel('0').subscribe(
            (response: any) =>{
              this.situationPrevisionnel = response
            },
            (error) =>{
              console.error("Erreur lors du charge de la situation prévisionnel",error)
            }
          );
    } else{
      this.serviceSituationPrevisionnel.getSituationPrevisionnel(this.anneeFiltreSP).subscribe(
        (response: any) =>{
          this.situationPrevisionnel = response
        },
        (error) =>{
          console.error("Erreur lors du charge de la situation prévisionnel",error)
        }
      );

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

}
