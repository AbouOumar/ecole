import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrl: './admin.component.css'
})
export class AdminComponent implements OnInit {
  constructor(private router: Router, private userService: UserService) {}
user: User |null=null




        currentRoute: string = '/admin/tableaudebord'; // Par défaut, tableau de bord


        ngOnInit(): void {
          this.user = this.userService.getUser()
        }

        isTableauBord(): boolean {
          return this.router.url === '/dc9_ahaf/453rf3/4ie_6f' || this.router.url === '/dc9_ahaf/453rf3/4ie_6f/dc3_ahaf/037rf9/0ie_7f'; // Affiche le tableau de bord si l'URL est /admin
        }

        changeRoute(route: string): void {
          this.router.navigate([route]);  // Change la route en fonction de l'élément cliqué dans le sidebar
        }


}
