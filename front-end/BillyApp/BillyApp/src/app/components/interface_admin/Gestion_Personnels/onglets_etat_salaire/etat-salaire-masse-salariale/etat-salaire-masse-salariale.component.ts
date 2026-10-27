import { Component, OnInit } from '@angular/core';
import { SalaireService } from '../../../../../Service/Salaire/salaire.service';

@Component({
  selector: 'app-etat-salaire-masse-salariale',

  templateUrl: './etat-salaire-masse-salariale.component.html',
  styleUrl: './etat-salaire-masse-salariale.component.css'
})
export class EtatSalaireMasseSalarialeComponent implements OnInit {
  salaireGlobals: any[]=[]
constructor(private serviceSalaire: SalaireService){}
  ngOnInit(): void {
    this.chargeSalaireGlobal();
  }
  chargeSalaireGlobal() {
    this.serviceSalaire.etatSalaireGlobal().subscribe(
      (response)=>{
        this.salaireGlobals= response
      },(error)=>{
        console.error('Erreur lors du chargement de l\'etat de salaire global');
      }

    );
  }
}
