import { Component, Input, OnInit } from '@angular/core';
import { nav_eleves_items } from '../../../api/eleves_interface/nav_eleves';
import { Item } from '../../../models/item';
import { User } from '../../../Classes/Users/user';
import { UserService } from '../../../Service/User/user.service';
import { Router } from '@angular/router';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-header-eleves',

  templateUrl: './header-eleves.component.html',
  styleUrl: './header-eleves.component.css'
})
export class HeaderElevesComponent implements OnInit{
  constructor(private userService: UserService, private router: Router,public secureRouteService: RouteCryptoServiceService){}


  navs_data: Item[] = nav_eleves_items
  isDisplayMobileNav: boolean = false
  @Input() user:User|null=null
  ngOnInit(): void {

  }

  logout(){
    this.userService.logout()
    this.router.navigate([''])
  }
  ngOnDestroy(): void {


  }

  // Les methode

  // Ci-dessous affiche menu-bar et lorsquon clique affiche le contenu aside nav
  handleDisplayMobileNav(){
    this.isDisplayMobileNav = !this.isDisplayMobileNav
  }

  handleCloseMobileNav(){
    this.isDisplayMobileNav = false
  }
}
