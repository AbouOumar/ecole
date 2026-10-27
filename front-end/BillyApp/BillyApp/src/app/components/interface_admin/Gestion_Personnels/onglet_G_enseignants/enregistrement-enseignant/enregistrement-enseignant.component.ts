import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FonctionService } from '../../../../../Service/Fonction/fonction.service';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { MatiereService } from '../../../../../Service/Matiere/matiere.service';
import { Personnel } from '../../../../../Classes/Personnel/personnel';
import { minAgeValidator } from '../../../../../validators/age-min'; 
import { environment } from '../../../../../../environments/environment';


@Component({
  selector: 'app-enregistrement-enseignant',

  templateUrl: './enregistrement-enseignant.component.html',
  styleUrl: './enregistrement-enseignant.component.css'
})
export class EnregistrementEnseignantComponent implements OnInit {
  personnelForm!: FormGroup ; // "!" est utilisé pour dire que enseignantForm ne serait jamais undefined
    inscForm!: FormGroup;
    message: string = '';
    pj_error: string = '';
    cv_error: string = '';
    messaged: string = '';
    messageAffecter: string = '';
    messageFonction: string = '';
    image_error: string = '';
    messageInscription: string = '';
    messageRechercher: string = '';
    id_enseignant?: number;
    id_fonction: number=0;
    fraisInscription: number =0;
    classes: any []=[];
    matieres: any []=[];
    enseignantTrouves: Personnel|null=null;
    annees: any []=[];
    fonctions: any[]=[]
    annee2: Date= new Date();
    selectedFile: File | null = null;
    selectedFileCV: File | null = null;
    selectedFilePJ: File | null = null;
    adresseIp: string =""
    imgPreview:string=''


    rechercherMartricule: string = ''
    enseignant: any = null
    matieresSelectionnees: number[] = []


    constructor(private serviceFonction: FonctionService,private fb: FormBuilder,private personnelService: PersonnelService, private serviceMatiere: MatiereService ){}

    ngOnInit(){
      this.adresseIp =environment.ip
      this.imgPreview =this.adresseIp+':8000/storage/images/profile/avatar.png'

      this.chargeFonction()
      this.chargeMatieres()
      //Enregistrment enseignant et parents
      this.personnelForm = this.fb.group({
        nom_personnel: ['', Validators.required],
        prenom_personnel: ['', Validators.required],
        genre_personnel: ['', Validators.required],
        date_nais_personnel: ['', [Validators.required, minAgeValidator(18)]],
        tel_personnel: ['', Validators.required],
        photo: [''],
        adresse_personnel: ['', Validators.required],
        mail_personnel: ['', Validators.email],
        cv: [''],
        peice_jointe: [''],
        contact_urgence: ['', Validators.required],
        lien_parente: ['', Validators.required],

        fonction: ['', Validators.required],
        taux_horaire: [''],
        salaire_base: [''],
       //Fin Enregistrment personnel
      });

    }
    chargeFonction(){
      this.serviceFonction.getFonction().subscribe(
        (response:any[])=>{
          this.fonctions=response
        },
        (error)=>{
          console.error('Erreur lors du chargement des fonctions');
        }
      )
    }

    affiche(){
      this.id_fonction= this.personnelForm.value.fonction
    }



      //Enregistrment enseignant et parents
    onSubmit() {
      this.messageFonction=""
      this.cv_error=""
      this.pj_error=""
      this.image_error=""
      this.message=""
      this.messaged=""
      if(this.personnelForm.valid){
            var formData = new FormData();
            if(this.personnelForm.value.fonction != 1){
              if(!this.personnelForm.value.salaire_base){
                this.messageFonction="Le salaire de base est obligatoire pour un responsable."
                return;
              }else{

                formData.append("salaire_base",this.personnelForm.value.salaire_base);
                formData.append("taux_horaire","0");
              }
            }else if(this.personnelForm.value.fonction == 1){
              if(!this.personnelForm.value.taux_horaire){
                this.messageFonction="Le taux horaire est obligatoire pour un enseignant."
                return;
              }else{
                formData.append("salaire_base","0");
                formData.append("taux_horaire",this.personnelForm.value.taux_horaire);
              }
            }
            if(this.selectedFile){
              formData.append("photo",this.selectedFile);
            }

            if(this.selectedFileCV){
              formData.append("cv",this.selectedFileCV);
            }
            if(this.selectedFilePJ){
              formData.append("peice_jointe",this.selectedFilePJ);
            }
            formData.append("nom_personnel",this.personnelForm.value.nom_personnel);
            formData.append("prenom_personnel",this.personnelForm.value.prenom_personnel);
            formData.append("genre_personnel",this.personnelForm.value.genre_personnel);
            formData.append("date_nais_personnel",this.personnelForm.value.date_nais_personnel);
            formData.append("tel_personnel",this.personnelForm.value.tel_personnel);
            formData.append("adresse_personnel",this.personnelForm.value.adresse_personnel);
            formData.append("mail_personnel",this.personnelForm.value.mail_personnel);
            formData.append("lien_parente",this.personnelForm.value.lien_parente);
            formData.append("contact_urgence",this.personnelForm.value.contact_urgence);
            formData.append("fonction",this.personnelForm.value.fonction);
          this.personnelService.EnregistrementPersonnel(formData).subscribe(
            (response)=>{
              if(response.header != 201){
                this.message= response.bienvenue;
                this.personnelForm.reset();
                setInterval(() => {
                  this.message= "";
                }, 4000);
                this.imgPreview = this.adresseIp+':8000/storage/images/profile/avatar.png'
              }else{
                this.messaged= response.message;
              }
            },
            (error)=>{
              this.messaged="Erreur lors de l'enregistrement, veillez entrez les données valides";
              console.error("Erreur lors de l'enregistrement",error);
            }
          );
    }else{
      window.scrollTo(0,0);
      this.personnelForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;
    }
  }

    scrollerEnBas() {
      setTimeout(() => {
        const element = document.getElementById('attributionMatiere');
        if (element) {
          element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }, 300); // Attendre que Bootstrap ouvre la section
    }

    // Mise à jour de l'image
    onImageSelected(event: any,fileInput:HTMLInputElement) {
      const file = event.target.files[0]  // Récupère le premier fichier sélectionné

      if(file) {
        if(file.size > 2 * 1024 * 1024){
          this.image_error="le fichier est trop volumineux, selectioner un autre, max 2Mo"
          fileInput.value=''
        }else{
          this.image_error=""
          this.selectedFile = file;
          const reader = new FileReader();

          // Dès que la lecture de l'image est terminée
              reader.onload = () => {
               this.imgPreview = reader.result as string; // Met à jour la source de l'image
              };
              // Lire le fichier comme une URL de données
             reader.readAsDataURL(file);
        }


    }

    }

    onCvSelected(event: any,fileInput:HTMLInputElement) {
      const file = event.target.files[0]  // Récupère le premier fichier sélectionné

      if(file ) {
        if(file.size > 2 * 1024 * 1024){
          this.cv_error="le fichier est trop volumineux, selectioner un autre, max 2Mo"
          fileInput.value=''
        }else{
          this.cv_error=""
          this.selectedFileCV = file;
        }
       }
    }

    onPeice_jointeSelected(event: any, fileInput:HTMLInputElement) {
      const file = event.target.files[0]  // Récupère le premier fichier sélectionné

      if(file) {
        if(file.size > 2 * 1024 * 1024){
          this.pj_error="le fichier est trop volumineux, selectioner un autre, max 2Mo"
          fileInput.value=''
        }else{
          this.pj_error=""
          this.selectedFilePJ = file;
        }
       }
    }

    chargeMatieres(){
      this.serviceMatiere.getMatiere().subscribe(
        (response)=>{
          this.matieres=response
        },(error)=>{
          console.error("Erreur lors de l'enregistrement des matières",error)
        }
      )
    }

    affecterMatieres(){
      if(this.matieresSelectionnees.length<=0){
        this.messageAffecter="Veillez selection au moin une matiere"
        return
      }
      this.messageAffecter=""
      const data={
        personnel_id: this.enseignantTrouves?.id,
        matieres: this.matieresSelectionnees,
      }
      this.personnelService.EnregistrerEnseigner(data).subscribe(
        (response)=>{
          this.messageAffecter= response.message
        },
        (error)=>{
          this.messageAffecter="Cet enseignant enseigne déjà dans une classe"
          console.error("Erreur lors de l'enregistrement")
        }
      )


    }

    rechercherEnseignant(){
      this.messageRechercher=""
      if(this.rechercherMartricule==''){
        this.messageRechercher="Veillez entrez un matricule"
      }else{
        this.personnelService.getEnseignantMatricule(this.rechercherMartricule).subscribe(
         (response)=>{
            if(response.message){
              this.messageRechercher=response.message
            }else{
              this.enseignantTrouves= response
            }
         },(error)=>{
          console.error('Erreur lors de la recherche de l\'enseignant')
         }
        )
      }

    }

    selectionnerMatiere(matiereId: number, event: any){
      if(event.target.checked){
        this.matieresSelectionnees.push(matiereId)
      }else{
        this.matieresSelectionnees= this.matieresSelectionnees.filter(id=> id !== matiereId);

      }
    }

}
