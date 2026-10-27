import { Personnel } from './../../../../Classes/Personnel/personnel';
import { Component, Input, OnInit } from '@angular/core';
import { EmploiService } from '../../../../Service/Emplois/emploi.service';
import { User } from '../../../../Classes/Users/user';
import { UserService } from '../../../../Service/User/user.service';

@Component({
  selector: 'app-emploi-du-temps',
   templateUrl: './emploi-du-temps.component.html',
  styleUrl: './emploi-du-temps.component.css'
})
export class EmploiDuTempsComponent implements OnInit{
  constructor(private userService: UserService,private emploiService: EmploiService) {}
  emploiEnseignant: any[] = []
  infoEnseignant: any
  user:User|null=null

  ngOnInit(): void {

     this.user=this.userService.getUser()
    if(this.user){
     this.chargeEmploi(this.user.idDroit)

    }
  }
  chargeEmploi(personnel_id: number){
       this.emploiEnseignant=[]
       this.emploiService.getEmploisParProf(personnel_id).subscribe(
         (response)=>{
           this.emploiEnseignant= response
           this.infoEnseignant = this.emploiEnseignant[0].personnel
         },(error)=>{
           console.error("Erreur l'ors du chargement de l'emploi du temps",error)
         }
       )
     }

}
