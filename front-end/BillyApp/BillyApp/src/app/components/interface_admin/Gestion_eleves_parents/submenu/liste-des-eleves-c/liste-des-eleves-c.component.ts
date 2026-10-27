
import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../../../Service/Eleves/service-eleve.service';
import { Eleve } from '../../../../../Classes/Eleves/eleve';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ClasseService } from '../../../../../Service/Classes/classe.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { Ins_reins } from '../../../../../Classes/Inscription_reinscription/ins_reins';
import { ExportService } from '../../../../Service/Excel/export.service';
import { Toast, ToastrService } from 'ngx-toastr';
import * as XLSX from 'xlsx';
import { environment } from '../../../../../../environments/environment';
import { minAgeValidator } from '../../../../../validators/age-min'; 
declare var bootstrap: any;

@Component({
  selector: 'app-liste-des-eleves-c',
  templateUrl: './liste-des-eleves-c.component.html',
  styleUrl: './liste-des-eleves-c.component.css'
})
export class ListeDesElevesCComponent implements OnInit {
constructor(private fb: FormBuilder, private listEleveService: ServiceEleveService,
   private router: Router, private classeService: ClasseService,
  private anneeService: AnneeScolaireService,
  private excelService: ExportService,
  private toastr: ToastrService
) {}
elevesImportes: any[]= [] //Contient la liste chargée depuis le fichier Excel
messageExport: string = ""
isloading : boolean = true
isMasquer : boolean = false
eleves: any[] = []; //Contient la liste chargée depuis le fichier l'api
  parentsEleve: any[] = [];
  id_eleve?: number;
  selectedEleve: Eleve = new Eleve();
  editModal: any;
  editModal1: any;
  eleveForms!: FormGroup ;
  inscForm!: FormGroup ;
  selectedFile!: File;
  idSelected: number=0;
  message: string="";
  messageI: string="";
annees: any []=[];
textRechercheAnnee: string = "";
textRechercheEtat: string = "";
adresseIp: string = "";
textRechercheClasse: Number = 0;
fraisInscription: number =0;

classes: any []=[];

  textRecherche: string = "";
//EventEmitter: donné le type et c'est une class qui va nous permettre d'emette des evenements et ces event seron ecouté partout dans le projet qu'on utilisera le composent
// @Input() eleveParents: Eleve_typer | undefined
ngOnInit(): void {
  this.adresseIp=environment.ip
  this.chargeListEleve();
  this.chargeClasse();
  this.chargeAnneeScolaire()

  if(typeof bootstrap !== 'undefined'){
    this.editModal = new bootstrap.Modal(document.getElementById('modal_modifier_eleve')!);
    this.editModal1 = new bootstrap.Modal(document.getElementById('modal_inscription_eleve')!);
 }

     //Enregistrment eleve
     this.eleveForms = this.fb.group({
       matricule_eleve: [''],
       nom_eleve: ['', Validators.required],
       prenom_eleve: ['', Validators.required],
       genre_eleve: ['', Validators.required],
       Date_naiss: ['', [Validators.required, minAgeValidator(12)]],
       photo: [''],
       tel_eleve: [''],
       id: [''],
      //Fin Enregistrment eleve
     });

     this.inscForm = this.fb.group({
      dateIns: [''],
      type: [''],
      eleve_id: [''],
      classe_id: ['', Validators.required],
      annee_scolaire_id: ['', Validators.required],
      montant: ['', Validators.required],
      moyentPayement: [''],
    });
}

chargeListEleve():void{
  this.listEleveService.getListEleve().subscribe(
    (response: any[]) =>{
      this.eleves= response;
      this.isMasquer = true
      this.isloading = false
    },
    (error) => {
      console.error("Erreur lors du chargement des eleves", error);
      this.isMasquer = false
      this.isloading = true
    }
  )
}

// Gestion de l'importation Excel
  onFileChange(event: any): void {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = (e: any) => {
      const data = new Uint8Array(e.target.result);
      const workbook = XLSX.read(data, { type: 'array' });
      const worksheet = workbook.Sheets[workbook.SheetNames[0]];
      const imported = XLSX.utils.sheet_to_json(worksheet);
      this.elevesImportes = imported.map((e: any) => ({
        matricule_eleve: e.matricule || '',
        nom_eleve: e.nom || '',
        prenom_eleve: e.prenom || '',
        genre_eleve: e.sexe || '',
        classe_id: 0,
        classe: { nom_classe: '' },
        Date_naiss: e.date_naissance || '',
        telephone: e.telephone || '',
        image: e.photo || ''
      }));
      this.toastr.success('Importation réussie !', 'Succès');
    };
    reader.readAsArrayBuffer(file);
  }

  // Fusionner les élèves filtrés (importés + API)
  elevesFiltrés(): any[] {
    return [...this.elevesImportes, ...this.eleves];
  }

//Méthode d'export Excel utilisant le service ExcelService
exporterElevesAffiches(): void {
  // Étape 1 : on commence avec tous les élèves
  let elevesAffiches = this.eleves;

  // Étape 2 : filtrage par texte général (matricule, nom, prénom, genre, nom de classe)
  if (this.textRecherche && this.textRecherche.trim() !== '') {
    const text = this.textRecherche.toLowerCase();
    elevesAffiches = elevesAffiches.filter(eleve =>
      eleve.matricule_eleve?.toLowerCase().includes(text) ||
      eleve.nom_eleve?.toLowerCase().includes(text) ||
      eleve.prenom_eleve?.toLowerCase().includes(text) ||
      eleve.genre_eleve?.toLowerCase().includes(text) ||
      eleve.classe?.nom_classe?.toLowerCase().includes(text)
    );
  }

  // Étape 3 : filtrage par ID de classe
  if (this.textRechercheClasse && this.textRechercheClasse !== 0) {
    elevesAffiches = elevesAffiches.filter(eleve =>
      eleve.classe_id === this.textRechercheClasse
    );
  }

  // Étape 4 : filtrage par état eleve (exemple: si tu veux filtrer par classe_id via un état textuel)
  if (this.textRechercheEtat && this.textRechercheEtat.trim() !== '') {
    const etat = this.textRechercheEtat.toLowerCase();
    elevesAffiches = elevesAffiches.filter(eleve =>
      String(eleve.classe_id).toLowerCase() === etat
    );
  }

  //Récupérer seulement les champs à afficher
  const donneeAsExporter = elevesAffiches.map(eleve => ({
    Matricule: eleve.matricule_eleve,
    Nom: eleve.nom_eleve,
    Prénom: eleve.prenom_eleve,
    Sexe: eleve.genre_eleve,
    classe: eleve.nom_classe || 'Non inscrit',
    Téléphone: eleve.tel_eleve || '',
    'Date nais' : eleve.Date_naiss,
    image: eleve.photo || '',

  }))

  // Étape 5 : exporter les données filtrées
  this.excelService.exportAsExcel(donneeAsExporter, 'liste_des_eleves');

  //Toast de succès
  this.toastr.success('Exportation réussie !', 'Succès')

}




chargeParentsEleveId(id_eleve: Number):void{
  this.listEleveService.getEleveParents(id_eleve).subscribe(
    (response: any[])=>{
      this.router.navigate(['/dc9_ahaf/453rf3/4ie_6f/dc5_ahaf/366rf4/0ie_1f', id_eleve]);
    },
    (error)=>{
      console.error("Erreur lors du chargement des eleves et parent", error);
    }
  )
}

  onSubmitIns_reis() {
    if(this.inscForm.valid){
      const inscrire_reins: Ins_reins={
        dateIns:  new Date().toISOString().split('T')[0],
        type: "Inscription",
        eleve_id: this.idSelected,
        classe_id: this.inscForm.value.classe_id,
        annee_scolaire_id: this.inscForm.value.annee_scolaire_id,
        montant: this.inscForm.value.montant,
        moyentPayement: "Caisse"
      };


      this.listEleveService.Ins_reinscription(inscrire_reins).subscribe(
        (response:any)=>{
          this.messageI=response.message;
          // this.messageI="Inscription effectuée avec succès";
          this.chargeListEleve()
        },
        (error)=>{
          this.messageI="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }else{
      window.scrollTo(0,0);
      this.inscForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;

    }
  }


ouvreModal(id: number){
  if(!this.selectedEleve.photo){
    this.selectedEleve.photo = '';
  }
  const eleve= this.eleves.find(el => el.id === id);
      if(eleve){
        this.selectedEleve=eleve;
        this.eleveForms.patchValue({
          nom_eleve: eleve.nom_eleve,
          matricule_eleve: eleve.matricule_eleve,
          prenom_eleve: eleve.prenom_eleve,
          genre_eleve: eleve.genre_eleve,
          Date_naiss: eleve.Date_naiss,
          photo: eleve.photo,
          tel_eleve: eleve.tel_eleve,
          id: eleve.id,
        })
      }
      this.idSelected=id;

      this.message=""
      this.messageI=""
      this.clearFileInput();
}

clearFileInput(){
  const fileInput = document.getElementById('formFileLg') as HTMLInputElement;
  if(fileInput){
    fileInput.value='';
  }
}

  // Mise à jour de l'image
  onImageSelected(event: any) {
    const file = event.target.files[0]  // Récupère le premier fichier sélectionné

    if(file) {
      this.selectedFile = file;
      const reader = new FileReader();

 // Dès que la lecture de l'image est terminée

     reader.onload = () => {
      const imageElement = document.getElementById('imagePreview') as HTMLImageElement;
      imageElement.src = reader.result as string; // Met à jour la source de l'image
     };

     // Lire le fichier comme une URL de données
    reader.readAsDataURL(file);


  }
}

// Méthode pour envoyer les données au service

updateEleve() {
  const data ={
    "matricule_eleve": this.eleveForms.value.matricule_eleve,
    "nom_eleve": this.eleveForms.value.nom_eleve,
    "prenom_eleve": this.eleveForms.value.prenom_eleve,
    "genre_eleve": this.eleveForms.value.genre_eleve,
    "Date_naiss": this.eleveForms.value.Date_naiss,
    "tel_eleve": this.eleveForms.value.tel_eleve
  }

  this.listEleveService.modificationEleve(data, this.idSelected, this.selectedFile).subscribe(
      response => {
          this.chargeListEleve();
          this.message=response.message;
      },
      error => console.error('Erreur lors de la mise à jour :', error)
    );
}


// Filtrage par classe et année
chargeAnneeScolaire():void{
  this.anneeService.getAnneeScolaire().subscribe(
    (response:any[])=>{
      this.annees=response;
    },
    (error)=>{
      console.error('Erreur lors du chargement des années',error);
    }
  )
}
chargeClasse():void{
  this.classeService.getClasse().subscribe(
    (response:any[])=>{
      this.classes=response;
    },

    (error)=>{
      console.error('Erreur lors du chargement des classes',error);
    }
  )
}


onChangeClass(event:any):void{
  const classe_id= event.target.value;
  if(classe_id){
    this.classeService.getfraisClasse(classe_id).subscribe(
        (response : any)=>{
          this.fraisInscription=response.frais_inscription;
        },
        (error)=>{
          console.error('Erreur lors du chargement des frais',error);
        }

    )
  }else{
    this.fraisInscription=0;
  }
}


}
