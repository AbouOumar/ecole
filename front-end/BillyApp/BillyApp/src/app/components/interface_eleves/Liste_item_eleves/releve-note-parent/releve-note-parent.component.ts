import { Component, Input } from '@angular/core';
import { ServiceNoterService } from '../../../../Service/Notes/service-noter.service';
import { ActivatedRoute } from '@angular/router';
import { ParentService } from '../../../../Service/Parent/parent.service';
import { User } from '../../../../Classes/Users/user';
declare var bootstrap: any;

@Component({
  selector: 'app-releve-note-parent',

  templateUrl: './releve-note-parent.component.html',
  styleUrl: './releve-note-parent.component.css'
})
export class ReleveNoteParentComponent {
isLoaded: boolean = false;
  classes: any[]=[];
  bulletinEleve: any;
  bulletins: any[]=[];
  textRechercheEnfant: string ='';
 editModal: any;
textRecherche: string = '';
moisDynamiques: string[] = [];
matricule: string ='';
droit: string ='';
eleves:any[] = [] ; // Stocke les informations de l'élève
parent: any = null;
data: any
      @Input() user:User|null=null
  constructor(private parentService: ParentService,private router: ActivatedRoute,private notesService: ServiceNoterService){}
  bulletinData: any;


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

      window.scrollTo(0,0)
      if(typeof bootstrap !== 'undefined'){
        this.editModal = new bootstrap.Modal(document.getElementById('voirBulletin')!);
      }

    }
  }

  rechercheSco(textRechercheEnfant:string){
    const eleveMatricule= this.eleves.find((eleve)=>
      eleve.id==textRechercheEnfant
    )
    if(eleveMatricule){
      this.chargeListeBulletin(eleveMatricule.id)
    }else{
      this.bulletinEleve=[]
      this.bulletins=[]
    }

  }



  clickScroller(){
    window.scrollTo(0,0);

  }


  chargeListeBulletin(id:number):void{
    this.notesService.getBulletinsDispoEl(id).subscribe(
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
