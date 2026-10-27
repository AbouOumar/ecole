import { Component, Input, OnDestroy, OnInit } from '@angular/core';
import { Item } from '../../../models/item';
import { nav_items } from '../../../api/nav';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';
import { Router } from '@angular/router';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';
// import { AsideNavComponent } from '../../sidbar_enseignant_eleve/aside-nav/aside-nav.component'; 

@Component({
  selector: 'app-navbar-enseignant',
  templateUrl: './navbar-enseignant.component.html',
  styleUrls: ['./navbar-enseignant.component.css'],
  // imports: [AsideNavComponent]
})
export class NavbarEnseignantComponent implements OnInit, OnDestroy {
constructor( private userService: UserService,private router: Router,public secureRouteService:RouteCryptoServiceService) {}
  navs_data: Item[] = nav_items
@Input() user:User|null=null
  isDisplayMobileNav: boolean = false
  
  ngOnInit(): void {
    this.user = this.userService.getUser()

  }

    deconnexion(){
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
