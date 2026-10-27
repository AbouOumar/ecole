import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate,Router } from '@angular/router';
import { UserService } from './user.service';
import { ToastrService } from 'ngx-toastr';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService implements CanActivate {
constructor(private auth: UserService, private router: Router) {}

  canActivate(route: ActivatedRouteSnapshot): boolean {
    const expectedRole: string[] = route.data['expectedRole'] || [];
    const user = this.auth.getUser();
    if (!this.auth.isLoggedIn()) {
      this.router.navigate(['/signIn']);
      return false;
    }

    if(!user || !expectedRole.includes(user.Droit)){
      this.router.navigate(['404'])
      return false
    }
    return true;
  }
}