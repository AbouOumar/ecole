import { Component, Input } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { ActivatedRoute } from '@angular/router';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { Parents } from '../../../../Classes/Parents/parents';
import { User } from '../../../../Classes/Users/user';
import { environment } from '../../../../../environments/environment';

@Component({
  selector: 'app-renseignements-eleve',

  templateUrl: './renseignements-eleve.component.html',
  styleUrl: './renseignements-eleve.component.css'
})
export class RenseignementsEleveComponent {
  eleve: any = null; // Stocke les informations de l'élève
    parents: any[] = [];
    personnels: any[] = [];
    classe: any = null;
    actions: any[] = [];
    editModal: any;
    parentForms!: FormGroup ;
    idSelected: number=0;
    message: string="";
    adresseIp: string="";
    parent: Parents=new Parents()
    nbParent:number=0
          @Input() user:User|null=null




  constructor(private fb: FormBuilder,private listEleveService: ServiceEleveService,private router: ActivatedRoute,private serviceParent: ParentService) {}
  parentsEleve: any[] = [];

  ngOnInit(): void {
    this.adresseIp= environment.ip
      this.chargeInfo()
      //Enregistrment parent

  }
  chargeInfo(){
    const id = this.user?.idDroit;  // Récupérer l'ID depuis l'URL
    if (id) {
      //recuperationd des informations de l'evele et ses parents
      this.listEleveService.getEleveParents(+id).subscribe(
        (response: any[]) => {
          if (response.length > 0) {
            this.eleve = response[0]; // L'élève est le premier élément du tableau
            this.parents = this.eleve.parents || [];
            this.personnels = this.eleve.personnels || [];
            this.nbParent= this.parents.length+this.personnels.length
            this.classe = this.eleve.classe || null;
          } else {
            console.error("Aucun parent trouvé pour cet élève.");
          }
        },
        (error) => {
          console.error("Erreur lors du chargement des informations", error);
        }
      );

          //recuperation de la liste des actions de l'eleve
          this.listEleveService.getEleveActions(+id).subscribe(
            (response: any[]) => {
              if (response.length > 0) {
                this.actions = Array.isArray(response) ? response : [];
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
