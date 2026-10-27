import { Component } from '@angular/core';
import { Item } from '../../../../models/item';
import { items_pers_censeur } from '../../../../api/personnels/items_pers_censeur';

@Component({
  selector: 'app-aside-censeur-de',

  templateUrl: './aside-censeur-de.component.html',
  styleUrl: './aside-censeur-de.component.css'
})
export class AsideCenseurDEComponent {
  data_submenu_personnels: Item [] = items_pers_censeur


}
