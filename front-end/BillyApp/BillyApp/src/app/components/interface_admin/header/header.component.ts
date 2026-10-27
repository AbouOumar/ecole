import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { SubmenuConf } from '../../../api/configuration_submeu/submenu-conf';
import { Item } from '../../../models/item';
import { SubmenuSupervision } from '../../../api/supervision_submeu/submenu-Supervision';
import { admin_tresories } from '../../../api/Tresories/admin_tresories';
import { admin_depenses } from '../../../api/Depenses/admin_recettes';
import { admin_recettes } from '../../../api/Recettes/admin_recettes';
import { admin_personnels } from '../../../api/personnels/admin_personnels';
import { admin_eleves_parents } from '../../../api/Admin_eleve/admin_eleves_parents';
import { User } from '../../../Classes/Users/user';
import { UserService } from '../../../Service/User/user.service';
import { Router } from '@angular/router';

declare var bootstrap: any;

@Component({
  selector: 'app-header',

  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent implements OnInit {

    constructor( private userService: UserService,private router: Router) {}


  user: User | null= null

  isDisplayMobileNav: boolean = false

     data_submenu : Item [] = admin_eleves_parents
      data_submenu_personnels: Item [] = admin_personnels
      data_submenu_recettes: Item [] = admin_recettes
      data_submenu_depenses: Item [] = admin_depenses
      data_submenu_tresories: Item [] = admin_tresories
      data_submenu_Configuration: Item [] = SubmenuConf
      data_submenu_Supervision: Item [] = SubmenuSupervision


        @Output() close: EventEmitter<string> = new EventEmitter<string>

        handleClose(){
          this.close.emit()
        }


  ngOnInit(): void {
    this.user = this.userService.getUser()

  }

  deconnexion(){
        // Fermeture du modal en utilisant l'API de Bootstrap
        const modalElement = document.getElementById('deconnexion');
        const modal = bootstrap.Modal.getInstance(modalElement); // Récupère l'instance du modal
        modal.hide(); // Cache le modal


        this.userService.logout()
        this.router.navigate([''])


        // Supprimer les backdrops pour enlever l'écran gris
        const backdrop = document.querySelectorAll('.modal-dialog');
        backdrop.forEach(b => b.remove()); // Retirer tous les éléments backdrop

        // Rediriger l'utilisateur vers la page de connexion
        // this.router.navigate(['/login']);

  }

  handleDisplayMobileNav(){
    window.scrollTo(0,0);
    this.isDisplayMobileNav = !this.isDisplayMobileNav

  }

  handleCloseMobileNav(){
    this.isDisplayMobileNav = false
  }
}
