import { Component, OnInit } from '@angular/core';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';
import { Subscription } from 'rxjs';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-header-visiteur',
  templateUrl: './header-visiteur.component.html',
  styleUrls: ['./header-visiteur.component.css']
})
export class HeaderVisiteurComponent implements OnInit{
  user: User | null = null
  private userSub!: Subscription;
constructor(private userService: UserService,public secureRouteService: RouteCryptoServiceService) {}
goto(key:string){
  this.secureRouteService.navigateTo(key)
}

  ngOnInit(): void {
    this.user=this.userService.getUser()
    window.addEventListener('scroll', this.onScroll);
    window.addEventListener('scroll', this.onScrollBrand);
    window.addEventListener('scroll', this.onScrollBtn);
    window.addEventListener('scroll', this.onScrollnavLink);


    this.userSub = this.userService.getUserObservable().subscribe(user => {
      this.user = user;
    });

  }

  onScroll(): void {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 80) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }
  }

  onScrollBrand(): void {
    const navbarBrand = document.getElementById('navbar-brand');
    if (window.scrollY > 80) {
      navbarBrand?.classList.add('scrolled');
    } else {
      navbarBrand?.classList.remove('scrolled');
    }
  }

  onScrollnavLink(): void {
    const navLink = document.getElementById('nav-link');
    if (window.scrollY > 80) {
      navLink?.classList.add('scrolled');
    } else {
      navLink?.classList.remove('scrolled');
    }
  }

  onScrollBtn(): void {
    const btn = document.getElementById('btn');
    if (window.scrollY > 80) {
      btn?.classList.add('scrolled');
    } else {
      btn?.classList.remove('scrolled');
    }
  }

  ngOnDestroy(): void {
    this.userSub.unsubscribe();
    window.removeEventListener('scroll', this.onScroll);
    window.removeEventListener('scroll', this.onScrollBrand);
    window.removeEventListener('scroll', this.onScrollBtn);
    window.removeEventListener('scroll', this.onScrollnavLink);
  }





}
