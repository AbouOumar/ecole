import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';
@Component({
  selector: 'app-etat-salaire',
  templateUrl: './etat-salaire.component.html',
  styleUrl: './etat-salaire.component.css'
})
export class EtatSalaireComponent {
  
  constructor(private router: Router, private userService: UserService) {}
  user: User |null=null

  ngOnInit(): void {
    this.user = this.userService.getUser()
    }
}

