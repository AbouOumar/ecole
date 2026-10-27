import { Component, OnInit } from '@angular/core';
import { Emplois } from '../../../../Classes/Emploi/emplois';
import { EmploiService } from '../../../../Service/Emplois/emploi.service';

@Component({
  selector: 'app-affectation-emploi-cen',

  templateUrl: './affectation-emploi-cen.component.html',
  styleUrl: './affectation-emploi-cen.component.css'
})
export class AffectationEmploiCenComponent implements OnInit{
  listeEmplois: any[] = [];
  emploiEnseignant: any[] = []
    constructor(private emploiService: EmploiService) {}
    ngOnInit(): void {
      this.chargeListeEmploi()
    }

    ouvreModal(personnel_id: number){
      this.emploiEnseignant=[]
      this.emploiService.getEmploisParProf(personnel_id).subscribe(
        (response)=>{
          this.emploiEnseignant= response
        },(error)=>{
          console.error("Erreur l'ors du chargement de l'emploi du temps",error)
        }
      )
    }

    chargeListeEmploi(){
      this.emploiService.getEmploisProf().subscribe(
        (response)=>{
          this.listeEmplois=response
        },(error)=>{
          console.error("Erreur lors du chargement des informations")
        }
      )
    }
}
