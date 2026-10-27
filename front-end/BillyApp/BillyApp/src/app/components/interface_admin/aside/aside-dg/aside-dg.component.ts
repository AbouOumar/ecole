import { Component } from '@angular/core';
import { Item } from '../../../../models/item';
import { SubmenuConf } from '../../../../api/configuration_submeu/submenu-conf';
import { SubmenuSupervision } from '../../../../api/supervision_submeu/submenu-Supervision';
import { items_dg_pers } from '../../../../api/personnels/items_dg_pers';

@Component({
  selector: 'app-aside-dg',

  templateUrl: './aside-dg.component.html',
  styleUrl: './aside-dg.component.css'
})
export class AsideDGComponent {
    data_submenu_personnels: Item [] = items_dg_pers
    data_submenu_Configuration: Item [] = SubmenuConf
    data_submenu_Supervision: Item [] = SubmenuSupervision

}
