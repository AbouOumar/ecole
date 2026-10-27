import { HttpClient } from '@angular/common/http';
import { ClasseService } from './../../../../../../../Service/Classes/classe.service';
import { ServiceEleveService } from './../../../../../../../Service/Eleves/service-eleve.service';
import { Component, OnInit} from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Ins_reins } from '../../../../../../../Classes/Inscription_reinscription/ins_reins';
import { AnneeScolaireService } from '../../../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ParentService } from '../../../../../../../Service/Parent/parent.service';
import { PersonnelService } from '../../../../../../../Service/Personnel/personnel.service';
import { environment } from '../../../../../../../../environments/environment';
import { minAgeValidator } from '../../../../../../../validators/age-min';

@Component({
  selector: 'app-enregistrement-inscription',
  templateUrl: './enregistrement-inscription.component.html',
  styleUrl: './enregistrement-inscription.component.css' // Doit être un tableau
})
export class EnregistrementInscriptionComponent implements OnInit{

  eleveForm!: FormGroup ; // "!" est utilisé pour dire que eleveForm ne serait jamais undefined
  inscForm!: FormGroup;
  message: string = '';
  messageSucess: string = '';
  messageInscription: string = '';
  id_eleve?: number;
  fraisInscription: number =0;
  classes: any []=[];
  annees: any []=[];
  annee2: Date= new Date();
  selectedFile!: File;
  parentRecherche: string = '';  // Le matricule recherché
  parentTrouve : any =null ;
  messageErreur: string = '';
  messaged: string = '';
  image_error: string = '';
  adresseIp: string = '';
  imgPreview:string=''

  constructor(private fb: FormBuilder, private eleveService: ServiceEleveService,private classeService: ClasseService,private anneeService: AnneeScolaireService, private parentService: ParentService, private personnelService: PersonnelService ){}

  ngOnInit(){
    this.adresseIp=environment.ip
    this.imgPreview=this.adresseIp+':8000/storage/images/profile/avatar.png'

    this.chargeAnneeScolaire();
    this.chargeClasse();
    //Enregistrment eleve et parents
    this.eleveForm = this.fb.group({
      nom_eleve: ['', Validators.required],
      prenom_eleve: ['', Validators.required],
      genre_eleve: ['', Validators.required],
      Date_naiss: ['', [Validators.required, minAgeValidator(10)]],
      tel_eleve: [''],
      photo: [''],
      nom_parent: ['', Validators.required],
      prenom_parent: ['', Validators.required],
      telephone_parent: ['', Validators.required],
      Email_parent: ['',Validators.email],
      adresse_parent: ['', Validators.required],
      profession: ['', Validators.required],
      lien_parente: ['', Validators.required],
      
     //Fin Enregistrment eleve et parents
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


  rechercherParent() {
    // Réinitialiser les valeurs avant chaque recherche
    this.parentTrouve = null;
    this.messageErreur = '';
    this.messageSucess="" 
    this.eleveForm.patchValue({
      prenom_parent: "",
      nom_parent: "",
      telephone_parent: "",
      adresse_parent: "" ,
      Email_parent: "",
      profession: ""
    })
    // Vérifier si le matriculeRecherche est vide ou non défini
    this.parentService.getParent(this.parentRecherche).subscribe(
      (response:any)=>{
        if(response.trouver=="false"){
          this.personnelService.getPersonnelTel(this.parentRecherche).subscribe(
            (response:any)=>{      
              if(response.trouver=="false"){
                this.messageErreur=response.message
                setInterval(() => {
                  this.messageErreur=""  
        
                }, 3000);
              }else{
                this.parentTrouve=response
                this.eleveForm.patchValue({
                  prenom_parent: this.parentTrouve?.prenom_personnel,
                  nom_parent: this.parentTrouve?.nom_personnel,
                  telephone_parent: this.parentTrouve?.tel_personnel,
                  adresse_parent: this.parentTrouve?.adresse_personnel ,
                  Email_parent: this.parentTrouve?.mail_personnel,
                  profession: this.parentTrouve?.fonction_personnel[0]?.fonction?.libelle_fonction
                })

                




                this.messageSucess="Personnel trouvé"
              }

            },(error)=>{
              console.error('Erreur lors du chargement du parent',error)
            }
          )
        }else{
          this.parentTrouve=response
          this.eleveForm.patchValue({
            prenom_parent: this.parentTrouve?.prenom_parent,
            nom_parent: this.parentTrouve?.nom_parent,
            telephone_parent: this.parentTrouve?.telephone_parent,
            adresse_parent: this.parentTrouve?.adresse_parent ,
            Email_parent: this.parentTrouve?.Email_parent,
            profession: this.parentTrouve?.profession
          })
          this.messageSucess="Parent trouvé"
        }
      },(error)=>{
        console.error('Erreur lors du chargement du parent',error)
      }
    )

  

  }


  onSubmitIns_reis() {
    // console.log(new Date().toISOString().split('T')[0]+" "+this.id_eleve+" "+this.inscForm.value.classe_id+" "+this.inscForm.value.annee_scolaire_id+" "+this.inscForm.value.montant);
    if(this.inscForm.valid){
      const inscrire_reins: Ins_reins={
        dateIns:  new Date().toISOString().split('T')[0],
        type: "Inscription",
        eleve_id: this.id_eleve,
        classe_id: this.inscForm.value.classe_id,
        annee_scolaire_id: this.inscForm.value.annee_scolaire_id,
        montant: this.inscForm.value.montant,
        moyentPayement: "Caisse"
      };

      // console.log(inscrire_reins);

      this.eleveService.Ins_reinscription(inscrire_reins).subscribe(
        (response)=>{
          this.inscForm.reset();
          this.messageInscription="Inscription effectuée avec succès";

        },
        (error)=>{
          this.messageInscription="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }else{
      window.scrollTo(0,0);
      this.inscForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;

    }
  }


    //Enregistrment eleve et parents
  onSubmit() {
  if(this.eleveForm.valid){
      var formData = new FormData();
      if(this.selectedFile){
        formData.append("photo",this.selectedFile);
      }     
      formData.append("nom_eleve",this.eleveForm.value.nom_eleve);
      formData.append("prenom_eleve",this.eleveForm.value.prenom_eleve);
      formData.append("genre_eleve",this.eleveForm.value.genre_eleve);
      formData.append("Date_naiss",this.eleveForm.value.Date_naiss);
      formData.append("tel_eleve",this.eleveForm.value.tel_eleve);

      formData.append("nom_parent",this.eleveForm.value.nom_parent);
      formData.append("prenom_parent",this.eleveForm.value.prenom_parent);
      formData.append("Email_parent",this.eleveForm.value.Email_parent);
      formData.append("adresse_parent",this.eleveForm.value.adresse_parent);
      formData.append("telephone_parent",this.eleveForm.value.telephone_parent);
      formData.append("profession",this.eleveForm.value.profession);

      formData.append("lien_parente",this.eleveForm.value.lien_parente);

      if(this.parentTrouve){
        formData.append("parent_id",this.parentTrouve.id);
        if("prenom_personnel" in this.parentTrouve){
          formData.append("typeParent",'personnel');
        }else{
          formData.append("typeParent",'parent');
        }
      }
      

    this.eleveService.EnregistrementEleve(formData).subscribe(
      (response)=>{
        if(response.header != 201){
          this.message= response.bienvenue;
          this.eleveForm.reset();
          this.id_eleve= response.idEleve;
          this.imgPreview = this.adresseIp+':8000/storage/images/profile/avatar.png'
        }else{
          this.messaged= response.message;
        }
      },
      (error)=>{
        this.message="Erreur lors de l'enregistrement";
        console.error("Erreur lors de l'enregistrement",error);
      }
    );
  }else{
    window.scrollTo(0,0);
    this.eleveForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
    return;
  }
  }

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

  scrollerEnBas() {
    setTimeout(() => {
      const element = document.getElementById('inscription');
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

  
}




