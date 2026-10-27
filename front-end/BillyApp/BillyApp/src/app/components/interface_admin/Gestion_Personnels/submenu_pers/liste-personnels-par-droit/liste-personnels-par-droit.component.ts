import { Component, OnInit } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';
import { Personnel } from '../../../../../Classes/Personnel/personnel';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from '../../../../../Service/User/user.service';
import { environment } from '../../../../../../environments/environment';
import { minAgeValidator } from '../../../../../validators/age-min';
declare var bootstrap: any;

@Component({
  selector: 'app-liste-personnels-par-droit',

  templateUrl: './liste-personnels-par-droit.component.html',
  styleUrl: './liste-personnels-par-droit.component.css'
})
export class ListePersonnelsParDroitComponent implements OnInit{
  personnels: any[]=[]
    textRecherche: string = "";
    textRechercheFonction: string = "";


    matieres: any[]=[]
      personelsMatieres: any=null
      matiereChoisi: number=0
      annees: any []=[];
    
        selectedPersonnel!: Personnel;
    
      personnelForm!: FormGroup ; // "!" est utilisé pour dire que enseignantForm ne serait jamais undefined
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
        enseignantTrouves: Personnel|null=null;
        fonctions: any[]=[]
        annee2: Date= new Date();
        selectedFile: File | null = null;
        selectedFileCV: File | null = null;
        selectedFilePJ: File | null = null;

        idSelected: number=0;
        editModal: any;
        imgPreview:string=''
        adresseIp:string=environment.ip
    
        rechercherMartricule: string = ''
        enseignant: any = null
    constructor(public userService:UserService, private fb: FormBuilder,private servicePersonnels: PersonnelService){}
    ngOnInit(): void {
      this.imgPreview= environment.ip+':8000/storage/images/profile/avatar.png'
      this.chargeListePersonnel();
      this.personnelForm = this.fb.group({
        nom_personnel: ['', Validators.required],
        matricule_personnel: [''],
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
       //Fin Enregistrment personnel
      });

      

      if(typeof bootstrap !== 'undefined'){
        this.editModal = new bootstrap.Modal(document.getElementById('modal_modifier_personnel')!);
     }
    }

    chargeListePersonnel() {
      this.servicePersonnels.getTousPersonnel().subscribe(
        (response:any)=>{
          this.personnels=response
        },
        (error)=>{
          console.error('Erreur lors du chargement de liste des personnels');
        }
      )
    }

    ouvreModal(id: number){
      
      const pesronnel= this.personnels.find(el => el.id === id);
          if(pesronnel){
            this.personnelForm.patchValue({
              matricule_personnel: pesronnel.matricule_personnel,
              nom_personnel: pesronnel.nom_personnel,
              prenom_personnel: pesronnel.prenom_personnel,
              genre_personnel: pesronnel.genre_personnel,
              date_nais_personnel: pesronnel.date_nais_personnel,
              tel_personnel: pesronnel.tel_personnel,
              adresse_personnel: pesronnel.adresse_personnel,
              mail_personnel: pesronnel.mail_personnel,
              lien_parente: pesronnel.lien_parente,
              contact_urgence: pesronnel.contact_urgence,
            })
            this.imgPreview = this.adresseIp+':8000/storage/images/profile/'+pesronnel.photo
  
          }
          this.idSelected=id;
          this.message=""
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
            this.servicePersonnels.modificationPersonnel(this.idSelected,formData).subscribe(
              (response)=>{
                if(response.header != 201){
                  this.message= response.message;
                  setInterval(() => {
                    this.message= "";
                  }, 4000);
                  this.chargeListePersonnel();
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
    
}
