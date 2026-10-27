import { Component, Input } from '@angular/core';
import { ServiceNoterService } from '../../../../Service/Notes/service-noter.service';
import { User } from '../../../../Classes/Users/user';
declare var bootstrap: any;

@Component({
  selector: 'app-releve-note-eleve',
 
  templateUrl: './releve-note-eleve.component.html',
  styleUrl: './releve-note-eleve.component.css'
})
export class ReleveNoteEleveComponent {
isLoaded: boolean = false;
  classes: any[]=[];
  bulletinEleve: any;
  bulletins: any[]=[];
 editModal: any;
textRecherche: string = '';
moisDynamiques: string[] = [];
id:number=0
      @Input() user:User|null=null
  constructor(private notesService: ServiceNoterService){}
  bulletinData: any;
  ngOnInit(): void {
    window.scrollTo(0,0)
    if(typeof bootstrap !== 'undefined'){
      this.editModal = new bootstrap.Modal(document.getElementById('voirBulletin')!);
    }
    if(this.user?.idDroit!=undefined){
      this.id=this.user?.idDroit
      this.chargeListeBulletin(this.user?.idDroit)
    }else{
      return
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
