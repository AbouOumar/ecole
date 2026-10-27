import { Component } from '@angular/core';

@Component({
  selector: 'app-liste-des-actions-eleves',

  templateUrl: './liste-des-actions-eleves.component.html',
  styleUrl: './liste-des-actions-eleves.component.css'
})
export class ListeDesActionsElevesComponent {

  onPrint() {
    window.print(); // Cette méthode ouvre la boîte de dialogue d'impression
  }

}
