import { Component, OnInit } from '@angular/core';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';

@Component({
  selector: 'app-footer-signation',
  templateUrl: './footer-signation.component.html',
  styleUrl: './footer-signation.component.css'
})
export class FooterSignationComponent implements OnInit{

      constructor( private userService: UserService) {}

        user: User | null= null

  ngOnInit(): void {
   this.user = this.userService.getUser()
  }

}
