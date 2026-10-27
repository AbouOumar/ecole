import { Component, OnInit } from '@angular/core';
import { PayementService } from '../../../../../../../Service/Payements/payement.service';
import { ClasseService } from '../../../../../../../Service/Classes/classe.service';

@Component({
  selector: 'app-liste-des-impaye',

  templateUrl: './liste-des-impaye.component.html',
  styleUrl: './liste-des-impaye.component.css'
})
export class ListeDesImpayeComponent implements OnInit {
  constructor(private servicePayement: PayementService, private classeService: ClasseService){}


  listeImpaye: any[]=[]
  totaux: any
  textRechercheClasse: Number = 0;
  classes: any []=[];
  textRecherche: string = "";



  ngOnInit(): void {
    this.chargeListeImpaye();
    this.chargeClasse();
  }
  chargeListeImpaye() {
    this.servicePayement.getListeImpayer().subscribe(
      (response)=>{
        this.listeImpaye=response.impayes
        this.totaux=response.totaux
      },(error)=>{
        console.error('Erreur lors du chargement de la liste des impayes')
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
