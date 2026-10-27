import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreListeDepense',
})
export class FiltreListeDepensePipe implements PipeTransform {

  transform(value: any[], textRechercheDepenses: string): any[] {


    if(!value) return [];
    if(!textRechercheDepenses){
      return value;
    }


        // Filtrage
        if (textRechercheDepenses) {
          textRechercheDepenses=textRechercheDepenses.toLowerCase();
          value = value.filter(depense =>
            depense.created_at?.toLowerCase().includes(textRechercheDepenses)||
            depense.compte?.nomCompte.toLowerCase().includes(textRechercheDepenses)||
            depense.type_depense?.toLowerCase().includes(textRechercheDepenses)
          );
        }
    return value;
  }

}
