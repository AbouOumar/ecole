import { Component, OnInit } from '@angular/core';
import { InsReinsService } from '../../../../../../../Service/Ins_reinscrire/ins-reins.service';
import { response } from 'express';
import { error } from 'console';
import { AnneeScolaireService } from '../../../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { ServiceEleveService } from '../../../../../../../Service/Eleves/service-eleve.service';
import { ClasseService } from '../../../../../../../Service/Classes/classe.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Ins_reins } from '../../../../../../../Classes/Inscription_reinscription/ins_reins';
import { environment } from '../../../../../../../../environments/environment';
import { ServiceNoterService } from '../../../../../../../Service/Notes/service-noter.service';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-reinscription',

  templateUrl: './reinscription.component.html',
  styleUrl: './reinscription.component.css'
})



export class ReinscriptionComponent  implements OnInit{
  constructor(private toastr: ToastrService ,private noteService: ServiceNoterService ,private fb: FormBuilder,private service_ins_reins: InsReinsService, private infoEleveS: ServiceEleveService,private eleveService: ServiceEleveService,private classeService: ClasseService,private anneeService: AnneeScolaireService ) {}


  isloading: boolean = true
  isMasquer: boolean = false
  ins_reins: any [] = [];
 annees: any []=[];
 eleves: any []=[];
 anne: any;
 anneEncoursId: any;
 optionAnnee: string='';
 classe: any;
 id_eleve: number=0;
 messageInscription: string = '';
  inscForm!: FormGroup;
  inscFormUpdate!: FormGroup;
 textRechercheIns_reins: string = "";
 textRechercheAnnee: string = "";
 textRechercheClasse: string = "";
 messageErreur: string = '';
 matriculeRecherche: string = '';  // Le matricule recherché
 eleveTrouve : any =null ;
 fraisInscription: number =0;
 classes: any []=[];
 selectedInsReins: any;
 idSelected!: number;
  messaged:string=''
  message:string=''
  messageInsReins:string=''
  adresseIp:string=''

ngOnInit(): void {
  this.adresseIp=environment.ip
  this.charge_ins_reins();
  this.chargeAnneeScolaire();
  this.listeEleve();
  this.chargeClasse();


      this.inscForm = this.fb.group({
        dateIns: [''],
        type: [''],
        eleve_id: [''],
        classe_id: ['', Validators.required],
        annee_scolaire_id: ['', Validators.required],
        montant: ['', Validators.required],
        moyentPayement: [''],
      });

      this.inscFormUpdate = this.fb.group({
        classe_id: ['', Validators.required],
        annee_scolaire_id: ['', Validators.required],
        montant: ['', Validators.required],
      });
}
 charge_ins_reins(){
  this.service_ins_reins.getIns_reins().subscribe(
    (response) =>{
      this.ins_reins= response.liste;
      this.isloading = false
      this.isMasquer = true
      this.anneEncoursId = response.anneEncours
    },
    (error) =>
    {
      console.error("Erreur lors du chargement inscription et reinscire", error);
      this.isloading=true
      this.isMasquer =false
    }
    );

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
chargeTextRechercheAnnee(annee: string){
  this.anne=annee;
}

listeEleve(){

  this.infoEleveS.getListEleve().subscribe(
    (response: any) =>{
      this.eleves = response;
    },
    (error)=>{
      console.error("Erreur lors de la chargement des l'élève",error);
    }
  )
}
rechercherEleve() {
  // Réinitialiser les valeurs avant chaque recherche
  this.eleveTrouve = null;
  this.messageErreur = '';
  // Vérifier si le matriculeRecherche est vide ou non défini
  if (!this.matriculeRecherche || this.matriculeRecherche.trim() === '') {
    return;
  }
  const eleve = this.eleves.find(e =>
    e.matricule_eleve && e.matricule_eleve.trim() !== '' &&
    e.matricule_eleve.toLowerCase() === this.matriculeRecherche.toLowerCase()
  );

  if (eleve) {
    this.eleveTrouve = eleve;
    this.id_eleve=this.eleveTrouve.id ;
  } else {
    this.messageErreur = `Le matricule "${this.matriculeRecherche}" n'existe pas.`;
  }
}


  onSubmitIns_reis() {

    if(!this.id_eleve || this.id_eleve == 0){
      return
    }else{
      this.noteService.getMoyenneEleve(this.id_eleve).subscribe(
      (response:any)=>{
        if(response.MoyenneSemestrielle==-1){
            this.toastr.error(response.message,"Erreur")
            return
        }else if(response.MoyenneSemestrielle<10){
            this.toastr.error("Cet élève n'est pas encore admis, sa moyenne est de: "+response.MoyenneSemestrielle,"Erreur")
            return
        }else{
              this.noteService.getImpayéEleve(this.id_eleve).subscribe(
            (response:any)=>{
                if(response[0] !=0){
                    this.toastr.error("Cet élève à un montant impayé de: "+response[0],"Erreur")
                    return
                }else{
                    if(this.inscForm.valid){
                      const inscrire_reins: Ins_reins={
                        dateIns:  new Date().toISOString().split('T')[0],
                        type: "Réinscription",
                        eleve_id: this.id_eleve,
                        classe_id: this.inscForm.value.classe_id,
                        annee_scolaire_id: this.inscForm.value.annee_scolaire_id,
                        montant: this.inscForm.value.montant,
                        moyentPayement: "Caisse"
                      };

                      this.eleveService.Ins_reinscription(inscrire_reins).subscribe(
                        (response:any)=>{
                          this.inscForm.reset();
                          this.eleveTrouve= null;
                          this.charge_ins_reins();
                          this.messageInscription=response.message;

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
            })
        }
      },(error)=>{
        console.error('Erreur lors de la verification',error)
      }
    )
    }
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
            this.fraisInscription=response.frais_reinscription;
          },
          (error)=>{
            console.error('Erreur lors du chargement des frais',error);
          }

      )
    }else{
      this.fraisInscription=0;
    }
  }

  deleteInsReins(idSelected:number){
    this.service_ins_reins.deleteInsReins(idSelected).subscribe(
      (response)=>{
        this.charge_ins_reins();
        this.messaged= response.message;
        setTimeout(() => {
          this.messaged= '';
        }, 4000);
      },
      (error)=>{
        this.messaged="Erreur lors de la suppression";
        console.error(error);
      }
    );
  }

  ouvreModal(id: number){
    this.messageInsReins="";
    const InsReins= this.ins_reins.find(el => el.id === id);
        if(InsReins){
          this.selectedInsReins=InsReins;
          this.inscFormUpdate.patchValue({
            classe_id : InsReins.classe_id,
            annee_scolaire_id : InsReins.annee_scolaire_id,
            montant : InsReins.montant,
          })
        }
        this.idSelected=id;
        this.message=""
  }

  onSubmitIns_reisUpdate(){
    if(this.inscFormUpdate.valid){
      const inscrire_reins: Ins_reins={
        dateIns:  new Date().toISOString().split('T')[0],
        type: this.selectedInsReins.type,
        eleve_id: this.selectedInsReins.eleve_id,
        classe_id: this.inscFormUpdate.value.classe_id,
        annee_scolaire_id: this.inscFormUpdate.value.annee_scolaire_id,
        montant: this.inscFormUpdate.value.montant,
        moyentPayement: "Caisse"
      };

      this.service_ins_reins.updateInsReins(inscrire_reins,this.idSelected).subscribe(
        (response:any)=>{
          this.eleveTrouve= null;
          this.charge_ins_reins();
          this.messageInsReins=response.message;

        },
        (error)=>{
          this.messageInsReins="Erreur lors de l'enregistrement";
          console.error(error);
        }
      );
    }else{
      window.scrollTo(0,0);
      this.inscFormUpdate.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;

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

}
