import { Component, EventEmitter, Output } from '@angular/core';
import { nav_eleves_items } from '../../../api/eleves_interface/nav_eleves';
import { Item } from '../../../models/item';
import { RouteCryptoServiceService } from '../../../Service/Crypter/route-crypto-service.service';

@Component({
  selector: 'app-asid-bar-eleve',

  templateUrl: './asid-bar-eleve.component.html',
  styleUrl: './asid-bar-eleve.component.css'
})
export class AsidBarEleveComponent {
  navs_data: Item[] = nav_eleves_items

constructor(public secureRouteService: RouteCryptoServiceService){}
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
