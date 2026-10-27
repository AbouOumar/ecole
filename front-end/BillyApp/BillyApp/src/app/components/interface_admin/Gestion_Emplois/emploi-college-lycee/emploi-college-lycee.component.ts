import { ChangeDetectorRef, Component } from '@angular/core';
import { Emplois } from '../../../../Classes/Emploi/emplois';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { EmploiService } from '../../../../Service/Emplois/emploi.service';
import { response } from 'express';

@Component({
  selector: 'app-emploi-college-lycee',
  templateUrl: './emploi-college-lycee.component.html',
  styleUrls: ['./emploi-college-lycee.component.css']
})
export class EmploiCollegeLyceeComponent {
  classes: any[]=[]
  jours: string[] = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
  emploitDuTemps: any[] = []
  listeDesEmplois: any[] = []
  emploiLigne: any[] = []
  emploiClasse: any[] = []
  matieres: any;
  prof: any;
  matiereEnseigner: any[] = [];
  listeEmplois: any[] = [];
  selectedClasse: string = "";
  selectedMatiere: string = "";
  messageSuppression: string = "";
  selectedProf: string = "";
  erreurEmpoi: string=""
  message: string=""
  erreur: string=""
  valide: boolean=true
  valideiLigne: boolean=true
  idSelected: number=0


  profs: any[]=[];

  emploi: Emplois[] = [];

  masqueSupp: boolean = false

  constructor(private classesService: ClassesService, private emploiService: EmploiService, private cdRef: ChangeDetectorRef) {
    this.initialiserEmploi();
    this.chargeMatProfDroit()
    this.chargeListeEmploi()
  }

  initialiserEmploi() {
    this.emploi=[]
    this.jours.forEach(jour => {
      this.emploi.push({
        jour,
        debut: '',
        fin: '',
        matiere: '',
        prof: '',
        erreur: '',
        ajouteManuellement: false // ligne par défaut non supprimable
      });
    });
  }

  getLignesParJour(jour: string): Emplois[] {
    return this.emploi.filter(e => e.jour === jour);
  }

 onChangeMatiere(ligne: any,matiere_id: string, debut: string, fin: string){
    if(matiere_id !="" && (!debut || !fin || debut>= fin)){
      ligne.erreur="Horaire invalidé"
      this.valideiLigne=false
    }else{
      ligne.erreur=""
      this.valideiLigne=true
    }
 }
  getProfs(matiere_id: string, jour: string, debut: string, fin: string) {
    if(this.valideiLigne==true){
      const profInfo = this.matiereEnseigner?.find((matiere) =>
        matiere.matiere_id == matiere_id
      );
      return profInfo?.enseignants.filter((ens:any) =>{
        return !this.listeDesEmplois.some(emp =>
          emp.jour ===jour &&
          emp.personnel_id === ens.personnel_id &&
          this.seChevauchent(emp.heure_debut, emp.heure_fin, debut, fin)
        )
      }) ?? []
    }
  }

  ajouterLigne(jour: string): void {
    this.emploi.push({
      jour,
      debut: '',
      fin: '',
      matiere: '',
      prof: '',
      erreur: '',
      ajouteManuellement: true // ligne ajoutée → supprimable
    });
    this.masqueSupp = true
  }

  chargeMatProfDroit(){
    this.emploiService.getMatiereProf('DE').subscribe(
      (response)=>{
        this.classes=response.matProf
        this.listeEmplois=response.emplois
      },(error)=>{
        console.error("Erreur lors du chargement des informations")
      }
    )
  }

  chargeListeEmploi(){
    this.emploiService.getEmplois().subscribe(
      (response)=>{
        this.listeDesEmplois=response
      },(error)=>{
        console.error("Erreur lors du chargement des informations")
      }
    )
  }

  onChangeClasse(){
    this.matieres = this.classes.find((classe) =>
      classe.classe_id == this.selectedClasse
    );
    if(this.matieres){
      this.matiereEnseigner= this.matieres.matiereEnseigner
    }
  }

  supprimerLigne(ligne: Emplois): void {
    if (ligne.ajouteManuellement) {
      const index = this.emploi.indexOf(ligne);
      if (index > -1) {
        this.emploi.splice(index, 1);
        // this.masqueSupp = false
      }
    }

  }

  onSubmit(){
    this.emploiLigne=[] 
    this.jours.forEach(jour => {
      this.getLignesParJour(jour).forEach(ligne => {
        if(ligne.prof !='' && ligne.matiere !='' && ligne.debut !='' && ligne.fin !=''){
          this.emploiLigne.push({
            jour: jour,
            debut: ligne.debut,
            fin: ligne.fin,
            classe_id: this.selectedClasse,
            matiere_id: ligne.matiere,
            personnel_id: ligne.prof,
          });
        }
      });
    });

    if(this.emploiLigne.length<=0){
      this.erreurEmpoi='Veillez ellaborer l\'emploi du temps'
      setTimeout(()=>{
          this.erreurEmpoi=""
      },4000)
      return
    }else{
      this.emploiService.enregistrerMatiereProf(this.emploiLigne).subscribe(
        (response)=>{
          this.message=response.message
          this.initialiserEmploi();
          this.chargeMatProfDroit()
          this.chargeListeEmploi()
          setTimeout(()=>{
            this.message=""
        },4000)
        },(error)=>{
          console.error('Erreur l\'ors de l\'enregistrement',error)
        }
      )
    }

    


  }

  seChevauchent(d1: string, f1: string, d2: string, f2: string):boolean{
    return d1< f2 && d2<f1;
  }

  isHoraireValide(jour: string): boolean {
    const lignesDuJour = this.getLignesParJour(jour);
    for (let i = 0; i < lignesDuJour.length; i++) {
      const ligne1 = lignesDuJour[i];
  
      const debut1 = ligne1.debut;
      const fin1 = ligne1.fin;
  
      if (debut1 && fin1) {
        const d1 = new Date(`1970-01-01T${debut1}:00`);
        const f1 = new Date(`1970-01-01T${fin1}:00`);
  
        // Vérifie qu'il y a au moins 1h d'écart
        const diffMinutes = (f1.getTime() - d1.getTime()) / (1000 * 60);
        if (diffMinutes < 60) {
          this.valide=false
          this.erreur="min 1h"
          return false; // Moins de 1h ou fin < début
        }else{
          this.valide=true
        }
  
        // Vérifie les chevauchements avec les autres lignes du même jour
        for (let j = 0; j < lignesDuJour.length; j++) {
          if (i !== j) {
            const ligne2 = lignesDuJour[j];
            const d2 = new Date(`1970-01-01T${ligne2.debut}:00`);
            const f2 = new Date(`1970-01-01T${ligne2.fin}:00`);
  
            // Si les intervalles se chevauchent
            if (d1 < f2 && f1 > d2) {
              this.valide=false
              this.erreur="chevauchement"              
              return false;
            }
          }
        }
      }
    }
    return true;
  }

  get isFormValide(): boolean{
    return this.jours.every(jour =>this.isHoraireValide(jour));
  }

  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }

  ouvreModal(classe_id: string){
    this.emploiClasse=[]
    this.emploiService.getEmploiClasse(classe_id).subscribe(
      (response)=>{
        this.emploiClasse= response
      },(error)=>{
        console.error("Erreur l'ors du chargement de l'emploi du temps",error)
      }
    )
  }

  ouvreModalSupp(classe_id:number){
    this.idSelected=classe_id
  }

  supprimerEmploi(){
    this.emploiService.supprimeEmploi(this.idSelected).subscribe(
      (response)=>{
          this.messageSuppression=response
          this.chargeMatProfDroit()
          this.chargeListeEmploi()
      },(error)=>{
        console.error("Erreur l'ors de la suppression",error)
      }
    )
  }
}
