import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ServiceEleveService } from '../../../../../../Service/Eleves/service-eleve.service';
import { Router } from '@angular/router';
import { ClasseService } from '../../../../../../Service/Classes/classe.service';
import { AnneeScolaireService } from '../../../../../../Service/Annee_scolaire/annee-scolaire.service';
import { Eleve } from '../../../../../../Classes/Eleves/eleve';
import { Ins_reins } from '../../../../../../Classes/Inscription_reinscription/ins_reins';
import { UserService } from '../../../../../../Service/User/user.service';
import { User } from '../../../../../../Classes/Users/user';
import { environment } from '../../../../../../../environments/environment';
declare var bootstrap: any;


@Component({
  selector: 'app-liste-eleve-par-droit',

  templateUrl: './liste-eleve-par-droit.component.html',
  styleUrl: './liste-eleve-par-droit.component.css'
})
export class ListeEleveParDroitComponent implements OnInit{
  constructor(private userService:UserService, private fb: FormBuilder, private listEleveService: ServiceEleveService, private router: Router, private classeService: ClasseService,private anneeService: AnneeScolaireService) {}
    eleves: any[] = [];
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
  textRechercheClasse: Number = 0;
  fraisInscription: number =0;
  user: User= new User()

  classes: any []=[];

    textRecherche: string = "";
    adresseIp: string = "";
  //EventEmitter: donné le type et c'est une class qui va nous permettre d'emette des evenements et ces event seron ecouté partout dans le projet qu'on utilisera le composent
  // @Input() eleveParents: Eleve_typer | undefined
  ngOnInit(): void {
    this.adresseIp=environment.ip
    this.user = this.userService.getUser()
    this.chargeListEleveDroit();
    this.chargeClasse();
  }


  chargeListEleveDroit():void{
    this.listEleveService.getListEleveDroit(this.user.Droit).subscribe(
      (response: any[]) =>{
        this.eleves= response;
      },
      (error) => {
        console.error("Erreur lors du chargement des eleves", error);
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
}
