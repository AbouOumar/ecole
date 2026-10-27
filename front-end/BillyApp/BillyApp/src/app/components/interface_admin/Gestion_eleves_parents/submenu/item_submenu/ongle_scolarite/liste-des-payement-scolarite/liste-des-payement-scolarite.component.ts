import {  Component, OnInit  } from '@angular/core';
import { PayementService } from '../../../../../../../Service/Payements/payement.service';
import { response } from 'express';

import { Router } from '@angular/router';
import { AnneeScolaireService } from '../../../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ClasseService } from '../../../../../../../Service/Classes/classe.service';
import { ServiceEleveService } from '../../../../../../../Service/Eleves/service-eleve.service';

@Component({
  selector: 'app-liste-des-payement-scolarite',

  templateUrl: './liste-des-payement-scolarite.component.html',
  styleUrl: './liste-des-payement-scolarite.component.css'
})
export class ListeDesPayementScolariteComponent implements OnInit{

  constructor(private router: Router,private listEleveService: ServiceEleveService,private servicePaiementListe: PayementService, private anneeService: AnneeScolaireService, private classeService: ClasseService){}

  listePaiement: any;
  textRechercheAnnee: string = "";
textRechercheClasse: Number = 0;
classes: any []=[];
annees: any []=[];
textRecherche: string = "";
anneEncoursId: string = '';
  ngOnInit(): void {
    this.chargeListePaimentDetails();
    this.chargeClasse();
    this.chargeAnneeScolaire();


  }


  chargeListePaimentDetails() {
  this.servicePaiementListe.getListePaiementDetails().subscribe(
    (response) =>{
      this.listePaiement=response.data

      this.anneEncoursId=response.anneEncours

    },
    (Error) =>{
      console.error("Erreur lors du chargement de la liste details du paiement.")
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

  chargeParentsEleveId(id_eleve: Number):void{
    this.listEleveService.getEleveParents(id_eleve).subscribe(
      (response: any[])=>{
        this.router.navigate(['/listeEleveParent', id_eleve]);
      },
      (error)=>{
        console.error("Erreur lors du chargement des eleves et parent", error);
      }
    )
  }


}
