import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';

@Component({
  selector: 'app-enseignant',

  templateUrl: './enseignant.component.html',
  styleUrl: './enseignant.component.css'
})
export class EnseignantComponent implements OnInit{
  constructor(private router: Router, private userService: UserService){}
 user: User |null=null
  ngOnInit(): void {
    this.user = this.userService.getUser()
  }

  currentRoute : string = '/enseignant/emploiDuTemps'

  isEmplois(): boolean {
    return this.router.url === '/dc7_ahaf/648rf2/0ie_5f' || this.router.url === 'dc7_ahaf/648rf2/0ie_5f/profil'; // Affiche le tableau de bord si l'URL est /enseignant
  }

  changeRoute(route: string): void {
    this.router.navigate([route]);  // Change la route en fonction de l'élément cliqué dans le sidebar
  }


}
