import { Component, OnInit } from '@angular/core';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { PayementService } from '../../../../../Service/Payements/payement.service';

@Component({
  selector: 'app-payement-salaire-pers-annule',
  templateUrl: './payement-salaire-pers-annule.component.html',
  styleUrl: './payement-salaire-pers-annule.component.css'
})
export class PayementSalairePersAnnuleComponent implements OnInit{
  annees: any[]=[]
  payementSalaires: any[]=[]
  idSelected!: number
  messaged: string=""
  textRecherche: string ='';
  textRechercheAnnee: string = "";
  textRechercheMois: string = "";
  anneEncoursId: string = '';
  constructor(private anneeService: AnneeScolaireService, private payementService: PayementService){}
  ngOnInit(): void {
    this.chargeAnneeScolaire();
    this.chargeListePayementSalaire()
  }
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

  chargeListePayementSalaire():void{
    this.payementService.listePaiementSalaire().subscribe(
      (response:any)=>{
        this.payementSalaires=response.liste;
        this.anneEncoursId=response.anneEncours
      },
      (error)=>{
        console.error('Erreur lors de l\'annulation de payement de salaire',error);
      }
    )
  }

  annulerPayementSalaire():void{
    this.payementService.AnnulerPayementSalaire(this.idSelected).subscribe(
      (response:any)=>{
        this.messaged=response.message
        this.chargeListePayementSalaire()
        setTimeout(()=>{
          this.messaged=""
        },3000)
      },
      (error)=>{
        console.error('Erreur lors du chargement des payements de salaire',error);
      }
    )
  }

  ouvreModal(id:number){
    this.idSelected=id
  }
}
