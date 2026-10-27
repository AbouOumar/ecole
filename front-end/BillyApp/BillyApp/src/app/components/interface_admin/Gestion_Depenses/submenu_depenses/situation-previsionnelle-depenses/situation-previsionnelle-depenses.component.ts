import { Component, OnInit } from '@angular/core';
import { DepenseService } from '../../../../../Service/Depense/depense.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';

@Component({
  selector: 'app-situation-previsionnelle-depenses',
  templateUrl: './situation-previsionnelle-depenses.component.html',
  styleUrl: './situation-previsionnelle-depenses.component.css'
})
export class SituationPrevisionnelleDepensesComponent implements OnInit{
  constructor(private serviceSituationPreDepense: DepenseService,private anneeService: AnneeScolaireService) {}

  situationPrevisionnelDepense: any = [];
  anneeFiltreSP : string ='';
  annees: any[] = [];
  textRechercheMois: string = "";


  ngOnInit(): void {
    this.chargeSituationPrevisionnelDepense();
    this.chargeAnneeScolaire();
  }
  chargeSituationPrevisionnelDepense() {
    if(this.anneeFiltreSP==''){
          this.serviceSituationPreDepense.getSituationPrevisionnelDepense('0').subscribe(
            (response: any) =>{
              this.situationPrevisionnelDepense = response
            },
            (error) =>{
              console.error("Erreur lors du charge de la situation prévisionnel",error)
            }
          );
    } else{
      this.serviceSituationPreDepense.getSituationPrevisionnel(this.anneeFiltreSP).subscribe(
        (response: any) =>{
          this.situationPrevisionnelDepense = response
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

