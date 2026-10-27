import { Component, OnInit } from '@angular/core';
import { ServiceNoterService } from '../../../../Service/Notes/service-noter.service';
import { AnneeScolaireService } from '../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-resultat-trimestriel-censeur',
  templateUrl: './resultat-trimestriel-censeur.component.html',
  styleUrls: ['./resultat-trimestriel-censeur.component.css']
})
export class ResultatTrimestrielCenseurComponent implements OnInit{
  IsEntete : boolean = false
  selectedClasseId!: number;
  selectedAnneeId!: number;
  selectedSemestre!: number;
  classes: any[]=[];
  matieres: any[]=[];
  annees: any[]=[];
  notes: any[] = [];
  moisSemestre: any[] = [];
  textRecherche: string = '';
  user: User = new User();

  constructor(private userService:UserService ,private classeService: ClassesService,private notesService: ServiceNoterService,private anneeService: AnneeScolaireService){}
  ngOnInit(): void {
    this.user=this.userService.getUser()
    if(this.user){
      this.chargerClasseDroit(this.user.Droit)
    }
    
    this.chargeAnneeScolaire()
  }
  chargerNotesClasse() {
    if(this.selectedClasseId && this.selectedAnneeId && this.selectedSemestre){
      this.notesService.getNotesClasseSemestrielle(this.selectedClasseId, this.selectedAnneeId, this.selectedSemestre)
      .subscribe((response) => {
        this.notes = response
      });
    }else{
      this.notes=[]
    }
  }

  showEntete(){
    // this.IsEntete = true
  }

   // Impression

imprimer() {
  setTimeout(() => {
    const printContents = document.getElementById('section-a-imprimerNote')?.innerHTML;
    const originalContents = document.body.innerHTML;

    if (printContents) {
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.location.reload(); // pour restaurer le DOM après impression
    }
  }, 500); // délai pour que le DOM se stabilise
}

  chargerClasseDroit(droit: string): void{
    this.classeService.getListClassDroit(droit).subscribe(
      (response: any[])=>{
        this.classes = response;
      },
      (error) => {
        console.error("Erreur lors du chargement des notes", error);
      }
    )
  }
  chargeAnneeScolaire():void{
    this.anneeService.getAnneeScolaire().subscribe(
      (response:any[])=>{
        this.annees=response;
        if(this.annees.length >0){
          this.selectedAnneeId=this.annees[0].id;
        }
      },
      (error)=>{
        console.error('Erreur lors du chargement des années',error);
      }
    )
  }

}
