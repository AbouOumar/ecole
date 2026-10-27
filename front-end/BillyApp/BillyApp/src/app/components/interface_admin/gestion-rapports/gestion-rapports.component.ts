import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../Service/Eleves/service-eleve.service';
import { AnneeScolaireService } from '../../../Service/Annee_scolaire/annee-scolaire.service';
import { ClasseService } from '../../../Service/Classes/classe.service';
import { ServiceCompteService } from '../../../Service/Compte/service-compte.service';

@Component({
  selector: 'app-gestion-rapports',
  templateUrl: './gestion-rapports.component.html',
  styleUrl: './gestion-rapports.component.css'
})
export class GestionRapportsComponent implements OnInit{
   constructor(private serviceStatistiqueE: ServiceEleveService, private serviceStatistiqueAnee: ServiceEleveService, private anneeService: AnneeScolaireService, private classeService: ClasseService, private serviceStatisRapp: ServiceCompteService) {}

    statis_eleve: any [] = [];
    statis_annee: any;
    total_effectif_total: Number=0;
    total_nbDepart: Number=0;
    total_eff_net: Number=0;
    total_eleveEnClasse: Number=0;
    moisEncours: string='';
    classes: any []=[];
    annees: any []=[];
    textRechercheAnnee: string = "";
    textRechercheMois: string = "";
    textRechercheClasse: Number = 0;
    anneEncoursId: string = '';
    statistiqueRapport: any [] = [];


    ngOnInit(): void {
      this.chargeClasse();
      this.chargeAnneeScolaire();
      this.chargeStatistiqueEleve();
      this.chargeStatisRapport();

    }
  chargeStatisRapport() {
    this.serviceStatisRapp.getStatistiqueRapport().subscribe(
      (response) =>{
        this.statistiqueRapport = response
      },
      (error) =>{
        console.error("Erreur lors du chargement des statistique du rapport",error)
      }
    )

  }


    chargeStatistiqueEleve(){
      this.serviceStatistiqueE.getStatistiqueMois().subscribe(
        (response) =>{
           this.statis_eleve = response.liste
           this.moisEncours=response.mois
           this.anneEncoursId= response.annee
           this.statis_eleve.forEach(element => {
              this.total_effectif_total=this.total_effectif_total+element.effectif_total
              this.total_nbDepart=this.total_nbDepart+element.nbDepart;
              this.total_eff_net= (this.total_effectif_total+element.effectif_total)-(this.total_nbDepart+element.nbDepart);
              this.total_eleveEnClasse = this.total_eleveEnClasse+element.total_eleveEnClasse;
          });

        },
        (error) =>{
          console.error("Erreur lors du chargement des statistique")
        }


      );

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

}
