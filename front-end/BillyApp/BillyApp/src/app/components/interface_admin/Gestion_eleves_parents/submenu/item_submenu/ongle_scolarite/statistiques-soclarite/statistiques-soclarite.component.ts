import { Component, OnInit } from '@angular/core';
import { PayementService } from '../../../../../../../Service/Payements/payement.service';
import { response } from 'express';

@Component({
  selector: 'app-statistiques-soclarite',
 
  templateUrl: './statistiques-soclarite.component.html',
  styleUrl: './statistiques-soclarite.component.css'
})
export class StatistiquesSoclariteComponent implements OnInit{
  listeImpaye: any[]=[]
  totaux: any
  constructor(private servisePayement: PayementService){}
  ngOnInit(): void {
    this.chargeListeImpaye();
  }
  chargeListeImpaye() {
    this.servisePayement.getListeImpayer().subscribe(
      (response)=>{
        this.listeImpaye=response.impayes
        this.totaux=response.totaux
      },(error)=>{
        console.error('Erreur lors du chargement de la liste des impayes')
      }
    )
  }

}
