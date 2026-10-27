import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { User } from '../../../../Classes/Users/user';
import { UserService } from '../../../../Service/User/user.service';
import { RouteCryptoServiceService } from '../../../../Service/Crypter/route-crypto-service.service';
@Component({
  selector: 'app-emploi-du-temps-eleves',
 
  templateUrl: './emploi-du-temps-eleves.component.html',
  styleUrl: './emploi-du-temps-eleves.component.css'
})
export class EmploiDuTempsElevesComponent {
 
  constructor(private userService: UserService) {}
  user: User |null=null

  ngOnInit(): void {
    this.user = this.userService.getUser()
}
}