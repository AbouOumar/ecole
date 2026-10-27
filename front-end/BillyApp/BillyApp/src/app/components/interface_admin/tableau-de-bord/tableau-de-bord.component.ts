import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../Service/Eleves/service-eleve.service';
import {
  ChartOptions,
  ChartType,
  ChartData
} from 'chart.js';

@Component({
  selector: 'app-tableau-de-bord',
  templateUrl: './tableau-de-bord.component.html',
  styleUrls: ['./tableau-de-bord.component.css']
})
export class TableauDeBordComponent implements OnInit {
  constructor(private serviceEleve: ServiceEleveService) {}

  tataux: any = [];
  donnees: any[] = [];
  donneesTotaux: any;
  isloading: boolean = true

  masquer : boolean =false

  // BAR CHART (Recettes/Dépenses)
  barChartData: ChartData<'bar', number[], string> = {
    labels: [],
    datasets: []
  };

  barChartOptions: ChartOptions<'bar'> = {
    responsive: true,
    plugins: {
      legend: {
        position: 'top'
      }
    }
  };

  barChartType: ChartType = 'bar';

  // PIE CHART (Répartition matières)
  pieChartData: ChartData<'pie', number[], string> = {
    labels: [],
    datasets: []
  };

  pieChartOptions: ChartOptions<'pie'> = {
    responsive: true,
    plugins: {
      legend: {
        position: 'left'
      }
    }
  };

  pieChartType: ChartType = 'pie';

  ngOnInit(): void {
    window.scrollTo(0, 0);
    this.chargeDashbord();
  }

  chargeDashbord() {
    this.serviceEleve.getDasbord_comptable().subscribe(
      (response) => {
        this.tataux = response;
        this.donnees = response.recetteDepense;
        this.donneesTotaux = response.recetteDepenseTotaux;

        const labels = this.donnees.map(item => item.mois);
        const recettes = this.donnees.map(item => item.recettes);
        const depenses = this.donnees.map(item => item.depenses);

        this.barChartData = {
          labels: labels,
          datasets: [
            { data: recettes, label: 'Recettes', backgroundColor: '#4caf50' },
            { data: depenses, label: 'Dépenses', backgroundColor: '#f44336' }
          ]
        };

        //graphique en cercle
        const repartition = response.recetteDepenseTotaux;
        this.pieChartData={
          labels: [
            'Total payement Scolarité',
            'Total Payement Salaire',
            'Total Ré-Inscription',
            'Autre Recette',
            'Autre Depense'
          ],
          datasets: [
            {
              data:[
                this.donneesTotaux.payementAnnee,
                this.donneesTotaux.payementSalaireAnnee,
                this.donneesTotaux.insReinAnnee,
                this.donneesTotaux.recettesAnnee,
                this.donneesTotaux.depensesAnnee
              ]
          ,
          backgroundColor:['#4caf50','#2196f3', '#ff9800', '#9c27b0', '#f44336']

        }
      ],
        }

        this.isloading = false
        this.masquer = true


      },
      (error) => {
        console.error("Erreur lors du chargement du dashboard", error);
        this.isloading = true
        this.masquer = false
      }
    );
  }
}
