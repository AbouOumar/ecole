import { Component, Input, OnInit } from '@angular/core';
import { EmploiService } from '../../../../Service/Emplois/emploi.service';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-emploi-eleve-p',

  templateUrl: './emploi-eleve-p.component.html',
  styleUrl: './emploi-eleve-p.component.css'
})
export class EmploiElevePComponent implements OnInit{

    constructor(private listEleveService: ServiceEleveService,private emploiService: EmploiService ) {}


    textRechercheEnfant: string ='';
    eleve:any ; // Stocke les informations de l'élève
    data: any
    parent: any = null;
    emploiClasse: any[] = []
    actions: any[] = [];
    editModal: any;
    message: string="";
 @Input() user: User|null=null

    ngOnInit(): void {
      this.chargeInfo()
    }




    rechercheEmp(textRechercheEnfant:string){
      if(textRechercheEnfant){
        this.emploiService.getEmploiClasse(textRechercheEnfant).subscribe(
          (response)=>{
            this.emploiClasse= response
            if(!this.emploiClasse){
              this.emploiClasse=[]
            }
          },(error)=>{
            console.error("Erreur l'ors du chargement de l'emploi du temps",error)
          }
        )
      }
    }

    chargeInfo(){
      const id = this.user?.idDroit;  // Récupérer l'ID depuis l'URL
      if (id) {
        //recuperationd des informations de l'evele et ses parents
        this.listEleveService.getEleveParents(+id).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.eleve = response[0]; // L'élève est le premier élément du tableau
              this.rechercheEmp(this.eleve.classe.id)
            } else {
              console.error("Aucun parent trouvé pour cet élève.");
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
      }
    }


}
