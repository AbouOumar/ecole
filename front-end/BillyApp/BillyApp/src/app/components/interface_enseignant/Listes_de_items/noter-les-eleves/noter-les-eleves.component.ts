import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { ServiceNoterService } from '../../../../Service/Notes/service-noter.service';
import { Noter } from '../../../../Classes/Noter/noter';
import { ToastrService } from 'ngx-toastr';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { AnneeScolaireService } from '../../../../Service/Annee_scolaire/annee-scolaire.service';
import { User } from '../../../../Classes/Users/user';
import { UserService } from '../../../../Service/User/user.service';


@Component({
  selector: 'app-noter-les-eleves',
  templateUrl: './noter-les-eleves.component.html',
  styleUrl: './noter-les-eleves.component.css'
})
export class NoterLesElevesComponent implements OnInit {


   selectedClasseId!: number;
    selectedMatiere!: number;
    selectedAnneeId!: number;
    selectedSemestre!: number;
    classes: any[]=[];
    matieres: any[]=[];
    annees: any[]=[];
    semestreMois: any[]=[];
    lesMois: any[]=[];
    constructor(private userService: UserService,private toastr: ToastrService,private eleveService: ServiceEleveService, private ServiceNoterService: ServiceNoterService,
    private notesService: ServiceNoterService,private classeService: ClassesService,private anneeService: AnneeScolaireService) { }


      noter= new Noter;
      selectionneType: string = '';
      textRecherche: string = '';
      afficheOraleEtEcrite: boolean = false;
      afficheComposition: boolean = false;

      matriculeRecherche: string = '';  // Le matricule recherché
      moisSelectionne: string = 'Tous';
      nomEleve: string = '';            // Nom de l'élève
      prenomEleve: string = '';        // Prénom de l'élève
      id: number = 0;
      notes: any[] = [];
      moisSemestre: any[] = [];
      // Exemple d'un tableau d'élèves (simulé ici, à remplacer par une API ou service)
      eleves: any[] = [];
      eleveRechercher: any;
      user:User|null=null

      ngOnInit(): void {
        this.user = this.userService.getUser()
        if(this.user){
        this.chargerClasseEnseignant(this.user?.idDroit)
        this.chargerMatiereEnseignant(this.user?.idDroit)
        }

        this.chargeAnneeScolaire()
        this.chargeServiceAnneeScolaire()
      }

      enregistrerNote(note: any, type: string, mois: string, eleve_id: number){
        let nouvelleValeur: number | null=null;
        let ancienneValeur: number | null=null;

        if(type==='orale'){
          nouvelleValeur = note.orale;
          ancienneValeur = note.old_note_orale;
        }else if(type==='ecrit'){
          nouvelleValeur = note.ecrit;
          ancienneValeur = note.old_note_ecrit;
        }else if(type==='compo'){
          nouvelleValeur = note.compo;
          ancienneValeur = note.old_note_compo;
        }

        if(nouvelleValeur){
          if(nouvelleValeur! <0 || nouvelleValeur! > 20){
            const inputElement = event?.target as HTMLInputElement;
            setTimeout(()=> inputElement.focus(),0);
            this.toastr.error('Note invalide', 'Erreur')
            return
          }

          //ne rien faire si la note n'a pas changé
          if(nouvelleValeur === ancienneValeur){
            return
          }

          //Préparer les données à envoyer
          const payload: any = {
            eleve_id: eleve_id,
            classe_id: this.selectedClasseId,
            matiere_id: this.selectedMatiere,
            annee_scolaire_id: this.selectedAnneeId,
            semestre: this.selectedSemestre,
            mois: mois,
            type_note: type === 'compo' ? 'Composition' : 'Evaluation'
          };

          if (type === 'orale') payload.note_orale = nouvelleValeur;
          if (type === 'ecrit') payload.note_cours = nouvelleValeur;
          if (type === 'compo') payload.note_composition = nouvelleValeur;

          this.notesService.enregistrerOuModifierNote(payload).subscribe(
            (res) => {
              this.toastr.success(res.message, 'Succès')
              // Mettre à jour l’ancienne valeur
              if (type === 'orale') note.old_note_orale = nouvelleValeur;
              if (type === 'ecrit') note.old_note_ecrit = nouvelleValeur;
              if (type === 'compo') note.old_note_compo = nouvelleValeur;
            },
            (err) => {
              console.error('Erreur lors de l’enregistrement', err);
            }
          );
        }
      }

    chargerNotesMatiereClasse() {
      if(this.selectedClasseId && this.selectedAnneeId && this.selectedSemestre && this.selectedMatiere){
        this.notesService.getNotesClasseSemestre(this.selectedClasseId, this.selectedAnneeId, this.selectedSemestre,this.selectedMatiere)
        .subscribe((response) => {
          this.notes = response.map(eleve => {
            //enrichir les notes avec anciennes valeurs
            const enrichedNotes = eleve.notes.map((note: any)=>({
              ...note,
              old_note_orale: note.orale,
              old_note_ecrit: note.ecrit,
              old_note_compo: note.compo
            }));
            return {
              ...eleve,
              notes: enrichedNotes
            }
          })
          //recuperation des mois
          if (this.notes.length > 0) {
            this.moisSemestre = this.notes[0].notes.map((n:any) => n.mois);
          }
        });
      }else{
        this.notes=[]
      }
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

    chargeServiceAnneeScolaire():void{
      this.anneeService.getSemestreAnneeScolaire().subscribe(
        (response:any[])=>{
          this.semestreMois=response;
        },
        (error)=>{
          console.error('Erreur lors du chargement des années',error);
        }
      )
    }



    chargerClasseEnseignant(id: number): void{
      this.classeService.getListClassEnseignant(id).subscribe(
        (response: any)=>{
          this.classes = response;
        },
        (error) => {
          console.error("Erreur lors du chargement des notes", error);
        }
      )
    }

    chargerMatiereEnseignant(id: number): void{
      this.classeService.getListMatiereEnseignant(id).subscribe(
        (response: any)=>{
          this.matieres = response.matieres
        },
        (error) => {
          console.error("Erreur lors du chargement des notes", error);
        }
      )
    }

}
