import { Component, OnInit } from '@angular/core';
import { ServiceNoterService } from '../../../../Service/Notes/service-noter.service';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { AnneeScolaireService } from '../../../../Service/Annee_scolaire/annee-scolaire.service';
import { User } from '../../../../Classes/Users/user';
import { UserService } from '../../../../Service/User/user.service';
declare var bootstrap: any;
@Component({
  selector: 'app-organiser-eva-senceur',

  templateUrl: './organiser-eva-senceur.component.html',
  styleUrl: './organiser-eva-senceur.component.css'
})
export class OrganiserEvaSenceurComponent implements OnInit {

  isLoaded: boolean = false;
  selectedClasseId!: number;
  selectedAnneeId!: number;
  selectedSemestre!: number;
  classes: any[]=[];
  bulletinEleve: any;
  bulletins: any[]=[];
 annees: any[]=[];
 editModal: any;
textRecherche: string = '';
moisDynamiques: string[] = [];
user: User = new User()
  constructor(private userService: UserService,private classeService: ClassesService,private notesService: ServiceNoterService,private anneeService: AnneeScolaireService){}
  bulletinData: any;
  ngOnInit(): void {
    this.user=this.userService.getUser()
    window.scrollTo(0,0)
    if(typeof bootstrap !== 'undefined'){
      this.editModal = new bootstrap.Modal(document.getElementById('voirBulletin')!);
    }
    if(this.user){
      this.chargerClasseDroit(this.user.Droit)
    }
    
    this.chargeAnneeScolaire()
    this.chargeListeBulletin()


  }




  clickScroller(){
    window.scrollTo(0,0);

  }


imprimer() {
  setTimeout(() => {
    const printContents = document.getElementById('voirBulletin')?.innerHTML;
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

  chargeListeBulletin():void{
    this.notesService.getBulletinsDisponibles().subscribe(
      (response:any[])=>{
        this.bulletins=response;
      },
      (error)=>{
        console.error('Erreur lors du chargement des bulletins',error);
      }
    )
  }


  onOuvreModal(selectedClasseId:number,selectedAnneeId:number,selectedSemestre:number,selectedEleve:number) {
      this.notesService.getBulletinEleve(selectedClasseId, selectedAnneeId, selectedSemestre,selectedEleve)
      .subscribe((response) => {
        this.bulletinEleve = response
        if(this.bulletinEleve?.matieres?.length){
          const noteskeys = Object.keys(this.bulletinEleve.matieres[0].notes || {});
          this.moisDynamiques=noteskeys.filter(m => m !== 'composition')
        }
      });
  }





}
