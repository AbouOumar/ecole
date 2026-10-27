import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';
import { RouteCryptoServiceService } from '../../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-releves-de-notes',

  templateUrl: './releves-de-notes.component.html',
  styleUrl: './releves-de-notes.component.css'
})
export class RelevesDeNotesComponent {
  
  constructor(private router: Router, private userService: UserService) {}
  user: User |null=null

  ngOnInit(): void {
    this.user = this.userService.getUser()
  }
}
