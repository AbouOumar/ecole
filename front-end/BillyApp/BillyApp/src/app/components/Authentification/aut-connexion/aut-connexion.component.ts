import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { User } from '../../../Classes/Users/user';
import { UserService } from '../../../Service/User/user.service';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-aut-connexion',
  templateUrl: './aut-connexion.component.html',
  styleUrls: ['./aut-connexion.component.css']
})
export class AutConnexionComponent {
  email: string = '';
  password: string = '';
  loginError: string = '';

  user: User|undefined =new User()

  constructor(private router: Router, private userService: UserService,private routeCrypto: RouteCryptoServiceService) {}

  onLogin() {
    this.loginError = '';
    this.userService.login(this.email, this.password).subscribe(
      (response:any) => {
        this.user = response.user;
        if(this.user){
          if (this.user?.role === "admin") {
            this.routeCrypto.navigateTo('/admin');
          } else if (this.user?.role === "eleve") {
            this.routeCrypto.navigateTo('/eleve');
          } else if (this.user?.role === "enseignant") {
            this.routeCrypto.navigateTo('/enseignant');
          } else {
            this.routeCrypto.navigateTo('/'); // redirection par défaut
          }  
        }else{
            this.loginError = response.message;
        }
      
      },
      (err) => {
        console.error('Erreur de connexion', err);
        return;
      }
    );
  }
}
