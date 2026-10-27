import { admin_eleves_parents } from '../../../api/Admin_eleve/admin_eleves_parents';
import { SubmenuConf } from '../../../api/configuration_submeu/submenu-conf';
import { admin_depenses } from '../../../api/Depenses/admin_recettes';
import { admin_personnels } from '../../../api/personnels/admin_personnels';
import { admin_recettes } from '../../../api/Recettes/admin_recettes';
import { admin_tresories } from '../../../api/Tresories/admin_tresories';
import { Item } from '../../../models/item';
import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { items_comptable } from '../../../api/Admin_eleve/items-comptable';
import { items_pers_comp } from '../../../api/personnels/items_pers_comp';
import { UserService } from '../../../Service/User/user.service';
import { User } from '../../../Classes/Users/user';
import { items_dg_pers } from '../../../api/personnels/items_dg_pers';
import { items_pers_censeur } from '../../../api/personnels/items_pers_censeur';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-aside',

  templateUrl: './aside.component.html',
  styleUrl: './aside.component.css'
})
export class AsideComponent implements OnInit{
  constructor(private serviceUser: UserService,public secureRouteService: RouteCryptoServiceService){}

  // constructor(private route: Route){}

  route: any
  user: User | null = null

  data_submenu : Item [] = admin_eleves_parents
  data_submenu_personnels: Item [] = admin_personnels
  data_submenu_recettes: Item [] = admin_recettes
  data_submenu_depenses: Item [] = admin_depenses
  data_submenu_tresories: Item [] = admin_tresories
  data_submenu_Configuration: Item [] = SubmenuConf


   // Route comptable
            data_submenuC : Item [] = items_comptable
            data_submenu_personnelsC: Item [] = items_pers_comp
            data_submenu_recettesC: Item [] = admin_recettes
            data_submenu_depensesC: Item [] = admin_depenses
            data_submenu_tresoriesC: Item [] = admin_tresories
            data_submenu_ConfigurationC: Item [] = SubmenuConf
      // End Route comptable

      // Route DG
            data_submenu_personnelsDG: Item [] = items_dg_pers
            data_submenu_ConfigurationDG: Item [] = SubmenuConf
      // End Route DG

    // Route DE / censeur
        data_submenu_personnelsDEC: Item [] = items_pers_censeur

    // End Route DE / censeur




  @Output() close: EventEmitter<string> = new EventEmitter<string>

  // config = false;

      ngOnInit(): void {
        this.user=this.serviceUser.getUser()
      }

      handleClose(){
        this.close.emit()
      }

      activeMenu: string | null = null;

      toggleIcon(menuId: string): void{
        this.activeMenu = this.activeMenu === menuId ? null : menuId;
      }


}
