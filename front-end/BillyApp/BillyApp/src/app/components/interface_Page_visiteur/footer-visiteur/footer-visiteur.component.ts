import { Component } from '@angular/core';
import { environment } from '../../../../environments/environment';

@Component({
  selector: 'app-footer-visiteur',

  templateUrl: './footer-visiteur.component.html',
  styleUrl: './footer-visiteur.component.css'
})
export class FooterVisiteurComponent {

  siteName: string = environment.NameBilly


}
