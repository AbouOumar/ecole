import { Component, OnInit } from '@angular/core';
import { DepenseService } from '../../../../../Service/Depense/depense.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';

@Component({
  selector: 'app-recette-et-cas-reduction',

  templateUrl: './recette-et-cas-reduction.component.html',
  styleUrl: './recette-et-cas-reduction.component.css'
})
export class RecetteEtCasReductionComponent implements OnInit {
  constructor(private serviceRecetteCasReduction: DepenseService, private anneeService: AnneeScolaireService){}

  listRecetteCasReduction:any [] = [];
  annees: any []=[];
  recette_MensuelEnBanque: number=0
  recette_GlobalApresente: number=0
  total_ReductionAnnee: number=0
  solde_Reduction: number=0
  textRechercheAnnee: string = "";
  textRechercheMois: string = "";
  anneEncoursId: string = '';
  moisEncours: string='';

  ngOnInit(): void {
    this.chargeListeRectteCasReduction();
    this.chargeAnneeScolaire();
  }
  chargeListeRectteCasReduction() {
    this.serviceRecetteCasReduction.getListeRecetteCasReduction().subscribe(
      (response: any[]) =>{
        this.listRecetteCasReduction=response
        this.listRecetteCasReduction.forEach(element => {
          this.recette_MensuelEnBanque=this.recette_MensuelEnBanque+element.recetteMensuelEnBanque
          this.recette_GlobalApresente=this.recette_GlobalApresente+element.recetteGlobalApresenter;
          this.solde_Reduction = this.solde_Reduction+element.soldeReduction;
          this.total_ReductionAnnee=this.solde_Reduction;
      });
      },
      (error) =>{
        console.error("Erreur lors du chargement de la liste des Recettes cas de reduction",error)
      }
    )

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
