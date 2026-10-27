import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { DepenseService } from '../../../../../Service/Depense/depense.service';
import { AnneeScolaireService } from '../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ServiceCompteService } from '../../../../../Service/Compte/service-compte.service';
import { TypeDepenseService } from '../../../../../Service/TypeDepense/type-depense.service';
import { Depense } from '../../../../../Classes/Depense/depense';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { UserService } from '../../../../../Service/User/user.service';
import { environment } from '../../../../../../environments/environment';
declare var bootstrap: any;

@Component({
  selector: 'app-listes-des-depenses',

  templateUrl: './listes-des-depenses.component.html',
  styleUrl: './listes-des-depenses.component.css'
})
export class ListesDesDepensesComponent {
  depenses: any[]=[]
  typeDepenses: any[]=[]
  ajouterdepenseForm!: FormGroup
  updatedepenseForm!: FormGroup
  textRechercheAnnee: string = "";
  message:string=''
  messageUpdate:string=''
  annees: any []=[];
  selectedDepense: Depense=new Depense()
  depenseForms!: FormGroup ;
  selectedFile!: File;
  selectedFile2!: File;
  idSelected: number=0;
  comptes: any[]=[];
  editModal: any;
  textRechercheDepenses: string = ''
  adresseIp: string = ''
  constructor(public userService: UserService,private serviceCompte: ServiceCompteService,private anneeService: AnneeScolaireService,private fb: FormBuilder,private serviceDepense: DepenseService,private serviceTypeDepense: TypeDepenseService){}
  ngOnInit(): void {
    this.adresseIp=environment.ip
    this.chargeListeDepense();
    this.chargeCompte();
    this.chargeAnneeScolaire();
    this.chargeListeTypeDepense();
    if(typeof bootstrap !== 'undefined'){
      this.editModal = new bootstrap.Modal(document.getElementById('modifierNouvelleDepense')!);
   }
        this.ajouterdepenseForm = this.fb.group({
          compte_id: ['', Validators.required],
          type_depense_id: ['', Validators.required],
          typeTransaction: [''],
          montantTransanction: ['', Validators.required],
          piece_jointe: [''],
          description: [''],
         //Fin Enregistrment type depense
        });

        this.updatedepenseForm =this.ajouterdepenseForm
  }
  chargeListeDepense() {
    this.serviceDepense.getListeDepense().subscribe(
      (response:any[])=>{
        this.depenses= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des depenses')
      }
    )
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

  clearFileInput(){
    const fileInput = document.getElementById('formFileLg') as HTMLInputElement;
    if(fileInput){
      fileInput.value='';
    }
  }

    // Mise à jour de l'image
    onFileSelected(event: any) {
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

      // Mise à jour de l'image
      onFileSelected2(event: any) {
        const file = event.target.files[0]  // Récupère le premier fichier sélectionné

        if(file) {
          this.selectedFile2 = file;
          const reader = new FileReader();

     // Dès que la lecture de l'image est terminée

         reader.onload = () => {
          const imageElement = document.getElementById('imagePreview2') as HTMLImageElement;
          imageElement.src = reader.result as string; // Met à jour la source de l'image
         };

         // Lire le fichier comme une URL de données
        reader.readAsDataURL(file);


      }
    }

  chargeCompte(){
    this.serviceCompte.getCompte().subscribe(
      (response)=>{
        this.comptes = response
      },
      (error) =>{
        console.error("Erreur lors du chargment des compte.",error)
      }
    )

  }

  chargeListeTypeDepense() {
    this.serviceTypeDepense.getListTypeDepense().subscribe(
      (response:any[])=>{
        this.typeDepenses= response
      },
      (error)=>{
        console.error('Erreur lors du chargement des type de depenses')
      }
    )
  }

  onSubmit() {

    if(this.ajouterdepenseForm.valid){
        var formData = new FormData();
        formData.append("compte_id",this.ajouterdepenseForm.value.compte_id);
        formData.append("type_depense_id",this.ajouterdepenseForm.value.type_depense_id);
        formData.append("typeTransaction",'retrait');
        formData.append("montantTransanction",this.ajouterdepenseForm.value.montantTransanction);
        formData.append("description",this.ajouterdepenseForm.value.description);
        formData.append("piece_jointe",this.selectedFile);

      this.serviceDepense.createDepense(formData).subscribe(
        (response)=>{
          this.chargeListeDepense();
          this.message= response.message;
          setTimeout(() => {
            this.message= '';
          }, 4000);
          this.chargeListeDepense();
          this.clearFileInput();
          this.ajouterdepenseForm.reset();
        },
        (error)=>{
          this.message="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }
    }

    onSubmitUpdate() {

      if(this.updatedepenseForm.valid){
          var formData = new FormData();
          formData.append("compte_id",this.updatedepenseForm.value.compte_id);
          formData.append("type_depense_id",this.updatedepenseForm.value.type_depense_id);
          formData.append("typeTransaction",'retrait');
          formData.append("montantTransanction",this.updatedepenseForm.value.montantTransanction);
          formData.append("description",this.updatedepenseForm.value.description);
          formData.append("piece_jointe",this.selectedFile2);

        this.serviceDepense.updateDepense(formData,this.idSelected).subscribe(
          (response)=>{
            this.chargeListeDepense();
            this.messageUpdate= response.message;
            setTimeout(() => {
              this.messageUpdate= '';
            }, 4000);


            this.updatedepenseForm.reset();
            this.clearFileInput()
          },
          (error)=>{
            this.messageUpdate="Erreur lors de la modification";
            console.error(error);
          }
        );
      }
    }

    ouvreModal(id: number){
      const depense= this.depenses.find(el => el.id === id);
          if(depense){
            this.selectedDepense=depense;
          }
          this.idSelected=id;
          this.message=""
          this.clearFileInput();
    }
}
