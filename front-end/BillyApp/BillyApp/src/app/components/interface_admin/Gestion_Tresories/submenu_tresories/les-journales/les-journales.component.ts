import { Component, OnInit } from '@angular/core';
import { ServiceCompteService } from '../../../../../Service/Compte/service-compte.service';

@Component({
  selector: 'app-les-journales',

  templateUrl: './les-journales.component.html',
  styleUrl: './les-journales.component.css'
})
export class LesJournalesComponent implements OnInit {
  constructor(private serviceJournal: ServiceCompteService , private serviceCompte: ServiceCompteService){}

  journalList: any[] = []
  compte: any[]=[];
  textRecherche: string = '';
  textRechercheType: string = '';
  textRechercheCompte: string = '';

  ngOnInit(): void {
    this.chargeJournalList();
    this.chargeCompte();
  }
  chargeJournalList() {
    this.serviceJournal.getJournal().subscribe(
      (response) =>{
        this.journalList = response
      },
      (error) =>{
        console.error("Erreur lors du chargement de la liste du journal",error)
      }
    )
  }

  chargeCompte(){
    this.serviceCompte.getCompte().subscribe(
      (response)=>{
        this.compte = response
      },
      (error) =>{
        console.error("Erreur lors du chargment des compte.",error)
      }
    )

  }

}
