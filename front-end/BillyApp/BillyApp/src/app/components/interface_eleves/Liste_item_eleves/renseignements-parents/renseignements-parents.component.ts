import { Component, Input } from '@angular/core';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { ActivatedRoute } from '@angular/router';
import { User } from '../../../../Classes/Users/user';
import { environment } from '../../../../../environments/environment';

@Component({
  selector: 'app-renseignements-parents',

  templateUrl: './renseignements-parents.component.html',
  styleUrl: './renseignements-parents.component.css'
})
export class RenseignementsParentsComponent {
  eleves:any[] = [] ; // Stocke les informations de l'élève
  parent: any = null;
  personnels: any[] = [];
  classe: any = null;

  textRechercheEnfant: string ='';
  adresseIp: string ='';
  droit: string ='';
  id_eleve?: Number
  data: any
        @Input() user:User|null=null


  constructor(private parentService: ParentService,private router: ActivatedRoute) {}
  parentsEleve: any[] = [];

  ngOnInit(): void {
    this.adresseIp= environment.ip
    if(this.user?.Droit!="parent"){
      this.droit="personnel"
    }else{
      this.droit="parent"
    }
    const id = this.user?.idDroit; // Récupérer l'ID depuis l'URL
    const type = this.router.snapshot.paramMap.get(this.droit);  // Récupérer le type depuis l'URL
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



    }
  }



onPrint() {
  window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
}
}
