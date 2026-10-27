import { Component, OnInit } from '@angular/core';
import { ParentService } from '../../../../../Service/Parent/parent.service';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder } from '@angular/forms';
import { environment } from '../../../../../../environments/environment';

@Component({
  selector: 'app-liste-des-parents-avec-ses-enfants',
  templateUrl: './liste-des-parents-avec-ses-enfants.component.html',
  styleUrl: './liste-des-parents-avec-ses-enfants.component.css'
})
export class ListeDesParentsAvecSesEnfantsComponent implements OnInit {

    eleves:any[] = [] ; // Stocke les informations de l'élève
    parent: any = null;
    personnels: any[] = [];
    classe: any = null;
    actions: any[] = [];
    textRechercheEnfant: string ='';
    adresseIp: string ='';
    id_eleve?: Number
    data: any
    

    constructor(private parentService: ParentService,private router: ActivatedRoute) {}
    parentsEleve: any[] = [];

    ngOnInit(): void {
      this.adresseIp=environment.ip
      const id = this.router.snapshot.paramMap.get('id');  // Récupérer l'ID depuis l'URL
      const type = this.router.snapshot.paramMap.get('type');  // Récupérer le type depuis l'URL
      if (id ) {
        //recuperationd des informations de l'evele et ses parents
        if(type=="PersonnelParent"){
          this.data= {
            id: id,
            type: "personnel"
          }
          this.parentService.getPersonelEleve(+id).subscribe(
            (response: any[]) => {
              if (response.length > 0) {
                this.parent = response[0]; // Le parent est le premier élément du tableau
                this.eleves = this.parent.eleves || [];
              } else {
                console.error("Aucun élève trouvé pour cet parent.");
              }
            },
            (error) => {
              console.error("Erreur lors du chargement des informations", error);
            }
          );
        }else{
          this.data= {
            id: id,
            type: "parent"
          }
          this.parentService.getParentsEleve(+id).subscribe(

            (response: any[]) => {
              if (response.length > 0) {
                this.parent = response[0]; // Le parent est le premier élément du tableau
                this.eleves = this.parent.eleves || [];
              } else {
                console.error("Aucun élève trouvé pour cet parent.");
              }
            },
            (error) => {
              console.error("Erreur lors du chargement des informations", error);
            }
          );
        }


        //recuperation de la liste des actions de l'eleve
        this.parentService.getParentActions(this.data).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.actions = Array.isArray(response) ? response : [];
            } else {
              console.error("Aucune action trouvé pour cet parent.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
      }
    }



  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }
}
