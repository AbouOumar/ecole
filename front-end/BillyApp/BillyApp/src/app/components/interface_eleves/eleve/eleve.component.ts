import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';

@Component({
  selector: 'app-eleve',

  templateUrl: './eleve.component.html',
  styleUrls: ['./eleve.component.css']
})
export class EleveComponent implements OnInit{
  user:User|null=null
    constructor(private router: Router, private userService: UserService){}

      ngOnInit(): void {
        this.user = this.userService.getUser()
      }

      currentRoute : string = '/eleve/Renseignements'

      isEmplois(): boolean {
        return this.router.url === '/dc4_ahaf/026rf6/7ie_9f' || this.router.url === '/dc4_ahaf/026rf6/7ie_9f/dc0_ahaf/227rf8/4ie_7f'; // Affiche le tableau de bord si l'URL est /eleve
      }

      changeRoute(route: string): void {
        this.router.navigate([route]);  // Change la route en fonction de l'élément cliqué dans le sidebar
      }
}
