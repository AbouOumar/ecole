import { Component, OnInit } from '@angular/core';
import { ServiceEleveService } from '../../../../Service/Eleves/service-eleve.service';
import { ClassesService } from '../../../../Service/LesClasse/classes.service';
import { User } from '../../../../Classes/Users/user';
import { UserService } from '../../../../Service/User/user.service';
import { environment } from '../../../../../environments/environment';

@Component({
  selector: 'app-liste-eleves',
  templateUrl: './liste-eleves.component.html',
  styleUrl: './liste-eleves.component.css'
})
export class ListeElevesComponent implements OnInit{

constructor(private userService: UserService, private listEleveService: ServiceEleveService,private classeService: ClassesService) {}
  user: User = new User()
  adresseIp: string=""
  ngOnInit(): void {
    this.adresseIp = environment.ip
    
    this.user = this.userService.getUser()
    this.chargeListEleve(this.user.idDroit);
    this.chargerClasseEnseignant(this.user.idDroit);
    

  }
  textRecherche: string=""
  textRechercheClasse: string=""
  
  classes: any[]=[]
  eleves: any[] = [];


  chargeListEleve(id:number):void{
    this.listEleveService.getListEleveEnseig(id).subscribe(
      (response: any[]) =>{
        // console.log("Données des élèves :", response);
        this.eleves= response;
      },
      (error) => {
        console.error("Erreur lors du chargement des eleves", error);
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
}
