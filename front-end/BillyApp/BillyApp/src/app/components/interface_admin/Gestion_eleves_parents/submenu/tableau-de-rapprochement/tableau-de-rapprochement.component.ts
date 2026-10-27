import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../../../Service/Eleves/service-eleve.service';
import { response } from 'express';
import { error } from 'console';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ClasseService } from '../../../../../Service/Classes/classe.service';

@Component({
  selector: 'app-tableau-de-rapprochement',
  templateUrl: './tableau-de-rapprochement.component.html',
  styleUrl: './tableau-de-rapprochement.component.css'
})
export class TableauDeRapprochementComponent implements OnInit{
  constructor(private serviceStatistiqueE: ServiceEleveService,  private serviceStatistiqueAnee: ServiceEleveService, private anneeService: AnneeScolaireService, private classeService: ClasseService) {}

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
  anneeFiltre: string = '';


  ngOnInit(): void {
    this.chargeStatistiqueEleve();
    this.chargeClasse();
    this.chargeAnneeScolaire();
    this.chargeStatistiqueRapprochementAnnee();

  }

  chargeStatistiqueEleve(){
    this.serviceStatistiqueE.getStatistiqueEleve().subscribe(
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
    chargeStatistiqueRapprochementAnnee(){
      if(this.anneeFiltre==''){
        this.serviceStatistiqueAnee.getStatistiqueRapprochmentAnnee('0').subscribe(
          (response) =>{
            this.statis_annee=response.totaux
          },
          (error) =>{
            console.error("Erreur lors du chargement des statistique de rapprochement année.", error)
          }
        );
      }else{
        this.serviceStatistiqueAnee.getStatistiqueRapprochmentAnnee(this.anneeFiltre).subscribe(
          (response) =>{
            this.statis_annee=response.totaux
          },
          (error) =>{
            console.error("Erreur lors du chargement des statistique de rapprochement année.", error)
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
