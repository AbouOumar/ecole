import { Component, Input, OnInit } from '@angular/core';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { ActivatedRoute } from '@angular/router';
import { EmploiService } from '../../../../Service/Emplois/emploi.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-emploi-parents-enfant',

  templateUrl: './emploi-parents-enfant.component.html',
  styleUrl: './emploi-parents-enfant.component.css'
})
export class EmploiParentsEnfantComponent implements OnInit {

    constructor(private parentService: ParentService,private router: ActivatedRoute, private emploiService: EmploiService ) {}


  textRechercheEnfant: string ='';
  eleves:any[] = [] ; // Stocke les informations de l'élève
  data: any
  parent: any = null;
  emploiClasse: any[] = []
  @Input() user: User|null=null
  droit: string=""

  ngOnInit(): void {
    if(this.user?.Droit!="parent"){
      this.droit="personnel"
    }else{
      this.droit="parent"
    }
    const id = this.user?.idDroit;  // Récupérer l'ID depuis l'URL
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
              this.eleves = this.eleves || [];
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


}
