import { Component, OnInit } from '@angular/core';
import { ServiceCompteService } from '../../../../../Service/Compte/service-compte.service';

@Component({
  selector: 'app-les-balances',

  templateUrl: './les-balances.component.html',
  styleUrl: './les-balances.component.css'
})
export class LesBalancesComponent implements OnInit {
  constructor(private serviceBalance: ServiceCompteService) {}

  listeBalance: any []=[]
  textRecherche:string=''
  anneeEncours:string=''
  ngOnInit(): void {
    this.chargeListeBalance();
  }
  chargeListeBalance() {
    this.serviceBalance.getBalance().subscribe(
      (response: any) =>{
        this.listeBalance = response.liste
        this.anneeEncours=response.annee
      },
      (error) =>{
        console.error("Erreur lors du chargement de la liste de la balance",error)
      }

    )
  }

}
