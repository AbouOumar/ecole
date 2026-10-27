import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreBalance',
})
export class FiltreBalancePipe implements PipeTransform {


  transform(value: any[],  textRecherche: string,  anneEncours: string): any[] {
    if(!value) return [];
    if(!textRecherche || textRecherche=='0'){
      value = value.filter(annee =>
        annee.annee.toLowerCase() == anneEncours.toLowerCase()

      );
      return value;
    }
            // Filtrage par année scolaire
            if (textRecherche && textRecherche !='0') {
              textRecherche=textRecherche.toLowerCase();
              value = value.filter(balance =>
                balance.annee?.toLowerCase().includes(textRecherche)||
                balance.nomCompte?.toLowerCase().includes(textRecherche)
              );
            }else{
              value = value.filter(balance =>
                balance.annee.toLowerCase() === anneEncours.toLowerCase()

              );
            }

        return value;
  }

}
