import { Component, EventEmitter, OnDestroy, OnInit, Output } from '@angular/core';
import { ServiceEleveService } from '../../../../../Service/Eleves/service-eleve.service';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ParentService } from '../../../../../Service/Parent/parent.service';
import { Parents } from '../../../../../Classes/Parents/parents';
import { environment } from '../../../../../../environments/environment';

@Component({
  selector: 'app-liste-des-eleves-parents',

  templateUrl: './liste-des-eleves-parents.component.html',
  styleUrl: './liste-des-eleves-parents.component.css'
})
export class ListeDesElevesParentsComponent implements OnInit{

  eleve: any = null; // Stocke les informations de l'élève
  parents: any[] = [];
  personnels: any[] = [];
  classe: any = null;
  actions: any[] = [];
  editModal: any;
  parentForms!: FormGroup ;
  idSelected: number=0;
  message: string="";
  adresseIp: string="";
  parent: Parents=new Parents()
  nbParent:number=0




constructor(private fb: FormBuilder,private listEleveService: ServiceEleveService,private router: ActivatedRoute,private serviceParent: ParentService) {}
parentsEleve: any[] = [];

ngOnInit(): void {
  this.adresseIp=environment.ip
    this.chargeInfo()
    //Enregistrment parent
    this.parentForms = this.fb.group({
      prenom_parent: ['', Validators.required],
      nom_parent: ['', Validators.required],
      telephone_parent: ['', Validators.required],
      adresse_parent: ['', Validators.required],
      Email_parent: ['', Validators.email],
      profession: ['', Validators.required],
      id: [''],
      type: ['', Validators.required],
      //Fin Enregistrment eleve
    });
}
chargeInfo(){
  const id = this.router.snapshot.paramMap.get('id');  // Récupérer l'ID depuis l'URL
  if (id) {
    //recuperationd des informations de l'evele et ses parents
    this.listEleveService.getEleveParents(+id).subscribe(
      (response: any[]) => {
        if (response.length > 0) {
          this.eleve = response[0]; // L'élève est le premier élément du tableau
          this.parents = this.eleve.parents || [];
          this.personnels = this.eleve.personnels || [];
          this.nbParent= this.parents.length+this.personnels.length
          this.classe = this.eleve.classe || null;
        } else {
          console.error("Aucun parent trouvé pour cet élève.");
        }
      },
      (error) => {
        console.error("Erreur lors du chargement des informations", error);
      }
    );

        //recuperation de la liste des actions de l'eleve
        this.listEleveService.getEleveActions(+id).subscribe(
          (response: any[]) => {
            if (response.length > 0) {
              this.actions = Array.isArray(response) ? response : [];
            }
          },
          (error) => {
            console.error("Erreur lors du chargement des informations", error);
          }
        );
  }
}

ouvreModal(id: number){

      this.idSelected=id;
      this.message=""

}
  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }

  createParent() { 
    if(this.parentForms.valid){
      this.parent.nom_parent=this.parentForms.value.nom_parent
      this.parent.prenom_parent=this.parentForms.value.prenom_parent
      this.parent.telephone_parent=this.parentForms.value.telephone_parent
      this.parent.adresse_parent=this.parentForms.value.adresse_parent
      this.parent.Email_parent=this.parentForms.value.Email_parent
      this.parent.profession=this.parentForms.value.profession
      this.parent.type=this.parentForms.value.type
        this.serviceParent.enregistrerParent(this.idSelected,this.parent).subscribe(
          response => {
              this.chargeInfo();
              this.message=response.message;
          },
          error => console.error('Erreur lors de l\'enregistrement du parent :', error)
        );
    }else{
      this.parentForms.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;
    }
  }

}
