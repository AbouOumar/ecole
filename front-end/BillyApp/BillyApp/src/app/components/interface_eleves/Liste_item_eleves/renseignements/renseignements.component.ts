import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-renseignements',

  templateUrl: './renseignements.component.html',
  styleUrl: './renseignements.component.css'
})
export class RenseignementsComponent implements OnInit{
  constructor(private router: Router, private userService: UserService) {}
  user: User |null=null

  ngOnInit(): void {
    this.user = this.userService.getUser()
  }

}

