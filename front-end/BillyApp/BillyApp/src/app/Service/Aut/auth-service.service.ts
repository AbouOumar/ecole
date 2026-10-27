import { Injectable } from '@angular/core';
import { Router } from 'express';

@Injectable({
  providedIn: 'root'
})
export class AuthServiceService {


  // private userRole: string | null = null;

  // constructor(private router: Router) {}

  // login(role: string) {
  //   this.userRole = role;
  //   localStorage.setItem('userRole', role);
  //   this.redirectUser();
  // }

  // logout() {
  //   this.userRole = null;
  //   localStorage.removeItem('userRole');
  //   this.router.navigate(['/visiteur']);
  // }

  // getRole(): string | null {
  //   return this.userRole || localStorage.getItem('userRole');
  // }

  // redirectUser() {
  //   switch (this.getRole()) {
  //     case 'admin':
  //       this.router.navigate(['/admin']);
  //       break;
  //     case 'eleve':
  //       this.router.navigate(['/eleve']);
  //       break;
  //     case 'enseignant':
  //       this.router.navigate(['/enseignant']);
  //       break;
  //     default:
  //       this.router.navigate(['/visiteur']);
  //       break;
  //   }
  // }
}
