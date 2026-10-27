import { Component, OnInit } from '@angular/core';
import { Item } from '../../../../models/item';
import { admin_recettes } from '../../../../api/Recettes/admin_recettes';
import { admin_depenses } from '../../../../api/Depenses/admin_recettes';
import { admin_tresories } from '../../../../api/Tresories/admin_tresories';
import { SubmenuConf } from '../../../../api/configuration_submeu/submenu-conf';
import { items_comptable } from '../../../../api/Admin_eleve/items-comptable';
import { items_pers_comp } from '../../../../api/personnels/items_pers_comp';

@Component({
  selector: 'app-aside-comptable',

  templateUrl: './aside-comptable.component.html',
  styleUrl: './aside-comptable.component.css'
})
export class AsideComptableComponent implements OnInit {
    data_submenuC : Item [] = items_comptable
    data_submenu_personnelsC: Item [] = items_pers_comp
    data_submenu_recettesC: Item [] = admin_recettes
    data_submenu_depensesC: Item [] = admin_depenses
    data_submenu_tresoriesC: Item [] = admin_tresories
    data_submenu_ConfigurationC: Item [] = SubmenuConf


    // @Output() close: EventEmitter<string> = new EventEmitter<string>

        ngOnInit(): void {

        }

        // handleClose(){
        //   this.close.emit()
        // }

}
