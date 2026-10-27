import { Component, EventEmitter, OnInit,  Output } from '@angular/core';
import { Item } from '../../../models/item';
import { nav_items } from '../../../api/nav';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';
// import { Item } from '../../../models/item';

@Component({
  selector: 'app-aside-nav',

  templateUrl: './aside-nav.component.html',
  styleUrl: './aside-nav.component.css'
})
export class AsideNavComponent implements OnInit {
  navs_data: Item[] = nav_items
constructor(public secureRouteService:RouteCryptoServiceService){}

  /* Envoie des message au composant parent(header) lorsqu'on a grandi l'ecran en grande taille
    aside-nav ce ferme automatiquement
    et lorsqu'on se redirige vers un autre interface.
  */
   @Output() close: EventEmitter<string> = new EventEmitter<string>
  ngOnInit(): void {

  }

  handleClose(){
    this.close.emit()
  }
}
