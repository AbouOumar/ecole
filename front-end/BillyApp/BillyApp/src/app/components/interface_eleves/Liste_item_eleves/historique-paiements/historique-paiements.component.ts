import { Component, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';
import { RouteCryptoServiceService } from '../../../../Service/Crypter/route-crypto-service.service';


@Component({
  selector: 'app-historique-paiements',

  templateUrl: './historique-paiements.component.html',
  styleUrl: './historique-paiements.component.css'
})
export class HistoriquePaiementsComponent implements OnInit  {
  
  constructor(private router: Router, private userService: UserService) {}
  user: User |null=null

  ngOnInit(): void {
    this.user = this.userService.getUser()
  }



}
