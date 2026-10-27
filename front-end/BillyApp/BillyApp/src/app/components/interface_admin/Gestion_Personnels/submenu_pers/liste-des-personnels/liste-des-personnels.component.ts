import { Component, OnInit } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { FonctionService } from '../../../../../Service/Fonction/fonction.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { environment } from '../../../../../../environments/environment';

@Component({
  selector: 'app-liste-des-personnels',

  templateUrl: './liste-des-personnels.component.html',
  styleUrl: './liste-des-personnels.component.css'
})
export class ListeDesPersonnelsComponent implements OnInit {
  personnels: any[]=[]
  fonctions: any[]=[]
  annees: any []=[];
  textRechercheFonction: string = "";
  textRecherche: string = "";
  adresseIp : string =environment.ip
  constructor(private servicePersonnels: PersonnelService, private serviceFonction: FonctionService,private anneeService: AnneeScolaireService){}
  ngOnInit(): void {
    this.chargeListePersonnel();
    this.chargeAnneeScolaire();
    this.chargeFonction();
  }

  chargeListePersonnel() {
    this.servicePersonnels.getListeResponsale().subscribe(
      (response:any)=>{
        this.personnels=response
      },
      (error)=>{
        console.error('Erreur lors du chargement de liste des personnels');
      }
    )
  }
  chargeFonction(){
    this.serviceFonction.getFonction().subscribe(
      (response:any[])=>{
        this.fonctions=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des fonctions');
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
